<?php

/* @var $this yii\web\View */
/* @var $model LoginForm */

use common\models\LoginForm;
use common\models\User;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'JobHunt - Log in';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Login</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Content section Start -->
<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>Login</h3>

                    <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
                        'options' => [
                            'class' => 'login-form'
                        ],
                    ]); ?>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-user"></i>
                            <?= $form
                                ->field($model, 'username')
                                ->textInput([
                                    'id' => 'sender-username',
                                    'class' => 'form-control',
                                    'placeholder' => 'Username',
                                    'autofocus' => true])
                                ->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-lock"></i>
                            <?= $form
                                ->field($model, 'password')
                                ->passwordInput([
                                    'class' => 'form-control',
                                    'placeholder' => 'Password',
                                    'autofocus' => true])
                                ->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep Me Signed In</label>
                    </div>
                    <button class="btn btn-common log-btn">Submit</button>
                    <?php ActiveForm::end(); ?>

                    <ul class="form-links">
                        <li class="text-center">
                            Don't have an account? Sign up as<br>
                            <a href="<?= Url::to(['site/signup?role=' . User::ROLE_CANDIDATE]) ?>">Candidate</a> |
                            <a href="<?= Url::to(['site/signup?role=' . User::ROLE_COMPANY]) ?>">Company</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->