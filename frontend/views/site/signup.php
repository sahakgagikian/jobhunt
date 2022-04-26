<?php

/* @var $this yii\web\View */
/* @var $model SignupForm */
/* @var $timezoneList array */
/* @var $avatar string */
/* @var $role integer */

use common\models\User;
use frontend\models\SignupForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$roleName = $role == User::ROLE_CANDIDATE ? 'թեկնածու' : 'գործատու';
$this->title = 'JobHunt | Գրանցվել որպես ' . $roleName;
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Ստեղծեք Ձեր հաշիվը</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Content section Start -->
<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>Ստեղծեք Ձեր հաշիվը</h3>

                    <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
                        'options' => [
                            'class' => 'login-form'
                        ],
                        'enableClientValidation' => true,
                    ]); ?>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-user"></i>
                            <?= $form->field($model, 'username')->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Մուտքանուն'])
                                ->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-envelope"></i>
                            <?= $form->field($model, 'email')->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Էլ․ փոստ'])
                                ->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <?= $form->field($model, 'avatar')->widget(FileInput::class, [
                                'options' => [
                                    'accept' => 'image/*',
                                    'class' => 'avatar'
                                ],
                                'pluginOptions' => [
                                    'initialPreview' => [
                                        $model->avatar ? $model->getAvatarUrl() : null
                                    ],
                                    'initialPreviewAsData' => true,
                                    'language' => substr(\Yii::$app->language, 0, 2),
                                    'dropZoneTitle' => Yii::t('app', 'Քաշեք և բաց թողեք ձեր լուսանկարն այստեղ...'),
                                    'browseLabel' => Yii::t('app', 'Ընտրել'),
                                    'removeLabel' => 'Ջնջել',
                                    'uploadLabel' => 'Վերբեռնել',
                                    'msgPlaceholder' => 'Ընտրել ֆայլ․․․',
                                    'msgProcessing' => 'Մշակվում է',
                                    'showCancel' => false,
                                    'showZoom' => false,
                                ]
                            ])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'timezone')->widget(Select2::class, [
                            'data' => $timezoneList,
                            'model' => $model,
                            'options' => [
                                'placeholder' => 'Ձեր ժամային գոտին'
                            ]])
                            ->label(false) ?>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-lock"></i>
                            <?= $form
                                ->field($model, 'password')
                                ->passwordInput([
                                    'class' => 'form-control',
                                    'placeholder' => 'Ծածկագիր'])
                                ->label(false) ?>
                        </div>
                    </div>
                    <?= $form->errorSummary($model); ?>
                    <div class="form-group">
                        <?= Html::submitButton(
                            'Գրանցվել',
                            [
                                'class' => 'btn btn-common log-btn mt-3',
                                'name' => 'signup-button'
                            ])
                        ?>
                    </div>
                    <p class="text-center">Ունե՞ք հաշիվ։<a href="<?= Url::to(['site/login']) ?>"> Մուտք գործեք</a></p>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->
