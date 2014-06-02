<?php 

add_action('wp_ajax_nopriv_create_post', 'create_post' );
add_action('wp_ajax_create_post', 'create_post' );  
function create_post(){
    article_manager("create", $_POST['post_id'], $_POST['post_title'], $_POST['post_content'], $_POST['category_id'], $_POST['tag_names'],  $_POST['status'], $_POST['post_image']);
} 

add_action('wp_ajax_nopriv_update_post', 'update_post' );
add_action('wp_ajax_update_post', 'update_post' );  
function update_post(){
    article_manager("update", $_POST['post_id'], $_POST['post_title'], $_POST['post_content'], $_POST['category_id'], $_POST['tag_names'],  $_POST['status'], $_POST['post_image']);
}

add_action('wp_ajax_nopriv_delete_article', 'delete_article' );
add_action('wp_ajax_delete_article', 'delete_article' );  
function delete_article(){
    global $socialArticles;
    $postToDelete = get_post($_POST['post_id']);

    if(bp_loggedin_user_id()==$postToDelete->post_author && ($socialArticles->options['allow_author_deletion']=="true" || $postToDelete->post_status=="draft") ){
       wp_delete_post($_POST['post_id']);
       echo "ok"; 
    }else{
       echo "error";
    }
    die();    
}

add_action('wp_ajax_nopriv_get_more_articles', 'get_more_articles' );
add_action('wp_ajax_get_more_articles', 'get_more_articles' );  
function get_more_articles(){    
    $offset = $_POST['offset'];
    $status = $_POST['status'];
    ob_start();            
    get_articles($offset, $status);        
    $out = ob_get_contents();
    ob_end_clean();      
    echo $out;
    die();    
}

add_action('wp_ajax_nopriv_deleteArticlesNotification', 'deleteArticlesNotification' );
add_action('wp_ajax_deleteArticlesNotification', 'deleteArticlesNotification' );  
function deleteArticlesNotification(){
    global $bp;
        
    $user_id=$bp->loggedin_user->id;
    $item_id=$_POST['item_id'];
    $component_name='social_articles';
    $component_action=$_POST['action_id'];   
      
    bp_core_delete_notifications_by_item_id ($user_id,  $item_id, $component_name, $component_action);     
    die();        
}


function article_manager($task, $postId, $post_title, $post_content, $post_category, $post_tags, $post_status, $post_image){
    global $bp;
  
    if($post_title == ""){
        $response = array();
        $response['status'] = "error";
        $response['message'] = __("Title is required", "social-articles");
        echo json_encode($response);
    }else{
        /*create post*/    
        $my_post = array();        
        $my_post['post_title'] = $post_title; 
        $my_post['post_content'] = $post_content;       
        $my_post['post_author'] = get_current_user_id();    
        $my_post['post_type'] = 'post'; 
        $my_post['post_status'] = $post_status; 
        
        if($task == "create"){
            $postId = wp_insert_post( $my_post );         
        }else{
            $my_post['ID'] = $postId;   
            wp_update_post( $my_post );         
        }     
        
        if($postId != 0){
            /*Set category*/
            if(empty($post_category)){
                $categories[] = get_option('default_category');
            }else{
                $categories = explode(',',$post_category);
            }

            wp_set_post_terms($postId, $categories, 'category');

            /*Set tags*/
            if(!empty($post_tags)){                
                wp_set_post_terms($postId, explode(',',$post_tags), 'post_tag');
            }else{
                wp_set_post_terms($postId, array(), 'post_tag');
            }                
                                    
            /*Attach image*/            
           $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($postId), 'large');
           $attachedImage_name="";       
           if(isset($large_image_url)){
                $attachedImage_name = end(explode("/",$large_image_url[0]));
           }              
                 
            $wp_upload_dir = wp_upload_dir();        
            $filenameTemp = SA_TEMP_IMAGE_PATH.$post_image;
            $filename = $wp_upload_dir['path'].'/sa_'.$post_image;
                                   
            if ($post_image != "" && $attachedImage_name != $post_image && copy($filenameTemp,$filename)) {
                unlink($filenameTemp);
                $wp_filetype = wp_check_filetype(basename($filename), null );    
                $attachment = array(        
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_id = wp_insert_attachment( $attachment, $filename, $postId );
                $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                wp_update_attachment_metadata( $attach_id, $attach_data );
                update_post_meta($postId, '_thumbnail_id', $attach_id);      
            }else{
                if($post_image == ""){
                      update_post_meta($postId, '_thumbnail_id', "");    
                }               
            }
            
            $response = array();
            $response['status'] = "ok";            
            $response['postId'] = $postId;
            $response['viewarticle'] = get_permalink($postId);
            $response['newarticle'] = $bp->loggedin_user->domain.'/articles/new';
            $response['editarticle'] = $bp->loggedin_user->domain.'/articles/new?article='.$postId;
            $response['message'] = get_user_message($post_status);
            echo json_encode($response);
        }else{
            $response = array();
            $response['status'] = "error";
            $response['message'] = __("Error creating the article. Try again please.", "social-articles" );
            echo json_encode($response);
        }        
    }    
    die();    
}


