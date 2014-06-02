<?php
if ( !defined( 'ABSPATH' ) ) exit;

function social_articles_load_template_filter( $found_template, $templates ) {
    global $bp;

    if( !bp_sa_is_bp_default() || !bp_is_current_component( $bp->social_articles->slug )){
        return $found_template;
    }

    foreach ( (array) $templates as $template ) {
        if ( file_exists( STYLESHEETPATH . '/' . $template ) )
            $filtered_templates[] = STYLESHEETPATH . '/' . $template;
        else
            $filtered_templates[] = dirname( __FILE__ ) . '/templates/' . $template;
    }
    $found_template = $filtered_templates[0];
    return apply_filters( 'social_articles_load_template_filter', $found_template );
}
add_filter( 'bp_located_template', 'social_articles_load_template_filter', 10, 2 );


function social_articles_load_sub_template( $template ) {
    if( empty( $template ) )
        return false;

    if( bp_sa_is_bp_default() ) {
        //locate_template( array(  $template . '.php' ), true );
        if ( $located_template = apply_filters( 'bp_located_template', locate_template( $template , false ), $template ) )
            load_template( apply_filters( 'bp_load_template', $located_template ) );

    } else {
        bp_get_template_part( $template );

    }
}

function get_short_text($text, $limitwrd ) {   
    if (str_word_count($text) > $limitwrd) {
      $words = str_word_count($text, 2);
      if ($words > $limitwrd) {
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limitwrd]) . ' [...]';
      }
    }
    return $text;
}

function custom_get_user_posts_count($status){
    $args = array();     
    $args['post_status'] = $status;
    $args['author'] = bp_displayed_user_id();
    $args['fields'] = 'ids';
    $args['posts_per_page'] = "-1";
    $args['post_type'] = 'post';
    $ps = get_posts($args);
    return count($ps);
}

add_action('save_post','social_articles_send_notification');
function social_articles_send_notification($id){
    global $bp, $socialArticles;
    $savedPost = get_post($id);
    if(function_exists("friends_get_friend_user_ids") && $savedPost->post_status == "publish" && $savedPost->post_type=="post" && !wp_is_post_revision($id) && $socialArticles->options['bp_notifications'] == "true"){
        $friends = friends_get_friend_user_ids($savedPost->post_author);
        foreach($friends as $friend):
            bp_core_add_notification($savedPost->ID,  $friend , $bp->social_articles->id, 'new_article'.$savedPost->ID, $savedPost->post_author);         
        endforeach;
        bp_core_add_notification($savedPost->ID,  $savedPost->post_author , $bp->social_articles->id, 'new_article'.$savedPost->ID, -1);        
    }
}

function social_articles_remove_screen_notifications() {
    global $bp;
    bp_core_delete_notifications_for_user_by_type( $bp->loggedin_user->id, 'social_articles', 'new_high_five' );
}
add_action( 'xprofile_screen_display_profile', 'social_articles_remove_screen_notifications' );


function social_articles_format_notifications( $action, $item_id, $secondary_item_id, $total_items, $format = 'string' ) {

    do_action( 'social_articles_format_notifications', $action, $item_id, $secondary_item_id, $total_items, $format );
    
    $createdPost = get_post($item_id);

    if($secondary_item_id == "-1"){
         $text = '</a> <div id="'.$action.'"class="notification">'. 
                    __("One of your articles was approved","social-articles").'<a class="ab-item" title="'.$createdPost->post_title.'"href="'.get_permalink( $item_id ).'">,'.__("check it out!", "social-articles").'
                 </a> 
                 <a href="#" class="social-delete" onclick="deleteArticlesNotification(\''.$action.'\',\''.$item_id.'\', \''.admin_url( 'admin-ajax.php' ).'\'); return false;">x</a><span class="social-loader"></span></div>';
    
    }else{
        $creator = get_userdata($secondary_item_id); 
        $text = '</a> <div id="'.$action.'"class="notification">'. 
                    __("There is a new article by ", "social-articles").'<a class="ab-item" href="'.bloginfo('blog').'/members/'.$creator->user_login.'">'.$creator->user_nicename.', </a>
                 <a class="ab-item" title="'.$createdPost->post_title.'"href="'.get_permalink( $item_id ).'"> '.__("check it out!", "social-articles").'
                 </a> 
                 <a href="#" class="social-delete" onclick="deleteArticlesNotification(\''.$action.'\',\''.$item_id.'\', \''.admin_url( 'admin-ajax.php' ).'\'); return false;">x</a><span class="social-loader"></span></div>';
    }
    return $text;
}


function bp_sa_is_bp_default() {

    if(current_theme_supports('buddypress') || in_array( 'bp-default', array( get_stylesheet(), get_template() ) )  || ( defined( 'BP_VERSION' ) && version_compare( BP_VERSION, '1.7', '<' ) ))
        return true;
    else {
        $theme = wp_get_theme();
        $theme_tags = ! empty( $theme->tags ) ? $theme->tags : array();
        $backpat = in_array( 'buddypress', $theme_tags );
        if($backpat)
            return true;
        else
            return false; //wordpress theme
    }

}

function isDirectWorkflow(){
    global $socialArticles;
    return $socialArticles->options['workflow'] == 'direct' ;
}

?>