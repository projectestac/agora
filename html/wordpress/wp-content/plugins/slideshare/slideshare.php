<?php
/*
Plugin Name: SlideShare
Plugin URI: http://yoast.com/wordpress/slideshare/
Description: A plugin for WordPress to easily display slideshare.net presentations.
Version: 1.8
Author: Joost de Valk
Author URI: http://yoast.com/
*/

function slideshare_init() {
	//XTEC ************ MODIFICAT - Corregit un bug que impedeix la traducció.
	//2011.05.11 @fbassas

        /*
	load_plugin_textdomain( 'slideshare', null, plugins_url( 'languages' , __FILE__ )  );
        */

        //************ FI

        load_plugin_textdomain( 'slideshare', null, dirname( plugin_basename( __FILE__ )) . '/languages' );
}
add_action( 'init', 'slideshare_init' );

if ( ! class_exists( 'SlideShare_Admin' ) && is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {

	require_once('yst_plugin_tools.php');

	class SlideShare_Admin extends Yoast_Plugin_Admin {

		var $hook 		= 'slideshare';
		var $longname	= 'SlideShare Configuration';
		var $shortname	= 'SlideShare';
		var $filename	= 'slideshare/slideshare.php';
		var $ozhicon	= 'images/page_white_powerpoint.png';

		function SlideShare_Admin() {
			add_action( 'admin_menu', array(&$this, 'register_settings_page') );
			add_filter( 'plugin_action_links', array(&$this, 'add_action_link'), 10, 2 );
			add_filter( 'ozh_adminmenu_icon', array(&$this, 'add_ozh_adminmenu_icon' ) );				

			add_action('admin_print_scripts', array(&$this,'config_page_scripts'));
			add_action('admin_print_styles', array(&$this,'config_page_styles'));	

			//XTEC ************ ELIMINAT - Es treu el widget del tauler d'administració.
			//2011.05.11 @fbassas
			
			/*
			add_action('wp_dashboard_setup', array(&$this,'widget_setup'));
			*/
			
			//************ FI

			add_action('admin_init', array(&$this, 'options_init') );
		}

		function options_init(){
		    register_setting( 'yoast_slideshare_options', 'slideshare' );
		}
		
		function config_page() {
			$options  = get_option('slideshare');
			
			if (!is_array($options) || empty($options['postwidth']) || $options['postwidth'] === 0) {
				global $content_width;
				$options['postwidth'] = $content_width;
			}
			?>
			<div class="wrap">
				<a href="http://yoast.com/"><div id="yoast-icon" class="icon32"><br /></div></a>
				<h2><?php _e("SlideShare Configuration", 'slideshare'); ?></h2>
				<div class="postbox-container" style="width:70%;">
					<div class="metabox-holder">	
						<div class="meta-box-sortables">
						<form action="options.php" method="post" id="slideshare-conf">
						<?php settings_fields('yoast_slideshare_options'); ?>
						<?php 
							$rows = array();
							$rows[] = array(
								"id" => "slidesharepostwidth",
								"label" => __("Default width", 'slideshare'),
								"content" => '<input size="5" type="text" id="slidesharepostwidth" name="slideshare[postwidth]" value="'.$options['postwidth'].'"/> pixels',
							);
							$content = $this->form_table($rows).'<div class="submit"><input type="submit" class="button-primary" name="submit" value="'.__("Update SlideShare Settings", 'slideshare').' &raquo;" /></div>';
							$this->postbox('slidesharesettings',__('Settings', 'slideshare'),$content);
							$this->postbox('usageexplanation',__('Explanation of usage', 'slideshare'),'<p>'.__('Just copy and paste the "Embed (wordpress.com)" code from', 'slideshare').' <a href="http://www.slideshare.net/">SlideShare</a>, '.__("and you're done", 'slideshare').'</p>');
							$this->postbox('defaultwidthexpl',__("Explanation of default width", 'slideshare'),'<p>'.__("If you enter nothing here, you can change the width by hand by changing the w= value, that is bolded and red here:", 'slideshare').'</p>'.'<pre>[slideshare id=1234&amp;doc=how-to-change-the-width-123456789-1&amp;<strong style="color:red;">w=425</strong>]</pre>'.'<p>'.__("If you <em>do</em> enter a value, it will always replace the width with that value.", 'slideshare')); ?>
						</form>
						</div>
					</div>
				</div>
				<div class="postbox-container" style="width:20%;">
					<div class="metabox-holder">	
						<div class="meta-box-sortables">
							<?php
								$this->plugin_like();
								$this->plugin_support();
								$this->donate_box();
								$this->news(); 
							?>
						</div>
						<br/><br/><br/>
					</div>
				</div>
			</div>
			<?php
		}
	}
	
	$ssa = new SlideShare_Admin();
}

if ( !is_admin() ) {

	class Yoast_SlideShare_Front {

		var $regex = '#http://(www\.)?slideshare.net/([^/]+)/([^/]+)#i';

		function __construct() {
			// Make open embed work
			add_action( 'init', array( $this,'enable_openembed' ) );

			// Change the open embed code to use the iframe and remove all the silly links
			add_filter( 'embed_oembed_html', array( $this, 'change_oembed' ), 1, 3 );

			// Backwards compatibility for the old shortcode
			add_shortcode( 'slideshare', array( $this, 'shortcode' ) );

		}

		// PHP4 Compatible constructor
		function SlideShare_Front() {
			$this->__construct();
		}

		// Takes the ID of a presentation and the width to present it at and returns the iframe string for that presentation
		function embed( $id, $width ) {
			$height	= round($width / 1.32) + 34;

			return '<iframe src="http://www.slideshare.net/slideshow/embed_code/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe><br/><br/>';
		}

		function shortcode($atts, $content=null) {	
			if ( isset($atts) ) {
				$options = get_option('SlideShare');

				$args	= str_replace('&#038;','&',$atts['id']);
				$args	= str_replace('&amp;','&',$args);
				$r 		= wp_parse_args('id='.$args);

				if ($options['postwidth'] == '') {
					$width	= $r['w'];			
				} else {
					$width	= $options['postwidth'];
				}
				if ($width == 0) {
					global $content_width;
					$width = $content_width;
				}
				if ($width == 0) {
					$width = 400;
				}

				return $this->embed( $r['id'], $width );
			}

			return false;
		}

		function enable_openembed() {
			wp_oembed_add_provider( $this->regex, 'http://www.slideshare.net/api/oembed/1', true );
		}

		function change_oembed( $html, $url, $attr ) {
			if ( !preg_match( $this->regex, $url ) )
				return $html;

			$options = get_option( 'SlideShare' );

			// try getting the width set in the settings, if that's not there, default to the theme's content width, otherwise default to 425.
			$width = $options['postwidth'];
			if ( $width == '' ) {
				global $content_width;
				$width = $content_width;
			}
			if ( $width == '' )
				$width = 425;

			if ( preg_match( '/__sse(\d+)/', $html, $matches ) )
				$new_html = $this->embed( $matches[1], $width );

			// Debug
			// $new_html .= htmlentities($html);

			return $new_html;			
		}

	}

	$yoast_slideshare = new Yoast_SlideShare_Front();
		
}
