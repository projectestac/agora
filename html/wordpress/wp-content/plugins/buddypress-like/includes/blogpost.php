<?php

/*
 * bplike_blog_button()
 * 
 * Needs a lot of work..
 * Coming back after BuddyPress activity is working better.
 */
function bplike_blog_button() {
    global $post;

    if ( !$id && is_single() ) {
        $id = $post->ID;
    }

    if ( is_user_logged_in() && get_post_meta( $id , 'liked_count' , true ) ) {
        $liked_count = count( get_post_meta( $id , 'liked_count' , true ) );
    }

    if ( !bp_like_is_liked( $id , 'blogpost' ) ) {
        ?>

        <div class="like-box"><a href="#" class="like_blogpost" id="like-blogpost-<?php echo $id; ?>" title="<?php echo bp_like_get_text( 'like_this_item' ); ?>"><?php
        echo bp_like_get_text( 'like' );
        if ( $liked_count ) {
            echo ' (' . $liked_count . ')';
        }
        ?></a></div>

    <?php } else { ?>

        <div class="like-box"><a href="#" class="unlike_blogpost" id="unlike-blogpost-<?php echo $id; ?>" title="<?php echo bp_like_get_text( 'unlike_this_item' ); ?>"><?php
        echo bp_like_get_text( 'unlike' );
        if ( $liked_count ) {
            echo ' (' . $liked_count . ')';
        }
        ?></a></div>
                <?php
    }
}
