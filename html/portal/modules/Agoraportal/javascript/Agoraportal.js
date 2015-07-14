function servicesList(service, stateFilter, search, searchText, order, init, rpp) {
    var pars = "func=servicesList&service=" + service + "&stateFilter=" + stateFilter + "&search=" + search + "&searchText=" + searchText + "&order=" + order + "&init=" + init + "&rpp=" + rpp;
    return ajax_get(pars, servicesList_response);
}

function servicesList_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('servicesListContent', json.content);
}

function getServiceActions() {
    var service = document.getElementById("service_sel").value;
    var pars = "func=getServiceActions&service=" + service;
    return ajax_get(pars, getServiceActions_response);
}

function getServiceActions_response(req) {
    var json = pndejsonize(req.responseText);
    actions = JSON.parse(json.content);
    var text = "";
    for (var x = 0; x < actions.length; x++) {
        text += '<option value="'+actions[x].action+'" >'+actions[x].title+'</option>';
    }

    Element.update('actionselect', text);
    prepareAction();
}

function prepareAction() {
    var action = document.getElementById("actionselect").value;

    if(action == ""){
        Element.update('actiondescription', 'No hi ha cap acció seleccionada');
        Element.update('actionparams', 'No hi ha paràmetres');
    }

    for (var x = 0; x < actions.length; x++) {
        if (actions[x].action == action) {

            if (actions[x].description != undefined && actions[x].description != '') {
                Element.update('actiondescription', actions[x].description);
            } else {
                Element.update('actiondescription', 'No hi ha descripció disponible');
            }

            if (actions[x].params != undefined && actions[x].params.length > 0) {
                var params = '<div class="form-horizontal">';
                for (var y = 0; y < actions[x].params.length; y++) {
                    params += '<div class="form-group"><label class="col-sm-4 control-label" for="parm_'+actions[x].params[y]+'">'+actions[x].params[y]+' </label>';
                    params += '<div class="col-sm-8"><input class="form-control" id="parm_'+actions[x].params[y]+'" name="parm_'+actions[x].params[y]+'" type="text"/></div></div>';
                }
                params += '</div>';
                Element.update('actionparams', params);
            } else {
                Element.update('actionparams', 'No hi ha paràmetres');
            }
            return false;
        }
    }
    return false;
}

function requestsList(service, stateFilter, search, searchText,order,init,rpp) {
    var pars = "func=requestsList&service=" + service + "&stateFilter=" + stateFilter + "&search=" + search + "&searchText=" + searchText + "&order=" + order + "&init=" + init + "&rpp=" + rpp;
    return ajax_get(pars, requestsList_response);
}

function requestsList_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('requestListContent', json.content);
}

function filter_servicesList() {

    var which = document.getElementById("which").value;
    var service = document.getElementById("service_sel").value;
    if (which == "selected" && service != 0) {
        var search = document.getElementById('search').value;
        var searchText = document.getElementById('valueToSearch').value;
        var order = document.getElementById("order") ? document.getElementById("order").value : 1;
        var pilot = document.getElementById("pilot") ? document.getElementById("pilot").value : 0;
        var include = document.getElementById("pilot") ? document.getElementById("include").value : 1;
        var clients = get_clients_selected();

        var pars = "func=filter_servicesList&service=" + service + "&search=" + search + "&searchText=" + searchText + "&order=" + order + "&pilot=" + pilot + "&include=" + include + "&clients=" + clients;
        ajax_get(pars, filter_servicesList_response);
    } else {
        document.getElementById("servicesListContent").className = "hidden";
        document.getElementById("cerca").className = "hidden";
    }

    return false;
}

function filter_servicesList_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('servicesListContent', json.content);

    document.getElementById("servicesListContent").className = "visible";
    document.getElementById("cerca").className = "visible";
}

function getServiceStats() {
    var service = document.getElementById("service_sel").value;
    var pars = "func=getServiceStats&service=" + service;
    return ajax_get(pars, getServiceStats_response);
}

function getServiceStats_response(req) {
    var json = pndejsonize(req.responseText);
    var stats = json.content;
    var text = "";
    if( typeof stats === 'string' ) {
        text = '<option value="" >' + stats + '</option>';
    } else {
        for (var x in stats) {
            text += '<option value="' + x + '">' + stats[x] + '</option>';
        }
    }

    Element.update('stats', text);
}

