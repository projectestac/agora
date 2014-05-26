<?php
/**
 * ICE API: widget extensions, posts list widget class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage widgets
 * @since 1.0
 */

ICE_Loader::load( 'components/widgets/component', 'utils/ajax' );

/**
 * Posts list widget
 *
 * @package ICE-extensions
 * @subpackage widgets
 */
class ICE_Ext_Widget_Posts_List
	 extends ICE_Widget
{
	/**
	 * @var string
	 */
	protected $post_type = 'post';

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'post_type':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// requires edit posts
		$this->add_capabilities( 'edit_posts' );
	}

	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// css title class
		if ( $this->config()->contains( 'post_type' ) ) {
			$this->post_type = (string) $this->config( 'post_type' );
		}
	}

	/**
	 */
	public function init_ajax()
	{
		add_action( 'wp_ajax_ice_widgets_posts_list_save', array( $this, 'ajax_update_hierarchy' ) );
		add_action( 'wp_ajax_ice_widgets_posts_list_item_status', array( $this, 'ajax_post_status' ) );
		add_action( 'wp_ajax_ice_widgets_posts_list_item_trash', array( $this, 'ajax_post_trash' ) );
	}

	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// slurp admin styles
		$this->style()
			->section( 'admin' )
			->cache( 'admin', 'admin.css' );
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		// slurp admin scripts
		$this->script()
			->section( 'admin' )
			->cache( 'admin', 'admin.js' )
			->add_dep( 'jquery-cookie' )
			->add_dep( 'jquery-ui-nestedsortable' );
	}

	/**
	 */
	public function get_template_vars()
	{
		// set it up!
		$posts_list = new ICE_Posts_List( $this->post_type );
		$posts_list->prepare_items();

		return array(
			'post_type' => $this->post_type,
			'posts_list' => $posts_list
		);
	}

	/**
	 * Update posts list hiearachy
	 */
	public function ajax_update_hierarchy()
	{
		// check for hiererachy data
		if ( isset( $_POST['posts'] ) && is_array( $_POST['posts'] ) ) {
			// got some posts
			$posts = $_POST['posts'];
			// keep track of how many updated
			$posts_updated = 0;
			// keep track of how many failed
			$posts_error = 0;
			// keep track of the order for menu
			$menu_order = 0;
			// check it out
			if ( count($posts) ) {
				// loop through and update all posts
				foreach ( $posts as $post ) {
					// numeric items are post ids, else invalid
					$post_id =
						( is_numeric($post['item_id']) ) ? (integer) $post['item_id'] : false;
					// numeric parents are post ids, else ZERO
					$post_parent =
						( is_numeric($post['parent_id']) ) ? (integer) $post['parent_id'] : 0;
					// update real posts
					if ( $post_id ) {
						// update post order
						// capture result for comparison
						$result =
							wp_update_post(
								array(
									'ID' => $post_id,
									'post_parent' => $post_parent,
									'menu_order' => ++$menu_order
								)
							);
						// result must match post ID
						if ( $result == $post_id ) {
							$posts_updated++;
						} else {
							$posts_error++;
						}
					}
				}
				// any errors?
				if ( $posts_error ) {
					ICE_Ajax::response(
						false,
						sprintf(
							__('%d items updated, %d items failed', infinity_text_domain),
							$posts_updated,
							$posts_error
						)
					);
				} else {
					ICE_Ajax::response(
						true,
						sprintf(
							__('%d items updated', infinity_text_domain),
							$posts_updated
						)
					);
				}
			} else {
				ICE_Ajax::response( false, __('No items received', infinity_text_domain) );
			}
		} else {
			ICE_Ajax::response( false, __('Missing required data', infinity_text_domain) );
		}
	}

	/**
	 * Update single post status
	 */
	public function ajax_post_status()
	{
		// check for req data
		if ( isset( $_POST['post_id'] ) && isset( $_POST['post_status'] ) ) {

			// got req data
			$post_id = (integer) $_POST['post_id'];
			$post_status = (string) $_POST['post_status'];

			// only two status are supported
			switch ( $post_status ) {
				case 'draft':
				case 'publish':
					// update post status
					$result =
						wp_update_post( array(
							'ID' => $post_id,
							'post_status' => $post_status
						));
					// result must match post ID
					if ( $result === $post_id ) {
						ICE_Ajax::response( true, __('Item status updated', infinity_text_domain) );
					} else {
						ICE_Ajax::response( false, __('Item status update failed', infinity_text_domain) );
					}
				default:
					ICE_Ajax::response( false, __('Invalid item status', infinity_text_domain) );
			}
		} else {
			ICE_Ajax::response( false, __('Missing required data', infinity_text_domain) );
		}
	}

	/**
	 * Trash a single post
	 */
	public function ajax_post_trash()
	{
		// check for post id
		if ( isset( $_POST['post_id'] ) && is_numeric( $_POST['post_id'] ) ) {

			// got one
			$post_id = (integer) $_POST['post_id'];

			// attempt to trash the post
			if ( wp_trash_post( $post_id ) !== false ) {
				ICE_Ajax::response( true, __('Item moved to trash', infinity_text_domain) );
			} else {
				ICE_Ajax::response( false, __('Move item to trash failed', infinity_text_domain) );
			}

		} else {
			ICE_Ajax::response( false, __('Missing item id', infinity_text_domain) );
		}
	}
}

