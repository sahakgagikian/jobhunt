<?php

/* @var $this yii\web\View */

/* @var $resumeModel Resume */
/* @var $educationModel Education */
/* @var $experienceModel Experience */
/* @var $skillModel Skill */

use common\models\Education;
use common\models\Experience;
use common\models\Resume;
use common\models\Skill;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::$app->user->identity->username . ' - Ավելացնել ռեզյումե';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Ավելացնել ռեզյումե</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Content section Start -->
<section id="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="add-resume box">
                    <?php $form = ActiveForm::begin([
                        'options' => [
                            'class' => 'form-ad',
                        ],
                    ]); ?>

                    <h3>Հիմնական տեղեկություն</h3>
                    <div class="form-group">
                        <label class="control-label">Ամբողջական անուն</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_name')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Նշեք ձեր անունն ու ազգանունը'])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Էլ. փոստ</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_email')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Your@domain.com'])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Մասնագիտություն</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_profession_title')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'օր.՝ Front-end ծրագրավորող'])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Բնակության վայր</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_location')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'օր.՝ Երևան, Հայաստան'])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Կայք</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_website')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Ձեր կայքի հասցեն'])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ցանկալի աշխատավարձ</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_desired_salary')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'օր.՝ 200.000 դրամ'])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Տարիք</label>
                        <?= $form
                            ->field($resumeModel, 'candidate_age')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Ձեր տարիքը'])
                            ->label(false) ?>
                    </div>

                    <h3>Կրթություն</h3>
                    <div id="educations-container">
                        <button class="float-left add-education-form-button">
                            <i class="ti-plus"></i> Ավելացնել կրթություն
                        </button>
                        <br>
                    </div>
                    <br>

                    <h3>Աշխատանքային փորձ</h3>
                    <div id="experiences-container">
                        <button class="float-left add-experience-form-button">
                            <i class="ti-plus"></i> Ավելացնել փորձ
                        </button>
                        <br>
                    </div>
                    <br>

                    <h3>Հմտություններ</h3>
                    <div id="skills-container">
                        <button class="float-left add-skill-form-button">
                            <i class="ti-plus"></i> Ավելացնել հմտություն
                        </button>
                        <br>
                    </div>
                    <br>

                    <div class="form-group">
                        <?= Html::submitButton(
                            'Պահպանել',
                            [
                                'class' => 'btn btn-common',
                                'name' => 'signup-button'
                            ])
                        ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->