function statsGetStatistics(orderby, clientDNS){

    var service = document.getElementById("service_sel").value;
    var stats = document.getElementById("stats").value;

    if(!stats) {
        Element.update('resultsContent', 'Sel·lecciona una estadística');
        return;
    }
    var date_start = document.getElementById("date_start").value;
    var date_stop = document.getElementById("date_stop").value;

    var order;
    if (orderby) {
        var lastorder = document.getElementById("lastorder").value;
        if (lastorder == orderby) {
            order = document.getElementById("tableorder").value == "ASC" ? "DESC" : "ASC";
        } else {
            order = "ASC";
            document.getElementById("lastorder").value = orderby;
        }
        document.getElementById("tableorder").value = order;
    } else {
        orderby = document.getElementById("lastorder").value
        order = document.getElementById("tableorder").value;
    }

    if (!date_start || !date_stop) {
        Element.update('resultsContent', 'Dates incorrectes');
        return;
    }
    if (date_stop < date_start) {
        Element.update('resultsContent', "Les dates no tenen l'ordre correcte");
        return;
    }

    var which = document.getElementById("which").value;
    var clients = "";
    if (clientDNS) {
        clients = clientDNS;
        which = "selected";
    } else if (which == "selected") {
        clients = get_clients_selected();
    }

    var pars = "func=statsGetStatistics&service="+service+"&stats=" + stats + "&which=" + which + "&date_start=" + date_start + "&date_stop=" + date_stop + "&clients=" + clients + "&orderby=" + orderby + " " + order;
    return ajax_get(pars, statsResults_response, statsResults_failure);
}

function statsGetStatisticsGraphs(clientDNS, column){
    var service = document.getElementById("service_sel").value;
    var stats = document.getElementById("stats").value;
    if(!stats) {
        Element.update('graphsContent', 'Sel·lecciona una estadística');
        return;
    }
    var date_start = document.getElementById("date_start").value;
    var date_stop = document.getElementById("date_stop").value;

    if (!date_start || !date_stop) {
        Element.update('graphsContent', 'Dates incorrectes');
        return;
    }
    if (date_stop < date_start) {
        Element.update('graphsContent', "Les dates no tenen l'ordre correcte");
        return;
    }

    var which = document.getElementById("which").value;
    var clients = "";
    if (clientDNS) {
        clients = clientDNS;
        which = "selected";
    } else if (which == "selected") {
        clients = get_clients_selected();
    }

    var pars = "func=statsGetGraphs&service="+service+"&stats=" + stats + "&which=" + which + "&date_start=" + date_start + "&date_stop=" + date_stop +"&clients=" + clients;
    if (column) {
        pars += "&column=" + column;
    }
    if (!clientDNS) {
        pars += "&totals=true";
    }
    return ajax_get(pars, statsGraph_response, statsGraph_failure);
}


function statsResults_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('resultsContent', json.content);
}

function statsResults_failure() {
    Element.update('resultsContent','Error en descarregar les dades');
}

function statsGraph_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('graphsContent', json.content);
}

function statsGraph_failure() {
    Element.update('graphsContent','Error en descarregar les dades');
}

function statsGenerateStatistics(date){
    if (!date) {
        Element.update('generate', 'Data incorrecta');
    }

    var day = date.substr(8,2);
    var month = date.substr(5,2);
    var year = date.substr(0,4);
    var pars = "day="+day+"&month="+month+"&year="+year;
    Element.update('generate', 'Generant...');
    var myAjax = new Ajax.Request("../config/statistics.php",
    {
        method: 'get',
        parameters: pars,
        onComplete: statsGenerateStatistics_response,
        onFailure: statsGenerateStatistics_failure
    });
}
function statsGenerateStatistics_response(req) {
    Element.update('generate','OK');
}

function statsGenerateStatistics_failure() {
    Element.update('generate','Error');
}

function sqlExampleUpdate() {
    var operation = document.getElementById('sqloperation').value;
    switch(operation){
        case "SELECT":
            Element.update('sqlexample',"SELECT [columna] FROM [taules] WHERE [condicions]");
            break;
        case "UPDATE":
            Element.update('sqlexample',"UPDATE [taules] SET [columna]=[valor] WHERE [condicions]");
            break;
        case "DELETE":
            Element.update('sqlexample',"DELETE FROM [taula] WHERE [condicions]");
            break;
        case "INSERT":
            Element.update('sqlexample','INSERT INTO [taula] ([columnes]) VALUES ([valors])');
            break;
        case "ALTER":
            Element.update('sqlexample','ALTER TABLE [taula] [ADD | ALTER COLUMN] [columna] [tipus]');
            break;
        default:
            Element.update('sqlexample',"");
    }
}

function editClientService() {
    var response;
    if (document.forms["editClientServiceForm"].state.value == -3) {
        response = confirm(confirmDischarge);
    } else {
        response = true;
    }
    if(response) {
        document.forms["editClientServiceForm"].submit();
    }

}

