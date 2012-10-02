
/*************************
 * Events
 *************************/
 
function wrs_accept()
{
	var empty = document.applets.FormulaEditor.isFormulaEmpty();
	var mathml = "";
	if(!empty){
		mathml += document.applets.FormulaEditor.getContent();
	}
	mathml = mathmlEntities(mathml);
	var result = {type: "formula", content: mathml};
	wrs_close(result);
}

function mathmlEntities(mathml) {
	var toReturn = "";
	
	for (var i = 0; i < mathml.length; i++) {
		//parsing > 255 characters
		if (mathml.charCodeAt(i) > 255) {
			toReturn += "&#" + mathml.charCodeAt(i) + ";";
		}
		else {
			toReturn += mathml.charAt(i);
		}
	}
	
	return toReturn;
}

function wrs_cancel()
{
	wrs_close(null);
}

function wrs_remove()
{
	var result = {type: "formula", content: ""};
	wrs_close(result);
}

function wrs_close(result)
{
   opener.Dialog._return(result);
   opener.Dialog._return = null;
   opener._arguments = null;
   window.close();
}

function wrs_initDocument()
{
	/* Setting event hanlder */
	document.getElementById("button_Ok").onclick = wrs_accept;
	document.getElementById("button_Cancel").onclick = wrs_cancel;
//	document.getElementById("button_Remove").onclick = wrs_remove;//We avoid the removing option
	
	/* Initializing Applet */
	var param =  opener.Dialog._arguments
	document.applets.FormulaEditor.setContent(param.content);
	
	window.focus();
}
