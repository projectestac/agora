function failure(){
}

function modifyField(a, aa) {
    showfieldinfo(a, modifyingfield);
    var b={
        daid:a,
        charx:aa
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=modifyAgenda",{
        parameters: b,
        onComplete: modifyField_response,
        onFailure: failure
    });
}

function modifyField_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    changeContent(b.daid);
}

function modifyColor(a,aa) {
    var b={
        daid:a,
        color:aa
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=modifyColor",{
        parameters: b,
        onComplete: modifyColor_response,
        onFailure: failure
    });
}

function modifyColor_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
}

function showfieldinfo(fndid, infotext) {
    if (fndid) {
        var info = 'agendainfo_' + fndid;
        if (!Element.hasClassName(info, 'z-hide')) {
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

function changeContent(a) {
    var b={
        daid:a
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=changeContent",{
        parameters: b,
        onComplete: changeContent_response,
        onFailure: failure
    });
}

function changeContent_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("agendaChars_" + b.daid).update(b.content);
}

function chgUsers(a) {
    var b={
        gid:a
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=chgUsers",{
        parameters: b,
        onComplete: chgUsers_response,
        onFailure: chgUsers_failure
    });
}

function chgUsers_failure() {
    show_info();
    $("uid").update('');
}

function chgUsers_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('uid').update(b.content);
    
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
function show_info() {
    var info = 'chgInfo';
    if(!Element.hasClassName(info, 'z-hide')) {
        $("info").update('&nbsp;');
        Element.addClassName(info, 'z-hide');
    } else {
        $("info").update('<img src="images/ajax/circle-ball-dark-antialiased.gif">');
        Element.removeClassName(info, 'z-hide');
    }
}  

function deleteNote(a,aa) {
    var resposta=confirm(confirmDeletion);
    if (resposta){
        var b={
            aid:a,
            daid:aa
        };    
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=deleteNote",{
            parameters: b,
            onComplete: deleteNote_response,
            onFailure: failure
        });
    }
}

function deleteNote_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("note_" + b.aid).toggle();
    
}

function protectNote(a,aa) {
    var b={
        aid:a,
        daid:aa
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=protectNote",{
        parameters: b,
        onComplete: protectNote_response,
        onFailure: failure
    });
}

function protectNote_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();

    if (b.protecteda == 1) {
        $('protectedIcon_'+b.aid).src=Zikula.Config.baseURL+"modules/IWagendas/images/nocandau.gif";
    } else {
        $('protectedIcon_'+b.aid).src=Zikula.Config.baseURL+"modules/IWagendas/images/candau.gif";
    }
    $('protectedIcon_'+b.aid).alt=b.alt;
    $('aprotectedIcon_'+b.aid).title=b.alt;
}

function completeNote(a,aa) {
    var b={
        aid:a,
        daid:aa
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=completeNote",{
        parameters: b,
        onComplete: completeNote_response,
        onFailure: failure
    });
}

function completeNote_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    var icon;
    if (b.completed == 1) {
        if (b.daid == 0){
            icon = 'ncompleta.gif';
        } else {
            icon = 'mostra.gif';
        }
    } else {
        if (b.daid == 0) {
            icon = 'completa.gif';
        } else {
            icon = 'amaga.gif';
        }
    }
    $('completedIcon_'+b.aid).src=Zikula.Config.baseURL+"modules/IWagendas/images/" + icon;
    $('completedIcon_'+b.aid).alt=b.alt;
    $('acompletedIcon_'+b.aid).title=b.alt;
    $('noteText_'+b.aid).style.background=b.bgcolor;
}

function changeMonth(a,aa,aaa) {
    var b={
        mes:a,
        any:aa,
        daid:aaa
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=changeMonth",{
        parameters: b,
        onComplete: changeMonth_response,
        onFailure: failure
    });
}

function changeMonth_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("userCalendarContainer").update(b.content);
}

function subs(a,aa,aaa) {
    var b={
        mes:a,
        any:aa,
        daidSubs:aaa
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=subs",{
        parameters: b,
        onComplete: subs_response,
        onFailure: failure
    });
}

function subs_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("userCalendarContainer").update(b.content);
}

function calendarBlockMonth(a,aa) {
    var b={
        month:a,
        year:aa
    };    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWagendas&func=calendarBlockMonth",{
        parameters: b,
        onComplete: calendarBlockMonth_response,
        onFailure: failure
    });
}

function calendarBlockMonth_response(a) {
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("calendarContent").update(b.content);
}