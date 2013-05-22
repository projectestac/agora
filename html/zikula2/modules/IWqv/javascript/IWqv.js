String.prototype.replaceAll=function(s1, s2) {
    return this.split(s1).join(s2)
    }

function iwqvPreviewAssignment(qvurl){
    window.open (qvurl,"iwqv","status=0,toolbar=0, scrollbars=1, resizable=1");
    return true;	
}

function iwqvShowAssignment(qvid, viewas){
    var action="index.php?module=IWqv&func=show_assignment&qvid="+qvid+"&viewas="+viewas;
    document.location=action;
    return true;	
}

function iwqvEditAssignment(qvid){
    var action="index.php?module=IWqv&func=assignment_form&qvid="+qvid;
    document.location=action;
    return true;	
}

function iwqvEditUserAssignment(userid, qvid){
    var action="index.php?module=IWqv&func=user_assignment_form&userid="+userid+"&qvid="+qvid;
    document.location=action;
    return true;	
}

function iwqvAddGroupToAssignment(group){
    var form = document.assignment_form;
    var newgroup = form.newgroup.value;
    var selectedgroups = form.groups.value;
    if (newgroup>0 && selectedgroups.indexOf('$'+newgroup+'$')<0){
        if (selectedgroups=='') form.groups.value='$';
        form.groups.value+=newgroup+'$';
        iwqvUpdateSelectedGroups();
        form.newgroup.value=0;
    }
}

function iwqvDeleteGroupToAssignment(groupToDelete){
    var form = document.assignment_form;
    var selectedgroups = form.groups.value;
    if (groupToDelete>0){
        form.groups.value=selectedgroups.replaceAll(groupToDelete+'$', '');
        iwqvUpdateSelectedGroups();
    }
}


/**
 * Starts the delete process by calling the approrpiate Ajax function
 *
 *@params qvaid    the user assignment id;
 *@return none;
 *@author Sara Arjona T�llez (sarjona@xtec.cat)
 */
function iwqvDeleteUserAssignment(qvaid){
    var pars = 'module=IWqv&func=deleteuserassignment&qvaid=' + qvaid;
    var myAjax = new Ajax.Request(
        document.location.pnbaseURL+'ajax.php', 
        {
            method: 'post', 
            parameters: pars, 
            onComplete: iwqvDeleteUserAssignment_init
        });
}

/**
 * This functions gets called when the Ajax request initiated in iwqvDeleteUserAssignment() returns. 
 * It hides the delete button and update the name link
 *
 *@params req   response from Ajax request;
 *@return none;
 *@author Sara Arjona T�llez (sarjona@xtec.cat)
 */
function iwqvDeleteUserAssignment_init(req) 
{
    if(req.status != 200 ) {
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.hide('bt_deleteuserassignment_'+json.qvaid);
    iwqvShowStatusMsg(json.result);
    Element.hide('fullurllink_'+json.qvaid);
    Element.show('fullurl_'+json.qvaid);
    // Delete html assignment content
    Element.update('state_'+json.qvaid, '');
    Element.update('score_'+json.qvaid, '');
    Element.update('delivers_'+json.qvaid, '');
    Element.update('totaltime_'+json.qvaid, '');
    return;
}

/**
 * Starts the delete process by calling the approrpiate Ajax function
 *
 *@params qvid    the user assignment id;
 *@return none;
 *@author Sara Arjona T�llez (sarjona@xtec.cat)
 */
function iwqvDeleteAssignment(qvid){
    resp = confirm(answare);
    if(resp){
        var pars = 'module=IWqv&func=deleteqv&qvid=' + qvid;
        var myAjax = new Ajax.Request(
            document.location.pnbaseURL+'ajax.php', 
            {
                method: 'post', 
                parameters: pars, 
                onComplete: iwqvDeleteAssignment_init
            });
    }
}

/**
 * This functions gets called when the Ajax request initiated in iwqvDeleteAssignment() returns. 
 * It loads assignments to correct
 *
 *@params req   response from Ajax request;
 *@return none;
 *@author Sara Arjona T�llez (sarjona@xtec.cat)
 */
function iwqvDeleteAssignment_init(req) 
{
    if(req.status != 200 ) {
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    iwqvShowStatusMsg(json.result);
    Element.hide('assignment_'+json.qvid);
    //document.location='index.php?module=IWqv&func=show_assignments_to_correct';
    return;
}

function iwqvShowStatusMsg(msg){
    Element.update('statusmsg', msg);
    Element.show('statusmsg');
    setTimeout("Element.hide('statusmsg')", 10000);
}
function iwqvShowErrorMsg(msg){
    Element.update('errormsg', msg);
    Element.show('errormsg');
//	setTimeout("Element.hide('errormsg')", 10000);
}
