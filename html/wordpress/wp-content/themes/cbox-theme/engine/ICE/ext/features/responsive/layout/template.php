<?php
/**
 * ICE API: feature extensions, responsive layout feature template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2012 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

/* @var $this ICE_Feature_Renderer */
?>
<!-- Responsive Layout Feature -->
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		// iPhone viewport scaling bug fix //

		// set viewport scale
		function setScale( min, max ) {
			// match all viewport metas and set content attr
			$( 'head meta[name=viewport]' ).attr( 'content', 'width=device-width, minimum-scale=' + min + ', maximum-scale=' + max );
		}
		
		// gesture event callback
		function gStart() {
			setScale( '0.25', '1.6' );
		};

		// match iPhone browser
		if ( navigator.userAgent.match( /iPhone/i ) ) {
			// reset all viewport scales
			setScale( '1.0', '1.0' );
			// add callback to every gesturestart event
			document.addEventListener( 'gesturestart', gStart, false );
		}
	});
</script>