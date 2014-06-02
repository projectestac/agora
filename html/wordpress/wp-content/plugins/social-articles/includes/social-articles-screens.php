<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;



/**
 * social_articles_screen()
 *
 * Sets up and displays the screen output for the sub nav item "social-articles/screen-one"
 */
function social_articles_screen() {
	global $bp;
	bp_update_is_directory( true, 'articles' );
	/* Add a do action here, so your component can be extended by others. */
	do_action( 'social_articles_screen' );
        
	bp_core_load_template( apply_filters( 'social_articles_screen', 'members/single/articles' ) );
}


/**
 * my_articles_screen()
 *
 * Sets up and displays the screen output for the sub nav item "social-articles/screen-two"
 */
function my_articles_screen() {
	global $bp;
	bp_update_is_directory( true, 'my_articles' );
	/* Add a do action here, so your component can be extended by others. */
	do_action( 'my_articles_screen' );
	bp_core_load_template( apply_filters( 'my_articles_screen', 'members/single/articles' ) );
}

/**
 * new_article_screen()
 *
 * Sets up and displays the screen output for the sub nav item "social-articles/screen-two"
 */
function new_article_screen() {
	global $bp;
	bp_update_is_directory( true, 'new_article' );
	
	/* Add a do action here, so your component can be extended by others. */
	do_action( 'new_article_screen' );
	
	bp_core_load_template( apply_filters( 'new_article_screen', 'members/single/articles' ) );
}




if ( class_exists( 'BP_Theme_Compat' ) ) {

    class SA_Theme_Compat {


        public function __construct() {

            add_action( 'bp_setup_theme_compat', array( $this, 'is_bp_plugin' ) );
        }

        public function is_bp_plugin() {

            if ( bp_is_current_component( 'articles' ) ) {
                // first we reset the post
                add_action( 'bp_template_include_reset_dummy_post_data', array( $this, 'directory_dummy_post' ) );
                // then we filter ‘the_content’ thanks to bp_replace_the_content
                add_filter( 'bp_replace_the_content', array( $this, 'directory_content'    ) );
            }
        }

        public function directory_dummy_post() {

        }

        public function directory_content() {
            bp_buffer_template_part( 'members/single/home' );
            bp_buffer_template_part( 'members/single/articles' );
        }
    }

    new SA_Theme_Compat ();


    function bp_sa_add_template_stack( $templates ) {

        if ( bp_is_current_component( 'social_articles' ) && !bp_sa_is_bp_default() ) {
            $templates[] = SA_PLUGIN_DIR . '/includes/templates';
        }
        return $templates;
    }

    add_filter( 'bp_get_template_stack', 'bp_sa_add_template_stack', 10, 1 );
}