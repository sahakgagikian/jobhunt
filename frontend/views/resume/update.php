<?php

/* @var $this yii\web\View */

/* @var $resumeModel Resume */
/* @var $educationModel Education */
/* @var $experienceModel Experience */
/* @var $skillModel Skill */

use common\models\Education;
use common\models\Experience;
use common\models\Resume;
use common\models\Skill;

$this->title = $resumeModel->candidate_name . ' - Խմբագրել ռեզյումեն';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3><?= $resumeModel->candidate_name ?> - Խմբագրել ռեզյումեն</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<?= $this->render('_form', compact('resumeModel')) ?>
