<?php
global $post, $wpdb, $bp, $socialArticles;

$directWorkflow = isDirectWorkflow();

$statusLabels = array("publish"=>__('Published', 'social-articles'), 
                        "draft"=>__('Draft', 'social-articles'), 
                      "pending"=>__('Under review', 'social-articles'), 
                     "new-post"=>__('New', 'social-articles'));
?>
<?php if(isset($_GET['article'])):    
       $myArticle = get_post($_GET['article']);
       $post_id = $_GET['article'];
       if(isset($myArticle) && $myArticle->post_author == bp_loggedin_user_id() && ($socialArticles->options['allow_author_adition']=="true" || $myArticle->post_status=="draft")){
           $state = "ok";           
           $title = $myArticle->post_title;
           $content = $myArticle->post_content;             
           $status = $myArticle->post_status;
           $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($_GET['article']), 'large');       
           if(isset($large_image_url)){
                $image_name = end(explode("/",$large_image_url[0]));
           }          
           ?>           
            <input type="hidden" id="mode" value="edit"/>
            <input type="hidden" id="feature-image-url" value="<?php echo $large_image_url[0];?>"/>    
           <?php
       }else{          
           $state = "error";
           $message = __("You cannot perform this action", "social-articles");
       }     
       ?>        
<?php else:
       $post_id = 0;  
       $status = "new-post";
       ?>        
       <input type="hidden" id="mode" value="new"/>    
<?php endif;?>

<input type="hidden" id="image-name" value="<?php echo $image_name;?>"/>
<input type="hidden" id="categories-ids"/>
<input type="hidden" id="tag-ids"/>
<input type="hidden" id="tag-names"/>
<input type="hidden" id="categories-names"/>
<input type="hidden" id="post-id" value="<?php echo $post_id;?>"/>   
<input type="hidden" id="post-status" value="<?php echo $status;?>"/>
<input type="hidden" id="direct-workflow" value="<?php echo $directWorkflow;?>"/>

