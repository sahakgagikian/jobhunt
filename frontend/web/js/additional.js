$(document).ready(function () {
    $(document).on('click', '#search-job button', function(e){
        e.preventDefault();
        let search_text = $('#search-job input').val();
        location.href = $(this).parent().attr('data-action') + search_text;
    });
})