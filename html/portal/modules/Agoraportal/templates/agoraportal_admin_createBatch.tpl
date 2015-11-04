{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <h2>{gt text="Creació Massiva"}</h2>
    <div>
        <p>Aquest script crea el servei per als codis de centre que s'indiquin. Punts a tenir en compte:</p>
        <ul>
            <li>El client ha d'estar donat d'alta</li>
            <li>El codi de centre ha de ser una lletra [abce] seguida de 7 números</li>
            <li>Es buscarà la propera BD lliure (sense servei activat)</li>
        </ul>
    </div>
    <form id="createBatchForm" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='createBatch_exec'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="service" value="{$service}" />
        <input type="hidden" name="stateFilter" value="{$stateFilter}" />
        <div class="userFormInputs">
            <fieldset>
                <div class="z-formrow">
                    <label for="clientDescription">Llista de codis de centre separats per comes:</label>
                    <textarea id="schoolCodes" style="width: 65%" rows="5" name="schoolCodes" rows="10" cols="80" placeholder="Exemple: a8000000, a8000001, a8000002">{$schoolCodes}</textarea>
                </div>
                <div class="z-formrow">
                    <label for="service_sel">{gt text="Servei"}:</label>
                    <select name="service_sel" id="service_sel" onchange="sqlservicesList(); {$serviceSQL}">
                        {foreach item=service from=$services}
                        <option value="{$service.serviceId}" {if $service_sel eq $service.serviceId}selected="selected"{/if}>{gt text="%s" tag1=$service.serviceName}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="dbHost">{gt text="dbHost (només per intranet i nodes) [opcional]"}:</label>
                    <input id="dbHost" type="text" name="dbHost" size="30" maxlength="50" value="{$dbHost}"/>
                </div>
                <div class="z-formrow">
                    <label for="template">{gt text="Plantilla (només nodes)"}:</label>
                    <input id="template" type="text" name="template" size="30" maxlength="50" value="{$template}"/>
                </div>
                <div class="z-formrow">
                    <label for="createClient">{gt text="Crea els clients que no existeixin"}:</label>
                    <input id="createClient" type="checkbox" {if $createClient eq 1}checked{/if} name="createClient" value="1"/>
                </div>
            </fieldset>
            <div class="z-center">
                <span class="z-buttons">
                    <input name="confirm" value="Executa" type="submit" />
                </span>
                <span class="z-buttons">
                    <a href="{modurl modname='Agoraportal' type='admin' func='main'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                        {gt text="Cancel·la"}
                    </a>
                </span>
            </div>
        </div>
        <div style="clear:both;"></div>
    </form>
</div>
<script>
    var confirmDischarge = "{{gt text='Estàs a punt de donar de baixa un servei. Aquesta acció no es pot desfer. N\'estàs completament segur/a?'}}";
    var autoAnnotations = "{{$client.annotations}}{{gt text='Deixa la base de dades:'}}" + " {{$client.serviceDB}}";
    var autoObservations = "{{$client.observations}}{{gt text='Baixa automàtica del servei per inactivitat durant més de 12 mesos.'}}";
</script>
