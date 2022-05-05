<?php

/* @var $this yii\web\View */
/* @var $model Job */
/* @var $allCategoryIds array */
/* @var $currentUser User */

use common\models\Job;
use common\models\User;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Նոր հայտարարություն';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Ավելացնել հայտարարություն</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Content section Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="post-job box">
                    <h3 class="job-title">Ավելացնել նոր հայտարարություն</h3>
                    <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
                        'options' => [
                            'class' => 'login-form'
                        ],
                    ]); ?>
                    <div class="form-group">
                        <label class="control-label">Պաշտոնը</label>
                        <?= $form
                            ->field($model, 'title')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Պահանջվող աշխատակցի պաշտոնը',
                                'autofocus' => true])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Գտնվելու վայրը</label>
                        <?= $form
                            ->field($model, 'location')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'օր.՝ Երևան',
                                'autofocus' => true])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Աշխատանքային ժամերը</label>
                        <?= $form
                            ->field($model, 'working_hours')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Լրիվ, ոչ լրիվ աշխատանքային օր, այլ',
                                'autofocus' => true])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Կատեգորիան</label>
                        <?= $form
                            ->field($model, 'categoryIds')
                            ->widget(Select2::class, [
                                'data' => $allCategoryIds,
                                'model' => $model,
                                'options' => [
                                    'class' => 'styled-select',
                                    'placeholder' => 'Ընտրել ցուցակից...',
                                    'multiple' => true
                                ]])
                            ->label(false); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ազատ հաստիքներ</label>
                        <?= $form
                            ->field($model, 'vacancies_count')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Ազատ հաստիքների քանակը',
                                'autofocus' => true])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Նվազագույն աշխատավարձը</label>
                        <?= $form
                            ->field($model, 'min_salary')
                            ->input('number', ['min' => 0, 'step' => 10000])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Առավելագույն աշխատավարձը</label>
                        <?= $form
                            ->field($model, 'max_salary')
                            ->input('number', ['min' => 0, 'step' => 10000])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Նկարագրություն</label>
                        <?= $form
                            ->field($model, 'description')
                            ->textarea()
                            ->label(false) ?>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Ավելացնել', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->
