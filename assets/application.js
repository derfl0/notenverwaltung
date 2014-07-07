$(document).ready(function() {
    $('.checkboxActive tr').click(function(event) {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
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