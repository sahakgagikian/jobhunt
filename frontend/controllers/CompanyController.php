<?php

namespace frontend\controllers;

use backend\models\JobSearch;
use common\models\Category;
use common\models\Job;
use common\models\JobCategory;
use common\models\User;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CompanyController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['manage-applications', 'my-announcements', 'add-job', 'view-announcement', 'view-application', 'browse-resumes', 'view-resume'],
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

    public function actionAddJob(): Response|string
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

                    return $this->redirect(['view-announcement', 'id' => $model->id]);
                }
            }
        }

        return $this->render('add-job', compact('model', 'allCategoryIds', 'currentUser'));
    }

    /**
     * Displays application view page.
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionViewAnnouncement($id): string
    {
        /* @var User $currentUser */
        /* @var Job $currentJob */

        $currentUser = Yii::$app->getUser()->identity;
        $currentJob = Job::find()->where(['id' => $id])->one();

        if ($currentJob->company->id !== $currentUser->id) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view-announcement', compact('currentUser', 'currentJob'));
    }

    /**
     * Displays job managing page.
     *
     * @return string
     */
    public function actionMyAnnouncements(): string
    {
        /* @var User $currentUser */

        $currentUser = Yii::$app->user->identity;$searchModel = new JobSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('my-announcements', compact('searchModel', 'dataProvider', 'currentUser'));
    }
}
