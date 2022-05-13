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
                    <h3>Browse Job</h3>
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
                        'firstPageLabel' => 'first',
                        'lastPageLabel' => 'last',
                        'prevPageLabel' => 'previous',
                        'nextPageLabel' => 'next',
                    ],
                ]) ?>

                <!-- Start Pagination -->
                <ul class="pagination">
                    <li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
                </ul>
                <!-- End Pagination -->
            </div>
        </div>
    </div>
</section>
<!-- Job Browse Section End -->
