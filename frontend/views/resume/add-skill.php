<section class="skill" data-index="skillIndex">
    <br>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label">Անվանումը</label>
                <div class="form-group field-skill-name required">
                    <input type="text" id="skill-name" class="form-control" name="Skill[skillIndex][name]" placeholder="Հմտության անունը, օր.՝ HTML" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Աստիճանը</label>
                <div class="form-group field-skill-proficiency required">
                    <input type="text" id="skill-proficiency" class="form-control" name="Skill[skillIndex][proficiency]" placeholder="օր.՝ 90%" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-post-btn skills-container">
        <button class="float-left add-skill-form-button">
            <i class="ti-plus"></i> Ավելացնել հմտություն
        </button>
        <button class="float-right remove-skill-form-button" data-index="skillIndex">
            <i class="ti-trash"></i> Ջնջել այս հմտությունը
        </button>
    </div>
</section>