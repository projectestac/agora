{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Configura"}</h3>
<form  class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" name="config" id="config" action="{modurl modname='Agoraportal' type='admin' func='updateConfig'}">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="siteBaseURL">{gt text="Adreça base"}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" id="siteBaseURL" name="siteBaseURL" size="50" maxlength="150" value="{$siteBaseURL}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="warningMailsTo">{gt text="Adreces de correu a on s'han d'enviar els missatges relatius al consum del disc"}</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="warningMailsTo" ="warningMailsTo" rows="3">{$warningMailsTo}</textarea>
            <div class="alert alert-info">
                {gt text="Separeu la llista d'adreces per comes."}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="requestMailsTo">{gt text="Adreces de correu on s'ha d'avisar en cas de sol·licituds d'augment d'espai de disc"}</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="requestMailsTo" name="requestMailsTo" rows="3">{$requestMailsTo}</textarea>
            <div class="alert alert-info">
                {gt text="Separeu la llista d'IP per comes."}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="diskRequestThreshold">{gt text="Ocupació a partir de la qual es pot demanar ampliació de quota (%)"}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" id="diskRequestThreshold" name="diskRequestThreshold" size="10" maxlength="50" value="{$diskRequestThreshold}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="maxFreeQuotaForRequest">{gt text="Quota lliure màxima per poder demanar ampliació de quota (MB)"}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" id="maxFreeQuotaForRequest" name="maxFreeQuotaForRequest" size="10" maxlength="50" value="{$maxFreeQuotaForRequest}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientsMailThreshold">{gt text="Ocupació a partir de la qual s'avisa per correu electrònic als clients (%)"}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" id="clientsMailThreshold" name="clientsMailThreshold" size="10" maxlength="50" value="{$clientsMailThreshold}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="maxAbsFreeQuota">{gt text="Quota lliure màxima per a que s'avisi per correu electrònic als clients (MB)"}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" id="maxAbsFreeQuota" name="maxAbsFreeQuota" size="10" maxlength="50" value="{$maxAbsFreeQuota}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="createDB">{gt text="En fer una alta de Nodes, intenta crear la base de dades MySQL si no existeix"}</label>
        <div class="col-sm-8">
            <input type="checkbox" id="createDB" name="createDB" {if $createDB}checked="checked"{/if} />
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success" title="Modifica la configuració">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Modifica la configuració"}
        </button>
    </div>
