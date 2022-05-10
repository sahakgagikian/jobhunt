<?php

/* @var $this yii\web\View */
/* @var $authorizedCompany User */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\User;
use yii\widgets\ListView;

$this->title = $authorizedCompany->username . ' - Իմ հայտարարությունները';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Իմ հայտարարությունները</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Start Content -->
<div id="content">
    <section id="featured" class="section">
        <div class="container">
            <div class="row">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_announcementItem',
                    'summary' => false,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'row',
                    ],
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'col-lg-4 col-md-6 col-xs-12',
                    ],
                    'pager' => [
                        'firstPageLabel' => 'first',
                        'lastPageLabel' => 'last',
                        'prevPageLabel' => 'previous',
                        'nextPageLabel' => 'next',
                    ],
                ]) ?>
            </div>
        </div>
    </section>
</div>
<!-- End Content -->
