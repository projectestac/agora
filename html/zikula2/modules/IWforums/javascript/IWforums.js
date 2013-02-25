function failure () {

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
    if (b.reloadFlags) {
        reloadFlaggedBlock();
    }
    if(b.m == 1){
        $(b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/marcat.gif";
        $("msgMark" + b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/marcat.gif";
        $('msgMark' + b.fmid).update(b.fmid);
    }else{
        $(b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/res.gif";
        $("msgMark" + b.fmid).src=Zikula.Config.baseURL+"modules/IWforums/images/res.gif";
        $('msgMark' + b.fmid).update(b.fmid);
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
