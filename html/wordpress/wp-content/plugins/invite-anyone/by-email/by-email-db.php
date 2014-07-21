<?php
/* Invite Anyone database functions */

/**
 * Defines the data schema for IA Invitations
 *
 * @package Invite Anyone
 * @since 0.8
 */
class Invite_Anyone_Schema {
	var $post_type_name;
	var $invitee_tax_name;
	var $invited_groups_tax_name;
	var $db_version;

	/**
	 * PHP5 Constructor
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 */
	function __construct() {
		global $current_blog;

		// There's no reason for the CPT to be loaded on non-root-blogs
		if ( is_multisite() && $current_blog->blog_id != BP_ROOT_BLOG ) {
			return;
		}

		// Check the current db version and update if necessary
		$this->db_version = get_option( 'invite_anyone_db_version' );

		// Check for necessary updates to data schema
		$this->update();

		if ( $this->db_version != BP_INVITE_ANYONE_DB_VER ) {
			update_option( 'invite_anyone_db_version', BP_INVITE_ANYONE_DB_VER );
			$this->db_version = BP_INVITE_ANYONE_DB_VER;
		}

		// Define the post type name used throughout
		$this->post_type_name = apply_filters( 'invite_anyone_post_type_name', 'ia_invites' );

		// Define the invitee tax name used throughout
		$this->invitee_tax_name = apply_filters( 'invite_anyone_invitee_tax_name', 'ia_invitees' );

		// Define the invited group tax name used throughout
		$this->invited_groups_tax_name = apply_filters( 'invite_anyone_invited_group_tax_name', 'ia_invited_groups' );

		// Hooks into the 'init' action to register our WP custom post type and tax
		add_action( 'init', array( $this, 'register_post_type' ), 1 );
	}