function clientsList(search, searchText, init, rpp) {
    var pars = "func=clientsList&search=" + search + "&searchText=" + searchText + "&init=" + init + "&rpp=" + rpp;
    return ajax_get(pars, clientsList_response);
}

function clientsList_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('clientsListContent', json.content).innerHTML;
}

function editService(serviceId) {
    var pars = "func=editService&serviceId=" + serviceId;
    return ajax_get(pars, editService_response);
}

function editService_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('service' + json.serviceId, json.content);
}

function updateService(serviceId) {
    var f = document.forms.servicesList;
    var pars = "func=updateService&serviceId=" + serviceId + "&serviceName=" + eval('f.serviceName_' + serviceId + '.value') + "&URL=" + eval('f.URL_' + serviceId + '.value') + "&description=" + eval('f.description_' + serviceId + '.value') + "&hasDB=" + eval('f.hasDB_' + serviceId + '.value') + "&allowedClients=" + eval('f.allowedClients_' + serviceId + '.value') + "&defaultDiskSpace=" + eval('f.defaultDiskSpace_' + serviceId + '.value');
    return ajax_get(pars, updateService_response);
}

function updateService_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('service' + json.serviceId, json.content);
}

function sitesList(typeId,location,search,searchText,init,rpp) {
    var pars = "func=sitesList&typeId=" + typeId + "&location=" + location + "&search=" + search + "&searchText=" + searchText + "&init=" + init + "&rpp=" + rpp;
    return ajax_get(pars, sitesList_response);
}

function sitesList_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('sitesListContent', json.content).innerHTML;
}

function sendEditLocation() {
    var f = document.forms['editLocation'];
    var error = false;
    if(f.locationName.value == ''){
        alert(noLocationName);
        return false;
    }
    return true;
}

function sendEditRequestType() {
    var f = document.forms['editRequestType'];
    var error = false;
    var concat='';
    if(f.requestTypeName.value == '' )   {
        concat=concat+' Nom del tipus de sol·licitud \n';
    }
    if(f.requestTypeUserCommentsText.value == ''){
        concat=concat+' Text pel quadre de comentaris \n';

    }
    if(f.requestTypeDescription.value == ''){
        concat=concat+' Descripció del tipus de sol·licitud \n';

    }
    if(concat!=''){
        alert('Cal que omplis els següents camps: \n' + concat);
        return false;
    }
    return true;
}

function sendEditModelType() {
    var f = document.forms['editModelType'];
    var error = false;
    var concat='';
    if(f.shortcode.value == '' )   {
        concat=concat+' Codi curt \n';
    }
    if(f.description.value == ''){
        concat=concat+' Descripcio \n';

    }
    if(f.url.value == ''){
        concat=concat+' URL \n';

    }
    if(f.dbHost.value == ''){
        concat=concat+' Base de dades \n';

    }
    if(concat!=''){
        alert('Cal que omplis els següents camps: \n' + concat);
        return false;
    }
    return true;
}

function confirm_delete(title) {
    return confirm("Esteu segurs que voleu eliminar " + title + "?");
}

function sendEditType() {
    var f = document.forms['editType'];
    var error = false;
    if(f.typeName.value == ''){
        alert(noTypeName);
        return false;
    }
    return true;
}

function autoActions(serviceId) {
    var f = document.forms["editClientServiceForm"];
    if (f.state.value == 1 && f.stateOriginal.value != 1) {
        f.sendMail.checked = true;
    } else {
        f.sendMail.checked = false;
    }
    if (f.state.value == -3) {
        f.annotations.value = autoAnnotations;
        f.observations.value = autoObservations;
    }
}

function autoActionsRequests() {
    document.forms["editRequestForm"].sendMail.checked = true;
}

function addManager() {
    var f = document.forms["addManager"];
    var error = false;
    if (f.managerUName.value == '') {
        alert(_AGORAPORTALNOTUSERNAME);
        error = true;
    }
    if (!error && f.managerUName.value.length > 8) {
        alert(_AGORAPORTALUSERNAMENOTVALID);
        error = true;
    }
    return !error;
}

function logs(clientCode, actionCode, fromDate, toDate, uname, init) {
    var pars = "func=logs&clientCode=" + clientCode + "&actionCode=" + actionCode + "&init=" + init;
    if (uname!=""){
        pars = pars + "&uname=" + uname;
    }
    if (fromDate!=""){
        pars = pars + "&fromDate=" + fromDate;
    }
    if (toDate!=""){
        pars = pars + "&toDate=" + toDate;
    }

    return ajax_get(pars, logs_response);
}

