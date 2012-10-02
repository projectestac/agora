//carrega un element qualsevol
function carregaElement (eid,url,pars) {
	//pars = Form.serialize(this);
	
	//mirem si posem algun id de carrega
	todiv = document.getElementById(eid);
	if (todiv != undefined) {
		todiv.innerHTML = 'Carregant...';
	}
	//carreguem l'element
	var ajax = new Ajax.Updater(
			{success: eid},
			url,
			{
				method: 'get',
				onFailure: function(request) {alert('Error de carrega');},
				onException: function(request,exc) {alert('Excepcio de carrega');},
				evalScripts: true,
				parameters:pars
			}
		);
		//parameters:pars
	return false;
}

function visible_indicadors(obj,valor) {
	var el = document.getElementById(obj);
	if ( !valor ) {
		el.style.display = 'none';
	} else {
		el.style.display = '';
	}
}