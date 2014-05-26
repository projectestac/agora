<?php
/**
 * ICE API: option extensions, upload template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

/* @var $this ICE_Option_Renderer */
/* @var $edit_url string URL of image editor */
/* @var $attach_url string URL of image attachment */
/* @var $attach_width integer Width of image attachment (pixels) */
/* @var $attach_height integer Height of image attachment (pixels) */
/* @var $default_url string URL of default image */
?>

<div id="<?php $this->render_id('main') ?>" class="ui-widget <?php $this->render_class( 'widget' ) ?>">
	<fieldset class="ui-widget-content ui-corner-all">
		<legend class="ui-widget-header ui-corner-all">
			<?php _e('Current Image', infinity_text_domain) ?>
		</legend>
		<p class="ice-content">
			<img src="<?php print esc_attr( $attach_url ) ?>" alt="" />
		</p>
		<div class="ice-controls">
			<a><?php _e('Upload', infinity_text_domain) ?></a>
			<a><?php _e('Select', infinity_text_domain) ?></a>
			<a><?php _e('Zoom', infinity_text_domain) ?></a>
			<a><?php _e('Trash', infinity_text_domain) ?></a>
			<div class="ice-do-disable">
				<input type="checkbox">
				<?php _e( 'Disable image, including default', infinity_text_domain ) ?>
			</div>
		</div>
		
		<?php $this->render_input( 'hidden' ); ?>
	</fieldset>
</div>

<script type="text/javascript">
jQuery(document).ready( function($){

	$( 'div#<?php $this->render_id('main') ?>' )
		.icextOptionUploader({
			ibarSelector: 'div.ice-controls',
			imageSelector: 'p.ice-content img',
			inputSelector: 'input[name="<?php $this->render_name() ?>"]',
			defImage: {
				value: '<?php echo $default_value ?>',
				url: '<?php echo $default_url ?>'
			},
			noImage: {
				value: '0',
				url: '<?php echo ICE_IMAGES_URL . '/square_x.png' ?>'
			},
			muOptions: {
				title: '<?php _e( 'Media Uploader', infinity_text_domain ) ?>',
				dialogClass: '<?php $this->render_class('dialog') ?>'
			},
			zoomOptions: {
				title: '<?php _e( 'Zoom!', infinity_text_domain ) ?>'
			}
		});

});
</script>
