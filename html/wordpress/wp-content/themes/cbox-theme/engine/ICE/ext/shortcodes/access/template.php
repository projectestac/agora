<?php
/**
 * ICE API: shortcode extensions, access shortcode template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage shortcodes
 * @since 1.0
 */

/* @var $this ICE_Shortcode_Renderer */
?>

<?php if ( $content ): ?>
	<div <?php $this->render_attrs() ?>>
		<?php echo $content ?>
	</div>
<?php elseif ( $message ): ?>
	<div class="alertbox white"><?php _e( 'Sorry, only registered users can see this text.', infinity_text_domain ) ?></div>
<?php endif ?>