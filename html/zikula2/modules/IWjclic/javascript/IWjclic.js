String.prototype.replaceAll=function(s1, s2) {
    return this.split(s1).join(s2)
}

function iwjclicAddGroupToAssignment(){
    var form = document.forms['assignment_form'];
    var newgroup = form.newgroup.value;
    var selectedgroups = form.groups.value;
    if (newgroup>0 && selectedgroups.indexOf('$'+newgroup+'$')<0){
        if (selectedgroups=='') form.groups.value='$';
        form.groups.value+=newgroup+'$';
        iwjclicUpdateSelectedGroups();
        form.newgroup.value=0;
    }
}

function iwjclicDeleteGroupToAssignment(groupToDelete){
    var form = document.forms['assignment_form'];
    var selectedgroups = form.groups.value;
    if (groupToDelete>0){
        form.groups.value=selectedgroups.replaceAll(groupToDelete+'$', '');
        iwjclicUpdateSelectedGroups();
    }
}


function send(){
    document.conf.submit();
}

function failure() {
    
}

function hideShow(a){
    wait(a);
    var b={
        jid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWjclic&func=hideShow",{
        parameters: b,
        onComplete: hideShow_response,
        onFailure: failure
    });
}

function hideShow_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    show_info('chgInfo');
    $("act_" + b.jid).update(b.content);
}

function wait(jid){
    var info = 'wait_' + jid;

    if(!Element.hasClassName(info, 'z-hide')) {
        $(info).update('&nbsp;');
        Element.addClassName(info, 'z-hide');
    } else {
        $(info).update('<img src="' + Zikula.Config.baseURL + 'images/ajax/circle-ball-dark-antialiased.gif" />');
        Element.removeClassName(info, 'z-hide');
    }
}

function results(a, aa){
    if(aa){
        $('results_' + aa).update('<div style="text-align: center;"><img src="' + Zikula.Config.baseURL + 'images/ajax/circle-ball-dark-antialiased.gif" /></div>');
    }else{
        $('results_' + a).update('<div style="text-align: center;"><img src="' + Zikula.Config.baseURL + 'images/ajax/circle-ball-dark-antialiased.gif" /></div>');
    }
    var b={
        jid:a,
        uid: aa
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWjclic&func=results",{
        parameters: b,
        onComplete: results_response,
        onFailure: failure
    });
}

function results_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    if(b.correct == 1){
        $('results_' + b.uid).update(b.content);
    }else{
        $('results_' + b.jid).update(b.content);
    }
}

function resultsOff(a){
    $('results_' + a).update('<div><a href="javascript:results(' + a + ')">' + showResults + '</a></div>');
}

function editCorrectContent(a,aa,aaa){
    var b={
        jid:a,
        uid: aa,
        toDo:aaa
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWjclic&func=editCorrectContent",{
        parameters: b,
        onComplete: editCorrectContent_response,
        onFailure: failure
    });
}

function editCorrectContent_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();

    if(b.toDo == 'observations'){
        $('correct_observations_' + b.uid).update(b.content);
    }
    if(b.toDo == 'renotes'){
        $('correct_renotes_' + b.uid).update(b.content);
    }
}

function submitValue(a,aa,aaa){
    var aaaa;
    if(aaa == 'observations'){
        aaaa = $('submitValueFormO_' + aa).observations.value;
    }
    if(aaa == 'renotes'){
        aaaa = $('submitValueFormR_' + aa).renotes.value;
    }

    var b={
        jid:a,
        uid: aa,
        toDo:aaa,
        value:aaaa
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWjclic&func=submitValue",{
        parameters: b,
        onComplete: submitValue_response,
        onFailure: failure
    });
}

function replaceChars(pattern, newstring, entry) {
    var temp = '' + entry; // temporary holder
   
    while (temp.indexOf(pattern)>-1) {
        var pos = temp.indexOf(pattern);
        temp = '' + (temp.substring(0, pos) + newstring +
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
        $('correct_observations_' + b.uid).update(b.content);
    }

    if(b.toDo == 'renotes'){
        $('correct_renotes_' + b.uid).update(b.content);
    }
}

function del(a,text){
    var resposta=confirm(text);
    if (resposta) {
        showinfo(a, deletingassign);
        var b={
            jid:a
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWjclic&func=delete",{
            parameters: b,
            onComplete: del_response,
            onFailure: failure
        });
    }
}

function del_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('assign_' + b.jid).toggle();
}

function showinfo(jid, infotext)
{
    if(jid) {
        var info = 'assigninfo_' + jid;
        if(!Element.hasClassName(info, 'z-hide')) {
            $(info).update('&nbsp;');
            Element.addClassName(info, 'z-hide');
        } else {
            $(info).update(infotext);
            Element.removeClassName(info, 'z-hide');
        }
    } else {
        $A(document.getElementsByClassName('assigninfo')).each(function(info){
            $(info).update('&nbsp;');
            Element.addClassName(info, 'z-hide');
        });
    }
}