	/**
	 * Registers Invite Anyone's post type and taxonomies
	 *
	 * Data schema:
	 * - The ia_invites post type represents individual invitations, with post data divvied up
	 *   as follows:
	 *     	- post_title is the subject of the email sent
	 *     	- post_content is the content of the email
	 *     	- post_author is the person sending the invitation
	 *     	- post_date is the date/time when the invitation is sent
	 *     	- post_status represents 'is_hidden' on the old custom table schema:
	 *      	- Default is 'publish' - i.e. the user sees the invitation on Sent Invites
	 *     		- When the invitation is hidden, it is switched to 'draft'
	 * - The ia_invitees taxonomy represents invited email addresses
	 * - The ia_invited_groups taxonomy represents the groups that a user has been invited to
	 *   when the group invitation is sent
	 * - The following data is stored in postmeta:
	 * 	- opt_out (corresponds to old is_opt_out) is stored at opt_out time
	 *	- The invitation accepted date is stored in a post_meta called bp_ia_accepted
	 *
	 * @package BuddyPress Docs
	 * @since 1.0
	 */
	function register_post_type() {
		global $bp;

		// Define the labels to be used by the post type
		$post_type_labels = apply_filters( 'invite_anyone_post_type_labels', array(
			'name' 			=> _x( 'BuddyPress Invitations', 'post type general name', 'bp-invite-anyone' ),
			'singular_name' 	=> _x( 'Invitation', 'post type singular name', 'bp-invite-anyone' ),
			'add_new' 		=> _x( 'Add New', 'add new', 'bp-invite-anyone' ),
			'add_new_item' 		=> __( 'Add New Invitation', 'bp-invite-anyone' ),
			'edit_item' 		=> __( 'Edit Invitation', 'bp-invite-anyone' ),
			'new_item' 		=> __( 'New Invitation', 'bp-invite-anyone' ),
			'view_item' 		=> __( 'View Invitation', 'bp-invite-anyone' ),
			'search_items' 		=> __( 'Search Invitation', 'bp-invite-anyone' ),
			'not_found' 		=>  __( 'No Invitations found', 'bp-invite-anyone' ),
			'not_found_in_trash' 	=> __( 'No Invitations found in Trash', 'bp-invite-anyone' ),
			'parent_item_colon' 	=> ''
		), $this );

		// Register the invitation post type
		register_post_type( $this->post_type_name, apply_filters( 'invite_anyone_post_type_args', array(
			'label' 	=> __( 'BuddyPress Invitations', 'bp-invite-anyone' ),
			'labels' 	=> $post_type_labels,
			'public' 	=> false,
			'_builtin' 	=> false,
			'show_ui' 	=> $this->show_dashboard_ui(),
			'hierarchical' 	=> false,
			'menu_icon'	=> WP_PLUGIN_URL . '/invite-anyone/images/smallest_buddypress_icon_ev.png',
			'supports' 	=> array( 'title', 'editor', 'custom-fields' )

            // XTEC ************ AFEGIT - Don't show option in admin menu because of custom menu
            // 2014.07.21 @aginard
			,
            'show_in_menu'        => false,
            //************ FI

        ), $this ) );

		// Define the labels to be used by the invitee taxonomy
		$invitee_labels = apply_filters( 'invite_anyone_invitee_labels', array(
			'name' 		=> __( 'Invitees', 'bp-invite-anyone' ),
			'singular_name' => __( 'Invitee', 'bp-invite-anyone' ),
			'search_items' 	=>  __( 'Search Invitees', 'bp-invite-anyone' ),
			'all_items' 	=> __( 'All Invitees', 'bp-invite-anyone' ),
			'edit_item' 	=> __( 'Edit Invitee', 'bp-invite-anyone' ),
			'update_item' 	=> __( 'Update Invitee', 'bp-invite-anyone' ),
			'add_new_item' 	=> __( 'Add New Invitee', 'bp-invite-anyone' ),
			'new_item_name' => __( 'New Invitee Name', 'bp-invite-anyone' ),
			'menu_name' 	=> __( 'Invitee' ),
		), $this );

		// Register the invitee taxonomy
		register_taxonomy( $this->invitee_tax_name, $this->post_type_name, apply_filters( 'invite_anyone_invitee_tax_args', array(
			'label'		=> __( 'Invitees', 'bp-invite-anyone' ),
			'labels' 	=> $invitee_labels,
			'hierarchical' 	=> false,
			'show_ui' 	=> true,
		), $this ) );

		// Define the labels to be used by the invited groups taxonomy
		$invited_groups_labels = apply_filters( 'invite_anyone_invited_groups_labels', array(
			'name' 		=> __( 'Invited Groups', 'bp-invite-anyone' ),
			'singular_name' => __( 'Invited Group', 'bp-invite-anyone' ),
			'search_items' 	=>  __( 'Search Invited Groups', 'bp-invite-anyone' ),
			'all_items' 	=> __( 'All Invited Groups', 'bp-invite-anyone' ),
			'edit_item' 	=> __( 'Edit Invited Group', 'bp-invite-anyone' ),
			'update_item' 	=> __( 'Update Invited Group', 'bp-invite-anyone' ),
			'add_new_item' 	=> __( 'Add New Invited Group', 'bp-invite-anyone' ),
			'new_item_name' => __( 'New Invited Group Name', 'bp-invite-anyone' ),
			'menu_name' 	=> __( 'Invited Group' ),
		), $this );

		// Register the invited groups taxonomy
		register_taxonomy( $this->invited_groups_tax_name, $this->post_type_name, apply_filters( 'invite_anyone_invited_group_tax_args', array(
			'label'		=> __( 'Invited Groups', 'bp-invite-anyone' ),
			'labels' 	=> $invited_groups_labels,
			'hierarchical' 	=> false,
			'show_ui' 	=> true,
		), $this ) );

		// Stash in $bp because of template tags that need it
		if ( !isset( $bp->invite_anyone ) ) {
			$bp->invite_anyone = new stdClass;
		}

		$bp->invite_anyone->invitee_tax_name = $this->invitee_tax_name;
		$bp->invite_anyone->invited_groups_tax_name = $this->invited_groups_tax_name;
	}

	/**
	 * A filtered check for is_super_admin(), so plugins can mod who can see the Dashboard UI
	 * for the custom post type
	 *
	 * @package Invite Anyone
	 * @since 0.9
	 *
	 * @return bool
	 */
	function show_dashboard_ui() {
		return apply_filters( 'show_dashboard_ui', is_super_admin() );
	}

