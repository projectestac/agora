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

function change(chid,text,toDo){
	resposta=confirm(text);
	if (resposta) {
		if(toDo == 'ch'){
			//show_info(chid, changingAvatar);
			var pars = "module=iw_main&func=change&chid=" + chid + "&toDo=ch";
		}else{
			//show_info(chid, deletingAvatar);
			var pars = "module=iw_main&func=change&chid=" + chid + "&toDo=del";
		}
		var myAjax = new Ajax.Request("ajax.php", {
			method: 'get',
			parameters: pars,
			onComplete: change_response,
			onFailure: change_failure
		});
	}
}

function change_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}

	var json = pndejsonize(req.responseText);
	if(json.error == ''){
		$('change_' + json.chid).toggle();
	}else{
		alert(json.error);
	}
}

function change_failure(req){

}

function reloadNewsBlock(){
	var pars = "module=iw_main&func=reloadNewsBlock";
	var myAjax = new Ajax.Request("ajax.php", {
		method: 'get',
		parameters: pars,
		onComplete: reloadNewsBlock_response,
		onFailure: reloadNewsBlock_failure
	});
}

function reloadNewsBlock_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}

	var json = pndejsonize(req.responseText);
	Element.update('iw_main_block_news', json.content).innerHTML;
}

function reloadNewsBlock_failure(req){

}


function reloadFlaggedBlock(){
	var pars = "module=iw_main&func=reloadFlaggedBlock";
	var myAjax = new Ajax.Request("ajax.php", {
		method: 'get',
		parameters: pars,
		onComplete: reloadFlaggedBlock_response,
		onFailure: reloadFlaggedBlock_failure
	});
}

function reloadFlaggedBlock_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}

	var json = pndejsonize(req.responseText);
	Element.update('iw_main_block_flagged', json.content).innerHTML;
}

function reloadFlaggedBlock_failure(req){

}


function activeGoogleUserAcoountData(){
	var f = document.forms.conf;
	if(f.gCalendarUse.checked){
		$('googleUser').style.display = 'block';
	}else{
		$('googleUser').style.display = 'none';
	}
	
}
