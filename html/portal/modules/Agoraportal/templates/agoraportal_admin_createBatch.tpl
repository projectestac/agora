{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Creació Massiva"}</h3>
<div class="alert">
    <p>Aquest script crea el servei per als codis de centre que s'indiquin. Punts a tenir en compte:</p>
    <ul>
        <li>El client ha d'estar donat d'alta</li>
        <li>El codi de centre ha de ser una lletra [abce] seguida de 7 números</li>
        <li>Es buscarà la propera BD lliure (sense servei activat)</li>
    </ul>
</div>
<form id="createBatchForm"  class="form-horizontal" action="{modurl modname='Agoraportal' type='admin' func='createBatch_exec'}" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="service" value="{$service}" />
    <input type="hidden" name="stateFilter" value="{$stateFilter}" />
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label" for="schoolCodes">{gt text="Llista de codis de centre separats per comes"}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="schoolCodes" name="schoolCodes" rows="10" cols="80" placeholder="Exemple: a8000000, a8000001, a8000002">{$schoolCodes}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="service_sel">{gt text="Servei"}:</label>
                <div class="col-sm-8">
                    <select  class="form-control" id="service_sel" name="service_sel">
                        {foreach item=service from=$services}
                            <option value="{$service->serviceId}" {if $service_sel eq $service->serviceId}selected="selected"{/if}>{$service->serviceName}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="serviceDB">{gt text="Base de dades (només per intranet i nodes) [opcional]"}:</label>
                <div class="col-sm-8">
                    <input class="form-control" id="serviceDB" type="text" name="serviceDB" size="30" maxlength="30" value="{$serviceDB}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="template">{gt text="Plantilla del servei (només nodes)"}:</label>
                <div class="col-sm-8">
                    <select class="form-control" id="template" name="template">
                        <option value="0">{gt text="Tria un tipus de plantilla..."}</option>
                        {foreach item=templ key=code from=$templates}
                            <option {if $template eq $code}selected{/if} value="{$code}">{$templ}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-4 col-sm-8">
                    <label class="control-label" for="createClient">
                        <input id="createClient" type="checkbox" name="createClient" {if $createClient eq 1}checked{/if} value="1" />
                        {gt text="Crea els clients que no existeixin"}
                    </label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" title="Crea" name="confirm">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Crea"}
                </button>
                <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='main'}">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
                </a>
            </div>
        </div>
    </div>
</form>