	/**
	 * Checks for necessary updates to data schema
	 *
	 * @package Invite Anyone
	 * @since 0.9
	 */
	function update() {
		if ( version_compare( $this->db_version, '0.9', '<' ) ) {
			add_action( 'admin_init', array( $this, 'upgrade_0_9' ) );
		}
	}

	/**
	 * Upgrade for pre-0.9
	 *
	 * @package Invite Anyone
	 * @since 0.9
	 */
	function upgrade_0_9() {
		global $wp_query, $post;

		$args = array(
			'posts_per_page' => '30',
			'paged'		 => '1'
		);

		// Get the invites
		$invite = new Invite_Anyone_Invitation;
		$invites = $invite->get( $args );

		// Get the total. We're going to loop through them in an attempt to save memory.
		$total_invites = $invites->found_posts;

		unset( $invites );
		unset( $args );

		// WP bug
		$old_wp_query = $wp_query;

		$paged = 0;
		while ( $paged * 30 <= $total_invites ) {
			$paged++;

			$args = array(
				'posts_per_page' => '30',
				'paged'		 => $paged
			);

			// Get the invites
			$invite = new Invite_Anyone_Invitation;
			$invites = $invite->get( $args );

			// I don't understand why, but I have to do this to avoid errors. WP bug?
			$wp_query = $invites;

			if ( $invites->have_posts() ) {
				while ( $invites->have_posts() ) {
					$invites->the_post();

					// Migrate the accepted data from date_modified to a meta
					if ( !get_post_meta( get_the_ID(), 'bp_ia_accepted', true ) ) {
						// When the dates are different, it's been accepted
						if ( $post->post_date != $post->post_modified ) {
							update_post_meta( get_the_ID(), 'bp_ia_accepted', $post->post_modified );
						} else {
							// We set this to null so it still comes up in the
							// meta query
							update_post_meta( get_the_ID(), 'bp_ia_accepted', '' );
						}
					}
				}
			}

			unset( $invites );
			unset( $args );
		}

		// WP bug
		$wp_query = $old_wp_query;
	}
}

$invite_anyone_data = new Invite_Anyone_Schema;

/**
 * Defines the invitation object and its methods
 *
 * @package Invite Anyone
 * @since 0.8
 */
class Invite_Anyone_Invitation {
	var $id;
	var $invitee_tax_name;
	var $post_type_name;
	var $invited_groups_tax_name;
	var $email_order;

	/**
	 * PHP5 Constructor
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param int $id Optional. The unique id of the invitation post
	 */
	function __construct( $id = false ) {
		if ( $id ) {
			$this->id = $id;
		}

		// Define the post type name used throughout
		$this->post_type_name = apply_filters( 'invite_anyone_post_type_name', 'ia_invites' );

		// Define the invitee tax name used throughout
		$this->invitee_tax_name = apply_filters( 'invite_anyone_invitee_tax_name', 'ia_invitees' );

		// Define the invited group tax name used throughout
		$this->invited_groups_tax_name = apply_filters( 'invite_anyone_invited_group_tax_name', 'ia_invited_groups' );
	}

