<?php

/* @var $this yii\web\View */
/* @var $currentJob Job */
/* @var $currentUser User */

use common\models\Job;
use common\models\User;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['url' => ['view', 'id' => $currentJob->id]];

$this->title = $currentJob->title;
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper">
                    <div class="img-wrapper">
                        <img src="<?= $currentJob->company->avatarUrl ?>" style="width: 70px; height: 70px" alt="">
                    </div>
                    <div class="content">
                        <h3 class="product-title"><?= $currentJob->title ?></h3>
                        <p class="brand"><?= $currentJob->company->username ?></p>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i><?= $currentJob->location ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="month-price">
                    <span class="year">Աշխատավարձը սկսած</span>
                    <div class="price"><?= $currentJob->min_salary ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Job Detail Section Start -->
<section class="job-detail section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="content-area">
                    <h4>Նկարագրություն</h4>
                    <p><?= $currentJob->description ?></p>
                    <a href="<?= Url::to(['announcement/apply/' . $currentJob->id]) ?>" class="btn btn-common">Ուղարկել դիմում</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Job Detail Section End -->
