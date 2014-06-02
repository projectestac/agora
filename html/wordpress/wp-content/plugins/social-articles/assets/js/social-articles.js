function deleteArticlesNotification(action_id, item_id, adminUrl){
    jQuery('#'+action_id).children(".social-delete").html("");
    jQuery('#'+action_id ).children(".social-loader").show(); 

    jQuery.ajax({
        type: 'post',
        url: adminUrl,
        data: { action: "deleteArticlesNotification", action_id:action_id, item_id:item_id },
        success:
        function(data) {
        	jQuery('#'+action_id).parent().hide();
        	jQuery('#ab-pending-notifications').html(jQuery('#ab-pending-notifications').html() - 1);
        }
     });  
}

function savePost(){
    
    jQuery('#error-box').hide();
        
    if(validateFields()){                      
        jQuery('#post-maker-container :input, #post-maker-container textarea').attr('disabled', true);                         
        jQuery('#save-waiting').show();
        
        if(jQuery("#mode").val() == "new"){
            actionName="create_post";             
        }else{                    
            actionName="update_post";            
        }

        currentPostStatus =  jQuery("#post-status").val();
        
        if( jQuery('#publish-save').is(":checked") ||
            currentPostStatus== "publish" ||
            currentPostStatus== "pending"){
            if(jQuery('#direct-workflow').val()){
                status = "publish";
            }else{
                status = "pending";
            }
        }else{
            status = "draft";
        }

                       
        postTitle = jQuery("#post_title").val();   
        postContent = jQuery("#wysihtml5-editor").val();
        postImage = jQuery("#image-name").val();
        categoryId = jQuery("#categories-ids").val();
        tagnames = jQuery("#tag-names").val();
        postId = jQuery("#post-id").val();         

        jQuery.ajax({
                type: 'post',
                url: MyAjax.ajaxurl,
                data: { action: actionName, post_title:postTitle, post_content:postContent, post_image:postImage, category_id:categoryId, tag_names:tagnames, status:status, post_id:postId},                                                
                success:
                function(response) {   
                                                                                       
                       data = jQuery.parseJSON(response);
                       if(data.status == "ok"){                                
                            jQuery("#post-maker-container").hide();
                            
                            jQuery('#view-article').click(
                             function () {       
                                 window.open(data.viewarticle, "_self");        
                             }
                            )
                            jQuery('#new-article').click(
                             function () {       
                                 window.open(data.newarticle, "_self");        
                             }
                            )
                            jQuery('#edit-article').click(
                             function () {       
                                 window.open(data.editarticle, "_self");        
                             }
                            )                      
                            jQuery("#save-message").html(data.message);
                            if(jQuery("#post-status").val() == "new-post"){
                                jQuery("#articles span").html(parseInt(jQuery("#articles span").html())+1);
                            }

                            jQuery(".post-save-options").show();
                            jQuery('html, body').animate({scrollTop:0}, 'slow');                                                                      
                       }else{
                           jQuery('#save-waiting').hide();
                           jQuery('#post-maker-container :input, #post-maker-container textarea').removeAttr('disabled');
                           showError(data.message);                          
                       }                                      
                    }                
         });             
     }else{
         jQuery('html, body').animate({scrollTop:0}, 'slow');
     }       
}

function getImageObject(urlImage){            
    return "<img id='image-container' src='"+urlImage+"'/>";            
}

function cancelImage(){      
    jQuery("#image-name").val("");          
    jQuery("#image-preview-container").html("");        
    jQuery(".edit-controls").hide();
    jQuery(".upload-controls").show();            
}

/*category stuff*/
function showCategoryList(){
    jQuery(".picker").hide();
    jQuery(".white-picker").show();
    jQuery(".category-list-container").fadeIn();
}

function showTagsList(){
    jQuery(".picker-t").hide();
    jQuery(".white-picker-t").show();
    jQuery(".tags-list-container").fadeIn();            
}

function closeTagsList(){           
    setListsElements("tags-content","tag-names", "tag-ids","tags-selector");
    jQuery(".picker-t").show();
    jQuery(".white-picker-t").hide();
    jQuery(".tags-list-container").fadeOut();                 
}

function closeCategoriesList(){
    setListsElements("categories-content","categories-names", "categories-ids","categories-selector");
    jQuery(".picker").show();
    jQuery(".white-picker").hide();
    jQuery(".category-list-container").fadeOut();
}
        
