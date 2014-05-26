<?php
/**
 * ICE API: option extensions, pages template file
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
?>
<div id="<?php $this->render_field_id() ?>" class="<?php $this->render_field_class() ?>">
	<?php $this->component()->render_field() ?>
</div>