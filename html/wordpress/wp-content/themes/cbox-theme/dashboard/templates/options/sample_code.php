<?php
/**
 * Infinity Theme: Dashboard options screen, option sample code template
 *
 * DO NOT call template tags to render elements in this template!
 *
 * @package Infinity
 * @subpackage dashboard-templates
 */
?>
<strong>Test if this has been set</strong>
<code class="ui-widget-content ui-corner-bottom ui-corner-tr">&lt;?php if ( infinity_option_get( '<?php print $this->component()->property( 'name' ) ?>' ) ): ?&gt;
    <?php print $this->component()->property( 'name' ) ?> has a value
&lt;?php endif; ?&gt;</code>

<strong>Echo an option value (insert this in your custom templates)</strong>
<code class="ui-widget-content ui-corner-bottom ui-corner-tr">&lt;?php echo infinity_option_get( '<?php print $this->component()->property( 'name' ) ?>' ); ?&gt;</code>

<strong>Echo option as image URL (show your uploaded image in a template)</strong>
<code class="ui-widget-content ui-corner-bottom ui-corner-tr">&lt;img src="&lt;?php echo infinity_option_image_url( '<?php print $this->component()->property( 'name' ) ?>', full ); ?&gt;"&gt;</code>

