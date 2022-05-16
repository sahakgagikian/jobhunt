<?php

/* @var $this yii\web\View */
/* @var $categoryIds array */
/* @var $user User */

use common\models\User;
use yii\helpers\Url;

$this->title = 'JobHunt | Պորտալ աշխատանք որսալու համար';
?>
<!-- Find Job Section Start -->
<div class="container" style="margin-top: 150px">
    <div class="row space-100">
        <div class="col-lg-7 col-md-12 col-xs-12">
            <div class="contents">
                <?php if ($user->isGuest || $user->identity->role == User::ROLE_CANDIDATE): ?>
                    <h2 class="head-title">Գտիր քեզ համապատասխանող աշխատանք</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores autem dolorum id laudantium quod rerum sequi veniam? Numquam rerum, vel! Consequatur eos id illo labore perspiciatis praesentium voluptate voluptatibus!</p>
                    <a href="announcement/search" class="btn btn-common">Փնտրել աշխատանք</a>
                <?php elseif ($user->identity->role == User::ROLE_COMPANY): ?>
                    <h2 class="head-title">Ավելացրու՛ գրավիչ հայտարարություն</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores autem dolorum id laudantium quod rerum sequi veniam? Numquam rerum, vel! Consequatur eos id illo labore perspiciatis praesentium voluptate voluptatibus!</p>
                    <a href="announcement/add" class="btn btn-common">Ավելացնել հայտարարություն</a>
                <?php endif; ?>

            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="intro-img">
                <img src="/frontend/web/img/intro.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Find Job Section End -->

<!-- Category Section Start -->
<section class="category section bg-gray">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Որոնել ըստ կատեգորիաների</h2>
            <p>Պորտալի ամենատարածված կատեգորիաներն ըստ տարածվածության</p>
        </div>
        <div class="row">
            <?php foreach ($categoryIds as $id => $category): ?>
                <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                    <a href="<?= Url::to(['pages/job-details']) ?>">
                        <div class="icon bg-color-1">
                            <i class="lni-home"></i>
                        </div>
                        <h3><?= $category ?></h3>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Category Section End -->

<!-- How It Work Section Start -->
<?php if ($user->isGuest): ?>
    <section class="how-it-works section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">ԻՆչպե՞ս է ամեն ինչ աշխատում</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus
                    effici turac fringilla lorem facilisis.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process">
              <span class="process-icon">
                <i class="lni-user"></i>
              </span>
                        <h4>Ստեղծի՛ր հաշիվ</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at beatae debitis doloremque error fuga fugiat id ipsa ipsum, iure, labore laborum magnam nostrum perspiciatis quia quos unde, velit voluptatem?</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-2">
              <span class="process-icon">
                <i class="lni-search"></i>
              </span>
                        <h4>Փնտրի՛ր աշխատանք</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aperiam beatae, deleniti dolores, doloribus ducimus est facilis molestiae molestias perferendis perspiciatis porro possimus quaerat quos rerum similique tempora velit voluptatum?</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="work-process step-3">
              <span class="process-icon">
                <i class="lni-cup"></i>
              </span>
                        <h4>Դիմի՛ր</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur culpa ea eveniet fugit hic, illo ipsam libero magnam molestiae, mollitia provident saepe soluta, sunt suscipit veritatis vero vitae voluptate voluptatem?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- How It Work Section End -->
