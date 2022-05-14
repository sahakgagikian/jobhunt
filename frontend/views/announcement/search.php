<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Browse jobs';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Որոնել աշխատանք</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Job Browse Section Start -->
<section class="job-browse section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="wrap-search-filter row">
                    <div class="input-group rounded-right" id="search-job" data-action="/announcement/search?needle=">
                        <input id="job-search" type="text" class="form-control rounded-0" placeholder="Որոնել..."
                               data-search="guide">
                        <label for="job-search" class="text-hide">Որոնել...</label>
                        <button class="btn btn-common rounded-0" aria-label="search">Որոնել</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_searchItem',
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
                ]) ?>

            </div>
        </div>
    </div>
</section>
<!-- Job Browse Section End -->
