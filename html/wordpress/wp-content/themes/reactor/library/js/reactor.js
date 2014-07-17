/* Reactor - Anthony Wilhelm - http://awtheme.com/ */
( function($) {

  $(document).ready( function() {
	
    /* adds .button class to submit button on comment form */
    $('#commentform input#submit').addClass('button').addClass('small');
  
    /* adjust site for fixed top-bar with wp admin bar */
    if($('body').hasClass('admin-bar')) {
    	if($('.top-bar').parent().hasClass('fixed')) {
    		
		if($('body').hasClass('has-top-bar')) {
	    	    $('.top-bar').parent().css('margin-top', "+=28");
		}
		
		$('body').css('padding-top', "+=28");
	}
    }

    /* prevent default if menu links are # */
    $('nav a').each(function() {
        var nav = $(this); 
        if(nav.attr('href') == '#') {
            $(this).on('click', function(e){ 
                e.preventDefault();
            });
        }
    });

    /* MixItUp - http://mixitup.io/ */
    if($().mixitup) {
        $(function(){
            $('#Grid').mixitup();
        });
    }
	
  }); /* end $(document).ready */

	/* Off Canvas - http://www.zurb.com/playground/off-canvas-layouts */
	events = 'click.fndtn';
	var $selector = $('#mobileMenuButton');
	if ($selector.length > 0) {
		$('#mobileMenuButton').on(events, function(e) {
			e.preventDefault();
			$('body').toggleClass('active');
		});
	}
	
	/* Initialize Foundation Scripts */
	$(document).foundation();

})( jQuery );	
