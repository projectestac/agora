<?php

ICE_Loader::load( 'utils/webfont' );

?>
<div id="typography-ff"></div>

<script type="text/javascript">
	(function($){
		var options = {};
		// add application options
		options.jsonUrl = '<?php print ICE_Webfont::instance(0)->get_property( 'url' ) ?>';
		options.slantText = '<?php _e( 'Slant', infinity_text_domain ) ?>';
		options.serviceText = '<?php _e( 'Service', infinity_text_domain ) ?>';
		options.variantText = '<?php _e( 'Thickness', infinity_text_domain ) ?>';
		options.subsetText = '<?php _e( 'Script', infinity_text_domain ) ?>';
		options.match =
			function(e,fonts,filters){
				console.log(fonts.length,filters);
//				$.each(fonts, function(k,v) {
//					console.log(v);
//				});
			};
		// add font picker
		$('div#typography-ff').fontfilter(options);
	})(jQuery);
</script>