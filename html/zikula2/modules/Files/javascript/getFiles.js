/*
Deprecated functions
Only to  keep compatibility with old version of Xinha plugin, playing in no-updated Scribite module
*/
function FilesFindItemXinha(editor, maURL) {
    editor._popupDialog(maURL ,
        function(val){
            value = val[1];
            opt = val[0];
            fileName = getFileName(value);
            if (opt == 'insertImg') {
                editor.insertHTML('<img src="'+ value + '" alt="' + getFileName(value) + '" title="' + getFileName(value) + '"/>');
            }else if (opt == 'insertLink') {
                editor.insertHTML('<a href="' + value + '" alt="' + fileName + '" title="' + fileName + '">' + fileName + '</a>');
            }else if (opt == 'copyURL') {
                editor.insertHTML(Zikula.Config.baseURL+value);
            }else if (opt == 'gotoURL') {
                window.open(Zikula.Config.baseURL+value);
             }
            
        });
}

function getFileName (value) {
    var filename = value.substr(value.lastIndexOf('/')+1,value.length);
    return filename;
}
/*
End of dreprecated functions
*/
function modifySize(folder,image,factor,action,editor)
{
    var pars = {
        folder: folder,
        image: image,
        factor: factor,
        action: action,
        editor: editor
    };
    Element.update('image_' + image, '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
    //$('image_' + image).update('<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
    var myAjax = new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=Files&func=externalModifyImg",{
        parameters: pars,
	onComplete: modifySize_response,
	onFailure: modifySize_failure
	});

}

function modifySize_response(req)
{
    
if(!req.isSuccess()){
        Zikula.showajaxerror(req.getMessage());
        return;
    }

    var b=req.getData();
    $('image_' + b.image).update(b.content);
/*   	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}
	var json = pndejsonize(req.responseText);
	Element.update('image_' + json.image, json.content);
*/

}

function modifySize_failure()
{
    
}

function insertAndClose(file){
	opener.window.document.getElementById('hook_form_file').setAttribute('value', file);
	window.close();
}

function Loadwindow(){
	
        url = document.location.baseURL + document.location.entrypoint + "?module=Files&type=external&func=getFiles&hook=1";
	popup=window.open(url,"Files","location=1,status=1,scrollbars=1,width=600,height=700");
	popup.window.document.getElementsByTagName('body')[0].setAttribute('onblur','self.focus()');
	
	/* FOR TEST ONLY
	window.captureEvents(Event.KEYPRESS);
	window.onkeypress=nothing;
	window.onkeypress=restore;
	
	document.onmousedown=nothing;
	document.onkeydown=nothing;
	document.onkeypress=nothing;
	document.onclick=nothing;
	document.onmouseup=nothing;
	document.onSubmit=nothing;
	if (document.layers) window.captureEvents(Event.MOUSEDOWN);
	if (document.layers) window.captureEvents(Event.KEYPRESS);
	if (document.layers) window.captureEvents(Event.KEYDOWN);
	if (document.layers) window.captureEvents(Event.CLICK);
	if (document.layers) window.captureEvents(Event.MOUSEUP);
	if (document.layers) window.captureEvents(Event.SUBMIT);
	window.onmousedown=nothing;
	window.onkeydown=nothing;
	window.onkeypress=nothing;
	window.onclick=nothing;
	window.onmouseup=nothing;
	window.onsubmit=nothing;*/
}

/* FOR TEST ONLY
function nothing(e){return false;}

function restore(e){return true;}

function restore_events(){alert("adeu");}*/
