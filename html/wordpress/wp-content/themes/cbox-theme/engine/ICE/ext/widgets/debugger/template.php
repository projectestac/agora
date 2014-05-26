<?php
/**
 * ICE API: widget extensions, debugger template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage widgets
 * @since 1.0
 */

/* @var $this ICE_Widget_Renderer */
?>

<div <?php $this->render_attrs( 'ui-widget' ) ?>>
	<div class="ui-widget-header">
		<?php $this->render_title() ?>
	</div>
	<div class="ui-widget-content">
		<?php $this->component()->render_items() ?>
	</div>
</div>

<script type="text/javascript">
	jQuery('div#<?php $this->render_id() ?> div.ui-widget-content')
		.jstree({
			'plugins': ['html_data','themeroller'],
			'core': {'animation': 0}
		});
</script>