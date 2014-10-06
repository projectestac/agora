<?php

/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package    GCE
 * @author     Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//global $gce_options;

?>

<div class="wrap">
	<?php settings_errors(); ?>
	<div id="gce-settings">
		<div id="gce-settings-content">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			
			<form method="post" action="options.php">
				<?php

					settings_fields( 'gce_settings_general' );
					do_settings_sections( 'gce_settings_general' );

					submit_button();
				?>
			</form>
		</div><!-- #gce-settings-content -->
	</div><!-- #gce-settings -->
</div><!-- .wrap -->