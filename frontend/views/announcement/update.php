<?php

/* @var $this yii\web\View */
/* @var $model Job */
/* @var $allCategoryIds array */
/* @var $currentUser User */

use common\models\Job;
use common\models\User;

$this->title = $model->title . ' - Խմբագրել հայտարարությունը';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>«<?= $model->title ?>» - Խմբագրել հայտարարությունը</h3>
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
                    <h3 class="job-title">Խմբագրել հայտարարությունը</h3>
                    <?= $this->render('_form', compact('model', 'allCategoryIds')) ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->
