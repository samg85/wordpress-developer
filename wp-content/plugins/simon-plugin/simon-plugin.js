jQuery(document).ready(function($) {
    var current = 1,
        current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function() {
        if (!$('#regiration_form')[0].checkValidity()) {
            $('#regiration_form').find("#submit").click();
        } else {

            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
        }
    });
    $(".previous").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
    });

});