</form>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">{gt text="Tipus de serveis disponibles"} <span id="reload"></span></div>
    <div class="panel-body">
        <form name="servicesList" id="servicesList">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>{gt text="Id"}</th>
                        <th>{gt text="Nom"}</th>
                        <th>{gt text="URL"}</th>
                        <th>{gt text="Descripció"}</th>
                        <th>{gt text="Té base de dades"}</th>
                        <th>{gt text="Prefix de la base de dades"}</th>
                        <th>{gt text="Clients permesos *"}</th>
                        <th>{gt text="Directori base"}</th>
                        <th>{gt text="Espai disc"}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=service key=id from=$services}
                        {assign  var="extra" value=$extras[$id]}
                        <tr id="service{$service->serviceId}">
                            {include file="config_serviceRow.tpl"}
                        </tr>
                    {foreachelse}
                    <tr>
                        <td colspan="11">
                            <div class="alert alert-warning">
                                {gt text="No s'han trobat serveis"}
                            </div>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </form>
        <div class="alert alert-info">
            {gt text="* Codi dels clients separats per coma. En blanc no hi ha restriccions"}
        </div>
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading clearfix">{gt text="Plantilles de Nodes"}
    <a class="btn btn-default pull-right" href="{modurl modname='Agoraportal' type='admin' func='addNewModelType'}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        {gt text="Afegeix un tipus de maqueta nou"}
    </a></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>{gt text="Codi curt (nom fitxer)"}</th>
                    <th>{gt text="Descripció (askServices)"}</th>
                    <th>{gt text="URL (per replace)"}</th>
                    <th>{gt text="Base de dades (per replace)"}</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=type from=$templates}
                <tr>
                    <td>{$type->shortcode}</td>
                    <td>{$type->description}</td>
                    <td>{$type->url}</td>
                    <td>{$type->dbHost}</td>
                    <td class="text-right">
                        <div class="btn-group" role="group">
                            <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editModelType' modelTypeId=$type->modelTypeId}" title="Edita la Tplantilla">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                <span class="sr-only">Edita la plantilla</span>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm_delete('la plantilla de Nodes {$type->description|escape:'quotes'}')" href="{modurl modname='Agoraportal' type='admin' func='deleteModelType' modelTypeId=$type->modelTypeId}" title="Esborra la plantilla">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                <span class="sr-only">Esborra la plantilla</span>
                            </a>
                        </div>
                    </td>
                </tr>
                {foreachelse}
                <tr><td colspan="4">{gt text="No s'ha trobat cap tipus de maqueta"}</td></tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading clearfix">{gt text="Tipus de sol·licituds i serveis assignats"}
        <a class="btn btn-default pull-right" href="{modurl modname='Agoraportal' type='admin' func='addNewRequestTypeService'}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            {gt text="Afegeix un servei nou al tipus de sol·licitud"}
        </a>
        <a class="btn btn-default pull-right" href="{modurl modname='Agoraportal' type='admin' func='addNewRequestType'}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            {gt text="Afegeix un tipus de sol·licitud nou"}
        </a>
    </div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>{gt text="Tipus de sol·licitud"}</th>
                <th>{gt text="Serveis assignats"}</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
                {foreach item=type from=$requesttypes}
                <tr>
                    <td>{$type->name}</td>
                    <td>
                        {foreach item=logo key=serviceId from=$type->logos}
                            <a class="btn btn-warning" onclick="return confirm_delete('el servei del Tipus de Sol·licitud {$type->name|escape:'quotes'}')" href="{modurl modname='Agoraportal' type='admin' func='deleteRequestTypeService' requestTypeId=$type->requestTypeId serviceId=$serviceId}" title="Esborra el servei del Tipus de Sol·licitud">
                                {$logo}
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                <span class="sr-only">Esborra el servei del Tipus de Sol·licitud</span>
                            </a>
                        {foreachelse}
                        No hi ha serveis assignats
                        {/foreach}
                    </td>
                    <td class="text-right">
                        <div class="btn-group" role="group">
                            <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editRequestType' requestTypeId=$type->requestTypeId}" title="Edita el Tipus de Sol·licitu">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                <span class="sr-only">Edita el Tipus de Sol·licitu</span>
                            </a>
                            {if !$type->logos}
                                <a class="btn btn-danger" onclick="return confirm_delete('el Tipus de Sol·licitud {$type->name|escape:'quotes'}')" href="{modurl modname='Agoraportal' type='admin' func='deleteRequestType' requestTypeId=$type->requestTypeId}" title="Esborra el Tipus de Sol·licitud">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    <span class="sr-only">Esborra el Tipus de Sol·licitud</span>
                                </a>
                            {/if}
                        </div>
                    </td>
                </tr>
                {foreachelse}
                <tr><td colspan="2">{gt text="No s'han trobat tipus de Sol·licituds"}</td></tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading clearfix">{gt text="Serveis Territorials"}
    <a class="btn btn-default pull-right" href="{modurl modname='Agoraportal' type='admin' func='addNewLocation'}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            {gt text="Afegeix un Servei Territorial nou"}
        </a></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>{gt text="Servei Territorial"}</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
                {foreach item=location key=locationId from=$locations}
                <tr>
                    <td>{$location}</td>
                    <td class="text-right">
                        <div class="btn-group" role="group">
                            <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editLocation' locationId=$locationId}" title="Edita el Servei Territorial">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                <span class="sr-only">Edita el Servei Territorial</span>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm_delete('el Servei Territorial {$location|escape:'quotes'}')" href="{modurl modname='Agoraportal' type='admin' func='deleteLocation' locationId=$locationId}" title="Esborra el Servei Territorial">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                <span class="sr-only">Esborra el Servei Territorial</span>
                            </a>
                        </div>
                    </td>
                </tr>
                {foreachelse}
                <tr><td colspan="2">{gt text="No s'han trobat SSTT"}</td></tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading clearfix">{gt text="Tipologies de centres"}
     <a class="btn btn-default pull-right" href="{modurl modname='Agoraportal' type='admin' func='addNewType'}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            {gt text="Afegeix una tipologia de centre nova"}
        </a></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>{gt text="Tipologia de centre"}</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
                {foreach item=schooltype key=typeId from=$schooltypes}
                <tr>
                    <td>{$schooltype}</td>
                    <td class="text-right">
                        <div class="btn-group" role="group">
                            <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editType' typeId=$typeId}" title="Edita la Tipologia de centre">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                <span class="sr-only">Edita la Tipologia de centre</span>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm_delete('la Tipologia de centre {$schooltype|escape:'quotes'}')" href="{modurl modname='Agoraportal' type='admin' func='deleteType' typeId=$typeId}" title="Esborra la Tipologia de centre">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                <span class="sr-only">Esborra la Tipologia de centre</span>
                            </a>
                        </div>
                    </td>
                </tr>
                {foreachelse}
                <tr><td colspan="2">{gt text="No s'han trobat tipologies de centres"}</td></tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
