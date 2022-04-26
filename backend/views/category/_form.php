<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(FileInput::class, [
        'options' => [
            'accept' => 'image/*',
        ],
        'pluginOptions' => [
            'initialPreview' => [
                $model->image ? $model->getImageUrl() : null
            ],
            'initialPreviewAsData' => true,
            'language' => substr(\Yii::$app->language, 0, 2),
            'dropZoneTitle' => Yii::t('app', 'Քաշեք և բաց թողեք ձեր լուսանկարն այստեղ...'),
            'browseLabel' => Yii::t('app', 'Ընտրել'),
            'removeLabel' => 'Ջնջել',
            'uploadLabel' => 'Վերբեռնել',
            'msgPlaceholder' => 'Ընտրել ֆայլ․․․',
            'msgProcessing' => 'Մշակվում է',
        ]
    ])->label('Լուսանկար') ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Պահպանել', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