	/**
	 * Creates a new invitation
	 *
	 * See the $defaults array for the potential values of $args
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param array $args
	 */
	function create( $args = false ) {
		// Set up the default arguments
		$defaults = apply_filters( 'invite_anyone_create_invite_defaults', array(
			'inviter_id' 	 => bp_loggedin_user_id(),
			'invitee_email'	 => false,
			'message'	 => false,
			'subject'	 => false,
			'groups'	 => false,
			'status'	 => 'publish', // i.e., visible on Sent Invites
			'date_created'	 => bp_core_current_time( false ),
			'date_modified'	 => bp_core_current_time( false ),
			'is_cloudsponge' => false
		) );

		$r = wp_parse_args( $args, $defaults );
		extract( $r );

		// Let plugins stop this process if they want
		do_action( 'invite_anyone_before_invitation_create', $r, $args );

		// We can't record an invitation without a few key pieces of data
		if ( empty( $inviter_id ) || empty( $invitee_email ) || empty( $message ) || empty( $subject ) )
			return false;

		// Set the arguments and create the post
		$insert_post_args = array(
			'post_author'	=> $inviter_id,
			'post_content'	=> $message,
			'post_title'	=> $subject,
			'post_status'	=> $status,
			'post_type'	=> $this->post_type_name,
			'post_date'	=> $date_created
		);

		if ( !$this->id = wp_insert_post( $insert_post_args ) )
			return false;

		// If a date_modified has been passed, update it manually
		if ( $date_modified ) {
			$post_modified_args = array(
				'ID'		=> $this->id,
				'post_modified'	=> $date_modified
			);

			wp_update_post( $post_modified_args );
		}

		// Save a blank bp_ia_accepted post_meta
		update_post_meta( $this->id, 'bp_ia_accepted', '' );

		// Save a meta item about whether this is a CloudSponge email
		update_post_meta( $this->id, 'bp_ia_is_cloudsponge', $is_cloudsponge ? __( 'Yes', 'bp-invite-anyone' ) : __( 'No', 'bp-invite-anyone' ) );

		// Now set up the taxonomy terms

		// Invitee
		wp_set_post_terms( $this->id, $invitee_email, $this->invitee_tax_name );

		// Groups included in the invitation
		if ( !empty( $groups ) )
			wp_set_post_terms( $this->id, $groups, $this->invited_groups_tax_name );

		do_action( 'invite_anyone_after_invitation_create', $this->id, $r, $args );

		return $this->id;
	}

	/**
	 * Pulls up a list of existing invitations, based on a set of arguments provided
	 *
	 * See the $defaults array for the potential values of $args
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param array $args
	 */
	function get( $args = false ) {
		// Set up the default arguments
		$defaults = apply_filters( 'invite_anyone_get_invite_defaults', array(
			'inviter_id' 		=> false,
			'invitee_email'		=> false,
			'message'		=> false,
			'subject'		=> false,
			'groups'		=> false,
			'status'		=> 'publish', // i.e., visible on Sent Invites
			'date_created'		=> false,
			'posts_per_page'	=> false,
			'paged'			=> false,
			'orderby'		=> 'post_date',
			'order'			=> 'DESC'
		) );

		$r = wp_parse_args( $args, $defaults );
		extract( $r );

		// Backward compatibility, and to keep the URL args clean
		if ( $orderby == 'email' ) {
			$orderby	= $this->invitee_tax_name;
		} else if ( $orderby == 'date_joined' || $orderby == 'accepted' ) {
			$orderby	= 'meta_value';
			$r['meta_key']	= 'bp_ia_accepted';
		}

		if ( !$posts_per_page && !$paged ) {
			$r['posts_per_page'] 	= '10';
			$r['paged']		= '1';
		}

		// Todo: move all of this business to metadata
		if ( 'ia_invitees' == $orderby ) {
			// Filtering the query so that it's possible to sort by taxonomy terms
			// This is not a recommended technique, as it's likely to break
			add_filter( 'posts_fields', array( $this, 'filter_fields_emails' ), 10, 2 );
			add_filter( 'posts_join_paged', array( $this, 'filter_join_emails' ), 10, 2 );
			add_filter( 'posts_orderby', array( $this, 'filter_orderby_emails' ), 10, 2 );

			$this->email_order = $order;

			// Limitations in the WP_Tax_Query class mean I have to assemble a tax term
			// list first
			$emails = get_terms( $this->invitee_tax_name, array( 'fields' => 'names' ) );

			$r['tax_query'] = array(
				array(
					'taxonomy' 	=> $this->invitee_tax_name,
					'terms' 	=> $emails,
					'field' 	=> 'slug',
					'operator'	=> 'IN'
				)
			);
		}

		// Let plugins stop this process if they want
		do_action( 'invite_anyone_before_invitation_get', $r, $args );

		// Set the arguments and get the posts
		$query_post_args = array(
			'author'	=> $inviter_id,
			'post_status'	=> $status,
			'post_type'	=> $this->post_type_name,
			'orderby'	=> $orderby,
			'order'		=> $order
		);

		// Add optional arguments, if provided
		// Todo: The tax and meta stuff needs to be updated for 3.1 queries
		$optional_args = array(
			'message' 		=> 'post_content',
			'subject'		=> 'post_title',
			'date_created'		=> 'date_created',
			'invitee_email'		=> $this->invitee_tax_name,
			'meta_key'		=> 'meta_key',
			'meta_value'		=> 'meta_value',
			'posts_per_page'	=> 'posts_per_page',
			'paged'			=> 'paged',
			'tax_query'		=> 'tax_query'
		);

		foreach ( $optional_args as $key => $value ) {
			if ( !empty( $r[$key] ) ) {
				$query_post_args[$value] = $r[$key];
			}
		}

		return new WP_Query( $query_post_args );
	}