<?php if(!isset($_GET['article']) || $state == "ok"):?>
    <div class="post-save-options messages-container"> 
        <label id="save-message"></label>
        <input type="submit" id="edit-article" class="button" value="<?php _e("Edit article", "social-articles"); ?>" />
        <input type="submit" id="view-article" class="button" value="<?php _e("View article", "social-articles"); ?>" />
        <input type="submit" id="new-article" class="button" value="<?php _e("New article", "social-articles"); ?>" />
    </div>
    <div id="post-maker-container">
        <div class="options">    
            <div class="options-content">
                <span class="titlelabel"><?php _e("Categories", "social-articles"); ?></span>
                <div class="categories-selector"><?php _e("Select your category", "social-articles"); ?></div>
                <span class="picker" onmouseover="showCategoryList()"></span>
                <span class="white-picker"></span>
                <?php echo get_category_list($_GET['article']);?>
            </div>
            <div class="options-content options-content-second">
                <label class="titlelabel"><?php _e("Tags", "social-articles"); ?></label>    
                <div class="tags-selector"><?php _e("Select your tags", "social-articles"); ?></div>
                <span class="picker-t" onmouseover="showTagsList()"></span>
                <span class="white-picker-t"></span>        
                <?php echo get_tags_list($_GET['article']);?>
            </div>
            
            <div class="post-status-container options-content">
                <label class="titlelabel"><?php _e("Status", "social-articles"); ?></label>             
                <span class="article-status <?php echo $status;?>"><?php echo $statusLabels[$status];?></span>                                             
            </div>
        </div>
           
        <input type="text" id="post_title" class="title-input" autofocus placeholder="<?php _e("Article title...", "social-articles"); ?>" value="<?php echo $title; ?>"/>
        
        <div class="editor-container">
            <div id="wysihtml5-editor-toolbar">
              <header>
                <ul class="commands">
                  <li data-wysihtml5-command="bold" title="Bold (CTRL + B)" class="command"></li>
                  <li data-wysihtml5-command="italic" title="Italic (CTRL + I)" class="command"></li>
                  <li data-wysihtml5-command="insertUnorderedList" title="<?php _e('Insert unordered list', 'social-articles');?>" class="command"></li>
                  <li data-wysihtml5-command="insertOrderedList" title="<?php _e('Insert ordered list', 'social-articles');?>" class="command"></li>
                  <li data-wysihtml5-command="createLink" title="<?php _e('Insert link', 'social-articles');?>" class="command"></li>         
                  <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" title="<?php _e('Title', 'social-articles');?>" class="command"></li>          
                  <li data-wysihtml5-command-group="foreColor" class="fore-color" title="Color the selected text" class="command">
                    <ul>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="silver"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="gray"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="maroon"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="purple"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="olive"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="navy"></li>
                      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue"></li>
                    </ul>
                  </li>        
                </ul>
              </header>
              <div data-wysihtml5-dialog="createLink" style="display: none;">
                <label>
                  Link:
                  <input data-wysihtml5-dialog-field="href" value="http://">
                </label>
                <a data-wysihtml5-dialog-action="save"><?php _e("OK", "social-articles"); ?></a>&nbsp;<a data-wysihtml5-dialog-action="cancel"><?php _e("Cancel", "social-articles"); ?></a>
              </div>      
            </div>
            
            <section>
                <div class="textarea-container">
                    <textarea id="wysihtml5-editor" spellcheck="false" wrap="off" placeholder="<?php _e("Article content...", "social-articles"); ?>">           
                        <?php echo $content;?>         
                    </textarea>                
                </div>
            </section>
            
        </div>        
        
        <div id="post_image" class="post-image-container">
            <div class="image-preview-container" id="image-preview-container">
            </div>    
            <div class="upload-controls">
                <input id="uploader" type="submit" class="button" value="<?php _e("Upload Image", "social-articles"); ?>" />     
                <label><?php _e("Max size allowed is 2 MB", "social-articles"); ?></label>
            </div>    
            <div class="uploading" id="uploading">
               <img src ="<?php echo SA_BASE_URL;?>/assets/images/load.gif"/>
               <label><?php _e("Uploading your image. Please wait.", "social-articles"); ?></label>
            </div>  
            
            <div class="edit-controls">
                <input type="submit" class="button" value="<?php _e("Delete", "social-articles"); ?>" onclick="cancelImage()" /> 
            </div>    
        </div> 
        
        <div id="save-waiting" class="messages-container">
             <img id="save-gif"src ="<?php echo SA_BASE_URL;?>/assets/images/load.gif"/>
             <label><?php _e("Saving your article. Please wait.", "social-articles"); ?></label>        
        </div>        
        <div id="error-box" class="messages-container">       
        </div>
        <div class="buttons-container" id="create-controls">
            <?php if(($status=="draft" || $status == "new-post") && !$directWorkflow):?>
                <input type="checkbox" id="publish-save" /><label for="publish-save"><span></span><?php _e("Save and move it under review", "social-articles"); ?></label>
            <?php endif?>
            <?php if(($status=="draft" || $status == "new-post") && $directWorkflow):?>
                <input type="checkbox" id="publish-save" /><label for="publish-save"><span></span><?php _e("Save and publish", "social-articles"); ?></label>
            <?php endif?>

            <input type="submit" class="button save" value="<?php _e("Save", "social-articles"); ?>" onclick="savePost(); return false;" />
            <input type="submit" class="button cancel" value="<?php _e("Cancel", "social-articles"); ?>" onclick="window.open('<?php echo $bp->loggedin_user->domain.'/articles';?>', '_self')" />
        </div>  
    </div>    
<?php else:?>
    <div id="message" class="messageBox note icon">
        <span><?php echo $message; ?></span>
    </div>    
<?php endif;?>

<script>

jQuery(function(){   
    var editor = new wysihtml5.Editor("wysihtml5-editor", {
        toolbar:     "wysihtml5-editor-toolbar",
        stylesheets: ["http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css", MyAjax.baseUrl+"/assets/css/editor.css"],
        parserRules: wysihtml5ParserRules
    });
});  

jQuery(function(){                    
    new AjaxUpload('uploader', {
        action: MyAjax.baseUrl+'/upload-handler.php',                
                onComplete: function(file, response){                                       
                    response = jQuery.parseJSON(response);
                    jQuery("#uploading").hide();
                    if(response.status == "ok"){                                                           
                        jQuery("#image-name").val(response.value);
                        jQuery("#image-preview-container").html(getImageObject(MyAjax.tmpImageUrl+ response.value));
                        jQuery(".edit-controls").show();                                                    
                    }else{
                        jQuery(".upload-controls").show();   
                        showError(response.value);                                
                    }
                },
                onSubmit: function(file, extension){
                   jQuery('#error-box').hide();
                   jQuery(".upload-controls").hide();
                   jQuery("#uploading").show();                              
                }   
            });         
        
        });             

</script>
