<?php

/* @var $this yii\web\View */
/* @var $currentResume Resume */

use common\models\Resume;

$this->title = 'View resume';
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
                                        <h4><a href="#">Basic Information</a></h4>
                                        <h5>Title: <?= $currentResume->candidate_profession_title ?></h5>
                                        <h5>Email: <?= $currentResume->candidate_email ?></h5>
                                        <h5>Website: <?= $currentResume->candidate_website ?></h5>
                                    </div>
                                    <div class="manager-meta">
                                        <span class="location"><i class="ti-location-pin"></i>Location: <?= $currentResume->candidate_location ?></span>
                                        <span class="rate"><i class="ti-time"></i>Desired salary: $<?= $currentResume->candidate_desired_salary ?> per hour</span>
                                        <span class="rate"><i class="ti-time"></i>Age: <?= $currentResume->candidate_age ?></span>
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
                                            <h4><a href="#">Educations</a></h4>
                                            <?php foreach ($currentResume->educations as $education): ?>
                                                <hr>
                                                <h5>Degree: <?= $education->degree ?></h5>
                                                <h5>Field of study: <?= $education->field_of_study ?></h5>
                                                <h5>Educational institution: <?= $education->educational_institution ?></h5>
                                                <h5>Years of study: <?= $education->year_from ?>-<?= $education->year_to ?></h5>
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
                                                <h5>Title: <?= $experience->title ?></h5>
                                                <h5>Company: <?= $experience->company_name ?></h5>
                                                <h5>Years of job: <?= $experience->year_from ?>-<?= $experience->year_to ?></h5>
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
                                            <h4><a href="#">Skills</a></h4>
                                            <?php foreach ($currentResume->skills as $skill): ?>
                                                <hr>
                                                <h5><?= $skill->name ?>: <?= $skill->proficiency ?>%</h5>
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
