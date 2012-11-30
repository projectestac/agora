function CheckAll() {
    for (var i=0;i<document.prvmsg.elements.length;i++) {
        var e = document.prvmsg.elements[i];
        if ((e.name != 'allbox') && (e.type=='checkbox'))
            e.checked = document.prvmsg.allbox.checked;
    }
}

function CheckAllsend() {
    for (var i=0;i<document.prvmsgsend.elements.length;i++) {
        var e = document.prvmsgsend.elements[i];
        if ((e.name != 'allboxsend') && (e.type=='checkbox'))
            e.checked = document.prvmsgsend.allboxsend.checked;
    }
}

function CheckCheckAll() {
    var TotalBoxes = 0;
    var TotalOn = 0;
    for (var i=0;i<document.prvmsg.elements.length;i++) {
        var e = document.prvmsg.elements[i];
        if ((e.name != 'allbox') && (e.type=='checkbox')) {
            TotalBoxes++;
            if (e.checked) {
                TotalOn++;
            }
        }
    }
    if (TotalBoxes==TotalOn) {
        document.prvmsg.allbox.checked=true;
    } else {
        document.prvmsg.allbox.checked=false;
    }
}

function CheckCheckAllsend() {
    var TotalBoxes = 0;
    var TotalOn = 0;
    for (var i=0;i<document.prvmsgsend.elements.length;i++) {
        var e = document.prvmsgsend.elements[i];
        if ((e.name != 'allboxsend') && (e.type=='checkbox')) {
            TotalBoxes++;
            if (e.checked) {
                TotalOn++;
            }
        }
    }
    if (TotalBoxes==TotalOn) {
        document.prvmsgsend.allboxsend.checked=true;
    } else {
        document.prvmsgsend.allboxsend.checked=false;
    }
}

function mark(msg_id){
    var pars = "module=IWmessages&func=mark&msg_id=" + msg_id;
    Element.update('mark_' + i, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: mark_response,
        onFailure: mark_failure
    });
}

function mark_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('mark_' + i, '');
    $('flag').toggle();
//reloadFlaggedBlock();
}

function mark_failure(){

}

function marcar(){
    var param = '';
    for(i=1;i <= $("total_messages").value;i++){
        if($("msg_id"+i).checked){
            param = param+'$'+$("msg_id"+i).value;
            Element.update('mark_' + i, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
        }
    }

    var pars = "module=IWmessages&func=marca&ids=" + param + "&num=" + $("total_messages").value;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: marcar_response,
        onFailure: marcar_failure
    });
}

function marcar_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);

    for(i=1;i <= $("total_messages").value;i++){
        if($("msg_id"+i).checked){
            $("msg_id" + i).checked = false;
            Element.update('mark_' + i, '');
            $('flag_' + i).toggle();
        }
    }
    $("check").checked = false;
    reloadFlaggedBlock();
}

function marcar_failure(){

}

function esborrar(text){
    resposta=confirm(text);
    if(resposta){
        var param = '';
        for(i=1;i <= $("total_messages").value;i++){
            if($("msg_id"+i).checked){
                param = param+'$'+$("msg_id" + i).value;
                Element.update('noteinfo_' + i, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
            }
        }

        var pars = "module=IWmessages&func=delete&ids=" + param + "&num=" + $("total_messages").value+"&qui=d";
        var myAjax = new Ajax.Request("ajax.php", 
        {
            method: 'get', 
            parameters: pars, 
            onComplete: esborrar_response,
            onFailure: esborrar_failure
        });
    }
}

function esborrar_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);

    for(i=1;i <= $("total_messages").value;i++){
        if($("msg_id"+i).checked){
            $("msg_id" + i).checked = false;
            $('msg' + i).toggle();
        }
    }
    $("check").checked = false;
}

function esborrar_failure(){

}

function esborrarsend(text){
    resposta=confirm(text);
    if(resposta){
        var param = '';
        for(i=1;i <= $("total_messages_send").value;i++){
            if($("msgsend_id"+i).checked){
                param = param+'$'+$("msgsend_id"+i).value;
            }
        }
        var pars = "module=IWmessages&func=delete&ids=" + param + "&num=" + $("total_messages_send").value+"&qui=r";
        var myAjax = new Ajax.Request("ajax.php", 
        {
            method: 'get', 
            parameters: pars, 
            onComplete: esborrarsend_response,
            onFailure: esborrarsend_failure
        });
    }

}

function esborrarsend_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);

    for(i=1;i <= $("total_messages_send").value;i++){
        if($("msgsend_id"+i).checked){
            $("msgsend_id" + i).checked = false;
            Element.update('noteinfosend_' + i, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
            $('msgsend' + i).toggle();
        }
    }
    $("checksend").checked = false;
}

function esborrarsend_failure(){

}

function esborrardisplay(text){
    resposta=confirm(text);
    if(resposta){
        document.prvmsg.submit();
    }		
}


function marcardisplay(id){

    var pars = "module=IWmessages&func=marca&ids=" + id + "&num=1";
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: marcardisplay_response,
        onFailure: marcardisplay_failure
    });
}

function marcardisplay_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);

    $('flag').toggle();
    reloadFlaggedBlock();
}

function marcardisplay_failure(){

}

function autocompleteUser(value){
    if(value.length > 1){
        var pars = "module=IWmessages&func=autocompleteUser&value=" + value;
        showAutoCompete();
        var myAjax = new Ajax.Request("ajax.php", 
        {
            method: 'get', 
            parameters: pars, 
            onComplete: autocompleteUser_response,
            onFailure: autocompleteUser_failure
        });
    }
}

function autocompleteUser_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('autocompletediv', json.users).innerHTML;
}

function autocompleteUser_failure(){

}

function hideAutoCompete(){
    $('autocompletediv').style.visibility = "hidden";
}

function showAutoCompete(){
    $('autocompletediv').style.visibility = "visible";
}

function add(value){
    document.newmsg.to_user.value = value;
    Element.update('autocompletediv', '').innerHTML;
    $('autocompletediv').style.visibility = "hidden";
}

function view(inici,rpp,inicisend,rppsend,filter,filtersend){
    var pars = "module=IWmessages&func=view&inici=" + inici + "&rpp=" + rpp + "&inicisend=" + inicisend + "&rppsend=" + rppsend + "&filter=" + filter + "&filtersend=" + filtersend;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: view_response,
        onFailure: view_failure
    });
}

function view_failure(){

}

function view_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('IWmainContent', json.content).innerHTML;
}


function display(msgid, qui, inici, rpp, inicisend, rppsend, filter, filtersend){
    var pars = "module=IWmessages&func=display&msgid=" + msgid + "&qui=" + qui + "&inici=" + inici + "&rpp=" + rpp + "&inicisend=" + inicisend + "&rppsend=" + rppsend + "&filter=" + filter + "&filtersend=" + filtersend;
    //	wait();
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: display_response,
        onFailure: display_failure
    });
}

function display_failure(){

}

function display_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('IWmainContent', json.content).innerHTML;
    reloadNewsBlock();
}


function displaysend(msgid, qui, uid, inici, rpp, inicisend, rppsend, filtersend, filter){
    var pars = "module=IWmessages&func=displaysend&msgid=" + msgid + "&qui=" + qui + "&uid=" + uid + "&inici=" + inici + "&rpp=" + rpp + "&inicisend=" + inicisend + "&rppsend=" + rppsend + "&filtersend=" + filtersend + "&filter=" + filter;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: displaysend_response,
        onFailure: displaysend_failure
    });
}

function displaysend_failure(){

}

function displaysend_response(req){
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('IWmainContent', json.content).innerHTML;
}