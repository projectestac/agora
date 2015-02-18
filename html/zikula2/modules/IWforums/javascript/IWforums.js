function failure () {

}

function create_msg(){
    //alert(document.getElementById('intraweb').value);
    if (document.getElementById('intraweb').value == '') {
        jQuery('#intraweb').focus();
    }
}

function enableTopicListSort(){
    if (jQuery( "#EnDisSort" ).hasClass( "disabled" )) {
        jQuery('.handle').removeClass('hide');
        jQuery('#EnDisSort').removeClass('disabled'); 
        jQuery('#divEDSort').attr('data-original-title',Zikula.__('Disable topics list reorder','module_iwforums_js'));    
    } else {
        jQuery('.handle').addClass('hide');
        jQuery('#EnDisSort').addClass('disabled'); 
        jQuery('#divEDSort').attr('data-original-title',Zikula.__('Enable topics list reorder','module_iwforums_js'));
    }
}

// Delete selected topic and its messages
function deleteTopic(){
    var fid = jQuery('#fid').val();
    var ftid = jQuery('#ftid').val();

    var p = {
        fid : fid,
        ftid: ftid,
        deleteTopic: true
    }    
    if (typeof(fid) != 'undefined')
    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=reorderTopics", {
        parameters: p,
        onComplete: deleteTopic_reponse,
        onFailure: failure
    });
}

function deleteTopic_reponse(req) {
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    
    var b = req.getData();
    $('topicsList').update(b.content);
}

function reorderTopics(fid, ftid){
    var tList = jQuery("#topicsTableBody").sortable("serialize");

    var p = {
        fid : fid,
        ftid : ftid,
        ordre : tList
    }    
    
    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=reorderTopics", {
        parameters: p,
        onComplete: reorderTopics_reponse,
        onFailure: failure
    });
}

function reorderTopics_reponse(req){
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    
    var b = req.getData();
    $('topicsList').update(b.content);
    
    jQuery('#divEDSort').attr('title',Zikula.__('Disable topics list reorder','module_iwforums_js'));    
    enableTopicListSort();  
}
/*
 * Deleta message attached file
 * @returns {}
 */
function delAttachment(){
    var p = {
        fid : document.new_msg["fid"].value,
        fmid : document.new_msg["fmid"].value
    }    
    
    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=delAttachment", {
        parameters: p,
        onComplete: delAttachment_reponse,
        onFailure: failure
    });
}
    
function delAttachment_reponse(req){
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
        
    var b = req.getData();
    $('attachment').update(b.content); 
    // Reload filestyle 
    jQuery(":file").filestyle({
        buttonText  : b.btnMsg ,
        buttonBefore: true,
        iconName    : "glyphicon-paperclip"
    });
    jQuery(":file").filestyle('clear');    
}    
    
/*
 * Apply introduction forum changes
 * @returns {}
 */
function updateForumIntro(){
    var fid          = document.feditform["fid"].value;
    var nom_forum    = document.feditform["titol"].value;
    var descriu      = document.feditform["descriu"].value;
    var longDescriu  = document.feditform["lDesc"].value;
    var observacions = document.feditform["observacions"].value;
    var topicsPage   = document.feditform["topicsPage"].value;
    
    /*if (typeof tinyMCE != "undefined") {
         tinyMCE.execCommand('mceRemoveEditor', true, 'lDesc');
    }
    */
    //Scribite.destroyEditor('lDesc');
    var p = {
        fid         : fid,
        nom_forum   : nom_forum,
        descriu     : descriu,
        longDescriu : longDescriu,
        topicsPage  : topicsPage,
        observacions: observacions
    };
    
    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=setForum", {
        parameters: p,
        onComplete: updateForumIntro_reponse,
        onFailure: failure
    });
}

function updateForumIntro_reponse(req){
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    
    var b = req.getData();
    $('forumDescription').update(b.content);   
    jQuery("#btnNewTopic").toggle();   
    if (b.moduleSc){
        if (b.moduleSc == 'new') Scribite.createEditors();
        if (b.moduleSc == 'old') document.location.reload(true);
    }
    /*if (typeof tinyMCE != "undefined") {
        tinyMCE.execCommand('mceAddEditor', true, 'lDesc');
    }
    */
}

// Get selected image icon in edit, create and reply message forms
function selectedIcon(){
    var file= jQuery("#iconset input[type='radio']:checked").val();
    if (file != "") {
        var src = document.getElementById(file).src;
        jQuery('#currentIcon').attr("src", src);
        jQuery('#currentIcon').show();
    } else {
        jQuery('#currentIcon').hide();
    }
}

function checkName(){
    if (jQuery('#titol').val().length < 1) {
        jQuery('#btnSend').hide();
        jQuery('#inputName').addClass('has-error');
    } else {
        jQuery('#btnSend').show();
        jQuery('#inputName').removeClass('has-error');
        jQuery('#titol').focus();
    }
}

// Show/hide forum information edition form
function showEditForumForm(){       
    jQuery("#forumIntroduction").toggle();
    jQuery("#forumEdition").toggle();
    jQuery("#btnNewTopic").toggle();
}

function getTopic(fid, ftid){
     var p = {
         fid : fid,
         ftid: ftid
    };

    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=getTopic", {
        parameters: p,
        onComplete: getTopic_response,
        onFailure: failure
    });
}

function getTopic_response(req){
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    
    var b = req.getData();
    $('row_'+b.id).update(b.content);    
}

function editTopic(fid, ftid){
     var p = {
         fid : fid,
         ftid: ftid
    };

    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=editTopic", {
        parameters: p,
        onComplete: editTopic_response,
        onFailure: failure
    });
}

