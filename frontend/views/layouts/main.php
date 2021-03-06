<?php

/* @var $this View */

/* @var $content string */

use common\models\User;
use frontend\assets\Asset;
use yii\helpers\Url;
use yii\web\View;

Asset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <!-- Required meta tags -->
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Grayrids">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>
    <!-- Header Section Start -->
    <header id="home" class="hero-area">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
            <div class="container">
                <div class="theme-header clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="lni-menu"></span>
                            <span class="lni-menu"></span>
                            <span class="lni-menu"></span>
                        </button>
                        <a href="<?= Url::to(['/']) ?>" class="navbar-brand"><img src="/frontend/web/img/logo.png" alt=""></a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-navbar">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <?php if (!(Yii::$app->user->isGuest)): ?>
                                <?php if (Yii::$app->user->identity->role == User::ROLE_CANDIDATE): ?>
                                    <li class="nav-item" id="job">
                                        <a class="nav-link" href="<?= Url::to(['announcement/search']) ?>">
                                            ????????????????
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown" id="resume">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            ????????????????
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" id="add-resume"
                                                   href="<?= Url::to(['resume/create']) ?>">?????????????????? ????????????????</a>
                                            </li>
                                            <li><a class="dropdown-item" id="manage-resumes"
                                                   href="<?= Url::to(['resume/view-all']) ?>">???? ????????????????????????</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endif; ?>

                                <?php if (Yii::$app->user->identity->role == User::ROLE_COMPANY): ?>
                                    <li class="button-group" id="add-job">
                                        <a href="<?= Url::to(['announcement/add']) ?>" class="button btn btn-common">+
                                            ?????? ??????????????????????????????</a>
                                    </li>

                                    <li class="nav-item dropdown" id="announcements">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            ????????????????????????????????????
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" id="add-job"
                                                   href="<?= Url::to(['announcement/add']) ?>">??????????????????
                                                    ??????????????????????????????</a></li>
                                            <li><a class="dropdown-item" id="manage-jobs"
                                                   href="<?= Url::to(['announcement/my-announcements']) ?>">????
                                                    ??????????????????????????????????????</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item dropdown" id="candidates">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            ??????????????????????
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" id="manage-applications"
                                                   href="<?= Url::to(['application/my-announcements']) ?>">??????????????
                                                    ??????????????????</a></li>
                                            <li><a class="dropdown-item" id="browse-resumes"
                                                   href="<?= Url::to(['resume/browse-resumes']) ?>">??????????????????????</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li class="nav-item" id="contact">
                                <a class="nav-link" href="<?= Url::to(['contact/contact']) ?>">
                                    ??????
                                </a>
                            </li>
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li class="nav-item" id="login">
                                    <a class="nav-link" href="<?= Url::to(['site/login']) ?>">
                                        ??????????
                                    </a>
                                </li>
                                <li class="nav-item dropdown" id="register">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        ????????????????
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" id="candidate-register"
                                               href="<?= Url::to(['site/signup?role=' . User::ROLE_CANDIDATE]) ?>">????????????????</a>
                                        </li>
                                        <li><a class="dropdown-item" id="employer-register"
                                               href="<?= Url::to(['site/signup?role=' . User::ROLE_COMPANY]) ?>">????????????????</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item" id="logout">
                                    <a class="nav-link" href="<?= Url::to(['site/logout']) ?>" data-method="post">
                                        ?????????? ?????? (<?= Yii::$app->user->identity->username ?>)
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-menu" data-logo="/frontend/web/img/logo-mobile.png"></div>
        </nav>
        <!-- Navbar End -->
    </header>
    <!-- Header Section End -->

    <?= $content ?>

    <!-- Footer Section Start -->
    <footer>
        <!-- Footer Area Start -->
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="widget">
                            <div class="footer-logo"><img src="/frontend/web/img/logo-footer.png" alt=""></div>
                            <div class="textwidget">
                                <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus
                                    semper.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Quick Links</h3>
                            <ul class="menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">License</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                            <ul class="menu">
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Refferal Terms</a></li>
                                <li><a href="#">Product License</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Subscribe Now</h3>
                            <p>Sed consequat sapien faus quam bibendum convallis.</p>
                            <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                                <div class="form-group is-empty">
                                    <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..."
                                           required="">
                                    <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <ul class="mt-3 footer-social">
                                <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer area End -->

    </footer>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
