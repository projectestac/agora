<?php
/*
 Plugin Name: Social Articles
 Description: This is the first BuddyPress plugin that let you to create and manage posts from your profile. It supports all buddypres themes, so you don't need to be an expert to use it!
 Version: 1.5.1
 Author: Broobe
 Author URI: http://www.broobe.com
 Text Domain: social-articles

 Copyright 2013  broobe  (email : dev@broobe.com)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Broobe, Nicolas Avellaneda 953, Castelar, Buenos Aires (011) 5555-5952 AR
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (!class_exists('SocialArticles') && is_plugin_active( 'buddypress/bp-loader.php' )) {

    require_once plugin_dir_path( __FILE__ ) . 'includes/social-articles-tools.php';

    class SocialArticles extends Broobe_SA_Plugin_Admin {

        var $options;
        public function __construct() {
            $this -> options = get_option('social_articles_options');
            $this -> loadConstants();
            add_action('plugins_loaded', array(&$this, 'start'));
            add_action( 'bp_include', array(&$this, 'bpInit'));
            register_activation_hook(__FILE__, array(&$this, 'activate'));
        }

        public function start() {
            load_plugin_textdomain('social-articles', false, SA_DIR_NAME . '/languages');

            add_filter('plugin_row_meta', array(&$this, 'pluginMetaLinks'), 10, 2);
            add_filter('plugin_action_links_' . SA_BASE_NAME, array($this, 'pluginActionLinks'));


            if ( is_admin() ){
                add_action('admin_menu', array(&$this,'adminMenu'));
                add_action('admin_print_scripts', array(&$this,'loadAdminScripts'));
                add_action('admin_print_styles', array(&$this,'loadAdminStyles'));
            }else{
                add_action('wp_print_scripts', array(&$this, 'loadScripts'));
                add_action('wp_print_styles', array(&$this, 'loadStyles'));
            }
        }

        public function bpInit() {
            if ( version_compare( BP_VERSION, '1.5', '>' ) )
                require(dirname(__FILE__) . '/includes/social-articles-load.php');
        }

        private function loadConstants() {
            define('SA_PLUGIN_DIR', dirname(__FILE__));
            define('SA_SLUG', 'articles');
            define('SA_ADMIN_SLUG', 'social-articles');
            define('SA_DIR_NAME', plugin_basename(dirname(__FILE__)));
            define('SA_BASE_NAME', plugin_basename(__FILE__));
            define('SA_BASE_PATH', WP_PLUGIN_DIR . '/' . SA_DIR_NAME);
            define('SA_BASE_URL', WP_PLUGIN_URL . '/' . SA_DIR_NAME);

            $upload_dir = wp_upload_dir();
            define('SA_TEMP_IMAGE_URL',$upload_dir['baseurl'].'/');
            define('SA_TEMP_IMAGE_PATH',$upload_dir['basedir'].'/');
        }

        public function activate(){

            $options = get_option('social_articles_options');

            if (!isset($options['post_per_page']))
                $options['post_per_page'] = '10';

            if (!isset($options['excerpt_length']))
                $options['excerpt_length'] = '30';

            if (!isset($options['excerpt_length']))
                $options['category_type'] = 'single';

            if (!isset($options['workflow']))
                $options['workflow'] = 'approval';

            if (!isset($options['bp_notifications']))
                $options['bp_notifications'] = 'true';

            if (!isset($options['allow_author_adition']))
                $options['allow_author_adition'] = 'true';

            if (!isset($options['allow_author_deletion']))
                $options['allow_author_deletion'] = 'true';

            update_option('social_articles_options', $options);
        }

        public function deactivate(){
        }

        public function loadScripts() {
            if (!wp_script_is( 'jquery', 'queue' )){
                wp_enqueue_script( 'jquery' );
            }

            if (!wp_script_is( 'jquery-ui-core', 'queue' )){
                wp_enqueue_script( 'jquery-ui-core' );
            }

            wp_enqueue_script('ajaxupload', SA_BASE_URL . '/assets/js/ajaxupload.js', array( 'jquery' ));
            wp_enqueue_script('jquery.templates', SA_BASE_URL . '/assets/js/jquery.tmpl.min.js', array( 'jquery' ));
            wp_enqueue_script('advance', SA_BASE_URL . '/assets/js/advanced.js');
            wp_enqueue_script('wysihtml5', SA_BASE_URL . '/assets/js/wysihtml5-0.3.0.min.js');
            wp_enqueue_script('social-articles', SA_BASE_URL . '/assets/js/social-articles.js');
            wp_localize_script( 'social-articles', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'baseUrl' =>SA_BASE_URL,
                'tmpImageUrl' =>SA_TEMP_IMAGE_URL) );


        }

        public function loadAdminScripts (){
            if (isset($_GET['page']) && $_GET['page'] == SA_ADMIN_SLUG) {
                wp_enqueue_script('postbox');
                wp_enqueue_script('dashboard');
            }
        }

        public function loadAdminStyles() {
            if (isset($_GET['page']) && $_GET['page'] == SA_ADMIN_SLUG) {
                wp_enqueue_style('dashboard');
                wp_enqueue_style('global');
                wp_enqueue_style('wp-admin');
                wp_register_style( 'admin-stylesheet', SA_BASE_URL . '/assets/css/admin-stylesheet.css' );
                wp_enqueue_style( 'admin-stylesheet' );
            }
        }

        public function loadStyles() {
            wp_register_style( 'stylesheet',SA_BASE_URL.'/assets/css/stylesheet.css', array(),'20130108','all' );
            wp_enqueue_style( 'stylesheet' );
        }

        public function adminMenu() {
            include (SA_BASE_PATH . '/includes/social-articles-options.php');
            add_options_page('Social Articles', 'Social Articles', 'manage_options', SA_ADMIN_SLUG, 'social_articles_page');
        }

        public function pluginActionLinks($links) {
            $settings_link = '<a href="' . menu_page_url( SA_ADMIN_SLUG, false ) . '">'
                . esc_html( __( 'Settings', 'social-articles' ) ) . '</a>';

            array_unshift( $links, $settings_link );

            return $links;
        }

        public function pluginMetaLinks( $links, $file ) {
            $plugin = plugin_basename(__FILE__);

            if ( $file == $plugin ) {
                $donate_link = array('<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H2CYX6BVN3T3L">'
                    . esc_html( __( 'Donate', 'social-articles' ) ) . '</a>');

                $links = array_merge($links, $donate_link);
            }
            return $links;
        }


    }
    /*
     * Initiate the plug-in.
     */
    global $socialArticles;
    $socialArticles = new SocialArticles();
}else {
    add_action( 'admin_notices', 'bp_social_articles_install_buddypress_notice');
}

function bp_social_articles_install_buddypress_notice() {
    echo '<div id="message" class="error fade"><p style="line-height: 150%">';
    _e('<strong>Social Articles</strong></a> requires the BuddyPress plugin to work. Please <a href="http://buddypress.org">install BuddyPress</a> first, or <a href="plugins.php">deactivate Social Articles</a>.', 'social-articles');
    echo '</p></div>';
}
?>