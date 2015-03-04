function send(value){
    var error=false;
    f=document.usersListOptions;
    switch(value){
        case 0:
            f.action="index.php?module=IWusers&type=admin&func=edit";
            break;
        case 1:
            f.action="index.php?module=IWusers&type=admin&func=deleteUsers";
            break;
        case 2:
            f.action="index.php?module=IWusers&type=admin&func=editLogin";
            break;
    }
    f.submit();
}

function doIt(id, action){
    //Simula la selecció de l'usuari en el formulari 
    //per després cridar a la funció que fa el submit
    jQuery('input:checkbox').removeAttr('checked');
    document.getElementById("cb"+id).checked = true;
    send(action);
}


function orderGroupInfo(orderBy){
    var pars = {
        orderBy: orderBy
    }
    //$('groupInfo').update('<img src="images/ajax/indicator.white.gif" /> ');
    var myAjax = new Zikula.Ajax.Request(Zikula.Config.baseURL + "ajax.php?module=IWusers&func=orderGroupInfo", {
        parameters: pars, 
        onComplete: orderGroupInfo_response,
        onFailure: addContact_failure
    });
}

function orderGroupInfo_response(req){
    if (!req.isSuccess()) {
        Zikula.showajaxerror(req.getMessage());
        return;
    }
    var b = req.getData();
    $('groupInfo').update(b.content);
}

function addContact(fuid, gid){
    var pars = "module=IWusers&func=addContact&gid=" + gid + "&fuid=" + fuid + "&action=add";
    $('img_' + fuid).src="images/ajax/circle-ball-dark-antialiased.gif";
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: addContact_response,
        onFailure: addContact_failure
    });
}

function addContact_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update(json.fuid, json.content).innerHTML;
}

function addContact_failure(){

}

function delContact(fuid, gid){
    var pars = "module=IWusers&func=addContact&gid=" + gid + "&fuid=" + fuid + "&action=delete";
    $('img_' + fuid).src="images/ajax/circle-ball-dark-antialiased.gif";
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: delContact_response,
        onFailure: delContact_failure
    });
}

function delContact_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    if(json.gid != '-1'){
        Element.update(json.fuid, json.content).innerHTML;
    }else{
        $('row_' + json.fuid).toggle();
    }
}

function delContact_failure(){

}

function sendConfig(){
    var f=document.config;
    f.submit();
}

function delUserGroup(uid, gid){
    var pars = "module=IWusers&func=delUserGroup&uid=" + uid + "&gid=" + gid;
    $('iconGroup_' + uid + '_' + gid).src="images/ajax/circle-ball-dark-antialiased.gif";
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: delUserGroup_response,
        onFailure: delUserGroup_failure
    });
}

function delUserGroup_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    $('userGroup_' + json.uid + '_' + json.gid).toggle();
}

function delUserGroup_failure(){

}

function addUserGroup(uid, gid){
    var pars = "module=IWusers&func=addUserGroup&uid=" + uid;
    Element.update('addGroup_' + uid, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: addUserGroup_response,
        onFailure: addUserGroup_failure
    });
}

function addUserGroup_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('addGroup_' + json.uid, json.content);
}

function addUserGroup_failure(){

}

function addGroupProceed(uid, gid){
    var pars = "module=IWusers&func=addGroupProceed&uid=" + uid + "&gid=" + gid;
    Element.update('addGroup_' + uid, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: addGroupProceed_response,
        onFailure: addGroupProceed_failure
    });
}

function addGroupProceed_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('userGroupsList_' + json.uid, json.content);
    Element.update('addGroup_' + json.uid, json.content1);
//addGroupModifyRow(json.uid);
}

function addGroupProceed_failure(){

}

function change(uid,text,toDo){
    resposta=confirm(text);
    if (resposta) {
        if(toDo == 'ch'){
            //show_info(chid, changingAvatar);
            var pars = "module=IWusers&func=change&uid=" + uid + "&toDo=ch";
        }else{
            //show_info(chid, deletingAvatar);
            var pars = "module=IWusers&func=change&uid=" + uid + "&toDo=del";
        }
        var myAjax = new Ajax.Request("ajax.php", {
            method: 'get',
            parameters: pars,
            onComplete: change_response,
            onFailure: change_failure
        });
    }
}

function change_response(req){
    if (req.status != 200 ) {
        pnshowajaxerror(req.responseText);
        return;
    }

    var json = pndejsonize(req.responseText);
    if(json.error == ''){
        $('change_' + json.chid).toggle();
    }else{
        alert(json.error);
    }
}

function change_failure(req){

}

function deleteUsr(usrId, usrname, msg){ //,uname
    var r = confirm(msg+": Id: "+usrId+" // uname: "+usrname);
    if (r == true) {
        // Esborra
        window.location.href = Zikula.Config.entrypoint + "?module=IWusers&type=admin&func=deleteUsers&uid=" +usrId;

    }
}
