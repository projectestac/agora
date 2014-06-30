<?php

/*
Plugin Name: Blogger Importer
Plugin URI: http://wordpress.org/extend/plugins/blogger-importer/
Description: Imports posts, comments, images and tags from a Blogger blog then migrates authors to WordPress users.
Author: wordpressdotorg
Author URI: http://wordpress.org/
Version: 0.7
License: GPLv2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

// Wordpress Classes needed by importer
require_once ABSPATH . 'wp-admin/includes/import.php';
if (!class_exists('WP_Importer'))
{
    $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
    if (file_exists($class_wp_importer))
        require_once $class_wp_importer;
}
if (!class_exists('WP_Error'))
{
    $class_wp_error = ABSPATH . 'wp-includes/class-wp-error.php';
    if (file_exists($class_wp_error))
        require_once $class_wp_error;
}


require_once ABSPATH . WPINC . '/class-feed.php';

// Custom classes used by importer
require_once dirname( __FILE__ ) . '/blogger-importer-sanitize.php';
require_once dirname( __FILE__ ) . '/blogger-importer-blogitem.php';
require_once dirname( __FILE__ ) . '/blogger-importer-blog.php';
require_once dirname( __FILE__ ) . '/blogger-importer-connector.php';
require_once dirname( __FILE__ ) . '/blogger-entry.php';
require_once dirname( __FILE__ ) . '/comment-entry.php';
require_once dirname( __FILE__ ) . '/oauth.php';
require_once dirname( __FILE__ ) . '/blogger-importer-table.php';

/**
 * Blogger Importer
 *
 * @package WordPress
 * @subpackage Importer
 */