function logs_response(req) {
    var json = pndejsonize(req.responseText);
    //alert(json.content);
    Element.update('logsContent', json.content).innerHTML;
}

function sqlSave() {
    var description = document.getElementById("description").value;
    var sql = document.getElementById("sqlfunction").value;

    if ((description == '') || (sql == '')){
        document.getElementById('description').focus();
        alert('Heu d\'especificar una comanda i una descripció');
        reload_off();
        return;
    }

    var commandId = document.getElementById('commandId').value;
    var serviceId = document.getElementById("service_sel").value;
    var command_type = document.getElementById("command_type").value;
    var pars = {
        serviceId : serviceId,
        description : description,
        comand : sql,
        comand_type : command_type
    };

    if (commandId != ''){
        if(confirm("Voleu sobreesciure la comanda?")) {
            pars.action = 'update';
            pars.comandId = commandId;
        } else {
            sqlCommandsUpdate_failure;
            return;
        }
    } else {
        pars.action = 'insert';
    }

    return ajax_post("func=sqlComandsUpdate", pars, sqlCommandsUpdate_response, sqlCommandsUpdate_failure);
}

function sqlDelete(commandId){
    var serviceId = document.getElementById("service_sel").value;

    if (commandId != ''){
        if(confirm("Voleu eliminar la comanda?")) {
            var pars = {
                serviceId : serviceId,
                comandId : commandId,
                action : 'delete'
            };
        } else {
            sqlCommandsUpdate_failure;
        }
    } else {
        alert('Heu de seleccionar una comanda');
        reload_off();
        return;
    }

    return ajax_post("func=sqlComandsUpdate", pars, sqlCommandsUpdate_response, sqlCommandsUpdate_failure);
}

function sqlComandsUpdateTab(commandtype){
    var serviceId = document.getElementById("service_sel").value;
    var pars = "func=sqlCommandsUpdateTab&serviceId="+serviceId+"&commandtype="+commandtype;
    return ajax_get(pars, sqlCommandsUpdateTab_response, sqlCommandsUpdate_failure);
}

function sqlCommandsUpdateTab_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('commandList', json.content);

    var selected_tab = document.getElementById('selected_tab').value;
    document.getElementById('tab_'+selected_tab).className = "";
    document.getElementById('tab_'+json.commandtype).className = 'tab_select';
    document.getElementById('selected_tab').value = json.commandtype;
    document.getElementById('commandId').value = '';
    document.getElementById('description').value = '';
    document.getElementById('command_type').value = '0';
    document.getElementById('commandFormDiv').className = 'hidden';
}

function sqlCommandsUpdate_failure() {
    document.getElementById('commandId').value = "";
    reload_off();
}

function sqlCommandsUpdate_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('commandList', json.content).innerHTML;
    Element.update('msg', json.msg).innerHTML;

    if ((json.action == 1) || (json.action == 2))document.getElementById('sqlfunction').value = '';
    var selected_tab = document.getElementById('selected_tab').value;
    document.getElementById('tab_'+selected_tab).className = '';
    document.getElementById('tab_'+json.comand_type).className = 'tab_select';
    document.getElementById('selected_tab').value = json.comand_type;
    document.getElementById('commandId').value = '';
    document.getElementById('description').value = '';
    document.getElementById('command_type').value= '0';
    document.getElementById('commandFormDiv').className='hidden';
}

function sqlFunctionUpdate(action, commandId) {
    var pars = {
        action : action,
        commandId : commandId
    };
    return ajax_post("func=sqlFunctionUpdate", pars, sqlFunctionUpdate_response);
}

function sqlFunctionUpdate_response(req) {
    var json = pndejsonize(req.responseText);

    document.getElementById('sqlfunction').value =  json.command;
    document.getElementById('description').value = json.description;
    document.getElementById('commandId').value = json.commandId;
    document.getElementById('command_type').value = json.type;
    if (json.action == 'edit') {
        document.getElementById('commandFormDiv').className = 'visible';
    }
    Element.update('msg', '');
}

function sqlShowDescription() {
    document.getElementById('commandFormDiv').className = 'visible';
    var sql_function = document.getElementById('sqlfunction').value;

    var command_type = document.getElementById('command_type');
    if (sql_function.search(/select/i) != -1) command_type.value = 'select';
    else if(sql_function.search(/insert/i) != -1) command_type.value = 'insert';
    else if(sql_function.search(/update/i) != -1) command_type.value = 'update';
    else if(sql_function.search(/delete/i) != -1) command_type.value = 'delete';
    else if(sql_function.search(/alter/i) != -1) command_type.value = 'alter';

    document.getElementById('description').focus();
}

