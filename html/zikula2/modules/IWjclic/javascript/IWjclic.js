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


function hideShow(jid){
    wait(jid);
    var pars = "module=IWjclic&func=hideShow&jid=" + jid;
    var myAjax = new Ajax.Request("ajax.php", {
        method: 'post',
        parameters: pars,
        onComplete: hideShow_response,
        onFailure: hideShow_failure
    });
}

function hideShow_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('act_'+json.jid, json.content).innerHTML;
}

function hideShow_failure(req){

}

function wait(jid){
    var info = 'wait_' + jid;

    if(!Element.hasClassName(info, 'pn-hide')) {
        Element.update(info, '&nbsp;');
        Element.addClassName(info, 'pn-hide');
    } else {
        Element.update(info, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
        Element.removeClassName(info, 'pn-hide');
    }
}

function results(jid, uid){
    if(uid){
        Element.update('results_'+uid, '<div style="text-align: center;"><img src="images/ajax/circle-ball-dark-antialiased.gif"></div>').innerHTML;		
    }else{
        Element.update('results_'+jid, '<div style="text-align: center;"><img src="images/ajax/circle-ball-dark-antialiased.gif"></div>').innerHTML;
    }
    var pars = "module=IWjclic&func=results&jid=" + jid + "&uid=" + uid;
    var myAjax = new Ajax.Request("ajax.php", {
        method: 'post',
        parameters: pars,
        onComplete: results_response,
        onFailure: results_failure
    });
}

function results_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    if(json.correct == 1){
        Element.update('results_'+json.uid, json.content).innerHTML;
    }else{
        Element.update('results_'+json.jid, json.content).innerHTML;		
    }
}

function results_failure(req){

}

function resultsOff(jid){
    Element.update('results_'+jid, '<div><a href="javascript:results(' + jid + ')">' + showResults + '</a></div>').innerHTML;
}

function editCorrectContent(jid,uid,toDo){
    var pars = "module=IWjclic&func=editCorrectContent&jid=" + jid + "&uid=" + uid + "&do=" + toDo;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'post', 
        parameters: pars, 
        onComplete: editCorrectContent_response,
        onFailure: editCorrectContent_failure
    });
}

function editCorrectContent_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }

    var json = pndejsonize(req.responseText);

    if(json.toDo == 'observations'){
        Element.update('correct_observations_'+json.uid, json.content).innerHTML;
    }
    if(json.toDo == 'renotes'){
        Element.update('correct_renotes_'+json.uid, json.content).innerHTML;
    }
}

function editCorrectContent_failure(req){

}

function submitValue(jid,uid,toDo){
    if(toDo == 'observations'){
        var value = $('submitValueFormO_' + uid).observations.value;
    }
    if(toDo == 'renotes'){
        var value = $('submitValueFormR_' + uid).renotes.value;
    }

    value = replaceChars('?', "|int|", value);
    value = replaceChars('&', "|amp|", value);
    value = replaceChars('#', "|par|", value);
    value = replaceChars('%', "|per|", value);

    var pars = "module=IWjclic&func=submitValue&jid=" + jid + "&value=" + value + "&do=" + toDo + "&uid=" + uid;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'post', 
        parameters: pars, 
        onComplete: submitValue_response,
        onFailure: submitValue_failure
    });
}

function replaceChars(pattern, newstring, entry) {
    temp = "" + entry; // temporary holder
   
    while (temp.indexOf(pattern)>-1) {
        pos= temp.indexOf(pattern);
        temp = "" + (temp.substring(0, pos) + newstring +
            temp.substring((pos + pattern.length), temp.length));
    }
    return temp;
}

function submitValue_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }

    var json = pndejsonize(req.responseText);

    if(json.toDo == 'observations'){
        Element.update('correct_observations_'+json.uid, json.content).innerHTML;
    }

    if(json.toDo == 'renotes'){
        Element.update('correct_renotes_'+json.uid, json.content).innerHTML;
    }
}

function submitValue_failure(req){
	
}

function del(jid,text){
    resposta=confirm(text);
    if (resposta) {
        showinfo(jid, deletingassign);
        var pars = "module=IWjclic&func=delete&jid=" + jid;
        var myAjax = new Ajax.Request("ajax.php", {
            method: 'post',
            parameters: pars,
            onComplete: del_response,
            onFailure: del_failure
        });
    }
}

function del_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }

    var json = pndejsonize(req.responseText);
    $('assign_' + json.jid).toggle();
}

function del_failure(req){

}

function showinfo(jid, infotext)
{
    if(jid) {
        var info = 'assigninfo_' + jid;
        if(!Element.hasClassName(info, 'pn-hide')) {
            Element.update(info, '&nbsp;');
            Element.addClassName(info, 'pn-hide');
        } else {
            Element.update(info, infotext);
            Element.removeClassName(info, 'pn-hide');
        }
    } else {
        $A(document.getElementsByClassName('assigninfo')).each(function(info){
            Element.update(info, '&nbsp;');
            Element.addClassName(info, 'pn-hide');
        });
    }
}  