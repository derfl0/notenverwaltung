$(document).ready(function() {
    $('.checkboxActive tr').click(function() {
        if (!$(this).is("input")) {
            var box = $(this).find(':input');
            box.prop('checked', !box.prop('checked'));
        }
        checkColor();
    });

    function checkColor() {
        $.each($('.checkboxActive tr'), function(index, value) {
            if ($(this).find(':input').prop('checked')) {
                $(this).addClass('checked');
            } else {
                $(this).removeClass('checked');
            }
        });
    }
    
    checkColor();
});