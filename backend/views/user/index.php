<?php

use common\models\User;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Օգտատերեր';
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
                'attribute' => 'Լուսանկար',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function ($item) {
                    return $item->avatarUrl;
                }
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
                            return 'ադմին';
                        case User::ROLE_CANDIDATE:
                            return 'թեկնածու';
                        case User::ROLE_COMPANY:
                            return 'գործատու';
                    }
                },
                'filter' => Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'role',
                        'data' => [
                            User::ROLE_ADMIN => 'ադմին',
                            User::ROLE_CANDIDATE => 'թեկնածու',
                            User::ROLE_COMPANY => 'գործատու'
                        ],
                        'options' => [
                            'placeholder' => 'Ընտրել...'
                        ]
                    ]
                ),
            ],

            [
                'attribute' => 'status',
                'value' => function ($item) {
                    switch ($item->status) {
                        case User::STATUS_INACTIVE:
                            return 'ոչ ակտիվ';
                        case User::STATUS_ACTIVE:
                            return 'ակտիվ';
                        case User::STATUS_DELETED:
                            return 'հեռացված';
                    }
                },
                'filter' => Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'status',
                        'data' => [
                            User::STATUS_INACTIVE => 'ոչ ակտիվ',
                            User::STATUS_ACTIVE => 'ակտիվ',
                            User::STATUS_DELETED => 'հեռացված'
                        ],
                        'options' => [
                            'placeholder' => 'Ընտրել...'
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
