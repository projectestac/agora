/*
 *  $Id: news.js 75 2009-02-24 04:51:52Z mateo $ 
 */
 
var editing = false;
var draftsaved = false;

/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              news_init_check,
              false);

function news_init_check() 
{
    if ($('news_loadnews')) {
        Element.hide('news_loadnews');
    }
    // if Javascript is on remove regular links
    if ($('news_editlinks') && $('news_editlinks_ajax')) {
        Element.remove('news_editlinks');
    }
    if ($('news_editlinks_ajax')) {
        Element.removeClassName($('news_editlinks_ajax'), 'hidelink'); 
    }
    if ($('news_button_savedraft_nonajax')) {
        Element.remove('news_button_savedraft_nonajax');
    }
    if ($('news_button_savedraft_ajax')) {
        Element.removeClassName($('news_button_savedraft_ajax'), 'hidelink'); 
    }
    if ($('news_status_info')) {
        news_title_init();
    }
    if ($('news_meta_collapse')) {
        news_meta_init();
    }
    if ($('news_notes_collapse')) {
        news_notes_init();
    }
    if ($('news_expiration_details')) {
        news_expiration_init();
    }
    if ($('news_publication_collapse')) {
        news_publication_init();
    }
    if ($('news_attributes_collapse')) {
        news_attributes_init();
    }
    if ($('news_multicategory_filter')) {
        news_filter_init(); 
    } 
}


/**
 * Start the editing/updating process by calling the appropriate Ajax function
 *
 *@params sid    the story id;
 *@params page   the page id;
 *@return none;
 *@author Frank Schummertz
 */
function editnews(sid, page)
{
    if(editing==false) {
        Element.show('news_loadnews');
        var pars = 'module=News&func=modify&sid=' + sid  + '&page=' + page;
        var myAjax = new Ajax.Request(

            //XTEC ************ MODIFICAT - Fixed AJAX error with modern browsers
            //2014.01.08 @aginard
            document.pnbaseURL+'ajax.php', 
            //************ ORIGINAL
            /*
            document.location.pnbaseURL+'ajax.php', 
            */
            //************ FI
                
            {
                method: 'post', 
                parameters: pars, 
                onComplete: editnews_init
            });
    }
}

/**
 * This functions gets called when the Ajax request initiated in editnews() returns. 
 * It hides the news story and shows the modify html as defined in news_ajax_modify.htm
 *
 *@params req   response from Ajax request;
 *@return none;
 *@author Frank Schummertz
 */
