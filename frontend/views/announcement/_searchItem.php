<?php

use common\models\Job;
use yii\helpers\Url;

/* @var $model Job */

?>

<a class="job-listings" href="<?= Url::to(['announcement/view/' . $model->id]) ?>">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="job-company-logo">
                <img src="<?= $model->company->avatarUrl ?>" style="width: 50px; height: 50px" alt="">
            </div>
            <div class="job-details">
                <h3><?= $model['title'] ?></h3>
                <span class="company-name"><?= $model->company->username ?></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 text-center">
            <span class="btn-open"><?= $model['vacancies_count'] ?> ազատ հաստիք</span>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
            <span class="btn-full-time"><?= $model['working_hours'] ?>-ժամյա</span>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 text-right">
            <div class="location">
                <i class="lni-map-marker"></i> <?= $model['location'] ?>
            </div>
        </div>
    </div>
</a>
