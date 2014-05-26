<?php
/**
 * ICE API: option extensions, color picker template file
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

<?php $this->render_input( 'text' ) ?>

<div id="<?php $this->render_id( 'launcher' ) ?>" class="<?php $this->render_class( 'launcher' ) ?>">
	<div style="background-color: <?php $this->render_field_value() ?>;"></div>
</div>

<script type="text/javascript">
	iceEasyColorPicker.init(
		'input[name=<?php $this->render_name() ?>]',
		'div#<?php $this->render_id( 'launcher' ) ?>'
	);
</script>