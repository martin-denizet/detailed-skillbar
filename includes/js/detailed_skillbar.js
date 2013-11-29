jQuery(function($) {
    $('.detailed-skillbar-inview-anim').each(function() {
        $(this).one('inview', function(event, visible) {
            if (visible == true) {
                // element is now visible in the viewport
                $(this).find('.detailed-skillbar-bar').animate({width: $(this).attr('data-percent')}, 1500);
            }
        });
    });
});

jQuery(function($) {
    $(document).ready(function() {
        $('.detailed-skillbar-documentready-anim').each(function() {
            $(this).find('.detailed-skillbar-bar').animate({width: $(this).attr('data-percent')}, 1500);
        });
    });
});

jQuery(function($) {
    $(document).ready(function() {
        $(".detailed-skillbar-toggle-trigger").click(function() {
            $(this).toggleClass("active").next().slideToggle("fast");
            return false;
        });
    });
});