if (class_exists('WP_Importer'))
{
    class Blogger_Import extends WP_Importer
    {
        // 14/2/2013 switched from global defines to class constants
        // These are used to change the behaviour of the importer from the default.
        const MAX_RESULTS = 25;          // How many records per GData query (int)
        const MAX_EXECUTION_TIME = 20;   // How many seconds to let the script run (int)
        const STATUS_INTERVAL = 3;       // How many seconds between status bar updates (int)
        const IMPORT_IMG = true;         // Should we import the images (boolean)
        const REMOTE_TIMEOUT = 5;        // How many seconds to wait until google responds (int)
        const LARGE_IMAGE_SIZE = '1024'; // The size of large images downloaded (string)
        const POST_PINGBACK = 0;         // Turn off the post pingback, set to 1 to re-enabled(bool)
        //N.B. Not all images will be this large and not all will be able to be remapped.
        
        var $blogs = array();
        var $connector;

        function Blogger_Import()
        {
            if (isset($_GET['import']) && $_GET['import'] == 'blogger')
            {
                add_action('admin_print_scripts', array(&$this, 'queue_scripts'));
                add_action('admin_print_styles', array(&$this, 'queue_style'));
                add_filter('blogger_importer_congrats', array(&$this, 'congrats_options'), 10, 2);
                //Looking at the Wordpress importer there appear to be quite a few "filters" there that perhaps should be standardised across all importers.
            }
            //Get Data
            $this->read_options();
        }
               
        static function register_importer()
        {
            if (!defined('WP_LOAD_IMPORTERS'))
                return;
            //Moved in from blogger_importer_init
            load_plugin_textdomain('blogger-importer', false, dirname(plugin_basename(__file__)) . '/languages');

            $blogger_import = new Blogger_Import();
            register_importer('blogger', __('Blogger', 'blogger-importer'), __('Import categories, posts, images and comments then maps users from a Blogger blog.', 'blogger-importer'), array($blogger_import,'start'));
        }

        function queue_scripts($hook)
        {
            $interval = self::STATUS_INTERVAL * 1000;
            wp_enqueue_script('BloggerImporter', plugins_url('/blogger-importer.js', __file__), array('jquery','jquery-ui-progressbar'), '', true);
            wp_localize_script('BloggerImporter', 'BL_strings', array('ajaxURL' => admin_url('admin-ajax.php'), 'cont' => esc_js(__('Continue', 'blogger-importer')), 'stop' => esc_js(__('Importing...', 'blogger-importer')), 'stopping' => '', 'authors' =>
                esc_js(__('Set Authors', 'blogger-importer')), 'nothing' => esc_js(__('Nothing was imported. Had you already imported this blog?', 'blogger-importer')), 'loadauth' => esc_js(__('Preparing author mapping form...',
                'blogger-importer')), 'authhead' => esc_js(__('Final Step: Author Mapping', 'blogger-importer')), 'interval' => $interval));
        }

        function queue_style()
        {
            wp_enqueue_style('BloggerImporter', plugins_url('/blogger-importer.css', __file__));
        }

        // Shows the welcome screen and the magic auth link.
        function greet()
        {
            $title = __('Import Blogger', 'blogger-importer');
            $welcome = __('Howdy! This importer allows you to import posts and comments from your Blogger account into your WordPress site.', 'blogger-importer');
            $prereqs = __('To use this importer, you must have a Google account and an upgraded (New, was Beta) blog hosted on blogspot.com or a custom domain (not FTP).', 'blogger-importer');
            $stepone = __('The first thing you need to do is tell Blogger to let WordPress access your account. You will be sent back here after providing authorization.', 'blogger-importer');
            $errormsg = __('Error occurred getting OAuth tokens from Google', 'blogger-importer');

            echo "
		<div class='wrap'>
		" . screen_icon() . "
		<h2>$title</h2>
		<p>$welcome</p><p>$prereqs</p><p>$stepone</p>";

            $isconnected = $this->connector->connect(admin_url('admin-ajax.php?action=BL_auth'));
            if (!is_wp_error($isconnected))
            {
                echo($this->connector->auth_form());
            } else
            {
                
                echo '<p>' . $errormsg . '</p>';
                echo '<p><pre>
                    ' . $isconnected->get_error_message() . '
                    </pre></p>';
            }
        }


        function uh_oh($title, $message, $info)
        {
            echo "<div class='wrap'>";
            screen_icon();
            echo "<h2>$title</h2><p>$message</p><pre>$info</pre></div>";
        }

        /**
         * Gets the list of blogs from blogger into an array $this->blogs[]
         */
        function get_blogs($iter = 0)
        {
            $xml = $this->connector->oauth_get('https://www.blogger.com/feeds/default/blogs');

            // Give it a few retries... apparently this step often flakes out the first time.
            if (empty($xml))
            {
                if ($iter < 3)
                {
                    return $this->get_blogs($iter + 1);
                } else
                {
                    return false;
                }
            }

            $feed = new SimplePie();
            $feed->set_raw_data($xml);
            $feed->init();
            
            $i = 0;
            foreach ($feed->get_items() as $item)
            {
                $blog = new Blogger_Importer_Blog(); 
                $blog->ID = $i++;
                //Perhaps these could be passed as parameters to the new blog object or the init defaults call?
                $blog->title = $item->get_title();
                $blog->summary = $item->get_description();

                //ID is of the form tag:blogger.com,1999:blog-417730729915399755
                //We need that number from the end
                $rawid = explode('-', $item->get_id());
                $blog->id = $rawid[count($rawid) - 1];

                $parts = parse_url($item->get_link(0, 'alternate'));
                $blog->host = $parts['host'];
                $blog->gateway = $item->get_link(0, 'edit');
                $blog->posts_url = $item->get_link(0, 'http://schemas.google.com/g/2005#post');
                //AGC:20/4/2012 Developers guide suggests that the correct feed is located as follows
                //See https://developers.google.com/blogger/docs/1.0/developers_guide_php
                $blog->comments_url = "http://www.blogger.com/feeds/{$blog->id}/comments/default";

                $blog->init_defaults($this->connector->get_total_results($blog->posts_url),$this->connector->get_total_results($blog->comments_url));

                $this->blogs[] = $blog;
            }
            
            return true;
        }

        /**
         * Shows the list of your bloger blogs as a table 
         * 25/1/2013 AGC: Moved the table rendering to be a wp_list_table
         * 
         * @See Blogger_Import_List_Table
         * @Link http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
         */
        function show_blogs()
        {
            global $wp_importers;
            $noscript = esc_html__('This feature requires Javascript but it seems to be disabled. Please enable Javascript and then reload this page. Don&#8217;t worry, you can turn it back off when you&#8217;re done.',
                'blogger-importer');
            $title = esc_html__('Import Blogger', 'blogger-importer');
            $refreshbutton = esc_attr__('Refresh blog list', 'blogger-importer');

            $intro = $wp_importers['blogger'][1];

            $init = '';
            foreach ($this->blogs as $i => $blog)
            {
                $blogtitle = esc_js($blog->title);
                $init .= "blogs[$i]=new blog($i,'$blogtitle','{$blog->mode}','" . $blog->get_js_status() . '\');';
            }

            echo screen_icon() . "<h2>" . $title . "</h2><noscript>" . $noscript . "</noscript>";

            echo '<p>' . $intro . '</p>';

            $myListTable = new Blogger_Import_List_Table(array('ajax' => true));
            $myListTable->prepare_items($this->blogs, $init);
            echo '<div id="BlogList" class="wrap">';
            $myListTable->display();
            echo '</div>';
            
            //Refresh button
            echo ("<form method='post' action='?import=blogger'>
                        <p class='submit' style='text-align:left;'>");
            wp_nonce_field( 'blogger-importer-refresh', 'blogger-importer-refresh-nonce' );                         
            printf("<input type='submit' class='button' value='%s' name='refresh' /></p></form>",$refreshbutton);
        }
  
        /**
         * A clean return function for Ajax calls,
         * discards any debug messages or other fluff already sent
         * N.B. "headers already sent" errors occurring in debug, perhaps need to turn on output buffering??
         * Note this might not be an issue with the switch to "proper" ajax handling
         * http://www.dagondesign.com/articles/wordpress-hook-for-entire-page-using-output-buffering/
         */
        
        function ajax_die($data)
        {
            if (ob_get_level() != 0) {
                ob_clean();
            }
            
           	header( 'Content-Type: text/plain' );
            echo $data;
            exit;
        }

        //AJAX functions 
        static function ajax_getstatus()
        {
            $blogID = $_POST['blogID'];
            $blog = Blogger_Importer_Blog::read_option($blogID);
            Blogger_Import::ajax_die($blog->get_js_status());
        }

        static function ajax_doimport()
        {
            $blogID = $_POST['blogID'];
            $blog = Blogger_Importer_Blog::read_option($blogID);
            $connector = Blogger_Importer_Connector::read_option();
            Blogger_Import::ajax_die($blog->import_blog($connector));
        }

        static function ajax_doauth()
        {
            $connector = Blogger_Importer_Connector::read_option();
            $connector->auth($_GET['token'],$_GET['secret']);
            wp_redirect(admin_url('admin.php?import=blogger'));
        }

        function get_author_form($blog)
        {
            global $current_user; //This is not used, perhaps it should be the "default" for the call to get_user_options?

            if (!isset($blog->authors))
            {
                $blog->get_authors();
                $blog->save_vars();
            }

            $directions = sprintf(__('All posts were imported with the current user as author. Use this form to move each Blogger user&#8217;s posts to a different WordPress user. You may <a href="%s">add users</a> and then return to this page and complete the user mapping. This form may be used as many times as you like until you activate the &#8220;Restart&#8221; function below.',
                'blogger-importer'), 'users.php');
            $heading = __('Author mapping', 'blogger-importer');
            $blogtitle = "{$blog->title} ({$blog->host})";
            $mapthis = __('Blogger username', 'blogger-importer');
            $tothis = __('WordPress login', 'blogger-importer');
            $submit = esc_js(__('Save Changes', 'blogger-importer'));
            $rows = '';

            foreach ($blog->authors as $i => $author)
                $rows .= "<tr><td><label for='authors[$i]'>{$author[0]}</label></td><td><select name='authors[$i]' id='authors[$i]'>" . $this->get_user_options($author[1]) . "</select></td></tr>";

            

            return "<div class='wrap'>" . screen_icon() . "<h2>$heading</h2><h3>$blogtitle</h3><p>$directions</p><form action='index.php?import=blogger&amp;noheader=true&saveauthors=1' method='post'><input type='hidden' name='blog' value='" .
                esc_attr($blog->ID) . "' />".wp_nonce_field( 'blogger-importer-saveauthors', 'blogger-importer-saveauthors-nonce',true,false )."<table cellpadding='5'><thead><td>$mapthis</td><td>$tothis</td></thead>$rows<tr><td></td><td class='submit'><input type='submit' class='button authorsubmit' value='$submit' /></td></tr></table></form></div>";
        }

        function get_user_options($current)
        {
            //AGC: 21/10/2013 Simplified function, caching using a global variable not needed as this is not a function that is called frequently.
            $importer_users = (array )get_users(); //Function: get_users_of_blog() Deprecated in version 3.1. Use get_users() instead.

            $options = '';

            foreach ($importer_users as $user)
            {
                $sel = ($user->ID == $current) ? " selected='selected'" : '';
                $options .= "<option value='$user->ID'$sel>$user->display_name</option>";
            }

            return $options;
        }

        function restart()
        {
            $this->connector->reset();
            $options = get_option('blogger_importer');

            delete_option('blogger_importer');
            foreach ($this->blogs as $i => $blog)
            {
                delete_option('blogger_importer_blog_'.$blog->ID);
            }
        }

        // Step 9: Congratulate the user
        function congrats()
        {
            echo "<div class='wrap'>";
            screen_icon();

            echo '<h2>' . __('Congratulations!', 'blogger-importer') . '</h2><p>' . __('Now that you have imported your Blogger blog into WordPress, what are you going to do? Here are some suggestions:',
                'blogger-importer') . '</p><ul>';

            $congrats = apply_filters('blogger_importer_congrats', '', count($this->blogs));
            $congrats = $congrats . '<li>' . __('For security, click the link below to reset this importer.', 'blogger-importer') . '</li>';
            echo $congrats;
            echo '</ul>';
            echo '</div>';
        }

        function congrats_options($optionlist, $blogcount)
        {
            //Plugable list of options called by filter 'blogger_importer_congrats'
            $optionlist = $optionlist . '<li><a href="' . admin_url('edit.php') . '">' . __('Review posts', 'blogger-importer') . '</a></li>';
            $optionlist = $optionlist . '<li><a href="' . admin_url('edit-tags.php?taxonomy=category') . '">' . __('Review categories', 'blogger-importer') . '</a></li>';
            $optionlist = $optionlist . '<li><a href="' . admin_url('import.php') . '">' . __('Convert categories to tags', 'blogger-importer') . '</a></li>';
            $optionlist = $optionlist . '<li><a href="' . admin_url('edit-comments.php') . '">' . __('Review comments', 'blogger-importer') . '</a></li>';
            $optionlist = $optionlist . '<li><a href="' . admin_url('upload.php') . '">' . __('Review media', 'blogger-importer') . '</a></li>';

            if ($blogcount > 1)
            {
                $optionlist = $optionlist . '<li>' . __('In case you haven&#8217;t done it already, you can import the posts from your other blogs:', 'blogger-importer');
                $optionlist = $optionlist . ' <a href="' . admin_url('?import=blogger') . '">' . __('Show blogs', 'blogger-importer') . '</a></li>';
            }
            return $optionlist;
        }

        function read_options()
        {
            $options = get_option('blogger_importer');
            if (is_array($options))
                foreach ($options as $key => $value)
                    $this->$key = $value;

            $this->connector = Blogger_Importer_Connector::read_option();
                                
            if (count($this->blogs) == 0) {
                $blog = true;
                for ($i = 0; $blog ; $i++) {
                    $blog = Blogger_Importer_Blog::read_option($i);
                    if ($blog) {
                        $this->blogs[] = $blog;
                    }
                }
            }
        }
        
        function save_vars()
        {
            //Todo: return false if errors occur
            $vars = get_object_vars($this);
            
            if (array_key_exists('blogs',$vars)){
                unset($vars['blogs']);
            }
            if (array_key_exists('connector',$vars)){
                unset($vars['connector']);
            }
            
            //http://core.trac.wordpress.org/ticket/13480
            //Calling update options multiple times in a page (or ajax call) means that the cache kicks in and does not save to DB
            update_option('blogger_importer', $vars);
                 
            //How to check for errors here?                      
            if (isset($connector)) {
                $connector->save_vars();
            }
            foreach ($this->blogs as $i => $blog) {
                $blog->save_vars();
            }
            return true;
        }
        
        
        /**
         * The start function is what is called when the importer runs
         * it is used to parse the parameters and select the appropriate
         * action such as importing a blog
         * Moved status and import out to separate ajax calls
         */
        function start()
        {
            if (isset($_POST['restart'])) {
                if ( check_admin_referer( 'blogger-importer-clear', 'blogger-importer-clear-nonce' ) ) {             
                    $this->restart();
                    wp_redirect('?import=blogger');
                } else {
                    wp_die('Error');
                }
            }
            if (isset($_POST['refresh'])) {
                if ( check_admin_referer( 'blogger-importer-refresh', 'blogger-importer-refresh-nonce' ) ) {
                    $this->blogs = array();
                } else {
                    wp_die('Error');
                }
            }       
            if (isset($_REQUEST['blog'])) {
                $importing_blog = (int)(is_array($_REQUEST['blog']) ? array_shift($keys = array_keys($_REQUEST['blog'])) : $_REQUEST['blog']);
                $blog = $this->blogs[$importing_blog];

                if (isset($_GET['authors'])) {
                    print ($this->get_author_form($blog));
                    return;
                }
                if (isset($_GET['saveauthors'])) {
                    if ( check_admin_referer( 'blogger-importer-saveauthors', 'blogger-importer-saveauthors-nonce' )) {
                        $blog->save_authors();
                        wp_redirect('?import=blogger&congrats=1');
                    }
                }
            } elseif (isset($_GET['congrats'])) {
                $this->congrats();
            } elseif (isset($this->connector) && $this->connector->isconnected()) {
                if (empty($this->blogs)) {
                    if (!$this->get_blogs()) {
                        $this->uh_oh(__('Trouble signing in', 'blogger-importer'), __('We were not able to gain access to your account. Try starting over.', 'blogger-importer'), '');
                    }
                    if (empty($this->blogs)) {
                        $this->uh_oh(__('No blogs found', 'blogger-importer'), __('We were able to log in but there were no blogs. Try a different account next time.', 'blogger-importer'), '');
                    }
                }
                if (!empty($this->blogs)) {
                    $this->show_blogs();
                }
            } else {
                $this->connector = new Blogger_Importer_Connector();
                $this->greet();
            }

            if (isset($this->connector) && $this->connector->isconnected())
            {
                $restart = __('Restart', 'blogger-importer');
                $message = __('We have saved some information about your Blogger account in your WordPress database. Clearing this information will allow you to start over. Restarting will not affect any posts you have already imported. If you attempt to re-import a blog, duplicate posts and comments will be skipped.',
                    'blogger-importer');
                $submit = esc_attr__('Clear account information', 'blogger-importer');
                echo "<div class='wrap'><h2>$restart</h2><p>$message</p>";
                echo "<form method='post' action='?import=blogger&amp;noheader=true'>";
                wp_nonce_field( 'blogger-importer-clear', 'blogger-importer-clear-nonce' );
                printf("<p class='submit' style='text-align:left;'><input type='submit' class='button' value='%s' name='restart' /></p></form>",$submit);
            }
            $this->save_vars();
        }

        function _log( $message ) {
            //Log to file only, we can't log to display as this is a background(ajax) call and there is no display
            if( WP_DEBUG === true && WP_DEBUG_DISPLAY === false ){
              if( is_array( $message ) || is_object( $message ) ){
                error_log( print_r( $message, true ) );
              } else {
                error_log( $message );
              }
            }
        }
    }
} // class_exists( 'WP_Importer' )
  
add_action('admin_init', array('Blogger_Import','register_importer'));
//Ajax calls
add_action('wp_ajax_BL_import', array('Blogger_Import','ajax_doimport'));
add_action('wp_ajax_BL_status', array('Blogger_Import','ajax_getstatus'));
add_action('wp_ajax_BL_auth', array('Blogger_Import','ajax_doauth'));


