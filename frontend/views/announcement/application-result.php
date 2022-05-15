<?php

/* @var $this yii\web\View */
/* @var $successMessage string */
/* @var $message string */

/* @var $applicationModel Application */

use common\models\Application;
use common\widgets\Alert;

$this->title = 'Application result';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h1><?= Alert::widget() ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>