<?php
/**
 * Show important upgrade notice.
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!-- class="updated" or class="error" -->
<div id="gce-admin-notice" class="error">
	<p>
		<strong>GCal Events Important Update Nov. 17, 2014:</strong><br/>
		Google took version 2 of the GCal API offline, which breaks all calendar feed displays.<br/>
		<strong><a href="https://wordpress.org/support/topic/nov-17-temporary-easy-embed-display-fix" target="_blank">Here's a temporary fix for your calendar display</a></strong>
		while we move the plugin to using the new GCal API this week. Thanks for your patience.
	</p>
</div>
