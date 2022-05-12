<?php

/* @var $this yii\web\View */
/* @var $currentResume Resume */

use common\models\Resume;

$this->title = 'Ռեզյումե - ' . $currentResume->candidate_name;
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3><?= $currentResume->candidate_name ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="job-alerts-item candidates">
                    <div class="col-lg-12 col-md-6 col-xs-12">
                        <div class="manager-resumes-item">
                            <div class="manager-content">
                               <div class="manager-info">
                                    <div class="manager-name">
                                        <h4><a href="#">Հիմնական տեղեկություն</a></h4>
                                        <h5><strong>Մասնագիտություն՝ </strong><?= $currentResume->candidate_profession_title ?></h5>
                                        <h5><strong>Էլ. փոստ՝ </strong><?= $currentResume->candidate_email ?></h5>
                                        <h5><strong>Կայք՝ </strong><?= $currentResume->candidate_website ?></h5>
                                    </div>
                                    <div class="manager-meta">
                                        <span class="location"><i class="ti-location-pin"></i><strong>Բնակության վայր՝ </strong><?= $currentResume->candidate_location ?></span>
                                        <span class="rate"><i class="ti-time"></i><strong>Ցանկալի աշխատավարձ՝ </strong><?= $currentResume->candidate_desired_salary ?></span>
                                        <span class="rate"><i class="ti-time"></i><strong>Տարիք՝ </strong><?= $currentResume->candidate_age ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($currentResume->educations)): ?>
                        <div class="col-lg-12 col-md-6 col-xs-12">
                            <div class="manager-resumes-item">
                                <div class="manager-content">
                                    <div class="manager-info">
                                        <div class="manager-name">
                                            <h4><a href="#">Կրթություն</a></h4>
                                            <?php foreach ($currentResume->educations as $education): ?>
                                                <hr>
                                                <h5><strong>Աստիճան՝ </strong><?= $education->degree ?></h5>
                                                <h5><strong>Ոլորտ՝ </strong><?= $education->field_of_study ?></h5>
                                                <h5><strong>Կրթական հաստատություն՝ </strong><?= $education->educational_institution ?></h5>
                                                <h5><strong>Ժամանակահատված՝ </strong><?= $education->year_from ?>-<?= $education->year_to ?></h5>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($currentResume->experiences)): ?>
                        <div class="col-lg-12 col-md-6 col-xs-12">
                            <div class="manager-resumes-item">
                                <div class="manager-content">
                                    <div class="manager-info">
                                        <div class="manager-name">
                                            <h4><a href="#">Experiences</a></h4>
                                            <?php foreach ($currentResume->experiences as $experience): ?>
                                                <hr>
                                                <h5><strong>Պաշտոն՝ </strong><?= $experience->title ?></h5>
                                                <h5><strong>Ընկերություն՝ </strong><?= $experience->company_name ?></h5>
                                                <h5><strong>Ժամանակահատված՝ </strong><?= $experience->year_from ?>-<?= $experience->year_to ?></h5>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($currentResume->skills)): ?>
                        <div class="col-lg-12 col-md-6 col-xs-12">
                            <div class="manager-resumes-item">
                                <div class="manager-content">
                                    <div class="manager-info">
                                        <div class="manager-name">
                                            <h4><a href="#">Հմտություններ</a></h4>
                                            <?php foreach ($currentResume->skills as $skill): ?>
                                                <hr>
                                                <strong><?= $skill->name ?>՝ </strong> <?= $skill->proficiency ?>%
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