	/**
	 * Filters the join section of the query when sorting by invited email address
	 *
	 * This is a hack and should be removed. Migrate this data to metadata.
	 *
	 * @package Invite Anyone
	 * @since 0.9
	 */
	function filter_join_emails( $join, $query ) {
		global $wpdb;

		$join .= " INNER JOIN {$wpdb->term_taxonomy} wp_term_taxonomy_ia ON (wp_term_taxonomy_ia.term_taxonomy_id = wp_term_relationships.term_taxonomy_id) INNER JOIN {$wpdb->terms} wp_terms_ia ON ( wp_terms_ia.term_id = wp_term_taxonomy_ia.term_id )";

		return $join;
	}

	/**
	 * Filters the fields section of the query when sorting by invited email address
	 *
	 * This is a hack and should be removed. Migrate this data to metadata.
	 *
	 * @package Invite Anyone
	 * @since 0.9
	 */
	function filter_fields_emails( $fields, $query ) {
		$fields .= ' ,wp_terms_ia.name, wp_term_taxonomy_ia.term_taxonomy_id';

		return $fields;
	}

	/**
	 * Filters the orderby section of the query when sorting by invited email address
	 *
	 * This is a hack and should be removed. Migrate this data to metadata.
	 *
	 * @package Invite Anyone
	 * @since 0.9
	 */
	function filter_orderby_emails( $orderby, $query ) {
		$orderby = 'wp_terms_ia.name ' . $this->email_order;

		return $orderby;
	}

	/**
	 * Mark an invitation as accepted
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param array $args
	 */
	function mark_accepted() {
		update_post_meta( $this->id, 'bp_ia_accepted', $args['post_modified'] );

		return true;
	}

	/**
	 * Clear (unpublish) an invitation
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param array $args
	 */
	function clear() {
		$args = array(
			'ID'		=> $this->id,
			'post_status' 	=> 'draft'
		);
		if ( wp_update_post( $args ) )
			return true;

		return false;
	}

	/**
	 * Mark an invite as being opt-out
	 *
	 * @package Invite Anyone
	 * @since 0.8
	 *
	 * @param array $args
	 */
	function mark_opt_out() {
		if ( update_post_meta( $this->id, 'opt_out', 'yes' ) )
			return true;

		return false;
	}
}

/**
 * Records an invitation
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param int $inviter_id
 * @param str $email The email address of the individual receiving the invitation
 * @param str $message The content of the email message
 * @param array $groups An array of group ids that the invitation invites the user to join
 * @param str $subject Optional The subject line of the email
 * @param bool $is_cloudsponge Did this email address originate with CloudSponge?
 */
function invite_anyone_record_invitation( $inviter_id, $email, $message, $groups, $subject = false, $is_cloudsponge = false ) {

	// hack to make sure that gmail + email addresses work
	$email	= str_replace( '+', '.PLUSSIGN.', $email );

	$args = array(
		'inviter_id' 	 => $inviter_id,
		'invitee_email'	 => $email,
		'message'	 => $message,
		'subject'	 => $subject,
		'groups'	 => $groups,
		'is_cloudsponge' => $is_cloudsponge
	);

	$invite = new Invite_Anyone_Invitation;

	$id = $invite->create( $args );

	return $id;
}


/**
 * Get the invitations that a user has sent
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param int $inviter_id
 * @param str $orderby Optional The column being ordered by
 * @param str $order Optional ASC or DESC
 */
