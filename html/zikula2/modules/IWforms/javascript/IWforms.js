function failure () {

}
function chgUsers(a){
    show_info('chgInfo');
    var b={
        gid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=chgUsers",{
        parameters: b,
        onComplete: chgUsers_response,
        onFailure: chgUsers_failure
    });
}

function chgUsers_failure(){
    show_info('chgInfo');
    $("validator").update('');
}

function chgUsers_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    show_info('chgInfo');
    $("validator").update(b.content);
}

/**
 * Show a bus while ajax process
 * called twice: 
 * #1: Show the icon
 * #2: restore normal display
 *
 *@return none;
 *@author Albert Pérez Monfort
 */
function show_info(info)
{
    if(!Element.hasClassName(info, 'z-hide')) {
        Element.update(info, '&nbsp;');
        Element.addClassName(info, 'z-hide');
    } else {
        Element.update(info, '<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
        Element.removeClassName(info, 'z-hide');
    }
}  


function modifyField(a,aa){
    if(aa == 'collapse'){
        showfieldinfo(a, expandcollapse);
    }else{
        showfieldinfo(a, modifyingfield);
    }
    var b={
        fndid:a,
        charx:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=modifyField",{
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
    changeContent(b.fndid);
}

function changeContent(a){
    var b={
        fndid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=changeContent",{
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
    $("field_"+b.fndid).update(b.content);
}

function showfieldinfo(fndid, infotext){
    if(fndid) {
        var info = 'fieldinfo_' + fndid;
        if(!Element.hasClassName(info, 'z-hide')) {
            Element.update(info, '&nbsp;');
            Element.addClassName(info, 'z-hide');
        } else {
            Element.update(info, infotext);
            Element.removeClassName(info, 'z-hide');
        }
    } else {
        $A(document.getElementsByClassName('fieldinfo')).each(function(info){
            Element.update(info, '&nbsp;');
            Element.addClassName(info, 'z-hide');
        });
    }
}

function send(){
    document.conf.submit();
}

function closeForm(a){
    var b={
        fid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=closeForm",{
        parameters: b,
        onComplete: closeForm_response,
        onFailure: failure
    });
}

function closeForm_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    alert(b.text);
    $("option_"+b.fid).update(b.content);
}

function IWforms_deleteNote(a){
    var resposta=confirm(deleteUserNote);
    if(resposta){
        var b={
            fmid:a
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=deleteNote",{
            parameters: b,
            onComplete: IWforms_deleteNote_response
        });
    }
}

function IWforms_deleteNote_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    alert(b.text);
    $("note_"+b.fmid).toggle();
    reloadFlaggedBlock();
}

function markNote(a){
    var b={
        fmid:a  
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=markNote",{
        parameters: b,
        onComplete: markNote_response,
        onFailure: failure
    });
}

function markNote_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    if(b.mark == 'marked'){
        $(b.fmid).src=Zikula.Config.baseURL+"images/icons/small/flag.png";
    }else{
        $(b.fmid).src=Zikula.Config.baseURL+"modules/IWforms/images/none.gif";
    }
    $('note_options_'+b.fmid).update(b.contentOptions);
    reloadFlaggedBlock();
}

function setCompleted(a){
    var b={
        fmid:a  
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=setCompleted",{
        parameters: b,
        onComplete: setCompleted_response,
        onFailure: failure
    });
}

function setCompleted_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('note_'+b.fmid).style.backgroundColor=b.color;
    $('note_options_'+b.fmid).update(b.contentOptions);
}

function validateNote(a){
    var b={
        fmid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=validateNote",{
        parameters: b,
        onComplete: validateNote_response,
        onFailure: failure
    });
}

function validateNote_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('note_'+b.fmid).style.backgroundColor=b.color;
    $('note_options_'+b.fmid).update(b.contentOptions);
}

function editNoteManageContent(a,aa){
    var b={
        fmid:a,
        toDo:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=editNoteManageContent",{
        parameters: b,
        onComplete: editNoteManageContent_response,
        onFailure: failure
    });
}

function editNoteManageContent_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    if(b.toDo == 'observations'){
        $('note_observations_'+b.fmid).update(b.content);
    }
    if(b.toDo == 'renote'){
        $('note_renote_'+b.fmid).update(b.content);
    }
    if(b.toDo == 'content'){
        $('note_content_'+b.fmid).update(b.content);
    }
}

function submitValue(a,aa,aaa){
    if(a == 'observations'){
        var aaaa = $('submitValueFormO_' + aa).observations.value;
    }
    if(a == 'renote'){
        var aaaa = $('submitValueFormR_' + aa).renote.value;
    }
    if(a == 'content'){
        var aaaa = $('submitValueFormC_' + aa).content.value;
    }
    var b={
        toDo:a,
        fmid:aa,
        checked:aaa,
        value:aaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=submitValue",{
        parameters: b,
        onComplete: submitValue_response,
        onFailure: failure
    });
}


