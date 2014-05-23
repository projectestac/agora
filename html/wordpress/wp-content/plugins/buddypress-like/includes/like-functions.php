<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * bp_like_is_liked()
 *
 * Checks to see whether the user has liked a given item.
 *
 */
function bp_like_is_liked( $item_id = '' , $type = '' , $user_id = '' ) {
    global $bp;

    if ( !$type ) {
        return false;
    }

    if ( !$item_id ) {
        return false;
    }

    if ( isset( $user_id ) ) {
        if ( !$user_id ) {
            $user_id = $bp->loggedin_user->id;
        }
    }

    if ( $type == 'activity' ) {
        $user_likes = get_user_meta( $user_id , 'bp_liked_activities' , true );
    }

    if ( $type == 'blogpost' ) {
        $user_likes = get_user_meta( $user_id , 'bp_liked_blogposts' , true );
    }

    if ( !$user_likes ) {
        return false;
    } elseif ( !array_key_exists( $item_id , $user_likes ) ) {
        return false;
    } else {
        return true;
    }
}

/**
 * bp_like_add_user_like()
 *
 * Registers that the user likes a given item.
 * 
 * TODO: adding $user_id as a parameter may be a good idea.
 *
 */
function bp_like_add_user_like( $item_id = '' , $type = 'activity' ) {
    global $bp;

    if ( !isset( $user_id ) ) {
        $user_id = $bp->loggedin_user->id;
    }
    if ( !$item_id || !is_user_logged_in() ) {
        return false;
    }

    if ( $type == 'activity' ) {

        /* Add to the  users liked activities. */
        $user_likes = get_user_meta( $user_id , 'bp_liked_activities' , true );
        $user_likes[$item_id] = 'activity_liked';
        update_user_meta( $user_id , 'bp_liked_activities' , $user_likes );

        /* Add to the total likes for this activity. */
        $users_who_like = bp_activity_get_meta( $item_id , 'liked_count' , true );
        $users_who_like[$user_id] = 'user_likes';
        bp_activity_update_meta( $item_id , 'liked_count' , $users_who_like );

        $liked_count = count( $users_who_like );

        /* Publish to the activity stream if we're allowed to. */

        //TODO change value from 1 to something more descriptive
        //TODO change this to seperate function
        // add in function to post to stream here..
        bp_like_post_to_stream( $item_id , $user_id );
    } elseif ( $type == 'blogpost' ) {

        /* Add to the users liked blog posts. */
        $user_likes = get_user_meta( $user_id , 'bp_liked_blogposts' , true );
        $user_likes[$item_id] = 'blogpost_liked';
        update_user_meta( $user_id , 'bp_liked_blogposts' , $user_likes );

        /* Add to the total likes for this blog post. */
        $users_who_like = get_post_meta( $item_id , 'liked_count' , true );
        $users_who_like[$user_id] = 'user_likes';
        update_post_meta( $item_id , 'liked_count' , $users_who_like );

        $liked_count = count( $users_who_like );

        if ( bp_like_get_settings( 'post_to_activity_stream' ) == 1 ) {
            $post = get_post( $item_id );
            $author_id = $post->post_author;

            $liker = bp_core_get_userlink( $user_id );
            $permalink = get_permalink( $item_id );
            $title = $post->post_title;
            $author = bp_core_get_userlink( $post->post_author );

            if ( $user_id == $author_id ) {
                $action = bp_like_get_text( 'record_activity_likes_own_blogpost' );
            } elseif ( $user_id == 0 ) {
                $action = bp_like_get_text( 'record_activity_likes_a_blogpost' );
            } else {
                $action = bp_like_get_text( 'record_activity_likes_users_blogpost' );
            }

            /* Filter out the placeholders */
            $action = str_replace( '%user%' , $liker , $action );
            $action = str_replace( '%permalink%' , $permalink , $action );
            $action = str_replace( '%title%' , $title , $action );
            $action = str_replace( '%author%' , $author , $action );

            /* Grab the content and make it into an excerpt of 140 chars if we're allowed */
            if ( bp_like_get_settings( 'show_excerpt' ) == 1 ) {
                $content = $post->post_content;
                if ( strlen( $content ) > bp_like_get_settings( 'excerpt_length' ) ) {
                    $content = substr( $content , 0 , bp_like_get_settings( 'excerpt_length' ) );
                    $content = $content . '...';
                }
            };

            bp_activity_add(
                    array(
                        'action' => $action ,
                        'content' => $content ,
                        'component' => 'bp-like' ,
                        'type' => 'blogpost_liked' ,
                        'user_id' => $user_id ,
                        'item_id' => $item_id ,
                        'primary_link' => $permalink
                    )
            );
        }
    }

    echo bp_like_get_text( 'unlike' );

    if ( $liked_count ) {
        echo ' (' . $liked_count . ')';
    }
}

