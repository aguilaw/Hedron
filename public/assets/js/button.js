$(document).ready(function () {
    $('.buttn-container area').each(function () {
        // Assigning an action to the mouseover event
        $(this).mouseover(function (e) {
            var country_id = $(this).attr('id').replace('area_', '');
            $('#' + country_id).css('display', 'block');
        });

        // Assigning an action to the mouseout event
        $(this).mouseout(function (e) {
            var country_id = $(this).attr('id').replace('area_', '');
            $('#' + country_id).css('display', 'none');
        });

    });
});