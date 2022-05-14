$(document).ready(function () {
    $(document).on('click', '#search-job button', function (e) {
        e.preventDefault();

        let urlArr = url.split('/');
        let search_text = $('#search-job input').val();
        let category = urlArr.length === 5 ? '0/' : urlArr[5] + '/';
        let urlAppendix = category + search_text;

        location.href = $(this).parent().attr('data-action') + urlAppendix;
    });

    let url = window.location.href;

    if (url.indexOf('announcement/search') !== -1) {
        let urlArr = url.split('/');
        $('.select-category[data-id=' + urlArr[5] + ']').addClass('active');
    }
})