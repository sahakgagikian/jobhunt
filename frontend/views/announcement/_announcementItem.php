<?php

use common\models\Job;
use yii\helpers\Url;

/* @var $model Job */

?>
<div class="col-lg-4 col-md-6 col-xs-12">
    <a href="<?= Url::to(['announcement/view/' . $model->id]) ?>">
        <div class="job-featured">
            <div class="icon">
                <img src="/frontend/web/img/features/img1.png" alt="">
            </div>
            <div class="content">
                <h3><a href="../../../backend/web/index.php"><?= $model->title ?></a></h3>
                <p class="brand"><?= $model->company->username ?></p>
                <div class="tags">
                    <span><i class="lni-map-marker"></i><?= $model->location ?></span>
                </div>
                <span class="full-time"><?= $model->working_hours == 8 ? 'Լրիվ դրույք' : 'Ոչ լրիվ դրույք' ?></span>
            </div>
        </div>
    </a>
</div>
