<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Կատեգորիաներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ստեղծել կատեգորիա', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'Լուսանկար',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function ($item) {
                    return $item->imageUrl;
                }
            ],

            'jobs_count',
            'sort',

            [
                'attribute' => 'created_at',
                'value' => function ($item) {
                    return date('Y-m-d H:i:s', $item->created_at);
                },
            ],

            [
                'attribute' => 'updated_at',
                'value' => function ($item) {
                    return date('Y-m-d H:i:s', $item->updated_at);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