function editTopic_response(req)
{    
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    
    var b = req.getData();
    $('row_'+b.id).update(b.content);    
}

// Save topic with new values 
function setTopic(){
    var fid     = document.feditTopic["fid"].value;
    var ftid    = document.feditTopic["ftid"].value;
    var titol   = document.feditTopic["titol"].value;
    var descriu = document.feditTopic["descriu"].value;

     var p = {
         fid : fid,
         ftid: ftid,
         titol: titol,
         descriu: descriu
    };

    new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWforums&func=setTopic", {
        parameters: p,
        onComplete: setTopic_response,
        onFailure: failure
    });
}

function setTopic_response(req){
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    
    var b = req.getData();
    $('row_'+b.id).update(b.content);  
    // Show or hide sortable list
    if (jQuery( "#EnDisSort" ).hasClass( "disabled" )) {
        jQuery('.handle').addClass('hide');
    } else {
        jQuery('.handle').removeClass('hide');
    }
}

function chgUsers(a){
    show_info();
    var b={
        gid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=chgUsers",{
        parameters: b,
        onComplete: chgUsers_response,
        onFailure: chgUsers_failure
    });
}

function chgUsers_failure(){
    show_info();
    $("uid").update('');
}

function chgUsers_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    show_info();
    $("uid").update(b.content);
}

function show_info()
{
    var info = '';

    if(!Element.hasClassName(info, 'z-hide')) {
	$("chgInfo").update('&nbsp;');
        Element.addClassName("chgInfo", 'z-hide');
    } else {
        $("chgInfo").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
        Element.removeClassName("chgInfo", 'z-hide');
    }
}

function modifyField(a,aa){
    showfieldinfo(a, modifyingfield);
    var b={
        fid:a,
        character:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=modifyForum",{
        parameters: b,
        onComplete: modifyField_response,
        onFailure: failure
    });
}

function modifyField_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    changeContent(b.fid);
}

function showfieldinfo(fndid, infotext){
    if(fndid) {
        if(!Element.hasClassName('foruminfo_' + fndid, 'z-hide')) {
            $('foruminfo_' + fndid).update('&nbsp;');
            Element.addClassName('foruminfo_' + fndid, 'z-hide');
        } else {
            $('foruminfo_' + fndid).update(infotext);
            Element.removeClassName('foruminfo_' + fndid, 'z-hide');
        }
    }
}

function changeContent(a){
    var b={
        fid:a
    };

    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=changeContent",{
        parameters: b,
        onComplete: changeContent_response,
        onFailure: failure
    });
}

function changeContent_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('forumChars_' + b.fid).update(b.content);
}

// Check or uncheck forum message
function of_mark(fid,msgId){
    var b={
        fid:fid,
        fmid:msgId
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=mark",{
        parameters: b,
        onComplete: of_mark_response,
        onFailure: failure
    });
    
}

function of_mark_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    var icon = '<span data-toggle="tooltip" class="glyphicon glyphicon-flag" title="'+b.ofMarkText+'"></span>'; 
    if(b.m == 1){
        Element.removeClassName(b.fmid, 'disabled');
        //Element.writeAttribute(b.fmid,'title',b.ofMarkText);
    }else{
        Element.addClassName(b.fmid, 'disabled');
        //Element.writeAttribute(b.fmid,'title',b.ofMarkText);
    }
    $(b.fmid).update(icon);    
    if (b.reloadFlags) {
        reloadFlaggedBlock();
    }
}
function mark(a,aa){
    var b={
        fid:a,
        fmid:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=mark",{
        parameters: b,
        onComplete: mark_response,
        onFailure: failure
    });
}

function mark_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    if(b.m == 1){
        $(b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/marcat.gif";
        $("msgMark" + b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/marcat.gif";
        $('msgMark' + b.fmid).update(b.fmid);
    }else{
        $(b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/res.gif";
        $("msgMark" + b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/res.gif";
        $('msgMark' + b.fmid).update(b.fmid);
    }
    if (b.reloadFlags) {
        reloadFlaggedBlock();
    }
}

function deleteGroup(a,aa){
    var response = confirm(deleteConfirmation);
    if(response){
        $('groupId_' + a + '_' + aa).update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
        var b={
            gid:a,
            fid:aa
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=deleteGroup",{
            parameters: b,
            onComplete: deleteGroup_response,
            onFailure: failure
        });
    }
}


function deleteGroup_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('groupId_' + b.gid + '_' + b.fid).toggle()
}

function deleteModerator(a,aa){
    var response = confirm(deleteModConfirmation);
    if(response){
        var b={
            fid:a,
            id:aa
        };
        $('mod_' + a + '_' + aa).update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=deleteModerator",{
            parameters: b,
            onComplete: deleteModerador_response,
            onFailure: failure
        });
    }
}

function deleteModerador_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('mod_' + b.fid + '_' +b.id).toggle()
}

function openMsg(a,aa,aaa,aaaa,aaaaa,aaaaaa){
    $('openMsgIcon_' + a).src=Zikula.Config.baseURL+"images/ajax/circle-ball-dark-antialiased.gif";
    var b={
        fmid:a,
        fid:aa,
        ftid:aaa,
        u:aaaa,
        oid:aaaaa,
        inici:aaaaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforums&func=openMsg",{
        parameters: b,
        onComplete: openMsg_response,
        onFailure: failure
    });
}

function openMsg_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('openMsgRow_' + b.fmid).update(b.content);
    $('openMsgIcon_' + b.fmid).toggle();
    $('msgImage_' + b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/msg.gif";
}

function closeMsg(fmid){
    $('openMsgRow_' + fmid).update('');
    $('openMsgIcon_' + fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/msgopen.gif";
    $('openMsgIcon_' + fmid).toggle();
}
