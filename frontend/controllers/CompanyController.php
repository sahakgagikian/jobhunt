<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Job;
use common\models\JobCategory;
use common\models\User;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
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
                        'actions' => ['manage-applications', 'my-job-alerts', 'add-job', 'view-application', 'browse-resumes', 'view-resume'],
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

                    return $this->goHome();
                }
            }
        }

        return $this->render('add-job', compact('model', 'allCategoryIds', 'currentUser'));
    }

}
