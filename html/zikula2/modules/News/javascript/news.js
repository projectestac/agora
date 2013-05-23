var editing = false;
var draftsaved = false;

/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 'load', news_init_check);

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
    if ($('news_button_text_draft')) {
        news_isdraft();
    }
    // activate the title field for a new article
    if ($('news_title') && $F('news_title') == '') {
        $('news_title').focus();
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
        var pars = {
            sid: sid,
            page: page
        }
        new Zikula.Ajax.Request(
            "ajax.php?module=News&func=modify",
            {
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
    if(!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    var data = req.getData();
    editing = true;
    // Fill the news_modify div with rendered template news_ajax_modify.htm
    Element.update('news_modify', data.result);
    Element.hide('news_savenews');
    Element.hide('news_articlecontent');
    sizecheckinit();
    news_init_check();
    
    // Manual start of the Xinha editor
    if (typeof Xinha != "undefined" && typeof xinha_editorsarray != "undefined") {
        editors = Xinha.makeEditors(xinha_editorsarray, xinha_config, xinha_plugins);
        Xinha.startEditors(editors);
    }

    // enable attribute UI
    var list_newsattributes = null;
    list_newsattributes = new Zikula.itemlist('newsattributes', {headerpresent: true, firstidiszero: true});
    $('appendattribute').observe('click',function(event){
        list_newsattributes.appenditem();
        event.stop();
    });

    // add warning to page about file ops
    $('label_for_news_files_element').insert({
        before: "<p class='z-warningmsg'>"+Zikula.__("Picture/file operations not supported in 'Quick edit' mode. You must click the 'Save full edit' button to complete these operations.")+"</div>"
    });

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
        var pars = $('news_ajax_modifyform').serialize(true);
        pars.action = action;
        new Zikula.Ajax.Request(
            'ajax.php?module=News&func=update',
            {
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

    if(!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    var data = req.getData();

    Element.update('news_modify', '&nbsp;');
    Element.update('news_articlecontent', data.result);
    if ($('news_editlinks_ajax')) {
        Element.hide('news_loadnews');
        Element.remove('news_editlinks');
        Element.removeClassName($('news_editlinks_ajax'), 'hidelink'); 
    } 
    Element.show('news_articlecontent');
    switch(data.action) {
        case 'update':
            // reload if necessary (e.g. urltitle change)
            if (data.reloadurl != '') {
                location.replace(data.reloadurl);
            }
            break;
        case 'delete':
        case 'pending':
            // redirect to the news index
            location.replace(data.reloadurl);
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
    // Re-fill the original textareas if Scribite Xinha is used, manual onsubmit needed
    if (typeof Xinha != "undefined") {
        $('news_user_newform').onsubmit();
    }
    var pars = $('news_user_newform').serialize(true);

    $('news_status_info').show();
    $('news_saving_draft').show();
    $('news_status_text').update(Zikula.__('Saving quick draft...','module_News'));
    $('news_button_text_draft').update(Zikula.__('Saving quick draft...','module_News'));
    new Zikula.Ajax.Request(
        'ajax.php?module=news&func=savedraft',
        {
            parameters: pars, 
            onComplete: savedraft_update
        });
}

function savedraft_update(req)
{
    $('news_saving_draft').hide();
    if(!req.isSuccess()) {
        $('news_button_text_draft').update(Zikula.__('Save quick draft','module_News'));
        $('news_status_text').update(Zikula.__('Save quick draft failed','module_News'));
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    var data = req.getData();

    draftsaved = true;
    $('news_button_text_draft').update(Zikula.__('Update quick draft','module_News'));
    $('news_status_text').update(data.result);
    $('news_urltitle').value = data.slug;
    $('news_sid').value = data.sid;

    // add warning to page about file ops
    showfilesaddedwarning();

    return;
}

function showfilesaddedwarning()
{
    var filecount=$$('.negative').size();
    if (filecount>0) {
        $('news_button_fulldraft').addClassName('z-btgreen');
        $('news_picture_warning').show();
        $('news_picture_warning_text').update(Zikula.__("Picture/file operations not supported in 'Quick draft' mode. You must click the 'Save full draft' button to complete these operations.",'module_News'));
    }
}

function news_isdraft()
{
    var sid = $F('news_sid');
    if (sid != '') {
        draftsaved = true;
        $('news_button_text_draft').update(Zikula.__('Update quick draft','module_News'));
    }
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
    $('news_picture_warning').hide();
  
    // not the correct location but for reference later on:
    //new PeriodicalExecuter(savedraft, 30);
}

function news_expiration_init()
{
    if ($('news_tonolimit').checked == true) 
        $('news_expiration_date').hide();
    if ($('news_unlimited').checked == true) {
        $('news_expiration_details').hide();
    } else if ($('news_button_text_publish')) {
        $('news_button_text_publish').update(Zikula.__('Schedule','module_News'));
    }
    $('news_unlimited').observe('click', news_unlimited_onchange);
    $('news_tonolimit').observe('click', news_tonolimit_onchange);
}

function news_unlimited_onchange()
{
    switchdisplaystate('news_expiration_details');
    if ($('news_button_text_publish') && $('news_expiration_details').style.display != "none") {
        $('news_button_text_publish').update(Zikula.__('Publish','module_News'));
    } else {
        $('news_button_text_publish').update(Zikula.__('Schedule','module_News'));
    }
}

function news_tonolimit_onchange()
{
    switchdisplaystate('news_expiration_date');
}


function news_publication_init()
{
    $('news_publication_collapse').observe('click', news_publication_click);
    $('news_publication_collapse').addClassName('z-toggle-link');
    // show the publication details when a variable is not set to default
    if ($('news_unlimited').checked == true && $('news_displayonindex').checked == true && $('news_allowcomments').checked == true) {
        $('news_publication_collapse').removeClassName('z-toggle-link-open');
        $('news_publication_showhide').update(Zikula.__('Show','module_News'));
        $('news_publication_details').hide();
    } else {
        $('news_publication_collapse').addClassName('z-toggle-link-open');
        $('news_publication_showhide').update(Zikula.__('Hide','module_News'));
    }
    if ($('news_button_text_publish') && $('news_unlimited').checked == false) {
        $('news_button_text_publish').update(Zikula.__('Schedule','module_News'));
    }
}

function news_publication_click()
{
    if ($('news_publication_details').style.display != "none") {
        Element.removeClassName.delay(0.9, $('news_publication_collapse'), 'z-toggle-link-open');
        $('news_publication_showhide').update(Zikula.__('Show','module_News'));
    } else {
        $('news_publication_collapse').addClassName('z-toggle-link-open');
        $('news_publication_showhide').update(Zikula.__('Hide','module_News'));
    }
    switchdisplaystate('news_publication_details');
}


function news_attributes_init()
{
    $('news_attributes_collapse').observe('click', news_attributes_click);
    $('news_attributes_collapse').addClassName('z-toggle-link');
    // show attributes if they already exist
    if ($F('attributecount') > 0) {
        $('news_attributes_collapse').addClassName('z-toggle-link-open');
        $('news_attributes_showhide').update(Zikula.__('Hide','module_News'));
    } else {
        $('news_attributes_collapse').removeClassName('z-toggle-link-open');
        $('news_attributes_showhide').update(Zikula.__('Show','module_News'));
        $('news_attributes_details').hide();
    }
}

function news_attributes_click()
{
    if ($('news_attributes_details').style.display != "none") {
        Element.removeClassName.delay(0.9, $('news_attributes_collapse'), 'z-toggle-link-open');
        $('news_attributes_showhide').update(Zikula.__('Show','module_News'));
    } else {
        $('news_attributes_collapse').addClassName('z-toggle-link-open');
        $('news_attributes_showhide').update(Zikula.__('Hide','module_News'));
    }
    switchdisplaystate('news_attributes_details');
}

function news_notes_init()
{
    $('news_notes_collapse').observe('click', news_notes_click);
    $('news_notes_collapse').addClassName('z-toggle-link');
    if ($('news_notes_details').style.display != "none") {
        $('news_notes_collapse').removeClassName('z-toggle-link-open');
        $('news_notes_showhide').update(Zikula.__('Show','module_News'));
        $('news_notes_details').hide();
    }
}

function news_notes_click()
{
    if ($('news_notes_details').style.display != "none") {
        Element.removeClassName.delay(0.9, $('news_notes_collapse'), 'z-toggle-link-open');
        $('news_notes_showhide').update(Zikula.__('Show','module_News'));
    } else {
        $('news_notes_collapse').addClassName('z-toggle-link-open');
        $('news_notes_showhide').update(Zikula.__('Hide','module_News'));
    }
    switchdisplaystate('news_notes_details');
}


function news_meta_init()
{
    $('news_meta_collapse').observe('click', news_meta_click);
    $('news_meta_collapse').addClassName('z-toggle-link');
    if ($('news_meta_details').style.display != "none") {
        $('news_meta_collapse').removeClassName('z-toggle-link-open');
        $('news_meta_details').hide();
    }
}

function news_meta_click()
{
    if ($('news_meta_details').style.display != "none") {
        Element.removeClassName.delay(0.9, $('news_meta_collapse'), 'z-toggle-link-open');
    } else {
        $('news_meta_collapse').addClassName('z-toggle-link-open');
    }
    switchdisplaystate('news_meta_details');
}

function executeuserselectform(data)
{
    if(data) {
        var pars = {
            uid: data.userselector,
            sid: $F('news_sid'),
            dest: data.destination
        }
        new Zikula.Ajax.Request(
            "ajax.php?module=News&func=updateauthor",
            {
                parameters: pars,
                onComplete: executeuserselectform_response
            });
    }
}

function executeuserselectform_response(req)
{
    if (!req.isSuccess()) {
        showinfo();
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    var data = req.getData();
    if (data) {
        $('news_cr_uid_edit').hide();
        $('news_cr_uid').setValue(data.uid);
        $('news_contributor').update(data.cont); // not a form element
        $('news_cr_uid_edit').insert({after: ' ' + Zikula.__('Author updated')}).insert({after: new Element('img', {src: 'images/icons/extrasmall/button_ok.png'})});
        if (data.dest == 'list') {
            $('news_user_modifyform').insert({bottom: new Element('input', {type: 'hidden', name: 'story[action]', value: '2'})});
            $('news_user_modifyform').submit();
        }
    }
}