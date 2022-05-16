<?php

/* @var $this yii\web\View */
/* @var $currentCompanyApplications array */
/* @var $currentUser User */
/* @var $searchModel backend\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\User;
use yii\widgets\ListView;

$this->title = $currentUser->username . ' - Ստացված դիմումներ';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Ստացված դիմումներ</h3>
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
                <div class="job-alerts-item">
                    <h3 class="alerts-title">Ստացված դիմումներ</h3>
                    <?= ListView::widget( [
                        'dataProvider' => $dataProvider,
                        'itemView' => '_listItem',
                        'summary' => false,
                        'options' => [
                            'tag' => 'div',
                            'class' => 'row',
                        ],
                        'itemOptions' => [
                            'tag' => 'div',
                            'class' => 'col-12',
                        ],
                        'pager' => [
                            'firstPageLabel' => '«',
                            'lastPageLabel' => '»',
                            'prevPageLabel' => '<',
                            'nextPageLabel' => '>',
                            'maxButtonCount' => 3,

                            'options' => [
                                'class' => 'pager-wrapper',
                                'id' => 'pager-container',
                            ],

                            // Customizing CSS class for pager link
                            'linkOptions' => ['class' => 'pager-link'],
                            'activePageCssClass' => 'pager-active',
                            'disabledPageCssClass' => 'pager-disable',

                            // Customizing CSS class for navigating link
                            'prevPageCssClass' => 'pager-prev',
                            'nextPageCssClass' => 'pager-next',
                            'firstPageCssClass' => 'pager-first',
                            'lastPageCssClass' => 'pager-last',
                        ],
                    ] ) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
