<?php
/**
 * Infinity Theme: header template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>        <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>        <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>        <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<?php
	infinity_get_template_part( 'templates/parts/header-head');	
?>
<body <?php body_class() ?> id="infinity-base">
<?php
	do_action( 'open_body' );
?>

<div id="wrapper" class="hfeed">
	<?php
		do_action( 'open_wrapper' );
	?>

	<?php // the header-banner template contains all the markup for the header(logo) and menus. You can easily fork/modify this in your child theme without having to overwrite the entire header.php file.
		infinity_get_template_part( 'templates/parts/header-banner');
	?>
	<?php
			do_action( 'open_container' );
	?>
			
	<!-- start main wrap. the main-wrap div will be closed in the footer template -->
	<div class="main-wrap row <?php do_action( 'main_wrap_class' ); ?>">
	<?php
		do_action( 'open_main_wrap' );
	?>