<?php

/* @var $this yii\web\View */
/* @var $currentJob Job */
/* @var $currentUser User */

use common\models\Job;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = $currentJob->title;
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3><?= $currentJob->title ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<?php if ($currentJob->company->id == $currentUser->id): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <?= Html::a('Խմբագրել', ['update', 'id' => $currentJob->id], ['class' => 'btn btn-primary m-1 p-2']) ?>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <?= Html::a('Հեռացնել', ['delete', 'id' => $currentJob->id], [
                    'class' => 'btn btn-danger m-1 p-2',
                    'data' => [
                        'confirm' => 'Վստա՞հ եք, որ ուզում եք հեռացնել այս հայտարարությունը։',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Start Content -->
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?= DetailView::widget([
                    'model' => $currentJob,
                    'attributes' => [
                        'title',
                        'location',
                        'working_hours',
                        'vacancies_count',
                        'min_salary',
                        'max_salary',
                        'description'
                    ],
                ])
                ?>
                <!--<div class="job-alerts-item candidates">
                    <div class="col-lg-12 col-md-6 col-xs-12">
                        <div class="manager-resumes-item">
                            <div class="manager-content">
                                <a href="<?/*= Url::to(['company/view-resume/' . $currentJob->id]) */?>">
                                    <div style="text-align: center; font-size: 20px">View resume</div></a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
