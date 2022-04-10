<?php

use common\models\User;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',

            [
                'attribute' => 'avatarUrl',
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],

            [
                'attribute' => 'created_at',
                'value' => function ($item) {
                    return date('Y-m-d H:i:s', $item->created_at);
                },
            ],

            [
                'attribute' => 'updated_at',
                'value' => function ($item) {
                    return date('Y-m-d H:i:s', $item->created_at);
                },
            ],

            [
                'attribute' => 'role',
                'value' => function ($item) {
                    switch ($item->role) {
                        case User::ROLE_ADMIN:
                            return 'admin';
                        case User::ROLE_CANDIDATE:
                            return 'candidate';
                        case User::ROLE_COMPANY:
                            return 'company';
                    }
                },
                'filter' => Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'role',
                        'data' => [
                            User::ROLE_ADMIN => 'admin',
                            User::ROLE_CANDIDATE => 'candidate',
                            User::ROLE_COMPANY => 'company'
                        ],
                        'options' => [
                            'placeholder' => 'Select role...'
                        ]
                    ]
                ),
            ],

            [
                'attribute' => 'status',
                'value' => function ($item) {
                    switch ($item->status) {
                        case User::STATUS_INACTIVE:
                            return 'Inactive';
                        case User::STATUS_ACTIVE:
                            return 'Active';
                        case User::STATUS_DELETED:
                            return 'Deleted';
                    }
                },
                'filter' => Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'status',
                        'data' => [
                            User::STATUS_INACTIVE => 'Inactive',
                            User::STATUS_ACTIVE => 'Active',
                            User::STATUS_DELETED => 'Deleted'
                        ],
                        'options' => [
                            'placeholder' => 'Select status...'
                        ]
                    ]
                ),
            ],

            'timezone',

        ],
        'pager' => [
            'class' => '\yii\bootstrap4\LinkPager',
        ]
    ]); ?>


</div>