//
// Supporting Classes
//

ICE_Loader::load_wpadmin_lib( 'class-wp-list-table', 'class-wp-posts-list-table' );

/**
 * @package ICE-extensions
 * @subpackage widgets
 * @todo find a home for this
 */
class ICE_Posts_List extends WP_Posts_List_Table
{
	/**
	 * The current post being rendered
	 *
	 * @var stdClass
	 */
	private $post;
	
	/**
	 * The post type of the list of posts
	 * 
	 * @var string
	 */
	private $post_type;

	/**
	 * Array of page objects for hierarchical listings
	 *
	 * @var array
	 */
	private $pages = array();

	/**
	 * Array for storing temporary page results
	 *
	 * @var array
	 */
	private $pages_tmp = array();

	/**
	 * Create a new posts list
	 *
	 * @param string $post_type
	 */
	public function __construct( $post_type = 'post' )
	{
		// set local properties
		$this->post_type = $post_type;

		// set this is for wp_query (yeah, i know)
		$_GET['post_type'] = $this->post_type;

		// run parent constructor
		parent::__construct();
	}

	/**
	 * Call this to execute the query and prepare posts for listing
	 */
	public function prepare_items()
	{
		global $post_type, $post_type_object;

		// make sure the globals are set correctly
		$post_type = $this->post_type;
		$post_type_object = get_post_type_object( $post_type );

		// call parent
		return parent::prepare_items();
	}

	/**
	 * Display the list
	 *
	 * Overriding the parent since it spits out the default admin table structure
	 */
	public function display()
	{
		// skip right to display rows!
		$this->display_rows();
	}

	/**
	 * Display posts in a nested manner
	 *
	 * @param array $pages
	 * @param integer $pagenum NOT YET IMPLEMENTED
	 * @param integer $per_page NOT YET IMPLEMENTED
	 * @return boolean
	 */
	function _display_rows_hierarchical( $pages, $pagenum = 1, $per_page = 20 )
	{
		global $wpdb;

		if ( !$pages ) {
			$pages = get_pages( array( 'sort_column' => 'menu_order' ) );

			if ( !$pages )
				return false;
		}

		$this->pages_tmp = $pages;

		// find root pages
		foreach ( $this->pages_tmp as $key => $page ) {
			if ( empty( $page->post_parent ) ) {
				unset($this->pages_tmp[$key]);
				$this->pages[$page->ID]['object'] = $page;
				$this->pages[$page->ID]['children'] = $this->page_children( $page );
			}
		}

		return $this->nested_list( $this->pages );
	}

