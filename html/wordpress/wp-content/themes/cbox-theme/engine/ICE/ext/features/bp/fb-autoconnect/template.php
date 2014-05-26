<?php
/**
 * ICE API: feature extensions, BuddyPress Facebook Auto-Connect feature template file
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
<div <?php $this->render_attrs() ?>>
	<?php jfb_output_facebook_btn(); ?>
</div>