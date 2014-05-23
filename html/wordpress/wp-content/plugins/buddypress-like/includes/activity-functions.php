<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * bp_like_activity_filter()
 *
 * Adds 'Show Activity Likes' to activity stream filters.
 *
 */
function bp_like_activity_filter() {
    echo '<option value="activity_liked">' . bp_like_get_text( 'show_activity_likes' ) . '</option>';
    echo '<option value="blogpost_liked">' . bp_like_get_text( 'show_blogpost_likes') . '</option>';
}

add_action( 'bp_activity_filter_options' , 'bp_like_activity_filter' );
add_action( 'bp_member_activity_filter_options' , 'bp_like_activity_filter' );
add_action( 'bp_group_activity_filter_options' , 'bp_like_activity_filter' );

/**
 * bp_like_post_to_stream()
 * 
 * Posts to stream, depending on settings
 * 
 * TODO, Should we be posted that people like comments to the feed? This can get messy..
 * Also no point having 20 posts saying people liked the same status..
 * 
 */
function bp_like_post_to_stream( $item_id , $user_id ) {

    if ( bp_like_get_settings( 'post_to_activity_stream' ) == 1 and bp_get_activity_type() == "profile_updated"  ) {
        //TODO change from 1 to something more meaningful

        $activity = bp_activity_get_specific( array('activity_ids' => $item_id , 'component' => 'buddypress-like') );
        $author_id = $activity['activities'][0]->user_id;

        if ( $user_id == $author_id ) {
            $action = bp_like_get_text( 'record_activity_likes_own' );
        } elseif ( $user_id == 0 ) {
            $action = bp_like_get_text( 'record_activity_likes_an' );
        } else {
            $action = bp_like_get_text( 'record_activity_likes_users' );
        }

        $liker = bp_core_get_userlink( $user_id );
        $author = bp_core_get_userlink( $author_id );
        $activity_url = bp_activity_get_permalink( $item_id );
        $content = ''; //content must be defined...

        /* Grab the content and make it into an excerpt of 140 chars if we're allowed */
        if ( bp_like_get_settings( 'show_excerpt' ) == 1 ) {
            $content = $activity['activities'][0]->content;
            if ( strlen( $content ) > bp_like_get_settings( 'excerpt_length' ) ) {
                $content = substr( $content , 0 , bp_like_get_settings( 'excerpt_length' ) );
                $content = strip_tags($content);
                $content = $content . '...';
            }
        }

        /* Filter out the placeholders */
        $action = str_replace( '%user%' , $liker , $action );
        $action = str_replace( '%permalink%' , $activity_url , $action );
        $action = str_replace( '%author%' , $author , $action );

        bp_activity_add(
                array(
                    'action' => $action ,
                    'content' => $content ,
                    'primary_link' => $activity_url ,
                    'component' => 'bp-like' ,
                    'type' => 'activity_liked' ,
                    'user_id' => $user_id ,
                    'item_id' => $item_id
                )
        );
    }
}
