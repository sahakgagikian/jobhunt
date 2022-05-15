<?php

/* @var $this yii\web\View */
/* @var $applicationModel Application */

/* @var $candidateResumes array */

use common\models\Application;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Դիմել աշխատանքի համար';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h1>Ընտրեք ռեզյումե դիմումին կցելու համար։</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="job-alerts-item candidates">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="form-group">
                        <?php foreach ($candidateResumes as $resume): ?>
                        <div class="d-flex">
                                <?= $form->field($applicationModel, 'resume_id')
                                    ->radio(['uncheck' => null, 'value' => $resume->id, 'label' => null]); ?>
                                <a href="<?= Url::to(['resume/view/' . $resume->id]) ?>">
                                    Title: <?= $resume->candidate_profession_title ?>
                                </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton(
                            'Ուղարկել դիմումը',
                            [
                                'class' => 'btn btn-common',
                                'name' => 'signup-button'
                            ])
                        ?>
                    </div>
                    <?php
                    $jobIdError = $applicationModel->getFirstError('job_id');
                                      if($jobIdError):?>
                                      <span ><?=$jobIdError?></span>
                    <?php endif?>
                    <?php ActiveForm::end(); ?>
                    <!--<a class="btn btn-common btn-sm" href="<?php /*echo Url::to(['resume/add-resume']); */ ?>">Add new resume</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->