<?php

use common\models\Application;
use yii\helpers\Url;

/* @var $model Application */
?>

<a class="job-listings" href="<?= Url::to(['application/view/' . $model->id]) ?>">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="job-company-logo">
                <img src="<?= $model->candidate->avatarUrl ?>" style="width: 50px; height: 50px" alt="">
            </div>
            <div class="job-details">
                <span class="candidate-name"><?= $model->candidate->username ?></span>
                <h3><?= $model->job['title'] ?></h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 text-center">
            <span class="btn-open"><?= $model->job['vacancies_count'] ?> ազատ հաստիք</span>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
            <span class="btn-full-time"><?= $model->job['working_hours'] ?>-ժամյա</span>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 text-right">
            <div class="location">
                <i class="lni-map-marker"></i> <?= $model->job['location'] ?>
            </div>
        </div>
    </div>
</a>
