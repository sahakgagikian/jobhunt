<?php

/* @var $this yii\web\View */
/* @var $currentApplication Application */
/* @var $currentResume Resume */

use common\models\Resume;
use yii\base\Application;
use yii\helpers\Url;

$this->title = $currentApplication->candidate->username . ' - View application';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3><?= $currentApplication->candidate->username ?></h3>
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
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="job-alerts-item candidates">
                    <div class="col-lg-12 col-md-6 col-xs-12">
                        <div class="manager-resumes-item">
                            <div class="manager-content">
                                <a href="<?= Url::to(['resume/view/' . $currentResume->id]) ?>">
                                    <div style="text-align: center; font-size: 20px">View resume</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
