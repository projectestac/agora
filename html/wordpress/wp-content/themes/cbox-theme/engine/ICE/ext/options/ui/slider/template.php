<?php
/**
 * ICE API: option extensions, ui slider template file
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
<span class="ice-title">
	<?php print esc_html( $label ) ?>
</span>
<span class="ice-content">
	<!-- formatted values injected here -->
</span>
<div id="<?php $this->render_id('widget') ?>" class="ice-controls">
<?php
	// render hidden input(s)
	if ( $this->component()->property( 'range' ) ) {
		// its a range, loop values
		// @todo this is very similar to the input group loop, move to base renderer
		foreach ( $this->component()->get() as $value ) {
			// keep track of current loop for element id
			$loop = ($loop) ? $loop + 1 : 1;
			// finally render the input element
			$this->render_input( 'hidden-multi', $value, $this->component()->element()->id( $loop ) );
		}
	} else {
		// just a single, easy peasy
		$this->render_input( 'hidden' );
	}
?>
</div>

<script type="text/javascript">
	jQuery(function(){
		jQuery('#<?php $this->render_id('widget') ?>')
			.iceEasySlider(
				<?php print $options ?>)
			.iceEasySlider(
				'updateInput',
				'#<?php $this->render_id('widget') ?> input')
			.iceEasySlider(
				'updateDisplay',
				'#<?php $this->render_id() ?> span.ice-content');
	});
</script>