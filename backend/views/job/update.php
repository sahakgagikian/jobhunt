<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $allCompanyUsernames array */
/* @var $allCategoryIds array */

$this->title = 'Update Job: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'allCompanyUsernames', 'allCategoryIds')) ?>

</div>
