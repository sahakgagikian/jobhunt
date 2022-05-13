<?php

/* @var $this yii\web\View */
/* @var $candidateResumes array */

use frontend\helpers\SiteHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->user->identity->username . ' - Իմ ռեզյումեները';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Իմ ռեզյումեները</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="job-alerts-item candidates">
                    <?php foreach ($candidateResumes as $resume): ?>
                        <div class="manager-resumes-item">
                            <div class="manager-content">
                                <div class="manager-info">
                                    <div class="manager-name">
                                        <h4><a href="<?= Url::to(['candidates/view-resume/' . $resume->id]) ?>"><?= $resume->candidate_name ?></a></h4>
                                        <h5><?= $resume->candidate_profession_title ?></h5>
                                    </div>
                                    <div class="manager-meta">
                                        <span class="location"><i class="lni-map-marker"></i> <?= $resume->candidate_location ?></span>
                                        <span class="rate"><i class="lni-alarm-clock"></i> $<?= $resume->candidate_desired_salary ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="update-date">
                                <p class="status">
                                    <strong>Վերջին թարմացումը՝ </strong> <?= SiteHelper::dateTimeInTimezone($resume->update_date_and_time) ?>
                                </p>
                                <div class="action-btn d-flex">
                                    <?= Html::a('Խմբագրել', ['update', 'id' => $resume->id], ['class' => 'btn btn-primary m-1 p-2']) ?>
                                    <?= Html::a('Հեռացնել', ['delete', 'id' => $resume->id], [
                                        'class' => 'btn btn-danger m-1 p-2',
                                        'data' => [
                                            'confirm' => 'Վստա՞հ եք, որ ուզում եք հեռացնել այս ռեզյումեն։',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?= Html::a('Ավելացնել նոր ռեզյումե', 'create', ['class' => 'btn btn-common m-1 p-2']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
