<?php

namespace frontend\controllers;

use common\models\Education;
use common\models\Experience;
use common\models\Resume;
use common\models\Skill;
use common\models\User;
use frontend\helpers\SiteHelper;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\base\InvalidCallException;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Resume controller
 */
class ResumeController extends Controller
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
                        'actions' => ['login', 'error', 'view'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'create',
                            'update',
                            'delete',
                            'view-all',
                            'add-education-form',
                            'add-experience-form',
                            'add-skill-form'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->getIdentity()->role === User::ROLE_CANDIDATE;
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
     * Displays add resume page.
     *
     * @return string|Response
     * @throws InvalidConfigException
     */
    public function actionCreate(): Response|string
    {
        /* @var User $currentUser */

        $currentUser = Yii::$app->user->identity;
        $resumeModel = new Resume();
        $resumeModel->update_date_and_time = date("Y/m/d H:i:s");

        if ($this->request->isPost && $resumeModel->load($this->request->post())) {
            $params = $this->request->getBodyParams();
            $resumeModel->candidate_id = $currentUser->id;

            if ($resumeModel->save()) {
                SiteHelper::handleAddonExistence('Education', $resumeModel, Education::class, $params);
                SiteHelper::handleAddonExistence('Experience', $resumeModel, Experience::class, $params);
                SiteHelper::handleAddonExistence('Skill', $resumeModel, Skill::class, $params);

                return $this->redirect(['view', 'id' => $resumeModel->id]);
            }
        }

        return $this->render('create', compact('resumeModel'));
    }

    /**
     * Updates an existing Resume model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws InvalidConfigException
     */
    public function actionUpdate(int $id): Response|string
    {
        /* @var Resume $resumeModel */
        $resumeModel = Resume::getCurrentResume($id);

        if ($this->request->isPost && $resumeModel->load($this->request->post())) {
            $params = $this->request->getBodyParams();

            if ($resumeModel->save()) {
                foreach ($resumeModel->educations as $educationModel) {
                    $educationModel->delete();
                }

                foreach ($resumeModel->experiences as $experienceModel) {
                    $experienceModel->delete();
                }

                foreach ($resumeModel->skills as $skillModel) {
                    $skillModel->delete();
                }

                SiteHelper::handleAddonExistence('Education', $resumeModel, Education::class, $params);
                SiteHelper::handleAddonExistence('Experience', $resumeModel, Experience::class, $params);
                SiteHelper::handleAddonExistence('Skill', $resumeModel, Skill::class, $params);

                return $this->redirect(['view', 'id' => $resumeModel->id]);
            }
        }

        return $this->render('update', compact('resumeModel'));
    }

    /**
     * Deletes announcement.
     * @param int $id ID
     * @return Response
     * @throws StaleObjectException
     */
    public function actionDelete(int $id): Response
    {
        $resumeModel = Resume::findOne(['id' => $id]);

        if (!$resumeModel) {
            throw new InvalidCallException("Գործողությունն անհասանելի է:");
        }

        foreach ($resumeModel->educations as $educationModel) {
            $educationModel->delete();
        }

        foreach ($resumeModel->experiences as $experienceModel) {
            $experienceModel->delete();
        }

        foreach ($resumeModel->skills as $skillModel) {
            $skillModel->delete();
        }

        $resumeModel->delete();

        return $this->redirect(['view-all']);
    }

    /**
     * Renders education form.
     *
     * @return string
     */
    public function actionAddEducationForm(): string
    {
        return $this->renderAjax('add-education', ['key' => 'eduIndex']);
    }

    /**
     * Renders experience form.
     *
     * @return string
     */
    public function actionAddExperienceForm(): string
    {
        return $this->renderAjax('add-experience', ['key' => 'expIndex']);
    }

    /**
     * Renders skill form.
     *
     * @return string
     */
    public function actionAddSkillForm(): string
    {
        return $this->renderAjax('add-skill', ['key' => 'skillIndex']);
    }

    /**
     * Displays resume managing page.
     *
     * @return string
     */
    public function actionViewAll(): string
    {
        $currentCandidate = Yii::$app->user->identity;
        $candidateResumes = $currentCandidate->candidateResumes;

        return $this->render('view-all', compact('candidateResumes'));
    }

    /**
     * Displays resume view page.
     *
     * @param $id
     * @return string
     * @throws ForbiddenHttpException when user tries to view resume that doesn't belong to them, or it is not sent to them
     */
    public function actionView($id): string
    {
        /* @var Resume $currentResume */
        $currentResume = Resume::getResume($id);
        $currentUser = Yii::$app->user->identity;

        if (!$currentResume) {
            throw new ForbiddenHttpException('The requested page does not exist.');
        }

        return $this->render('view', compact('currentUser', 'currentResume'));
    }
}
