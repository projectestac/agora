<?php

/**
 * Backend Class for use in all Yoast plugins
 * Version 0.2
 */

if (!class_exists('Yoast_Plugin_Admin')) {
	class Yoast_Plugin_Admin {

		var $hook 		= '';
		var $filename	= '';
		var $longname	= '';
		var $shortname	= '';
		var $ozhicon	= '';
		var $optionname = '';
		var $homepage	= '';
		var $accesslvl	= 'manage_options';
		var $feed		= 'http://yoast.com/feed/';
		
		function Yoast_Plugin_Admin() {
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
		}
		
		function add_ozh_adminmenu_icon( $hook ) {
			if ($hook == $this->hook) 
				return WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname($filename)). '/'.$this->ozhicon;
			return $hook;
		}
		
		function config_page_styles() {
			if (isset($_GET['page']) && $_GET['page'] == $this->hook) {
				wp_enqueue_style('dashboard');
				wp_enqueue_style('thickbox');
				wp_enqueue_style('global');
				wp_enqueue_style('wp-admin');
				wp_enqueue_style('blogicons-admin-css', WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)). '/yst_plugin_tools.css');
			}
		}

		function register_settings_page() {
			add_options_page($this->longname, $this->shortname, $this->accesslvl, $this->hook, array(&$this,'config_page'));
		}
		
		function plugin_options_url() {
			return admin_url( 'options-general.php?page='.$this->hook );
		}
		
		/**
		 * Add a link to the settings page to the plugins list
		 */
		function add_action_link( $links, $file ) {
			static $this_plugin;
			if( empty($this_plugin) ) $this_plugin = $this->filename;
			if ( $file == $this_plugin ) {
				$settings_link = '<a href="' . $this->plugin_options_url() . '">' . __('Settings', 'slideshare') . '</a>';
				array_unshift( $links, $settings_link );
			}
			return $links;
		}
		
		function config_page() {
			
		}
		
		function config_page_scripts() {
			if (isset($_GET['page']) && $_GET['page'] == $this->hook) {
				wp_enqueue_script('postbox');
				wp_enqueue_script('dashboard');
				wp_enqueue_script('thickbox');
				wp_enqueue_script('media-upload');
			}
		}

		/**
		 * Create a Checkbox input field
		 */
		function checkbox($id, $label) {
			$options = get_option($this->optionname);
			return '<input type="checkbox" id="'.$id.'" name="'.$id.'"'. checked($options[$id],true,false).'/> <label for="'.$id.'">'.$label.'</label><br/>';
		}
		
		/**
		 * Create a Text input field
		 */
		function textinput($id, $label) {
			$options = get_option($this->optionname);
			return '<label for="'.$id.'">'.$label.':</label><br/><input size="45" type="text" id="'.$id.'" name="'.$id.'" value="'.$options[$id].'"/><br/><br/>';
		}

		/**
		 * Create a potbox widget
		 */
		function postbox($id, $title, $content) {
		?>
			<div id="<?php echo $id; ?>" class="postbox">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span><?php echo $title; ?></span></h3>
				<div class="inside">
					<?php echo $content; ?>
				</div>
			</div>
		<?php
			$this->toc .= '<li><a href="#'.$id.'">'.$title.'</a></li>';
		}	


		/**
		 * Create a form table from an array of rows
		 */
		function form_table($rows) {
			$content = '<table class="form-table">';
			$i = 1;
			foreach ($rows as $row) {
				$class = '';
				if ($i > 1) {
					$class .= 'yst_row';
				}
				if ($i % 2 == 0) {
					$class .= ' even';
				}
				$content .= '<tr class="'.$row['id'].'_row '.$class.'"><th valign="top" scrope="row">';
				if (isset($row['id']) && $row['id'] != '')
					$content .= '<label for="'.$row['id'].'">'.$row['label'].':</label>';
				else
					$content .= $row['label'];
				$content .= '</th><td valign="top">';
				$content .= $row['content'];
				$content .= '</td></tr>'; 
				if ( isset($row['desc']) && !empty($row['desc']) ) {
					$content .= '<tr class="'.$row['id'].'_row '.$class.'"><td colspan="2" class="yst_desc"><small>'.$row['desc'].'</small></td></tr>';
				}
					
				$i++;
			}
			$content .= '</table>';
			return $content;
		}

		/**
		 * Create a "plugin like" box.
		 */
		function plugin_like($hook = '') {
			if (empty($hook)) {
				$hook = $this->hook;
			}
			$content = '<p>'.__('Why not do any or all of the following:','slideshare').'</p>';
			$content .= '<ul>';
			$content .= '<li><a href="'.$this->homepage.'">'.__('Link to it so other folks can find out about it.','slideshare').'</a></li>';
			$content .= '<li><a href="http://wordpress.org/extend/plugins/'.$hook.'/">'.__('Give it a good rating on WordPress.org.','slideshare').'</a></li>';
			//XTEC ************ ELIMINAT
			//2014.06.30 @jmiro227
			/*
			$content .= '<li><strong>'.__('Donate a token of your appreciation using the button below.','slideshare').'</strong></li>';
			*/			
			//************ FI			
			$content .= '<li><a href="http://wordpress.org/extend/plugins/'.$hook.'/">'.__('Let other people know that it works with your WordPress setup.','slideshare').'</a></li>';
			$content .= '</ul>';
			$this->postbox($hook.'like', __('Like this plugin?','slideshare'), $content);
		}	
		
		function donate_box() {
			//XTEC ************ ELIMINAT
			//2014.06.30 @jmiro227
			/*
			$this->postbox('donate','<strong class="red">Donate $10, $20 or $50!</strong>','<p>'.__('This plugin has cost me countless hours of work, if you use it, please donate a token of your appreciation!','slideshare').'</p><br/><form style="margin: 0 auto; width: 147px;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="JB99Y7YD2RHAA">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
			</form>');
			*/			
			//************ FI
		}
		
		/**
		 * Info box with link to the bug tracker.
		 */
		function plugin_support($hook = '') {
			if (empty($hook)) {
				$hook = $this->hook;
			}
			$content = '<p>'.__('If you\'ve found a bug in this plugin, please submit it in the Support Forums with a clear description.', 'slideshare').'</p>';
			$this->postbox($this->hook.'support', __('Found a bug?','slideshare'), $content);
		}

		function text_limit( $text, $limit, $finish = '&hellip;') {
			if( strlen( $text ) > $limit ) {
		    	$text = substr( $text, 0, $limit );
				$text = substr( $text, 0, - ( strlen( strrchr( $text,' ') ) ) );
				$text .= $finish;
			}
			return $text;
		}

		function fetch_rss_items( $num ) {
			include_once(ABSPATH . WPINC . '/feed.php');
			$rss = fetch_feed( $this->feed );

			// Bail if feed doesn't work
			if ( is_wp_error($rss) )
				return false;

			$rss_items = $rss->get_items( 0, $rss->get_item_quantity( $num ) );

			// If the feed was erroneously 
			if ( !$rss_items ) {
				$md5 = md5( $this->feed );
				delete_transient( 'feed_' . $md5 );
				delete_transient( 'feed_mod_' . $md5 );
				$rss = fetch_feed( $this->feed );
				$rss_items = $rss->get_items( 0, $rss->get_item_quantity( $num ) );
			}

			return $rss_items;
		}

		/**
		 * Box with latest news from Yoast.com for sidebar
		 */
		function news() {
			$rss_items = $this->fetch_rss_items( 5 );

			$content = '<ul>';
			if ( !$rss_items ) {
			    $content .= '<li class="yoast">'.__('No news items, feed might be broken...', 'slideshare').'</li>';
			} else {
			    foreach ( $rss_items as $item ) {
					$content .= '<li class="yoast">';
					$content .= '<a class="rsswidget" href="'.esc_url( $item->get_permalink(), $protocolls=null, 'display' ).'">'. esc_html( $item->get_title() ) .'</a> ';
					$content .= '</li>';
			    }
			}						
			$content .= '<li class="rss"><a href="'.$this->feed.'">'.__('Subscribe with RSS', 'slideshare').'</a></li>';
			$content .= '<li class="email"><a href="http://yoast.com/wordpress-newsletter/">'.__('Subscribe by email', 'slideshare').'</a></li>';
			$content .= '</ul>';
			$this->postbox('yoastlatest', __('Latest news from Yoast','slideshare'), $content);
		}

		/**
		 * Widget with latest news from Yoast.com for dashbaord
		 */
		function db_widget() {
			$options = get_option('wpseo_yoastdbwidget');

			$network = '';
			if ( function_exists('is_network_admin') && is_network_admin() )
				$network = '_network';

			if (isset($_POST['yoast_removedbwidget'])) {
				$options['removedbwidget'.$network] = true;
				update_option('yoastdbwidget',$options);
			}			
			if ( isset($options['removedbwidget'.$network]) && $options['removedbwidget'.$network] ) {
				echo __("If you reload, this widget will be gone and never appear again, unless you decide to delete the database option 'yoastdbwidget'.", 'slideshare');
				return;
			}

			$rss_items = $this->fetch_rss_items( 3 );

			echo '<div class="rss-widget">';
			echo '<a href="http://yoast.com/" title="Go to Yoast.com"><img src="'.plugins_url('images/yoast-logo-rss.png', __FILE__).'" class="alignright" alt="Yoast"/></a>';			
			echo '<ul>';

			if ( !$rss_items ) {
			    echo '<li class="yoast">'.__('No news items, feed might be broken...', 'slideshare').'</li>';
			} else {
			    foreach ( $rss_items as $item ) {
					echo '<li class="yoast">';
					echo '<a class="rsswidget" href="'.esc_url( $item->get_permalink(), $protocolls=null, 'display' ).'">'. esc_html( $item->get_title() ) .'</a>';
					echo ' <span class="rss-date">'. $item->get_date('F j, Y') .'</span>';
					echo '<div class="rssSummary">'. esc_html( $this->text_limit( strip_tags( $item->get_description() ), 200 ) ).'</div>';
					echo '</li>';
			    }
			}						

			echo '</ul>';
			echo '<br class="clear"/><div style="margin-top:10px;border-top: 1px solid #ddd; padding-top: 10px; text-align:center;">';
			echo '<a href="'.$this->feed.'"><img src="'.get_bloginfo('wpurl').'/wp-includes/images/rss.png" alt=""/> '.__('Subscribe with RSS', 'slideshare').'</a>';
			echo ' &nbsp; &nbsp; &nbsp; ';
			echo '<a href="http://yoast.com/wordpress-newsletter/"><img src="'.plugins_url('images/email_sub.png', __FILE__).'" alt=""/> '.__('Subscribe by email', 'slideshare').'</a>';
			echo '<form class="alignright" method="post"><input type="hidden" name="yoast_removedbwidget" value="true"/><input title="'.__('Remove this widget from all users dashboards', 'slideshare').'" class="button" type="submit" value="X"/></form>';
			echo '</div>';
			echo '</div>';
		}

		function widget_setup() {
			$network = '';
			if ( function_exists('is_network_admin') && is_network_admin() )
				$network = '_network';

			$options = get_option('wpseo_yoastdbwidget');
			if ( !isset($options['removedbwidget'.$network]) || !$options['removedbwidget'.$network] )
	    		wp_add_dashboard_widget( 'yoast_db_widget' , __('Latest news from Yoast') , array(&$this, 'db_widget') );
		}

		function widget_order( $arr ) {
			global $wp_meta_boxes;
			if ( function_exists('is_network_admin') && is_network_admin() ) {
				$plugins = $wp_meta_boxes['dashboard-network']['normal']['core']['dashboard_plugins'];
				unset($wp_meta_boxes['dashboard-network']['normal']['core']['dashboard_plugins']);
				$wp_meta_boxes['dashboard-network']['normal']['core'][] = $plugins;
			} else if ( is_admin() ) {
				if ( isset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']) ) {
					$yoast_db_widget = $wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget'];
					unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
					if ( isset($wp_meta_boxes['dashboard']['side']['core']) ) {
						$begin = array_slice($wp_meta_boxes['dashboard']['side']['core'], 0, 1);
						$end = array_slice($wp_meta_boxes['dashboard']['side']['core'], 1, 5);
						$wp_meta_boxes['dashboard']['side']['core'] = $begin;
						$wp_meta_boxes['dashboard']['side']['core'][] = $yoast_db_widget;
						$wp_meta_boxes['dashboard']['side']['core'] += $end;
					} else {
						$wp_meta_boxes['dashboard']['side']['core'] = array();
						$wp_meta_boxes['dashboard']['side']['core'][] = $yoast_db_widget;
					}
				} 
			}
			return $arr;
		}
	}
}