function get_articles($offset, $status, $all = false){
    global $bp, $post, $socialArticles;
    if($all){
       $postPerPage = -1;
    }else{
       $postPerPage = $socialArticles->options['post_per_page']; 
    }        

    $args = array(     'post_status'       => $status,
                       'ignore_sticky_posts'    => 1,                       
                       'posts_per_page'    => $postPerPage,
                       'offset'            => $offset,                      
                       'post_type'         => 'post',
                       'author'            => bp_displayed_user_id()                                    
                 );                 
    
    $articles_query = new WP_Query( $args );
             
    if ($articles_query->have_posts()):
        while ($articles_query->have_posts()):
            $articles_query-> the_post();
            $allCategories = array();
            $categories = get_the_category();
            for($i=0; $i < count($categories); $i++){                                                                
                $allCategories[]='<a href="'.get_category_link( $categories[$i]->cat_ID ).'" >'.
                                    $categories[$i]->cat_name.
                                 '</a>';                
            }      
                 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail");                      
            if( $image == null){
                $image = "NO-IMAGE";  
            }else{
                $image = $image[0];
            }
            
            ?>            
             <article id="<?php echo $post->ID; ?>" class="article-container">              
                <div class="article-content">
                    <div class="article-image">
                        <?php if($image!="NO-IMAGE"):?>        
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo $image?>" alt="<?php the_title(); ?>"/>
                        </a>
                        <?php endif;?>                               
                    </div>                    
                    <div class="article-data">
                        <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>                        
                        <span class="date"><?php the_time('j');?>&nbsp;<?php the_time('F');?>&nbsp;<?php the_time('Y');?></span>                         
                        <div class="excerpt">                                                           
                            <?php echo get_short_text(get_the_excerpt(),$socialArticles->options['excerpt_length']);?>                        
                        </div>                          
                    </div>    
                    
                    <div class="article-metadata">                     
                    <?php if(bp_displayed_user_id()==bp_loggedin_user_id()):?>
                          <div class="author-options">
                            <?php if($socialArticles->options['allow_author_adition']=="true" || $post->post_status=="draft"):?>
                            <a class="edit" title="<?php _e("edit article", "social-articles" );?>" href="<?php echo $bp->loggedin_user->domain.'articles/new?article='.$post->ID;?>"></a>
                            <?php endif;?>
                            <?php if($socialArticles->options['allow_author_deletion']=="true" || $post->post_status=="draft"):?>
                            <a class="delete" title="<?php _e("delete article", "social-articles" );?>" id="delete-<?php echo $post->ID; ?>" href="#" onclick="deleteArticle(<?php echo $post->ID; ?>); return false;"></a>        
                            <?php endif;?>
                          </div>
                    <?php endif;?>              
                        <div class="article-likes">  
                            <a href="<?php echo get_comments_link( $post->ID ); ?>">
                                <span class="likes-count">
                                      <?php $comments = wp_count_comments( $post->ID ); echo $comments->approved; ?>
                                </span>
                                <span class="likes-text"><?php _e("comments", "social-articles" )?></span>
                            </a>                               
                        </div> 
                        <div class="clear"></div>
                    </div>
                    <div class="article-categories">        
                        <?php _e("Archived", "social-articles" ); echo ": ".implode(" | ",$allCategories);?>                    
                    </div>       
                    <div style="clear:both"></div>                          
                </div>          
            </article>                  
            <?php endwhile; ?>        
        <?php endif;          
}

function get_category_list($post_id){
    global $socialArticles;
    $currentCategories = array();
    if(isset($post_id)){
        $currentCategories =  wp_get_post_categories($post_id);
    }

    if( $socialArticles->options['category_type'] == 'single'){
        $optionType="radio";
    }else{
        $optionType="checkbox";
    }

    $categoryList = "<div class='category-list-container'>
                        <div class='categories-ready'>
                            <div class='generic-button'>
                                <a href='#' title='".__("done", "social-articles" )."' onclick='closeCategoriesList(); return false;'>".__("done", "social-articles" )."</a>
                            </div>
                        </div>
                        <div class='categories-content'>";

    $category_ids = get_all_category_ids();
    $categories_backList = array();

    foreach($category_ids as $cat_id) {
        $cat_name = get_cat_name($cat_id);
        if(!in_array($cat_name, $categories_backList)){

            if(in_array($cat_id, $currentCategories)){
                $checked="checked";
            }else{
                $checked="";
            }

            $categoryList .= '<p><input type="'.$optionType.'" name="categories" value="'.$cat_name.'" id="'.$cat_id.'" '.$checked.'/>
                            <label for="'.$cat_id.'"><span></span>'.$cat_name.'</label>';
        }
    }
    $categoryList .= "</div></div>";
    return $categoryList;
}



function get_tags_list($post_id){            
    $currentTags = array();
    if(isset($post_id)){
       $currentTags =  wp_get_post_tags($post_id, array( 'fields' => 'ids' ));        
    }        
    $tagsList = "<div class='tags-list-container'>
                    <div class='tags-ready'>
                        <div class='generic-button'>
                            <a href='#' title='".__("done", "social-articles" )."' onclick='closeTagsList(); return false;'>".__("done", "social-articles" )."</a>
                        </div>
                        </div> <div class='tags-content'>";

    $tags = get_terms('post_tag', 'hide_empty=0');

    foreach ( $tags as $key => $tag ) { 
      $tag_id =  $tag->term_id;
      $tag_name = $tag->name;              
              
      if(in_array($tag_id, $currentTags)){
        $checked="checked";            
      }else{
        $checked="";
      }           
      $tagsList .= '<p><input type="checkbox" name="tags" value="'.$tag_name.'" id="'.$tag_id.'" '.$checked.'/>
                            <label for="'.$tag_id.'"><span></span>'.$tag_name.'</label>';                        
    }        
    $tagsList .= "</div></div>";  
    return $tagsList;   
}


function get_user_message($status){
    switch ($status) {
        case 'pending':
            return __("Your article is under review. When the editors approve it you will get a notification.", "social-articles");
            break;
        
        case 'draft':
            return __("Your article is in draft form.", "social-articles" );
            break;

        case 'publish':
            return __("Your article has been published.", "social-articles" );
            break;
    }    
}

?>