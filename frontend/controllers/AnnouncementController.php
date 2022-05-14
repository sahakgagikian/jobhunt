<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Job;
use common\models\JobCategory;
use common\models\User;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class AnnouncementController extends Controller
{
    /**
     * @inheritdoc
     */
    #[ArrayShape(['access' => "array", 'verbs' => "array"])]
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'view', 'search'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['add', 'update', 'delete', 'my-announcements'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->getIdentity()->role === User::ROLE_COMPANY;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new announcement.
     */
    public function actionAdd(): Response|string
    {
        /* @var User $currentUser */

        $currentUser = Yii::$app->user->identity;
        $allCategoryIds = Category::getAllCategoryIds();
        $model = new Job();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->company_id = $currentUser->id;

                if ($model->save()) {
                    foreach ($model->categoryIds as $id) {
                        $jobCategory = new JobCategory();
                        $jobCategory->setJobCategory($jobCategory, $model, $id);
                    }

                    foreach ($model->categories as $category) {
                        $category->jobs_count = $category->categoryJobsCount;
                        $category->save();
                    }

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('add', compact('model', 'allCategoryIds', 'currentUser'));
    }

    /**
     * Updates announcement.
     * @throws StaleObjectException
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = Job::findOne(['id' => $id]);
        $allCategoryIds = Category::getAllCategoryIds();
        $allCompanyUsernames = User::getAllCompanyUsernames();
        $jobCategoryModel = JobCategory::find()->where(['job_id' => $id])->all();

        foreach ($model->categories as $category) {
            $category->jobs_count = $category->categoryJobsCount - 1;
            $category->save();
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            foreach ($jobCategoryModel as $jcm) {
                $jcm->delete();
            }

            foreach ($model->categoryIds as $id) {
                $jobCategory = new JobCategory();
                $jobCategory->setJobCategory($jobCategory, $model, $id);
                $newModel = Job::findOne(['id' => $model->id]);

                foreach ($newModel->categories as $category) {
                    $category->jobs_count = $category->categoryJobsCount;
                    $category->save();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model', 'allCategoryIds', 'allCompanyUsernames'));
    }

    /**
     * Deletes announcement.
     * @param int $id ID
     * @return Response
     * @throws StaleObjectException
     */
    public function actionDelete(int $id): Response
    {
        $model = Job::findOne(['id' => $id]);

        foreach ($model->categories as $category) {
            $category->jobs_count = $category->categoryJobsCount - 1;
            $category->save();
        }

        $model->delete();

        return $this->goHome();
    }

    /**
     * Displays announcement view page.
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        /* @var User $currentUser */
        /* @var Job $currentJob */

        $currentUser = Yii::$app->getUser()->identity;
        $currentJob = Job::find()->where(['id' => $id])->one();

        if (!$currentJob) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', compact('currentUser', 'currentJob'));
    }

    /**
     * Displays all announcements page.
     *
     * @return string
     */
    public function actionMyAnnouncements(): string
    {
        /* @var User $authorizedCompany */

        $authorizedCompany = Yii::$app->user->identity;
        $dataProvider = new ActiveDataProvider([
            'query' => $authorizedCompany->getCompanyJobs(),
        ]);

        return $this->render('my-announcements', compact('dataProvider', 'authorizedCompany'));
    }

    /**
     * Displays job searching page.
     *
     * @param null $needle
     * @return string
     */
    public function actionSearch($needle = null): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Job::getAllJobsWithCompanies($needle),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('search', compact('dataProvider'));
    }
}