/**
 * bp_like_remove_user_like()
 *
 * Registers that the user has unliked a given item.
 *
 */
function bp_like_remove_user_like( $item_id = '' , $type = 'activity' ) {
    global $bp;

    if ( !$item_id ) {
        return false;
    }

    if ( !isset( $user_id ) ) {
        $user_id = $bp->loggedin_user->id;
    }

    if ( $user_id == 0 ) {
        echo bp_like_get_text( 'must_be_logged_in' );
        return false;
    }

    if ( $type == 'activity' ) {

        /* Remove this from the users liked activities. */
        $user_likes = get_user_meta( $user_id , 'bp_liked_activities' , true );
        unset( $user_likes[$item_id] );
        update_user_meta( $user_id , 'bp_liked_activities' , $user_likes );

        /* Update the total number of users who have liked this activity. */
        $users_who_like = bp_activity_get_meta( $item_id , 'liked_count' , true );
        unset( $users_who_like[$user_id] );

        /* If nobody likes the activity, delete the meta for it to save space, otherwise, update the meta */
        if ( empty( $users_who_like ) ) {
            bp_activity_delete_meta( $item_id , 'liked_count' );
        } else {
            bp_activity_update_meta( $item_id , 'liked_count' , $users_who_like );
        }

        $liked_count = count( $users_who_like );

        /* Remove the update on the users profile from when they liked the activity. */
        $update_id = bp_activity_get_activity_id(
                array(
                    'item_id' => $item_id ,
                    'component' => 'bp-like' ,
                    'type' => 'activity_liked' ,
                    'user_id' => $user_id
                )
        );

        bp_activity_delete(
                array(
                    'id' => $update_id ,
                    'item_id' => $item_id ,
                    'component' => 'bp-like' ,
                    'type' => 'activity_liked' ,
                    'user_id' => $user_id
                )
        );
    } elseif ( $type == 'blogpost' ) {

        /* Remove this from the users liked activities. */
        $user_likes = get_user_meta( $user_id , 'bp_liked_blogposts' , true );
        unset( $user_likes[$item_id] );
        update_user_meta( $user_id , 'bp_liked_blogposts' , $user_likes );

        /* Update the total number of users who have liked this blog post. */
        $users_who_like = get_post_meta( $item_id , 'liked_count' , true );
        unset( $users_who_like[$user_id] );

        /* If nobody likes the blog post, delete the meta for it to save space, otherwise, update the meta */
        if ( empty( $users_who_like ) ) {
            delete_post_meta( $item_id , 'liked_count' );
        } else {
            update_post_meta( $item_id , 'liked_count' , $users_who_like );
        }

        $liked_count = count( $users_who_like );

        /* Remove the update on the users profile from when they liked the activity. */
        $update_id = bp_activity_get_activity_id(
                array(
                    'item_id' => $item_id ,
                    'component' => 'bp-like' ,
                    'type' => 'blogpost_liked' ,
                    'user_id' => $user_id
                )
        );

        bp_activity_delete(
                array(
                    'id' => $update_id ,
                    'item_id' => $item_id ,
                    'component' => 'bp-like' ,
                    'type' => 'blogpost_liked' ,
                    'user_id' => $user_id
                )
        );
    }

    echo bp_like_get_text( 'like' );
    if ( $liked_count ) {
        echo ' (' . $liked_count . ')';
    }
}

/**
*
* bp_like_number_of_likers()
* 
* Paramter: Takes in ID of item.
*
* Outputs the number of users who have liked a given item.
*/
function bp_like_number_of_likers($item_id ='') {

    global $bp;
    /* Grab some core data we will need later on, specific to activities */
    $users_who_like = array_keys( bp_activity_get_meta( $item_id , 'liked_count' ) );
    $number_of_likers = count( bp_activity_get_meta( $item_id , 'liked_count' ) );

    return $number_of_likers;

}


/**
 * bp_like_get_likes()
 *
 * Outputs a list of users who have liked a given item.
 *
 */
