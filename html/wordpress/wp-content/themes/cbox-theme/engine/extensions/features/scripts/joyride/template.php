<?php
/**
 * ICE API: feature extensions, Joyride template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

/* @var $this ICE_Feature_Renderer */
?>
<ol <?php $this->render_attrs() ?> style="display: none;">
	<?php $this->load_template_part( 'items' ); ?>
</ol>

<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery(this).joyride(
			<?php print $options ?>
		);
	});
</script>