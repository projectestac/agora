<?php
/**
 * Show notice after plugin install/activate in admin dashboard until user acknowledges.
 *
 * @package    PIB
 * @subpackage Views
 * @author     Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<style>
	#gce-install-notice .button-primary,
	#gce-install-notice .button-secondary {
		margin-left: 15px;
		line-height: 2;
	}
</style>

<div id="gce-install-notice" class="updated">
	<p>
		<?php _e( 'Major updates are coming to Google Calendar Events on August 23, 2014. ', 'gce' ); ?>
		<a href="http://philderksen.com/google-calendar-events-version-2/" target="_blank">Read more about the changes.</a>
		<a href="<?php echo add_query_arg( 'gce-dismiss-install-nag', 1 ); ?>" class="button-secondary"><?php _e( 'Hide this', 'gce' ); ?></a>
	</p>
</div>