function bp_like_get_likes( $item_id = '' , $type = '' , $user_id = '' ) {
    global $bp;

    if ( !$type || !$item_id ) {
        return false;
    }

    if ( !$user_id ) {
        $user_id = $bp->loggedin_user->id;
    }

    if ( $type == 'activity' ) {

        /* Grab some core data we will need later on, specific to activities */
        $users_who_like = array_keys( bp_activity_get_meta( $item_id , 'liked_count' ) );
        $liked_count = count( bp_activity_get_meta( $item_id , 'liked_count' ) );
        $output = '';

        /* Intercept any messages if nobody likes it, just incase the button was clicked when it shouldn't be */
        if ( $liked_count == 0 ) {
            $output .= bp_like_get_text( 'get_likes_no_likes' );
        }

        /* We should show information about all likers */ elseif ( bp_like_get_settings( 'likers_visibility' ) == 'show_all' ) {

            /* Settings say we should show their name. */
            if ( bp_like_get_settings( 'name_or_avatar' ) == 'name' ) {

                /* Current user likes it too, remove them from the liked count and output appropriate message */
                if ( bp_like_is_liked( $item_id , 'activity' , $user_id ) ) {

                    // remove current user from liked count.
                    $liked_count = $liked_count - 1;

                    if ( $liked_count == 1 ) {
                        //only current user and 1 other person likes this.
                        $output .= bp_like_get_text( 'get_likes_you_and_singular' );

                        $other = $users_who_like[count( $users_who_like )];
                        $output .= 'You and ' . bp_core_get_userlink( $other ) . ' liked this.';
                    } elseif ( $liked_count == 0 ) {
                        //current user is the only person to like this.
                        $output .= bp_like_get_text( 'get_likes_only_liker' );
                    } else {
                        $output .= bp_like_get_text( 'get_likes_you_and_plural' );
                    }
                } else {

                    if ( $liked_count == 1 ) {
                        $output .= bp_like_get_text( 'get_likes_count_people_singular' );
                    } else {
                        $output .= bp_like_get_text( 'get_likes_count_people_plural' );
                    }
                }

                /* Now output the name of each person who has liked it (except the current user obviously) */
                foreach ( $users_who_like as $id ) {

                    if ( $id != $user_id ) {
                        $output .= ' &middot <a href="' . bp_core_get_user_domain( $id ) . '" title="' . bp_core_get_user_displayname( $id ) . '">' . bp_core_get_user_displayname( $id ) . '</a>';
                    }
                }
            }
            /* Settings say we should show their avatar. */ elseif ( bp_like_get_settings( 'name_or_avatar' ) == 'avatar' ) {

                /* Output the avatar of each person who has liked it. */
                foreach ( $users_who_like as $id ) {

                    $output .= '<a href="' . bp_core_get_user_domain( $id ) . '" title="' . bp_core_get_user_displayname( $id ) . '">' . bp_core_fetch_avatar( array('item_id' => $id , 'object' => 'user' , 'type' => 'thumb' , 'width' => 30 , 'height' => 30) ) . '</a> ';
                }
            }
        }
        /* We should show the information of friends, but only the number of non-friends. */ elseif ( bp_like_get_settings( 'likers_visibility' ) == 'friends_names_others_numbers' && bp_is_active( 'friends' ) ) {

            /* Grab some information about their friends. */
            $users_friends = friends_get_friend_user_ids( $user_id );
            if ( !empty( $users_friends ) ) {
                $friends_who_like = array_intersect( $users_who_like , $users_friends );
            }

            /* Current user likes it, so reduce the liked count by 1, to get the number of other people who like it. */
            if ( bp_like_is_liked( $item_id , 'activity' , $user_id ) ) {
                $liked_count = $liked_count - 1;
            }

            /* Settings say we should show their names. */
            if ( bp_like_get_settings( 'name_or_avatar' ) == 'name' ) {

                /* Current user likes it too, tell them. */
                if ( bp_like_is_liked( $item_id , 'activity' , $user_id ) ) {
                    $output .= 'You ';
                }

                /* Output the name of each friend who has liked it. */
                foreach ( $users_who_like as $id ) {

                    if ( in_array( $id , $friends_who_like ) ) {
                        //$output .= ' &middot <a href="' . bp_core_get_user_domain( $id ) . '" title="' . bp_core_get_user_displayname( $id ) . '">' . bp_core_get_user_displayname( $id ) . '</a> ';
                        $output .= bp_core_get_userlink( $id );
                        $liked_count = $liked_count - 1;
                    }
                }

                /* If non-friends like it, say so. */
                if ( $liked_count == 1 ) {
                    $output .= bp_like_get_text( 'get_likes_and_people_singular' );
                } elseif ( $liked_count > 1 ) {
                    $output .= bp_like_get_text( 'get_likes_and_people_plural' );
                } else {
                    $output .= bp_like_get_text( 'get_likes_like_this' );
                }
            }
            /* Settings say we should show their avatar. */ elseif ( bp_like_get_settings( 'name_or_avatar' ) == 'avatar' ) {

                /* Output the avatar of each friend who has liked it, as well as the current users' if they have. */
                if ( !empty( $friends_who_like ) ) {

                    foreach ( $users_who_like as $id ) {

                        if ( $id == $user_id || in_array( $id , $friends_who_like ) ) {
                            $user_info = get_userdata( $id );
                            $output .= '<a href="' . bp_core_get_user_domain( $id ) . '" title="' . bp_core_get_user_displayname( $id ) . '">' . get_avatar( $user_info->user_email , 30 ) . '</a> ';
                        }
                    }
                }
            } elseif ( bp_like_get_settings( 'likers_visibility' ) == 'friends_names_others_numbers' && !bp_is_active( 'friends' ) || bp_like_get_settings( 'likers_visibility' ) == 'just_numbers' ) {

                /* Current user likes it too, remove them from the liked count and output appropriate message */
                if ( bp_like_is_liked( $item_id , 'activity' , $user_id ) ) {

                    $liked_count = $liked_count - 1;

                    if ( $liked_count == 1 ) {
                        $output .= bp_like_get_text( 'get_likes_you_and_singular' );
                    } elseif ( $liked_count == 0 ) {
                        $output .= bp_like_get_text( 'get_likes_only_liker' );
                    } else {
                        $output .= bp_like_get_text( 'get_likes_you_and_plural' );
                    }
                } else {

                    if ( $liked_count == 1 ) {
                        $output .= bp_like_get_text( 'get_likes_count_people_singular' );
                    } else {
                        $output .= bp_like_get_text( 'get_likes_count_people_plural' );
                    }
                }
            }
        }
    }

    /* Filter out the placeholder. */
    $output = str_replace( '%count%' , $liked_count , $output );

    echo $output;
}

