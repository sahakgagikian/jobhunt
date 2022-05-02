<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Job;
use backend\models\JobSearch;
use backend\controllers\AdminController;
use common\models\JobCategory;
use common\models\User;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends AdminController
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Job models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Job model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate(): Response|string
    {
        $model = new Job();
        $allCategoryIds = Category::getAllCategoryIds();
        $allCompanyUsernames = User::getAllCompanyUsernames();

        if ($this->request->isPost) {/*
            echo '<pre>';
            print_r($this->request);
            die;*/
            if ($model->load($this->request->post()) && $model->save()) {
                foreach ($model->categoryIds as $id) {
                    $jobOfCategory = new JobCategory();

                    $jobOfCategory->job_id = $model->id;
                    $jobOfCategory->category_id = $id;
                    $jobOfCategory->save();
                }
                foreach ($model->categories as $category) {
                    $category->jobs_count = $category->categoryJobsCount;
                    $category->save();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', compact('model', 'allCategoryIds', 'allCompanyUsernames'));
    }

    /**
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Job model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     * @throws StaleObjectException
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Job
    {
        if (($model = Job::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    #[ArrayShape(['results' => "mixed|string[]"])]
    public function actionGetCompanyList($q = null): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'username' => '']];

        if (!is_null($q)) {
            $data = User::find()->select('id, username')
                ->from('user')
                ->where(['role' => User::ROLE_COMPANY])
                ->andWhere(['like', 'username', $q])
                ->limit(20)->all();
            $results = [];

            /* @var User $datum */
            foreach ($data as $datum) {
                $results[] = ['id' => $datum->id, 'username' => $datum->username];
            }
            $out['results'] = $results;
        }

        return $out;
    }
}
