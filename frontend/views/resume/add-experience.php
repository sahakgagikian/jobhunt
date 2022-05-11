<section class="exp" data-index="expIndex">
    <br>
    <div class="form-group">
        <label class="control-label">Գործատու</label>
        <div class="form-group field-experience-company_name required">
            <input type="text" id="experience-company_name" class="form-control" name="Experience[expIndex][company_name]" placeholder="Ընկերության անվանումը" aria-required="true">
            <div class="help-block"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Պաշտոն</label>
        <div class="form-group field-experience-title required">
            <input type="text" id="experience-title" class="form-control" name="Experience[expIndex][title]" placeholder="օր.՝ UI/UX հետազոտող" aria-required="true">
            <div class="help-block"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label">Ընդունման ամսաթիվը</label>
                <div class="form-group field-experience-year_from required">
                    <input type="text" id="experience-year_from" class="form-control" name="Experience[expIndex][year_from]" placeholder="օր.՝ 2018" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Ազատվելու ամսաթիվը՝</label>
                <div class="form-group field-experience-year_to required">
                    <input type="text" id="experience-year_to" class="form-control" name="Experience[expIndex][year_to]" placeholder="օր.՝ 2020" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Նկարագրություն</label>
        <div class="form-group field-experience-description">
            <textarea id="experience-description" class="form-control" name="Experience[expIndex][description]" rows="7"></textarea>
            <div class="help-block"></div>
        </div>
    </div>
    <div class="add-post-btn experiences-container">
        <button class="float-left add-experience-form-button">
            <i class="ti-plus"></i> Ավելացնել փորձ
        </button>
        <button class="float-right remove-experience-form-button" data-index="expIndex">
            <i class="ti-trash"></i> Ջնջել այս փորձը
        </button>
    </div>
</section>