<?php
/**
 * ICE API: options extensions, textarea template file
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
<textarea name="<?php $this->render_name() ?>" id="<?php $this->render_field_id() ?>" class="<?php $this->render_field_class() ?>" rows="5" cols="50"><?php $this->render_field_value() ?></textarea>