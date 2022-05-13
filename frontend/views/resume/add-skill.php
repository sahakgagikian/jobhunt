<?php
/* @var $key integer */
/* @var $value Skill */

use common\models\Skill;
?>

<section class="skill" data-index="<?= $key ?>">
    <br>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label">Անվանումը</label>
                <div class="form-group field-skill-name required">
                    <input type="text" id="skill-name" class="form-control" name="Skill[<?= $key ?>][name]" value="<?= $value->name ?? '' ?>" placeholder="Հմտության անունը, օր.՝ HTML" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Աստիճանը</label>
                <div class="form-group field-skill-proficiency required">
                    <input type="text" id="skill-proficiency" class="form-control" name="Skill[<?= $key ?>][proficiency]" value="<?= $value->proficiency ?? '' ?>" placeholder="օր.՝ 90%" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-post-btn skills-container">
        <button class="float-left add-skill-form-button btn-common">
            <i class="ti-plus"></i> Ավելացնել հմտություն
        </button>
        <button class="float-right remove-skill-form-button btn-danger" data-index="<?= $key ?>">
            <i class="ti-trash"></i> Ջնջել այս հմտությունը
        </button>
    </div>
</section>