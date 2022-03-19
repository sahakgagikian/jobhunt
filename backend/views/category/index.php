<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            [
                'attribute' => 'imageUrl',
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],

            'jobs_count',
            'sort',

            [
                'attribute' => 'created_at',
                'value' => function ($item) {
                    $date = new DateTime($item->created_at);
                    $date->setTimezone(new DateTimeZone('Asia/Yerevan'));

                    return $date->format('Y-m-d H:i:s');
                },
            ],

            [
                'attribute' => 'updated_at',
                'value' => function ($item) {
                    $date = new DateTime($item->updated_at);
                    $date->setTimezone(new DateTimeZone('Asia/Yerevan'));

                    return $date->format('Y-m-d H:i:s');
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
