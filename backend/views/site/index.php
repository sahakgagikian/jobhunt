<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;

$this->title = Html::encode(Yii::$app->name);
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?= $this->title ?></h1>
    </div>
</div>
