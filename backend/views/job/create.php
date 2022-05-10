<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $allCompanyUsernames array */
/* @var $allCategoryIds array */

$this->title = 'Ստեղծել աշխատանք';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'allCompanyUsernames', 'allCategoryIds')) ?>

</div>