function invite_anyone_get_invitations_by_inviter_id( $inviter_id, $orderby = false, $order = false, $posts_per_page = false, $paged = false ) {
	$args = array(
		'inviter_id'	=> $inviter_id,
		'orderby'	=> $orderby,
		'order'		=> $order,
		'posts_per_page'=> $posts_per_page,
		'paged'		=> $paged
	);

	$invite = new Invite_Anyone_Invitation;

	return $invite->get( $args );
}

/**
 * Get the invitations that have been sent to a given email address
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param str $email The email address being checked
 */
function invite_anyone_get_invitations_by_invited_email( $email ) {
	// hack to make sure that gmail + email addresses work

	// If the url takes the form register/accept-invitation/username+extra%40gmail.com,
	// urldecode returns a space in place of the +. (This is not typical,
	// but we can catch it.)
	$email = str_replace( ' ', '+', $email );

	// More common: url takes the form register/accept-invitation/username%2Bextra%40gmail.com,
	// so we grab the + that urldecode returns and replace it to create a
	// usable search term.
	$email = str_replace( '+', '.PLUSSIGN.', $email );

	$args = array(
		'invitee_email'	=> $email,
		'posts_per_page' => -1
	);

	$invite = new Invite_Anyone_Invitation;

	return $invite->get( $args );
}

/**
 * Clears invitations from the Sent Invites list
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param array $args See below for the definition
 */
function invite_anyone_clear_sent_invite( $args ) {
	global $post;

	/* Accepts arguments: array(
		'inviter_id' => id number of the inviter, (required)
		'clear_id' => id number of the item to be cleared,
		'type' => accepted, unaccepted, or all
	); */

	$defaults = array(
		'inviter_id' => false,
		'clear_id' => false,
		'type' => false
	);
	$args = wp_parse_args( $args, $defaults );

	extract( $args );

	if ( empty( $inviter_id ) )
		return false;

	$success = false;

	if ( $clear_id ) {
		$invite = new Invite_Anyone_Invitation( $clear_id );
		if ( $invite->clear() )
			$success = true;
	} else {
		array(
			'inviter_id'	=> $inviter_id,
			'posts_per_page' => -1
		);

		$invite = new Invite_Anyone_Invitation;

		$iobj = $invite->get( $args );

		if ( $iobj->have_posts() ) {
			while ( $iobj->have_posts() ) {
				$iobj->the_post();

				$clearme = false;
				switch ( $type ) {
					case 'accepted' :
						if ( get_post_meta( get_the_ID(), 'bp_ia_accepted', true ) ) {
							$clearme = true;
						}
						break;
					case 'unaccepted' :
						if ( !get_post_meta( get_the_ID(), 'bp_ia_accepted', true ) ) {
							$clearme = true;
						}
						break;
					case 'all' :
					default :
						$clearme = true;
						break;
				}

				if ( $clearme ) {
					$this_invite = new Invite_Anyone_Invitation( get_the_ID() );
					$this_invite->clear();
				}
			}
		}
	}

	return true;

}

/**
 * Mark all of the invitations associated with a given address as joined
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param str $email The email address being checked
 */
function invite_anyone_mark_as_joined( $email ) {
	$invites = invite_anyone_get_invitations_by_invited_email( $email );

	if ( $invites->have_posts() ) {
		while ( $invites->have_posts() ) {
			the_post();

			$invite = new Invite_Anyone_Invitation( get_the_ID() );
			$invite->mark_accepted();
		}
	}

	return true;
}

/**
 * Check to see whether a user has opted out of email invitations from the site
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param str $email The email address being checked
 */
function invite_anyone_check_is_opt_out( $email ) {
	$email = str_replace( ' ', '+', $email );

	$args = array(
		'invitee_email'		=> $email,
		'posts_per_page' 	=> 1,
		'meta_key'		=> 'opt_out',
		'meta_value'		=> 'yes'
	);

	$invite = new Invite_Anyone_Invitation;

	$invites = $invite->get( $args );

	if ( $invites->have_posts() )
		return true;
	else
		return false;
}

/**
 * Mark all of an address's invitations as opt_out so that no others are sent
 *
 * @package Invite Anyone
 * @since {@internal Version Unknown}
 *
 * @param str $email The email address being checked
 */
