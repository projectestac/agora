jQuery(document).ready(function() {
    jQuery('.wl-toggle-link').click(function() {
        jQuery(this).toggleClass('wl-toggle-link-open wl-toggle-link-closed');
        jQuery(this).parents('dl.wl-cat').children('dd.wl-sub').slideToggle();
    });
});