function setListsElements(content, namesContainer, idsContainer, selector){
    jQuery(function() {                
        names = "";
        ids = "";
        jQuery('.'+content +' input[type="radio"]:checked').each(function() {
            names += jQuery(this).val() + ',';                    
            ids += jQuery(this).attr('id') + ',';                   
        });

        jQuery('.'+content +' input[type="checkbox"]:checked').each(function() {
            names += jQuery(this).val() + ',';
            ids += jQuery(this).attr('id') + ',';
        });
        
        jQuery("#"+namesContainer).val(names.slice(0, -1));
        jQuery("#"+idsContainer).val(ids.slice(0, -1));
        names = names.slice(0, -1).substring(0, 25);
        if( names.length >= 25 ){
            names += "...";                
        }           
        jQuery("."+selector).html(names);
    });
}

function setCategoriesElements(){
    jQuery(function() { 
        name = "";
        id = "";
        jQuery('.category-list-container input[type="radio"]:checked').each(function() {                    
            name = jQuery(this).val();
            id = jQuery(this).attr('id');                 
        });
        
        jQuery("#categories-ids").val(id);
        jQuery(".categories-selector").html(name);
    });      
}

function hideCategoryList(){        
    jQuery(".picker").show();
    jQuery(".category-list-container").hide();
    jQuery(".white-picker").hide();         
}

jQuery('.category-list-container').hover(
     function () {
        showCategoryList()
     },
     function () {
        hideCategoryList();
     }
);

function validateFields(){
    send=true;            
    if(jQuery("#post_title").val()==""){
        send=false;
        jQuery("#post_title").addClass("error-field");                
    }     
    return send;            
}

jQuery('#post_title').focus(
	 function () {       
	     jQuery("#post_title").removeClass("error-field");           
	 }
);
 
jQuery('.categories-selector').hover(
	 function () {       
    	 jQuery(".categories-selector").removeClass("error-field");           
 	}
);

function showError(message){            
   jQuery("#error-box").html("<label>"+message+'</label>');
   jQuery("#error-box").css('display', "block");
   jQuery("#error-box").effect("highlight", {}, 3000);
}


function setImagePreview(){            
    if(jQuery("#feature-image-url").val() != ""){
        jQuery(".edit-controls").show();  
        jQuery(".upload-controls").hide();                
        jQuery("#image-preview-container").html(getImageObject(jQuery("#feature-image-url").val()));                
    }     
}

jQuery(document).ready(function() {
    if(jQuery("#mode").val()=="edit"){
        setCategoriesElements();
        setListsElements("tags-content","tag-names","tag-ids","tags-selector");
        setListsElements("categories-content","categories-names", "categories-ids", "categories-selector");
        setImagePreview();
    }    
});


function getMoreArticles(){
     jQuery("#more-articles-loader").show();   
     jQuery.ajax({
            type: 'post',
            url: MyAjax.ajaxurl,
            data: { action: "get_more_articles", offset:jQuery("#offset").val(), status:"publish"},                                                
            success:
            function(response) {    
               jQuery("#more-articles-loader").hide();
               newOffset =parseInt(jQuery("#offset").val()) + jQuery("#inicialcount").val();
               if(newOffset >= parseInt(jQuery("#postcount").val())){
                   jQuery(".more-articles-button-container").hide();                               
               }else{
                   jQuery("#offset").val(newOffset);  
               }                    
               jQuery("#more-container-publish").append(response);                       
            }
     });         
}

function showContent(current){
    
    switch(current)
    {
    case "publish":          
      jQuery("#publish-tab").addClass("current");
      jQuery("#pending-tab, #draft-tab").removeClass("current");
      jQuery(".publish-container").show();
      jQuery(".pending-container, .draft-container").hide();         
      break;
    case "pending":          
      jQuery("#pending-tab").addClass("current");
      jQuery("#publish-tab, #draft-tab").removeClass("current");
      jQuery(".pending-container").show();
      jQuery(".publish-container, .draft-container").hide();     
      break;
    case "draft":          
      jQuery("#draft-tab").addClass("current");
      jQuery("#pending-tab, #publish-tab").removeClass("current");  
      jQuery(".draft-container").show();
      jQuery(".pending-container, .publish-container").hide();     
      break;
    }       
    
    jQuery("#current-state").val(current); 
}


function deleteArticle(postId){
    jQuery("#delete-"+postId).addClass("deleting");          
	jQuery.ajax({
	            type: 'post',
	            url: MyAjax.ajaxurl,
	            data: { action: "delete_article", post_id:postId},                                                
	            success:
	            function(response) {        
	               jQuery("#articles span").html(parseInt(jQuery("#articles span").html())-1);
	               counterId = '#'+jQuery("#current-state").val() + '-count';                 
	               jQuery(counterId).html(parseInt(jQuery(counterId).html())-1);    
	               jQuery("#"+postId).hide();                                         
	                }
	             });          
} 