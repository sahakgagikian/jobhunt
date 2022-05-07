<?php

/* @var $this yii\web\View */
/* @var $currentUser User */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = $currentUser->username . ' - Իմ հայտարարությունները';
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php /*echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_announcementItem',
                ]);*/ ?>
                <div class="job-alerts-item candidates">
                    <div class="alerts-list">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Name</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Keywords</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Candidates</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Featured</p>
                            </div>
                        </div>
                    </div>
                    <div class="alerts-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-5 col-xs-12">
                                <h3>Web Designer</h3>
                                <span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p><span class="full-time">Full-Time</span></p>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <p><i class="lni-star"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="alerts-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-5 col-xs-12">
                                <h3>Web Designer</h3>
                                <span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p><span class="full-time">Full-Time</span></p>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <p><i class="lni-star"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="alerts-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-5 col-xs-12">
                                <h3>Web Designer</h3>
                                <span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p><span class="full-time">Full-Time</span></p>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <p><i class="lni-star"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="alerts-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-5 col-xs-12">
                                <h3>Web Designer</h3>
                                <span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p><span class="full-time">Full-Time</span></p>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-2 col-xs-12">
                                <p><i class="lni-star"></i></p>
                            </div>
                        </div>
                    </div>
                    <br>
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
    </div>
</div>
<!-- End Content -->