function editnews_init(req) 
{
    Element.hide('news_loadnews');
    if(req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    editing = true;
    // Fill the news_modify div with rendered template news_ajax_modify.htm
    Element.update('news_modify', json.result);
    Element.hide('news_savenews');
    Element.hide('news_articlecontent');
    sizecheckinit();
    news_init_check();
    
    // Manual start of the Xinha editor
    if (typeof Xinha != "undefined" && typeof xinha_editorsarray != "undefined") {
        editors = Xinha.makeEditors(xinha_editorsarray, xinha_config, xinha_plugins);
        Xinha.startEditors(editors);
    }
    
    return;
}

/**
 * Cancel the edit process: Remove the modify html and re-enable the original story
 *
 *@params none;
 *@return none;
 *@author Frank Schummertz
 */
function editnews_cancel()
{
    Element.update('news_modify', '&nbsp;');
    Element.show('news_articlecontent');
    editing = false;
    return;
}

/**
 * Send the story information via Ajax request to the server for storing in the database
 *
 *@params none;
 *@return none;
 *@author Frank Schummertz
 */
function editnews_save(action)
{
    if (editing == true) {
        editing = false;
        Element.show('news_savenews');

        // A manual onsubmit for xinha to update the textarea data again.
        if (typeof Xinha != "undefined") {
            $('news_ajax_modifyform').onsubmit();
        }
        
        var pars = 'module=News&func=update&action='+ action +'&' + Form.serialize('news_ajax_modifyform');
        var myAjax = new Ajax.Request(

            //XTEC ************ MODIFICAT - Fixed AJAX error with modern browsers
            //2014.01.08 @aginard
            document.pnbaseURL+'ajax.php', 
            //************ ORIGINAL
            /*
            document.location.pnbaseURL+'ajax.php', 
            */
            //************ FI
                
            {
                method: 'post', 
                parameters: pars, 
                onComplete: editnews_saveresponse
            });
    }
    return;
}

/**
 * This functions gets called then the Ajax request in editnews_save() returns.
 * It removes the update html and the article html as well. The new article content
 * (the pnRendered news_user_articlecontent.htm) gets returned as part of the JSON result.
 * Depending on the action performed it *might* initiate a page reload! This is necessary
 * when the story has been deleted or set to pending state which means the sid in the url
 * is no longer valid.
 *
 *@params req   response from Ajax request;
 *@return none;
 *@author Frank Schummertz
 */
function editnews_saveresponse(req)
{
    Element.hide('news_savenews');
    editing = false;

    if(req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);

    Element.update('news_modify', '&nbsp;');
    Element.update('news_articlecontent', json.result);
    if ($('news_editlinks_ajax')) {
        Element.hide('news_loadnews');
        Element.remove('news_editlinks');
        Element.removeClassName($('news_editlinks_ajax'), 'hidelink'); 
    } 
    Element.show('news_articlecontent');
    switch(json.action) {
        case 'update':
            // reload if necessary (e.g. urltitle change)
            if (json.reloadurl != '') {
                location.replace(json.reloadurl);
            }
            break;
        case 'delete':
        case 'pending':
            // redirect to the news index
            location.replace(json.reloadurl);
            break;
        default:
    }

    return;
}


/* Taken from Dizkus edittopicsubject TOBEDONE !
function permalinkedit(topicid)
{
    if(subjectstatus == false) {
        subjectstatus = true;
        var pars = "module=Dizkus&func=edittopicsubject&topic=" + topicid;
        Ajax.Responders.register(dzk_globalhandlers);
        var myAjax = new Ajax.Request(
            document.location.pnbaseURL+"ajax.php",
            {
                method: 'post',
                parameters: pars,
                onComplete: permalinkeditinit
            });
    }
}

function permalinkeditinit(originalRequest)
{
    // show error if necessary
    if( originalRequest.status != 200 ) {
        dzk_showajaxerror(originalRequest.responseText);
        subjectstatus = false;
        return;
    }

    var result = dejsonize(originalRequest.responseText);

    var topicsubjectID = 'topicsubject_' + result.topic_id;

    Element.hide(topicsubjectID);
    updateAuthid(result.authid);

    new Insertion.After($(topicsubjectID), result.data);
}

function permalinkeditcancel(topicid)
{
    var topicsubjectID = 'topicsubject_' + topicid;

    Element.remove(topicsubjectID + '_editor');
    Element.show(topicsubjectID);
    subjectstatus = false;
}

function permalinkeditsave(topicid)
{
    var topicsubjectID = 'topicsubject_' + topicid;
    var editID = topicsubjectID + '_edit';
    var authID = topicsubjectID + '_authid';
    if($F(editID) == '') {
        // no text
        return;
    }

    var pars = "module=Dizkus&func=updatetopicsubject" +
               "&topic=" + topicid +
               "&subject=" + encodeURIComponent($F(editID)) +
               "&authid=" + $F(authID);
    Ajax.Responders.register(dzk_globalhandlers);
    var myAjax = new Ajax.Request(
                    document.location.pnbaseURL+"ajax.php",
                    {
                        method: 'post',
                        parameters: pars,
                        onComplete: permalinkeditsave_response
                    }
                    );

}

function permalinkeditsave_response(originalRequest)
{
    // show error if necessary
    if( originalRequest.status != 200 ) {
        dzk_showajaxerror(originalRequest.responseText);
        subjectstatus = false;
        return;
    }

    var result = dejsonize(originalRequest.responseText);
    var topicsubjectID = 'topicsubject_' + result.topic_id;

    Element.remove(topicsubjectID + '_editor');
    updateAuthid(result.authid);

    Element.update(topicsubjectID + '_content', result.topic_title);
    Element.show(topicsubjectID);

    subjectstatus = false;
}
*/


/**
 * Start the saving draft process by calling the appropriate Ajax function
 *
 *@return none;
 *@author Erik Spaan
 */
function savedraft()
{
    // Obtain the title and sid (if present) from the form
    var title = $F('news_title');
    if (title == "") {
        $('news_status_info').show();
        $('news_saving_draft').hide();
        $('news_status_text').update(string_emptytitle);
        Form.Element.focus('news_title');
        return;
    }
    var sid = $F('news_sid');
    if (sid) {
        // Update the current draft
        // A manual onsubmit for xinha to update the textarea data again.
        $('news_admin_newform').onsubmit();
        var pars = 'module=News&func=savedraft&title=' + title + '&sid=' + sid + '&' + Form.serialize('news_admin_newform');
    } else {
        // Create a new draft article with a new sid
        // XTEC ************** MODIFICAT - La primera vegada que es desava l'esborrany no desaba el contingut
        // 2011.01.11 @fcasanel
        $('news_admin_newform').onsubmit();
        var pars = 'module=News&func=savedraft&title=' + title + '&' + Form.serialize('news_admin_newform');
        //**************** ORIGINAL
        //var pars = 'module=News&func=savedraft&title=' + title;
        //**************** FI
    }
    $('news_status_info').show();
    $('news_saving_draft').show();
    $('news_status_text').update(string_savingdraft);
    $('news_button_text_draft').update(string_savingdraft);
    var myAjax = new Ajax.Request(
        document.location.pnbaseURL+'ajax.php', 
        {
            method: 'post', 
            parameters: pars, 
            onComplete: savedraft_update
        });
}

function savedraft_update(req) 
{
//    alert('savedraft_update: ' + req.responseText);
    if (req.status != 200 ) {
        pnshowajaxerror(req.responseText);
        return;
    }
    draftsaved = true;
    $('news_saving_draft').hide();
    $('news_button_text_draft').update(string_updatedraft);
    var json = pndejsonize(req.responseText);
    $('news_status_text').update(json.result);
    $('news_urltitle').value = json.slug;
//    $('news_sample_urltitle').update(json.fullpermalink);
//    $('news_urltitle_details').show();
//    if (json.showslugedit) {
//        $('news_sample_urltitle_edit').show();
//    }
    // make preview button "active" again
    $('news_button_preview').setStyle({color: '#565656'});
    $('news_button_preview').setOpacity(1.0);
    $('news_button_preview').disabled = false;    
    $('news_sid').value = json.sid;
//    pnsetselectoption('news_published_status',4);
//    $('news_published_status').selectedIndex = 4;
    return;
}


/**
 * Admin panel functions
 * Functions to enable watching for changes in  the optional divs and show and hide these divs 
 * with the switchdisplaystate funtion of javascript/ajax/pnajax.js. This function uses BlindDown and BlindUp
 * when scriptaculous Effects is loaded and otherwise show and hide of prototype.
 */
function news_title_init()
{
//    Event.observe('news_title', 'change', savedraft);
//    $('news_urltitle_details').hide();
    $('news_status_info').hide();
    // dim the preview button until a draft is saved
    $('news_button_preview').setStyle({color: '#aaa'});
    $('news_button_preview').setOpacity(0.7);
    $('news_button_preview').disabled = true;
  
    // not the correct location but for reference later on:
    //new PeriodicalExecuter(savedraft, 30);
}

function news_filter_init()
{
    Event.observe('news_property', 'change', news_property_onchange);
    news_property_onchange();
    $('news_multicategory_filter').show();
}

function news_property_onchange()
{
    $$('div#news_category_selectors select').each(function(select){
        select.hide();
    });
    var id = "news_"+$('news_property').value+"_category";
    $(id).show();
}


function news_expiration_init()
{
    if ($('news_tonolimit').checked == true) 
        $('news_expiration_date').hide();
    if ($('news_unlimited').checked == true) {
        $('news_expiration_details').hide();
    } else if ($('news_button_text_publish')) {
        $('news_button_text_publish').update(string_schedule);
    }
    Event.observe('news_unlimited', 'change', news_unlimited_onchange);
    Event.observe('news_tonolimit', 'change', news_tonolimit_onchange);
}

function news_unlimited_onchange()
{
    switchdisplaystate('news_expiration_details');
    if ($('news_button_text_publish') && $('news_expiration_details').style.display != "none") {
        $('news_button_text_publish').update(string_publish);
    } else {
        $('news_button_text_publish').update(string_schedule);
    }
}

function news_tonolimit_onchange()
{
    switchdisplaystate('news_expiration_date');
}


function news_publication_init()
{
    Event.observe('news_publication_collapse', 'click', news_publication_click);
    $('news_publication_collapse').addClassName('z-toggle-link');
    // show the publication details when a variable is not set to default
    if ($('news_unlimited').checked == true && $('news_hideonindex').checked == true && $('news_disallowcomments').checked == true) {
//        $('news_publication_details').parentNode.addClassName('z-collapsed');
        $('news_publication_collapse').removeClassName('z-toggle-link-open');
        $('news_publication_showhide').update(string_show);
        $('news_publication_details').hide();
    } else {
        $('news_publication_collapse').addClassName('z-toggle-link-open');
//        $('news_publication_details').parentNode.removeClassName('z-collapsed');
        $('news_publication_showhide').update(string_hide);
    }
    if ($('news_button_text_publish') && $('news_unlimited').checked == false) {
        $('news_button_text_publish').update(string_schedule);
    }
}

function news_publication_click()
{
    if ($('news_publication_details').style.display != "none") {
//        Element.addClassName.delay(0.9, $('news_publication_details').parentNode, 'z-collapsed');
        Element.removeClassName.delay(0.9, $('news_publication_collapse'), 'z-toggle-link-open');
        $('news_publication_showhide').update(string_show);
    } else {
//        Element.removeClassName($('news_publication_details').parentNode, 'z-collapsed');
        $('news_publication_collapse').addClassName('z-toggle-link-open');
        $('news_publication_showhide').update(string_hide);
    }
    switchdisplaystate('news_publication_details');
}


function news_attributes_init()
{
    Event.observe('news_attributes_collapse', 'click', news_attributes_click);
    $('news_attributes_collapse').addClassName('z-toggle-link');
    // show attributes when there are any
    if ($('listitem_news_attributes_1')) {
        $('news_attributes_collapse').addClassName('z-toggle-link-open');
        $('news_attributes_showhide').update(string_hide);
    } else {
        $('news_attributes_collapse').removeClassName('z-toggle-link-open');
        $('news_attributes_showhide').update(string_show);
        $('news_attributes_details').hide();
    }
}

function news_attributes_click()
{
    if ($('news_attributes_details').style.display != "none") {
//        Element.addClassName.delay(0.9, $('news_attributes_details').parentNode, 'z-collapsed');
        Element.removeClassName.delay(0.9, $('news_attributes_collapse'), 'z-toggle-link-open');
        $('news_attributes_showhide').update(string_show);
    } else {
//        Element.removeClassName($('news_attributes_details').parentNode, 'z-collapsed');
        $('news_attributes_collapse').addClassName('z-toggle-link-open');
        $('news_attributes_showhide').update(string_hide);
    }
    switchdisplaystate('news_attributes_details');
}


function news_notes_init()
{
    Event.observe('news_notes_collapse', 'click', news_notes_click);
    $('news_notes_collapse').addClassName('z-toggle-link');
    if ($('news_notes_details').style.display != "none") {
        $('news_notes_collapse').removeClassName('z-toggle-link-open');
        $('news_notes_showhide').update(string_show);
        $('news_notes_details').hide();
    }
}

function news_notes_click()
{
    if ($('news_notes_details').style.display != "none") {
        Element.removeClassName.delay(0.9, $('news_notes_collapse'), 'z-toggle-link-open');
        $('news_notes_showhide').update(string_show);
    } else {
        $('news_notes_collapse').addClassName('z-toggle-link-open');
        $('news_notes_showhide').update(string_hide);
    }
    switchdisplaystate('news_notes_details');
}


function news_meta_init()
{
    Event.observe('news_meta_collapse', 'click', news_meta_click);
    $('news_meta_collapse').addClassName('z-toggle-link');
    if ($('news_meta_details').style.display != "none") {
        $('news_meta_collapse').removeClassName('z-toggle-link-open');
        $('news_meta_details').hide();
    }
}

function news_meta_click()
{
    if ($('news_meta_details').style.display != "none") {
//        Element.addClassName.delay(0.9, $('news_meta_details').parentNode, 'z-collapsed');
        Element.removeClassName.delay(0.9, $('news_meta_collapse'), 'z-toggle-link-open');
    } else {
//        Element.removeClassName($('news_meta_details').parentNode, 'z-collapsed');
        $('news_meta_collapse').addClassName('z-toggle-link-open');
    }
    switchdisplaystate('news_meta_details');
}