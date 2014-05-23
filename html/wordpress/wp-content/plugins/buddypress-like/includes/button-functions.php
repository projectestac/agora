<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * bp_like_button()
 *
 * Outputs the 'Like/Unlike' button.
 * 
 * TODO: Need to find/make function for getting activity type.
 * Also idea to get all registered types on site, and alert admin of unspoorted types,
 * and ask them to report them to myself.
 *
 */
function bp_like_button( $id = '' , $type = '' ) {

    /* Set the type if not already set, and check whether we are outputting the button on a blogpost or not. */
    if ( !$type && !is_single() ) {
        $type = 'activity';
    } elseif ( !$type && is_single() ) {
        $type = 'blogpost';
    }
    if ( $type == 'activity' ) {
        bplike_activity_button();
    } elseif ( $type == 'blogpost' ) {
        bplike_blog_button();
        bp_get_activity_type();
    }
}

// Filters to display BuddyPress Like button.
add_filter( 'bp_activity_entry_meta' , 'bp_like_button', 1000 );
add_action( 'bp_before_blog_single_post' , 'bp_like_button' , 1000 );
add_filter( 'bp_activity_comment_options' , 'bp_like_button', 1000 );

/*
 * bplike_activity_button()
 * 
 * Outputs Like/Unlike button for activity items. 
 * 
 * TODO: Try to have one function for all. 
 * Make simplier.
 * Get type in a better way. (comment or activty item, etc)
 */

function bplike_activity_button() {

    // Debugging.
    // echo bp_get_activity_type();

    $liked_count = 0;
    $bp_like_comment_id = bp_get_activity_comment_id();

    if ( empty( $bp_like_comment_id ) ) {

        $bp_like_id = bp_get_activity_id();
        $bp_like_view = 'button view-likes';

        if ( bp_like_is_liked( $bp_like_id , 'activity' ) ) {
            $bp_like_css = 'button unlike';
        } else {
            $bp_like_css = 'button like';
        }
    } else {

        $bp_like_id = bp_get_activity_comment_id();
        $bp_like_view = 'acomment-reply bp-primary-action view-likes';

        if ( bp_like_is_liked( $bp_like_id , 'activity' ) ) {
            $bp_like_css = 'acomment-reply bp-primary-action unlike';
        } else {
            $bp_like_css = 'acomment-reply bp-primary-action like';
        }
    }

    // Debugging.
    //print_r( bp_activity_get_meta( $bp_like_id , 'liked_count' , true ));


    $activity = bp_activity_get_specific( array('activity_ids' => $bp_like_id) );

    //TODO: I believe there is a bp core function for this.
    $activity_type = $activity['activities'][0]->type;
    // Debugging.
    //print_r($activity);

    if ( $activity_type === null ) {
        $activity_type = 'activity_update';
    }

    if ( is_user_logged_in() && $activity_type !== 'activity_liked' ) {

        if ( bp_activity_get_meta( $bp_like_id , 'liked_count' , true ) ) {
            $users_who_like = array_keys( bp_activity_get_meta( $bp_like_id , 'liked_count' , true ) );
            $liked_count = count( $users_who_like );
        }

        if ( !bp_like_is_liked( $bp_like_id , 'activity' ) ) {
            ?>
            <a href="#" class="<?php echo $bp_like_css; ?>" id="like-activity-<?php echo $bp_like_id; ?>" title="<?php echo bp_like_get_text( 'like_this_item' ); ?>"><?php
                echo bp_like_get_text( 'like' );
                if ( $liked_count ) {
                    echo ' (' . $liked_count . ')';
                }
                ?></a>
        <?php } else { ?>
            <a href="#" class="<?php echo $bp_like_css; ?>" id="unlike-activity-<?php echo $bp_like_id; ?>" title="<?php echo bp_like_get_text( 'unlike_this_item' ); ?>"><?php
                echo bp_like_get_text( 'unlike' );
                if ( $liked_count ) {
                    echo ' (' . $liked_count . ')';
                }
                ?></a>
            <?php
        }

        // Checking if there are users who like item.
        if ( $users_who_like ) {
            view_who_likes();
        }
    }
}
