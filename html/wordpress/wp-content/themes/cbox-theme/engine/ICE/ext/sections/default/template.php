<?php
/**
 * ICE API: section extensions, default section template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage sections
 * @since 1.0
 */

/* @var $this ICE_Section_Renderer */
?>
<div <?php $this->render_attrs() ?>>
	<div class="ui-widget-header ui-state-active ice-title <?php $this->render_class_title() ?>">
		<?php $this->render_title(); ?> <?php _e( 'Options', infinity_text_domain ); ?>
	</div>
	<div class="ui-widget-content ice-content <?php $this->render_class_content() ?>">
		<?php $this->component()->render_components() ?>
	</div>
</div>
