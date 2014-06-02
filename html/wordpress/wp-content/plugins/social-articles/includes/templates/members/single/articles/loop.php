<?php

/**
 *
 * @package BuddyPress_Skeleton_Component
 * @since 1.6
 */

?>
<?php global $bp, $post, $wpdb, $socialArticles;

      $directWorkflow = isDirectWorkflow();

      $initialCount = $socialArticles->options['post_per_page'];  

      $publishCount = custom_get_user_posts_count('publish');
      $pendingCount = custom_get_user_posts_count('pending');
      $draftCount = custom_get_user_posts_count('draft');

       if($directWorkflow){
           $postCount = $draftCount + $publishCount;
       }else{
           $postCount =  count_user_posts(bp_displayed_user_id());
       }


      define(PUBLISH, "publish");
      define(PENDING, "pending");
      define(DRAFT, "draft");
?>

<section id="articles-container">     
    <?php if($publishCount > 0 || bp_displayed_user_id()==bp_loggedin_user_id()):?>    
    <div class="item-list-tabs no-ajax">                          
        <ul class="nav nav-tabs">                    
            <li id="publish-tab" class="current">
                <a href="#" onclick="showContent('publish'); return false;"><?php _e("Published", "social-articles");?> <span id="publish-count"><?php echo $publishCount;?></span></a>
            </li>
            <?php if(bp_displayed_user_id()==bp_loggedin_user_id()):?>
            <?php if(!$directWorkflow): ?>
            <li id="pending-tab">
                <a href="#" onclick="showContent('pending'); return false;"><?php _e("Under Review", "social-articles");?> <span id="pending-count"><?php echo $pendingCount;?></span></a>
            </li>
            <?php endif;?>
            <li id="draft-tab">
                <a href="#" onclick="showContent('draft'); return false;"><?php _e("Draft", "social-articles");?> <span id="draft-count"><?php echo $draftCount;?></span></a>
            </li>           
            <?php endif;?>                   
        </ul>                                
    </div>     
    <div class="publish-container">    
        <?php get_articles(0, PUBLISH);?>    
        <div id="more-container-publish">
        </div>    
        <?php
        if($publishCount > $initialCount){ ?>
        <div class="more-articles-button-container">       
            <input type="submit" id="more-articles-button" class="button" onclick ="getMoreArticles('publish'); return false;" value="<?php _e("Load more articles", "social-articles");?>"/>       
            <img id="more-articles-loader" src="<?php echo SA_BASE_URL . '/assets/images/bp-ajax-loader.gif' ; ?>"/>
        </div>       
        <?php
        }
        ?>
    </div>
    <?php if(bp_displayed_user_id()==bp_loggedin_user_id()):?>
    <?php if(!$directWorkflow): ?>
     <div class="pending-container">
        <?php get_articles(0, PENDING, true);?>             
     </div>
    <?php endif?>
     <div class="draft-container">    
        <?php get_articles(0, DRAFT, true);?>          
     </div>
    <?php endif;?> 
    <?php else: ?>
    <div id="message" class="messageBox note icon">
        <span><?php _e("This user doesn't have any article.", "social-articles");?></span>
    </div>
    <?php endif;?>    
</section>     

<input type="hidden" value="<?php echo $initialCount;?>" id="inicialcount"/>
<input type="hidden" value="<?php echo $postCount;?>" id="postcount"/>
<input type="hidden" value="<?php echo $initialCount;?>" id="offset"/>
<input type="hidden" value="<?php echo "publish";?>" id="current-state"/>