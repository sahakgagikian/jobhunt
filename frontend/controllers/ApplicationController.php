<?php

namespace frontend\controllers;

use common\models\Application;
use common\models\User;
use frontend\models\ApplicationSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ApplicationController extends Controller
{

    /**
     * Displays application managing page.
     *
     * @return string
     */
    public function actionManage(): string
    {
        /* @var User $currentUser */

        $currentUser = Yii::$app->user->identity;
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('manage', compact('searchModel', 'dataProvider', 'currentUser'));
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        /* @var User $currentUser */
        /* @var Application $currentApplication */

        $currentUser = Yii::$app->getUser()->identity;
        $currentApplication = Application::find()->with(['resume'])->where(['id' => $id])->one();
        $currentResume = $currentApplication->resume;

        if ($currentApplication->job->company->id !== $currentUser->id) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', compact('currentApplication', 'currentResume'));
    }

}
