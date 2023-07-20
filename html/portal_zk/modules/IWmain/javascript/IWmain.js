function toggleCheckAll(chkbox){
    for (var i=0 ;i < document.forms["form1"].elements.length; i++){
        var elemento = document.forms[0].elements[i];
        if (elemento.type == "checkbox"){
            elemento.checked = chkbox.checked;
        }
    } 
}

function stateCheckAll(chkbox){
    if (document.getElementById('checkall').checked && chkbox === false){
        document.getElementById('checkall').checked = chkbox;
    }	
}

function reloadNewsBlock(){
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmain&func=reloadNewsBlock",{
        onComplete: reloadNewsBlock_response
    });
}

function reloadNewsBlock_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("IWmain_block_news").update(b.content);
}



function reloadFlaggedBlock(){
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWmain&func=reloadFlaggedBlock",{
        onComplete: reloadFlaggedBlock_response
    });
}

function reloadFlaggedBlock_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("IWmain_block_flagged").update(b.content);
}

function activeGoogleUserAcoountData(){
    var f = document.forms.conf;
    if(f.gCalendarUse.checked){
        $('googleUser').style.display = 'block';
    }else{
        $('googleUser').style.display = 'none';
    }
}