	/**
	 * Try to find children of this page from the temp pages array
	 *
	 * @param stdClass $page
	 * @return array
	 */
	public function page_children( $page )
	{
		$children = array();

		if ( count( $this->pages_tmp ) ) {
			foreach( $this->pages_tmp as $key => $maybe_child_page ) {
				if ( $page->ID == $maybe_child_page->post_parent ) {
					unset($this->pages_tmp[$key]);
					$children[$maybe_child_page->ID] = array(
						'object' => $maybe_child_page,
						'children' => $this->page_children( $maybe_child_page )
					);
				}
			}
		}

		return $children;
	}

	/**
	 * Recursively print a nested list of posts
	 *
	 * @param array $posts
	 * @return boolean
	 */
	public function nested_list( $posts )
	{
		// open container
		?><ul><?php

		foreach( $posts as $post ) {
			// set up local property
			$this->post = $post['object'];
			// open the list
			?><li id="post-<?php print $this->post->ID; ?>"><?php
				// print the row content
				$this->single_row( $this->post );
				// generate children list
				if ( count( $post['children'] ) ) {
					$this->nested_list( $post['children'] );
				}
			// close list
			?></li><?php
		}

		// close container
		?></ul><?php

		return true;
	}

	/**
	 * Print the content of one post row
	 *
	 * @param stdClass $a_post
	 * @return boolean
	 */
	function single_row( $a_post )
	{
		global $post, $post_type;

		$global_post = $post;
		$post = $a_post;
		setup_postdata( $post );

		$post_type_object = get_post_type_object( $post->post_type );
		$can_edit_post = current_user_can( $post_type_object->cap->edit_post, $post->ID );

		if ( $can_edit_post ) {
			?><div class="ice-content"><?php
				$this->post_title();?>
				<div class="ice-controls"><?php
					$this->post_status();
					$this->post_trash();?>
				</div><?php
			?></div><?php
		}

		$post = $global_post;
		
		return;
	}

	/**
	 * Print the post title (link)
	 */
	private function post_title()
	{
		// start rendering ?>
		<a class="ice-title" href="<?php print $this->post_edit_url() ?>"><?php print _draft_or_post_title() ?></a><?php
	}

	/**
	 * Print post status buttons/text
	 */
	private function post_status()
	{
		$post_id = $this->post->ID;
		$post_status = $this->post->post_status;

		// open container ?>
		<span class="ice-status"><?php
			// handle each status type
			switch ( $post_status ) {
				case 'draft':
				case 'publish':
					// render buttons ?>
					<input type="radio" id="post-draft-<?php print $post_id ?>" name="ice-posts-list-item-status-<?php print $post_id ?>" <?php if ($post_status == 'draft'): ?> checked="checked"<?php endif; ?>/>
					<label for="post-draft-<?php print $post_id ?>"><?php _e( 'Draft' ) ?></label>
					<input type="radio" id="post-publish-<?php print $post_id ?>" name="ice-posts-list-item-status-<?php print $post_id ?>" <?php if ($post_status == 'publish'): ?> checked="checked"<?php endif; ?>/>
					<label for="post-publish-<?php print $post_id ?>"><?php _e( 'Published' ) ?></label><?php
					break;
				case 'pending':
					// render text ?>
					<span><?php _e( 'Pending' ) ?></span><?php
					break;
				case 'future':
					// render text ?>
					<span><?php _e( 'Scheduled' ) ?></span><?php
					break;
				case 'trash':
					// render text ?>
					<span><?php _e( 'Trashed' ) ?></span><?php
					break;
			}
		
			// render current status hint and close container ?>
			<input type="hidden" value="<?php print $post_status ?>" />
		</span><?php
	}

	/**
	 * Print post trash/delete markup
	 */
	private function post_trash()
	{
		// render button ?>
		<a class="ice-do-trash" href="#<?php print $this->post->ID ?>"><?php _e( 'Trash' ) ?></a><?php
	}

	/**
	 * Get post edit url
	 */
	private function post_edit_url()
	{
		return get_edit_post_link( $this->post->ID );
	}
}