function invite_anyone_mark_as_opt_out( $email ) {
	$invites = invite_anyone_get_invitations_by_invited_email( $email );

	if ( $invites->have_posts() ) {
		while ( $invites->have_posts() ) {
			$invites->the_post();

			$invite = new Invite_Anyone_Invitation( get_the_ID() );
			$invite->mark_opt_out();
		}
	}

	return true;
}

/**
 * Checks to see whether a migration is necessary, and if so, prompts the user for it.
 *
 * @package Invite Anyone
 * @since 0.8.3
 */
function invite_anyone_migrate_nag() {
	global $wpdb;

	// only show the nag to the network admin
	if ( !is_super_admin() )
		return;

	// Some backward compatibility crap
	$maybe_version = get_option( 'invite_anyone_db_version' );
	if ( empty( $maybe_version ) ) {
		$iaoptions 	= get_option( 'invite_anyone' );
	 	$maybe_version	= !empty( $iaoptions['db_version'] ) ? $iaoptions['db_version'] : '0.7';
	}

 	// If you're on the Migrate page, no need to show the message
 	if ( !empty( $_GET['migrate'] ) && $_GET['migrate'] == '1' )
 		return;

 	// Don't run this migrator if coming from IA 0.8 or greater
 	if ( version_compare( $maybe_version, '0.8', '>=' ) )
 		return;

 	$table_exists = $wpdb->get_var( "SHOW TABLES LIKE %s", "%{$wpdb->base_prefix}bp_invite_anyone%" );

 	if ( !$table_exists )
 		return;

	// First, check to see whether the data table exists
	$table_name 	= $wpdb->base_prefix . 'bp_invite_anyone';
	$invite_count	= $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name}" );

	if ( !$invite_count )
		return;

	// The auto-script can usually handle a migration of 5 or less
	if ( (int)$invite_count <= 5 ) {
		invite_anyone_data_migration();
		return;
	} else {
		$url = is_multisite() && function_exists( 'network_admin_url' ) ? network_admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' ) : admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' );
		$url = add_query_arg( 'migrate', '1', $url );
		?>

		<div class="error">
			<p>Invite Anyone has been updated. <a href="<?php echo $url ?>">Click here</a> to migrate your invitation data and complete the upgrade.</p>
		</div>

		<?php
	}

}
add_action( is_multisite() && function_exists( 'is_network_admin' ) ? 'network_admin_notices' : 'admin_notices', 'invite_anyone_migrate_nag' );


/**
 * Move old table data into custom post types.
 *
 * This function was originally written in such a way as to move everthing at once. Subsequent tests
 * showed that this caused timeout problems with large migrations, so the code has been retrofitted
 * to work in sets of 5, with 1s JS timeouts between pages. Some of that code has been borrowed from
 * Ron Rennick's Shardb - thanks Ron.
 *
 * As a result of the retrofitting, this code, and its related functions, are a terrible spaghetti
 * mess. They should not be used to model anything, except possibly how to write crappy code that
 * cannot be reused.
 *
 * @package Invite Anyone
 * @since 0.8
 *
 * @see invite_anyone_migration_step()
 * @param str $type 'full' means that it will silently attempt to transfer all records
 * @param int $start The record id to start with (offset)
 */
