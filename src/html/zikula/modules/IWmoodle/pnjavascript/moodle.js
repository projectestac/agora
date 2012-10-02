function send_users(text1,text2){
    var TotalOn = 0;
    var error=false;
    for (var i=0;i<document.delete_users.elements.length;i++) {
        var e = document.delete_users.elements[i];
        if ((e.name != 'allbox') && (e.type=='checkbox')) {
            if (e.checked) {
                TotalOn++;
            }
        }
    }
    if(TotalOn==0){
        alert(text1);
        error=true;
    }
    if(!error){
        confirmation=confirm(text2);
        if (confirmation){
            document.delete_users.submit();
        }
    }
}

function CheckAllUsers() {
    for (var i=0;i<document.delete_users.elements.length;i++) {
        var e = document.delete_users.elements[i];
        if ((e.name != 'allbox') && (e.type=='checkbox')) e.checked = document.delete_users.allbox.checked;
    }
}

function CheckCheckAllUsers() {
    var TotalBoxes = 0;
    var TotalOn = 0;
    for (var i=0;i<document.delete_users.elements.length;i++) {
        var e = document.delete_users.elements[i];
        if ((e.name != 'allbox') && (e.type=='checkbox')) {
            TotalBoxes++;
            if (e.checked) {
                TotalOn++;
            }
        }
    }
    if (TotalBoxes==TotalOn) {
        document.delete_users.allbox.checked=true;
    } else {
        document.delete_users.allbox.checked=false;
    }
}

function chgUsers(gid){
    var pars = "module=IWmoodle&func=chgUsers&gid=" + gid;
    showinfo();
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: chgUsers_response,
        onFailure: chgUsers_failure
    });
}

function chgUsers_failure(){
    showinfo();
    Element.update('person', '').innerHTML;
}

function chgUsers_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    showinfo();
    Element.update('person', json.content).innerHTML;
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
function showinfo()
{
    var info = 'chgInfo';

    if(!Element.hasClassName(info, 'pn-hide')) {
        Element.update(info, '&nbsp;');
        Element.addClassName(info, 'pn-hide');
    } else {
        Element.update(info, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
        Element.removeClassName(info, 'pn-hide');
    }
}

function send(valor){
    var error=false;
    var f=document.enrole;
    var i=1;
    if(valor==1){
        f.action="index.php?module=IWmoodle&type=admin&func=enrole";
    }else{
        var count = 0;
        for (i=0; i<f.person.options.length; i++) {
            if (f.person.options[i].selected) {
                count++;
            }
        }
        if(count == 0){
            alert(notUsersSelected);
            error = true;
        }
        if(f.role.value == 0 && !error){
            alert(notRoleSelected);
            error = true;
        }
        f.action="index.php?module=IWmoodle&type=admin&func=update_enrole";
    }
    if(!error){
        f.submit();
    }		
}

function chgCourseState(id){
    var pars = "module=IWmoodle&func=chgCourseState&id=" + id;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: chgCourseState_response
    });
}


function chgCourseState_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('state_'+json.id, json.content).innerHTML;
    Element.update('options_'+json.id, json.content1).innerHTML;
}
