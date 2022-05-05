<?php

use common\models\Category;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\widgets\ActiveForm */
/* @var $allCompanyUsernames array */
/* @var $allCategoryIds array */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php $companyData = $model->getCompany()->select('username')->indexBy('id')->column(); ?>

    <?= $form->field($model, 'company_id')->widget(Select2::class, [
        'data' => $allCompanyUsernames,
        'model' => $model,
        'options' => [
            'placeholder' => 'Ընտրել ցուցակից...',
            'multiple' => false
        ]
    ]);

    /*$form->field($model, 'companyTitles')->widget(Select2::class, [
        'initValueText' => $companyData,
        'options' => ['multiple' => false, 'value' => array_keys($companyData)],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => Url::to(['/job/get-company-list']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(data) { return data.username; }'),
            'templateSelection' => new JsExpression('function (data) { return data.username; }'),
        ],
    ]);*/ ?>

    <?= $form->field($model, 'categoryIds')->widget(Select2::class, [
        'data' => $allCategoryIds,
        'model' => $model,
        'options' => [
            'placeholder' => 'Ընտրել ցուցակից...',
            'multiple' => true
        ]
    ])->label('Կատեգորիա'); ?>

    <?= $form->field($model, 'vacancies_count')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'working_hours')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'min_salary')->input('number', ['min' => 0, 'step' => 10000]) ?>

    <?= $form->field($model, 'max_salary')->input('number', ['min' => 0, 'step' => 10000]) ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
