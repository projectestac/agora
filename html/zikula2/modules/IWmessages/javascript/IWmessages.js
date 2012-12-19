function failure() {
    
}

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

function mark(a){
    var b={
        msg_id:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=mark",{
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
    //$("field_"+b.fndid).update(b.content);
    $('flag').toggle();
//reloadFlaggedBlock();
}

function marcar(){
    var param = '';
    for(i=1;i <= $("total_messages").value;i++){
        if($("msg_id"+i).checked){
            param = param+'$'+$("msg_id"+i).value;
            $("mark_"+i).update('<img src="images/ajax/circle-ball-dark-antialiased.gif">');
        }
    }
  
    var b={
        ids:param,
        num:$("total_messages").value
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=marca",{
        parameters: b,
        onComplete: marcar_response,
        onFailure: failure
    });
}

function marcar_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var i;
    for(i=1;i <= $("total_messages").value;i++){
        if($("msg_id"+i).checked){
            $("msg_id" + i).checked = false;
            $("mark_"+i).update('');
            $('flag_' + i).toggle();
        }
    }
    $("check").checked = false;
    reloadFlaggedBlock();
}

function esborrar(text){
    var resposta=confirm(text);
    if(resposta){
        var param = '';
        var i;
        for(i=1;i <= $("total_messages").value;i++){
            if($("msg_id"+i).checked){
                param = param+'$'+$("msg_id" + i).value;
                $('noteinfo_' + i).update('<img src="images/ajax/circle-ball-dark-antialiased.gif">');
            }
        }

        var a = 'd';
        var b={
            ids:param,
            num:$("total_messages").value,
            qui:a
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=delete",{
            parameters: b,
            onComplete: esborrar_response,
            onFailure: failure
        });
    }
}

function esborrar_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var i;
    for(i=1;i <= $("total_messages").value;i++){
        if($("msg_id"+i).checked){
            $("msg_id" + i).checked = false;
            $('msg' + i).toggle();
        }
    }
    $("check").checked = false;
}

function esborrarsend(text){
    var resposta=confirm(text);
    var i;
    if(resposta){
        var param = '';
        for(i=1;i <= $("total_messages_send").value;i++){
            if($("msgsend_id"+i).checked){
                param = param+'$'+$("msgsend_id"+i).value;
            }
        }
        var a = 'r';
        var b={
            ids:param,
            num:$("total_messages_send").value,
            qui:a
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=delete",{
            parameters: b,
            onComplete: esborrarsend_response,
            onFailure: failure
        });

    }

}

function esborrarsend_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var i;
    for(i=1;i <= $("total_messages_send").value;i++){
        if($("msgsend_id"+i).checked){
            $("msgsend_id" + i).checked = false;
            
            $('msgsend' + i).toggle();
        }
    }
    $("checksend").checked = false;

    for(i=1;i <= $("").value;i++){
        if($(""+i).checked){
            $("msgsend_id" + i).checked = false;
            $('noteinfosend_' + i).update('<img src="images/ajax/circle-ball-dark-antialiased.gif">');
            $('' + i).toggle();
        }
    }
    $("").checked = false;
}

function esborrardisplay(text){
    resposta=confirm(text);
    if(resposta){
        document.prvmsg.submit();
    }		
}


function marcardisplay(a){
    var aa = '1';
    var b={
        ids:a,
        num:aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=marca",{
        parameters: b,
        onComplete: marcardisplay_response,
        onFailure: failure
    });
}

function marcardisplay_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }

    $('flag').toggle();
    reloadFlaggedBlock();
}

function autocompleteUser(a){
    if(a.length > 1){
        showAutoCompete();
        var b={
            value:a
        };
        var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=autocompleteUser",{
            parameters: b,
            onComplete: autocompleteUser_response,
            onFailure: failure
        });
    }
}

function autocompleteUser_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('autocompletediv').update(b.users);
}

function hideAutoCompete(){
    $('autocompletediv').style.visibility = "hidden";
}

function showAutoCompete(){
    $('autocompletediv').style.visibility = "visible";
}

function add(value){
    document.newmsg.to_user.value = value;
    $('autocompletediv').update('');
    $('autocompletediv').style.visibility = "hidden";
}

function view(a,aa,aaa,aaaa,aaaaa,aaaaaa){
    var b={
        inici:a,
        rpp:aa,
        inicisend:aaa,
        rppsend:aaaa,
        filter:aaaaa,
        filtersend:aaaaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=view",{
        parameters: b,
        onComplete: view_response,
        onFailure: failure
    });
        
}

function view_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('IWmainContent').update(b.content);
    
}


function display(a, aa, aaa, aaaa, aaaaa, aaaaaa, aaaaaaa, aaaaaaaa){
    var b={
        msgid:a,
        qui:aa,
        inici:aaa,
        rpp:aaaa,
        inicisend:aaaaa,
        rppsend:aaaaaa,
        filter:aaaaaaa,
        filtersend:aaaaaaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=display",{
        parameters: b,
        onComplete: display_response,
        onFailure: failure
    });

}

function display_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('IWmainContent').update(b.content);
}


function displaysend(a, aa, aaa, aaaa, aaaaa, aaaaaa, aaaaaaa, aaaaaaaa, aaaaaaaaa){
    var b={
        msgid:a,
        qui:aa,
        uid:aaa,
        inici:aaaa,
        rpp:aaaaa,
        inicisend:aaaaaa,
        rppsend:aaaaaaa,
        filtersend:aaaaaaaa,
        filter:aaaaaaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmessages&func=displaysend",{
        parameters: b,
        onComplete: displaysend_response,
        onFailure: failure
    });
}

function displaysend_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $('IWmainContent').update(b.content);
}