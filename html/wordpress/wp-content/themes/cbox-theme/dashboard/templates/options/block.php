<?php
/**
 * Infinity Theme: Dashboard options screen, option block (wrapper) template
 *
 * DO NOT call template tags to render elements in this template!
 *
 * This template is called from the renderer. All rendering methods
 * are available from the $this variable.
 *
 * @package Infinity
 * @subpackage dashboard-templates
 */

// opening elements
$this->render_begin( 'infinity-cpanel-options-single' );

// start rendering option elements ?>
<div class="infinity-cpanel-options-single-header">
	<?php
		$this->render_label();
		$this->render_buttons();
	?>
</div>
<ul>
	<li><a href="#<?php $this->render_name() ?>-tabs-1"><?php _e('Edit Setting', infinity_text_domain) ?></a></li>
	<?php if ( $this->has_documentation() ): ?>
	<li><a href="#<?php $this->render_name() ?>-tabs-2"><?php _e('Documentation', infinity_text_domain) ?></a></li>
	<?php endif; ?>
	<?php if ( true == INFINITY_DEV_MODE ): ?>
		<li><a href="#<?php $this->render_name() ?>-tabs-3"><?php _e('Sample Code', infinity_text_domain) ?></a></li>
	<?php endif; ?>
</ul>
<div id="<?php $this->render_name() ?>-tabs-1">
	<p><?php $this->render_description() ?></p>
	<?php
		$this->load_template();
	?>
</div>
<?php if ( $this->has_documentation() ): ?>
<div id="<?php $this->render_name() ?>-tabs-2">
	<div class="infinity-docs"><?php $this->render_documentation( ICE_Scheme::instance()->theme_documentation_dirs() ) ?></div>
</div>
<?php endif; ?>
<?php if ( is_admin() && 1 == constant( 'INFINITY_DEV_MODE' ) ): ?>
<div id="<?php $this->render_name() ?>-tabs-3">
	<p><?php $this->render_sample_code() ?></p>
</div>
<?php endif;

// all done
$this->render_end();

?>