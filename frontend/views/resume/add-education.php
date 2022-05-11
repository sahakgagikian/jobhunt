<section class="edu" data-index="eduIndex">
    <br>
    <div class="form-group">
        <label class="control-label">Աստիճան</label>
        <div class="form-group field-education-degree required">
            <input type="text" id="education-degree" class="form-control" name="<?= 'Education[eduIndex][degree]' ?>" placeholder="օր.՝ բակալավր" aria-required="true">
            <div class="help-block"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Ոլորտը</label>
        <div class="form-group field-education-field_of_study required">
            <input type="text" id="education-field_of_study" class="form-control" name="<?= 'Education[eduIndex][field_of_study]' ?>" placeholder="օր.՝ կիրառական մաթեմատիկա" aria-required="true">
            <div class="help-block"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Կրթական հաստատություն</label>
        <div class="form-group field-education-educational_institution required">
            <input type="text" id="education-educational_institution" class="form-control" name="<?= 'Education[eduIndex][educational_institution]' ?>" placeholder="օր.՝ Երևանի պետական համալսարան" aria-required="true">
            <div class="help-block"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label">Ընդունման տարեթիվը</label>
                <div class="form-group field-education-year_from required">
                    <input type="text" id="education-year_from" class="form-control" name="<?= 'Education[eduIndex][year_from]' ?>" placeholder="օր.՝ 2016" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Ավարտելու տարեթիվը</label>
                <div class="form-group field-education-year_to required">
                    <input type="text" id="education-year_to" class="form-control" name="<?= 'Education[eduIndex][year_to]' ?>" placeholder="օր.՝ 2022" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Նկարագրություն</label>
        <div class="form-group field-education-description">
            <textarea id="education-description" class="form-control" name="<?= 'Education[eduIndex][description]' ?>" rows="7"></textarea>
            <div class="help-block"></div>
        </div>
    </div>
    <div class="add-post-btn educations-container">
        <button class="float-left add-education-form-button">
            <i class="ti-plus"></i> Ավելացնել կրթություն
        </button>
        <button class="float-right remove-education-form-button" data-index="eduIndex">
            <i class="ti-trash"></i> Ջնջել այս կրթությունը
        </button>
    </div>
</section>