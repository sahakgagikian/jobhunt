$(document).ready(function () {
    window.educationsFormIndex = 0;

    $(document).on('click', '.add-education-form-button', function(e) {
        e.preventDefault();

        $.ajax({
            url: "/resume/add-education-form",
            success: function (result) {
                $("#educations-container").append(result.replaceAll('eduIndex', window.educationsFormIndex));
                window.educationsFormIndex++;
            }
        });
    })

    $(document).on('click', '#educations-container .remove-education-form-button', function(e) {
        e.preventDefault();
        $('.edu[data-index="' + $(this).data('index') + '"]').remove();
    })


    window.experiencesFormIndex = 0;

    $(document).on('click', '.add-experience-form-button', function(e) {
        e.preventDefault();

        $.ajax({
            url: "/resume/add-experience-form",
            success: function (result) {
                $("#experiences-container").append(result.replaceAll('expIndex', window.experiencesFormIndex));
                window.experiencesFormIndex++;
            }
        });
    })

    $(document).on('click', '#experiences-container .remove-experience-form-button', function(e) {
        e.preventDefault();
        $('.exp[data-index="' + $(this).data('index') + '"]').remove();
    })


    window.skillsFormIndex = 0;

    $(document).on('click', '.add-skill-form-button', function(e) {
        e.preventDefault();

        $.ajax({
            url: "/resume/add-skill-form",
            success: function (result) {
                $("#skills-container").append(result.replaceAll('skillIndex', window.skillsFormIndex));
                window.skillsFormIndex++;
            }
        });
    })

    $(document).on('click', '#skills-container .remove-skill-form-button', function(e) {
        e.preventDefault();
        $('.skill[data-index="' + $(this).data('index') + '"]').remove();
    })
})
