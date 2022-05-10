<?php

use common\models\Job;
use yii\helpers\Url;

/* @var $model Job */

?>

<a href="<?= Url::to(['announcement/view/' . $model->id]) ?>">
    <div class="job-featured">
        <div class="content">
            <h3><?= $model->title ?></h3>
            <p class="brand"><?= $model->company->username ?></p>
            <div class="tags">
                <span><i class="lni-map-marker"></i><?= $model->location ?></span>
            </div>
            <span class="full-time"><?= $model->working_hours == 8 ? 'Լրիվ դրույք' : 'Ոչ լրիվ դրույք' ?></span>
        </div>
    </div>
</a>
