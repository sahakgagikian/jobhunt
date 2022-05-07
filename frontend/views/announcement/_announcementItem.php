<?php

use yii\helpers\Url;

?>

<a href="<?= Url::to(['announcement/view/' . $model->id]) ?>">
    <div class="applications-content">
        <div class="row">
            <div class="col-md-4">
                <div class="thums">
                    <img src="<?= $model->job->company->imageUrl ?>" alt="">
                </div>
                <h3><?= $model->job->title ?></h3>
                <span><?= $model->candidate->username ?></span>
            </div>
            <div class="col-md-3">
                <p><span class="full-time"><?= $model->job->working_hours ?></span></p>
            </div>
            <div class="col-md-3">
                <p>Nov 14th, 2017</p>
            </div>
            <div class="col-md-2">
                <p>Rejected</p>
            </div>
        </div>
    </div>
</a>