function invite_anyone_data_migration( $type = 'full', $start = 0 ) {
 	global $wpdb;

 	$is_partial = $type != 'full' ? true : false;

	$table_name = $wpdb->base_prefix . 'bp_invite_anyone';

 	$total_table_contents = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name}" );

 	$table_contents_sql = "SELECT * FROM {$table_name}";

	$table_contents_sql .= "  ORDER BY id ASC LIMIT 5";

	if ( $is_partial ) {
		$table_contents_sql .= " OFFSET $start";
	}

	$table_contents = $wpdb->get_results( $table_contents_sql );

	// If this is a stepwise migration, and the start number is too high or the table_contents
	// query is empty, it means we've gotten to the end of the migration.
	if ( $is_partial && ( (int)$start > $total_table_contents ) ) {
		// Finally, update the Invite Anyone DB version so this doesn't run again
		update_option( 'invite_anyone_db_version', BP_INVITE_ANYONE_DB_VER );

		$url = is_multisite() && function_exists( 'network_admin_url' ) ? network_admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' ) : admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' );
		?>

		<p><?php _e( 'All done!', 'bp-invite-anyone' ) ?></p>

		<a href="<?php echo $url ?>" class="button"><?php _e( 'Finish', 'bp-invite-anyone' ) ?></a>

		<?php

		return;
	}

	// If the resulting array is empty, either there's nothing in the table or the table does
	// not exist (this is probably a new installation)
	if ( empty( $table_contents ) )
		return;

	$record_count = 0;

	foreach( $table_contents as $key => $invite ) {
		$success = false;

		// Instead of grabbing these from a global or something, I'm just filtering them
		// in the same way that they are in the data schema
		$post_type = apply_filters( 'invite_anyone_post_type_name', 'ia_invites' );
		$tax_name = apply_filters( 'invite_anyone_invitee_tax_name', 'ia_invitees' );

		$invite_exists_args = array(
			'author' 	=> $invite->inviter_id,
			$tax_name	=> $invite->email,
			'date_created'	=> $invite->date_invited,
			'post_type'	=> $post_type
		);

		$maybe_invite = get_posts( $invite_exists_args );

		if ( empty( $maybe_invite ) ) {
			// First, record the invitation
			$new_invite	= new Invite_Anyone_Invitation;
			$args		= array(
				'inviter_id' 	=> $invite->inviter_id,
				'invitee_email'	=> $invite->email,
				'message'	=> $invite->message,
				'subject'	=> __( 'Migrated Invitation', 'bp-invite-anyone' ),
				'groups'	=> maybe_unserialize( $invite->group_invitations ),
				'status'	=> 'publish',
				'date_created'	=> $invite->date_invited,
				'date_modified'	=> $invite->date_joined,
			);

			if ( $new_invite_id = $new_invite->create( $args ) ) {
				// Now look to see whether the item should be opt out
				if ( $invite->is_opt_out )
					update_post_meta( $new_invite_id, 'opt_out', 'yes' );

				$success = true;
			}

			if ( $success )
				$record_count++;

			if ( $is_partial ) {
				$inviter = bp_core_get_user_displayname( $invite->inviter_id );
				printf( __( 'Importing: %1$s invited %2$s<br />', 'bp-invite-anyone' ), $inviter, $invite->email );
			}
		}
	}

	if ( $is_partial ) {
		$url = is_multisite() && function_exists( 'network_admin_url' ) ? network_admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' ) : admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' );
		$url = add_query_arg( 'migrate', '1', $url );
		$url = add_query_arg( 'start', $start + 5, $url );

		?>
		<p><?php _e( 'If your browser doesn&#8217;t start loading the next page automatically, click this link:', 'bp-invite-anyone' ); ?> <a class="button" href="<?php echo $url ?>"><?php _e( "Next Invitations", 'bp-invite-anyone' ); ?></a></p>

		<script type='text/javascript'>
			<!--
			function nextpage() {
				location.href = "<?php echo $url ?>";
			}
			setTimeout( "nextpage()", 1000 );
			//-->
		</script>

		<?php
	}
}

/**
 * Loads the markup for the migration process. Called from invite_anyone_admin_panel()
 *
 * @package Invite Anyone
 * @since 0.8.3
 */
function invite_anyone_migration_step() {
	$url = is_multisite() && function_exists( 'network_admin_url' ) ? network_admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' ) : admin_url( 'admin.php?page=invite-anyone/admin/admin-panel.php' );
	$url = add_query_arg( 'migrate', '1', $url );
	$url = add_query_arg( 'start', '0', $url );

	?>
	<div class="wrap">
		<h2><?php _e( 'Invite Anyone Upgrade', 'bp-invite-anyone' ) ?></h2>

		<?php if ( !isset( $_GET['start'] ) ) : ?>
			<p><?php _e( 'Invite Anyone has just been updated, and needs to move some old invitation data in order to complete the upgrade. Click GO to start the process.', 'bp-invite-anyone' ) ?></p>

			<a class="button" href="<?php echo $url ?>">GO</a>
		<?php else : ?>
			<?php invite_anyone_data_migration( 'partial', (int)$_GET['start'] ) ?>

		<?php endif ?>
	</div>

	<?php
}

?>