/**
 * 
 * bp_like_users_who_like()
 * 
 * Gets the usernames of users who liked post id
 * 
 */
function bp_like_users_who_like( $bp_like_id = '' ) {
    $bp_like_id = bp_get_activity_id();

    $users_who_like = array_keys( bp_activity_get_meta( $bp_like_id , 'liked_count' , true ) );
    if ( count( $users_who_like ) == 1 ) {
        echo bp_core_get_userlink( $users_who_like[0] , $no_anchor = false , $just_link = false ) . _e( 'liked this' , 'bp-like' );
    } else {
        for ( $i = count( $users_who_like ) - 1; $i >= 0; $i-- ) {
            echo bp_core_get_userlink( $users_who_like[0] , $no_anchor = false , $just_link = false )
            . _e( 'and' , 'bp-like' ) . count( $users_who_like ) - 1
            . _e( 'liked this' , 'bp-like' );
        }
    }
}

/*
 * bp_like_get_some_likes()
 * 
 * Description: Returns a defined number of likers, beginning with more recent.
 * 
 * TODO: Use this function throughout plugin where needed.
 * Check if user liked item and "You, x,y, and z others liked this".
 */
function bp_like_get_some_likes( $number = '' ) {
    
    // $number is max likers it will output. Currently only takes 2.
    // need to decide if checking number of likes here, or in another fucntion, or in call to here..
    $bp_like_id = bp_get_activity_id();
    $users_who_like = array_keys( bp_activity_get_meta( $bp_like_id , 'liked_count' , true ) );

    
    if ( count( $users_who_like ) == 0 ) {
    // if no user likes this.
}
    elseif ( count( $users_who_like ) == 1 ) {
        // If only one person likes the current item.

        $string = '<p class="users-who-like" id="users-who-like-';
        $string .= $bp_like_id;
        $string .= '">%s liked this.</p>';

        $one = bp_core_get_userlink( $users_who_like[0] );

        printf( $string , $one );


    } elseif ( count( $users_who_like ) == 2 ) {
        // If two people like the current item.

        $string = '<p class="users-who-like" id="users-who-like-';
        $string .= $bp_like_id;
        $string .= '">%s and %s liked this.</p>';

        $one = bp_core_get_userlink( $users_who_like[0] );
        $two = bp_core_get_userlink( $users_who_like[1] );

        printf( $string , $one , $two );

    } elseif ( count ($users_who_like) > 2 ) {

        $string = '<p class="users-who-like" id="users-who-like-';
        $string .= $bp_like_id;
        $string .= '">%s, %s and %s others liked this.</p>';

        $others = count ($users_who_like);
        // output last two people to like (2 at end of array)
        $one = bp_core_get_userlink( $users_who_like[0] );
        $two = bp_core_get_userlink( $users_who_like[1] );

        // $users_who_like will always be greater than 2.
        if ( $users_who_like == 3 ) {
            $others = $others - 1;
        } else {
            $others = $others - 2;
        }

        printf( $string , $one , $two , $others );
    }
}

/**
 * 
 * view_who_likes() hook
 * 
 * using hook, as I may add in option to use view-likes button.
 *  * 
 */
function view_who_likes() {
    do_action( 'view_who_likes');
}

add_action( 'view_who_likes' , 'bp_like_get_some_likes', 1000 );
