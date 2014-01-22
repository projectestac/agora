/*
 * Show the form to create a new folder
 * @author: Albert Pérez Monfort
 * @params: folder => name of the folder where user is
 *          external => 1 if user is in a external plug-in and 0 otherwise
 * @return: form with the needed fields  
 */
function createDir(folder,external,hook,pngetbaseURL){
    Element.update('actionForm', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
    var pars = "module=Files&func=createDir&folder=" + folder + "&external=" + external + "&hook=" + hook;
    var url = document.pnbaseURL;
    if (pngetbaseURL != undefined) url = pngetbaseURL;	
	var myAjax = new Ajax.Request(
			url+'ajax.php',
			{
				method: 'post', 
				parameters: pars, 
				onComplete: createDir_response,
				onFailure: createDir_failure
			});
}

function createDir_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}
	
	var json = pndejsonize(req.responseText);
	Element.update('actionForm', json.content);
}

function createDir_failure(){

}

/*
 * Show the form to upload a new file
 * @author: Albert Pérez Monfort
 * @params: folder => name of the folder where user is
 *          external => 1 if user is in a external plug-in and 0 otherwise
 * @return: form with the needed fields  
 */
function uploadFile(folder,external,hook,pngetbaseURL){
	var pars = "module=Files&func=uploadFile&folder=" + folder + "&external=" + external + "&hook=" + hook;;
    Element.update('actionForm', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
    var url = document.pnbaseURL;
    if (pngetbaseURL != undefined) url = pngetbaseURL;	
	var myAjax = new Ajax.Request(
			url + 'ajax.php', 
			{
				method: 'post', 
				parameters: pars, 
				onComplete: uploadFile_response,
				onFailure: uploadFile_failure
			});
}

function uploadFile_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}
	var json = pndejsonize(req.responseText);
	Element.update('actionForm', json.content);
}

function uploadFile_failure(){

}

/*
 * Submit the upload form
 * @author: Albert Pérez Monfort
 * @return: true if success and false otherwise  
 */
function submitUpdateFile(){
    document.forms["updateFile"].submit();
    Element.update('actionForm', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
}

/*
 * Submit the create a new dir form
 * @author: Albert Pérez Monfort
 * @return: true if success and false otherwise  
 */
function submitCreateDir(){
    document.forms["createDir"].submit();
    Element.update('actionForm', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
}

/*
 * Show the form needed to create a new group quota
 * @author: Albert Pérez Monfort
 * @return: The form fields
 */
function newGroupQuota(){
    var pars = "module=Files&func=newGroupQuota";
    Element.update('newQuota', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
	var myAjax = new Ajax.Request("ajax.php", 
	{
		method: 'get', 
		parameters: pars, 
		onComplete: newGroupQuota_response,
		onFailure: newGroupQuota_failure
	});
}

function newGroupQuota_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}
	var json = pndejsonize(req.responseText);
	Element.update('newQuota', json.content);
}

function newGroupQuota_failure(){

}

/*
 * Submit the new group quota
 * @author: Albert Pérez Monfort
 * @return: True if success and false otherwise
 */
function createGroupQuota(){
    var groupId = document.forms["newQuota"].groupId.value;
    var quota = document.forms["newQuota"].quotaValue.value;
    var pars = "module=Files&func=createGroupQuota&gid=" + groupId + "&quota=" + quota;
    Element.update('newQuota', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
	var myAjax = new Ajax.Request("ajax.php", 
	{
		method: 'get', 
		parameters: pars, 
		onComplete: createGroupQuota_response,
		onFailure: createGroupQuota_failure
	});
}

function createGroupQuota_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}
	var json = pndejsonize(req.responseText);
	Element.update('quotaTable', json.content);
}

function createGroupQuota_failure(){

}

/*
 * Delete the quota for a group
 * @author: Albert Pérez Monfort
 * @return: True if success and false otherwise
 */
function deleteGroupQuota(gid){
    var pars = "module=Files&func=deleteGroupQuota&gid=" + gid;
    Element.update('newQuota', '<img src="images/ajax/circle-ball-dark-antialiased.gif" />');
	var myAjax = new Ajax.Request("ajax.php", 
	{
		method: 'get', 
		parameters: pars, 
		onComplete: deleteGroupQuota_response,
		onFailure: deleteGroupQuota_failure
	});
}

function deleteGroupQuota_response(req){
	if (req.status != 200 ) { 
		pnshowajaxerror(req.responseText);
		return;
	}
	var json = pndejsonize(req.responseText);
	Element.update('quotaTable', json.content);
}

function deleteGroupQuota_failure(){

}