function showRequestMessage(serviceIdrequestTypeId, clientCode) {
    var split = serviceIdrequestTypeId.split(":", 2);
    var serviceId = split[0];
    var requestTypeId = split[1];

    // Id = 0 means user has selected the "choose one" text
    if (serviceId == 0) {
        Element.update('usermessage', "");
        reload_off();
        return ;
    }

    var pars = "func=getRequestMessage&serviceId="+serviceId+"&requestTypeId="+requestTypeId+"&clientCode="+clientCode;
    return ajax_get(pars, showRequestMessage_response);
}

function showRequestMessage_response(req) {
    var json = pndejsonize(req.responseText);
    Element.update('usermessage', json.content);
}

function deleteFileM2x(filename, name, clientCode){
    if(!confirm("Confirmeu que voleu esborrar el fitxer '" + name + "'?")) {
        console.log('fail');
        return;
    }

    var pars = "func=deleteFileM2x&filename=" + filename + "&name=" + name + "&clientCode=" + clientCode;
    return ajax_get(pars, deleteFileM2x_response);
}

function deleteFileM2x_response(req) {
    var json = pndejsonize(req.responseText);
    $('file_' + json.name).toggle();
}

function operations_change_priority(id){
    var priority = document.getElementById('new_priority_'+id).value;
    var pars = "func=changeOperationPriority&operation=" + id + "&newpriority=" +priority;
    return ajax_get(pars, operations_change_priority_complete, operations_failure);
}

function operations_change_priority_complete(req){
    var operation = pndejsonize(req.responseText);
    document.getElementById('new_priority_'+operation.id).value = operation.priority;
}

function operations_show_params(text){
    Zikula.UI.Alert(text, 'Paràmetres');
}

function operations_show_log(logId){
    var pars = "func=showOperationLog&log="+ logId;
    return ajax_get(pars, operations_show_log_complete, operations_failure);
}

function operations_show_log_complete(req){
    var json = pndejsonize(req.responseText);
    Zikula.UI.Alert(json.data, 'Registre');
}


function operations_execute(id){
    var pars = "func=executeOperationId&operation=" + id;
    return ajax_get(pars, operations_execute_complete, operations_failure);
}

function operations_changeState(id, state){
    var pars = "func=changeStateOperationId&operation=" + id+"&state="+state;
    return ajax_get(pars, false, operations_failure);
}

function operations_delete(id, state){
    var pars = "func=deleteOperationId&operation=" + id;
    return ajax_get(pars, false, operations_failure);
}

function operations_execute_complete(req){
    var json = pndejsonize(req.responseText);
    Zikula.UI.Alert(json.data, 'Executa');
}

function operations_failure(req){
    Zikula.UI.Alert('Revisa els resultats', 'Error');
}

function reload_off() {
    if(document.getElementById('reload') != undefined) {
        Element.update('reload', '');
    }
}

function reload_on() {
    if(document.getElementById('reload') != undefined) {
        Element.update('reload', '<span class="glyphicon glyphicon-refresh"></span>');
    }
}

function reload_error() {
    if(document.getElementById('reload') != undefined) {
        Element.update('reload', '<span class="text-danger glyphicon glyphicon-alert"></span>');
    }
}

function ajax_get(params, success, failure) {
    var obj = {
        method: 'get',
        parameters: "module=Agoraportal&" + params
    };
    return ajax_do("ajax.php", obj, success, failure);
}

function ajax_post(url, params, success, failure) {
    var obj = {
        method: 'post',
        parameters: params
    };
    url = "ajax.php?module=Agoraportal&" + url;
    return ajax_do(url, obj, success, failure);
}

function ajax_do(url, obj, success, failure) {
    reload_on();
    obj.onComplete = ajax_complete;
    obj.onException = reload_error;
    if (success != undefined && success != false) {
        obj.onSuccess = success;
    }
    if (failure != undefined && failure != false) {
        obj.onFailure = failure;
    }
    new Ajax.Request(url, obj);
    return false;
}

function ajax_complete(req) {
    if (req.status != 200){
        console.error(req);
        reload_error();
    } else {
        reload_off();
    }
}

function get_clients_selected() {
    var clients = "";
    var clients_sel = document.getElementById("clients_sel").options;

    for (var i in clients_sel){
        if(clients_sel[i].selected) {
            clients += clients_sel[i].value + ",";
        }
    }
    return clients.substr(0, clients.length - 1); //erase the last comma
}