function replaceChars(pattern, newstring, entry) {
    var temp = "" + entry; // temporary holder
    while (temp.indexOf(pattern)>-1) {
        var pos= temp.indexOf(pattern);
        temp = "" + (temp.substring(0, pos) + newstring +
            temp.substring((pos + pattern.length), temp.length));
    }
    return temp;
}

function submitValue_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    if(b.toDo == 'observations'){
        $('note_observations_'+b.fmid).update(b.content);
    }
    if(b.toDo == 'renote'){
        $('note_renote_'+b.fmid).update(b.content);
    }
    if(b.toDo == 'content'){
        $('note_content_'+b.fmid).update(b.content);
    }
}

function modifyForm(a,aa){
    showFormInfo(a, modifyingform);
    var b={
        fid:a,
        charx:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=modifyForm",{
        parameters: b,
        onComplete: modifyForm_response,
        onFailure: failure
    });
}

function modifyForm_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    changeFormContent(b.fid);
}

function changeFormContent(a){
    var b={
        fid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=changeFormContent",{
        parameters: b,
        onComplete: changeFormContent_response,
        onFailure: failure
    });
}

function changeFormContent_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('form_'+b.fid).update(b.content);
}

function showFormInfo(fid, infotext){
    if(fid) {
        var info = 'forminfo_' + fid;
        if(!Element.hasClassName(info, 'z-hide')) {
            Element.update(info, '&nbsp;');
            Element.addClassName(info, 'z-hide');
        } else {
            Element.update(info, infotext);
            Element.removeClassName(info, 'z-hide');
        }
    } else {
        $A(document.getElementsByClassName('forminfo')).each(function(info){
            Element.update(info, '&nbsp;');
            Element.addClassName(info, 'z-hide');
        });
    }
}

function deleteUserNote(a){
    var resposta=confirm(deleteUserNoteText);
    if(resposta){
        var b={
            fmid:a
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=deleteUserNote",{
            parameters: b,
            onComplete: deleteUserNote_response,
            onFailure: failure
        });
    }
}

function deleteUserNote_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('note_'+b.fmid).toggle();
}

function changeFilter(a,aa){
    if(aa != 0){
        Element.update('filterValues', '<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
        var b={
            fid:a,
            filter:aa
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=changeFilter",{
            parameters: b,
            onComplete: changeFilter_response,
            onFailure: failure
        });
    }else{
        sendChange(1);
    }
}

function changeFilter_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('allNotesContent').update(b.content);
    $('filterValues').update(b.filterContent);
    $('itemsPerPage').update('<div style="clear:both;"></div>');
}

function deleteForm(a){
    var response = confirm(deleteFormText);
    if (response) {
        var b={
            fid:a  
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=deleteForm",{
            parameters: b,
            onComplete: deleteForm_response,
            onFailure: failure
        });
    }
}

function deleteForm_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('formRow_' + b.fid).toggle();
}

function createField(a,aa){
    if(a == 0){
        return;
    }
    Element.update('newFormField', '<img src="' +Zikula.Config.baseURL+ 'images/ajax/circle-ball-dark-antialiased.gif">');
    var b={
        fieldType:a,
        fid:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=createField",{
        parameters: b,
        onComplete: createField_response,
        onFailure: failure
    });
}

function createField_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('newFormField').update(b.content);
}

function deleteFormField(a,aa){
    var response = confirm(deleteFormFieldText);
    if(response){
        var b = {
            fndid:a,
            fid:aa
        }
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=deleteFormField",{
            parameters: b,
            onComplete: deleteFormField_response,
            onFailure: failure
        });
    }
}

function deleteFormField_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('fieldrow_' + b.fndid).toggle();
}

function newField(a){
    var b={
        fid:a  
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=newField",{
        parameters: b,
        onComplete: newField_response,
        onFailure: failure
    });
}

function newField_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('fieldsList').update(b.content);
}

function actionToDo(a,aa){
    var b = {
        fid:a,
        action:aa
    }
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=actionToDo",{
        parameters: b,
        onComplete: actionToDo_response,
        onFailure: failure
    });
}

function actionToDo_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('dContent').update(b.content);
    $('form_minitabs').update(b.tabContent);
}

function allowCommentsControl(control) {
    var f=document.forms['formDefinition'];
    if (!f.allowComments.checked && control == 0) {
        f.allowCommentsModerated.checked = false;
    }
    if (f.allowCommentsModerated.checked && control == 1) {
        f.allowComments.checked = true;
    }
}

function expertModeActivation(a, aa) {
    var f=document.forms['formDefinition'];
    var aaa = 0;
    var aaaa = 0;
    if (f.expertMode.checked) {
        aaa = 1;
    }
    if (aa == 1) {
        if (f.skinByTemplate.checked) {
            aaaa = 1;
        }
    }
    var b = {
        fid:a,
        expertMode:aaa,
        skinByTemplate: aaaa
    };

    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWforms&func=expertModeActivation",{
        parameters: b,
        onComplete: expertModeActivation_response,
        onFailure: failure
    });
    
}

function expertModeActivation_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();

    $('expertModeContent').update(b.content);
}