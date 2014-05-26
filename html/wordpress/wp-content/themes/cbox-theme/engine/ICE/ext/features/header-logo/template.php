<?php
/**
 * ICE API: feature extensions, header logo feature template file
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
/* @var $logo_url string URL to logo if applicable */

// use H1 on home page, DIV otherwise
$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div';

?>
<<?php print $heading_tag; ?> <?php $this->render_attrs() ?>>
	<a href="<?php echo home_url( '/'  ); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
		<img src="<?php print $logo_url ?>">
	</a>
</<?php print $heading_tag; ?>>