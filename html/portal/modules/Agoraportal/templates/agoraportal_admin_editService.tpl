{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Edita el servei"}</h3>
<form id="editClientServiceForm" class="form-horizontal" action="{modurl modname='Agoraportal' type='admin' func='updateService'}" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="clientServiceId" value="{$service->clientServiceId}" />

    {include file="agoraportal_admin_clientInfo.tpl"}

    <div class="panel panel-info">
        <div class="panel-heading">{gt text="Dades del servei"} <img src="modules/Agoraportal/images/{$serviceName}.gif" alt="{$serviceName}" title="{$serviceName}"/></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Sol·licitant"}:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {$service->contactName} ({$service->useremail}). {$service->contactProfile}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Data de sol·licitud"}:</label>
                <div class="col-sm-8"><p class="form-control-static">{$service->timeRequested|dateformat:"%d/%m/%Y - %H:%m"}</p></div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Data de creació"}:</label>
                <div class="col-sm-8"><p class="form-control-static">{$service->timeCreated|dateformat:"%d/%m/%Y - %H:%m"}</p></div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Data d'edició"}:</label>
                <div class="col-sm-8"><p class="form-control-static">{$service->timeEdited|dateformat:"%d/%m/%Y - %H:%m"}</p></div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="state">{gt text="Estat"}:</label>
                <div class="col-sm-8">
                    <select  class="form-control" id="state" name="state" onchange="autoActions({$service->serviceId})">
                        <option {if $service->state eq 0}selected{/if} value="0">{gt text="Per revisar"}</option>
                        <option {if $service->state eq 1}selected{/if} value="1">{gt text="Actiu"}</option>
                        <option {if $service->state eq -2}selected{/if} value="-2">{gt text="Denegat"}</option>
                        <option {if $service->state eq -3}selected{/if} value="-3">{gt text="Donat de baixa (Perd assignació amb BD)"}</option>
                        <option {if $service->state eq -4}selected{/if} value="-4">{gt text="Desactivat"}</option>
                    </select>
                </div>
            </div>
            {if $serviceName eq 'nodes'}
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="extraFunc">{gt text="Plantilla del servei"}:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="extraFunc" name="extraFunc">
                            <option value="0">{gt text="Tria un tipus de plantilla..."}</option>
                            {foreach item=template key=code from=$templates}
                                <option {if $client->extraFunc eq $code}selected{/if} value="{$code}">{$template}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            {/if}
            <div class="form-group">
                <div class="col-md-offset-4 col-sm-8">
                    {if $mailer}
                        <label class="control-label" for="sendMail">
                            <input id="sendMail" type="checkbox" name="sendMail" value="1" />
                            {gt text="Envia un correu al centre i a la persona que ha sol·licitat l'activació en cas de canvis"}
                        </label>
                    {else}
                        <span class="alert alert-danger">
                            {gt text="El Mailer no està operatiu"}
                        </span>
                    {/if}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="serviceDB">{gt text="Base de dades"}:</label>
                <div class="col-sm-8">
                    <input class="form-control" id="serviceDB" type="text" name="serviceDB" size="30" maxlength="30" value="{$service->serviceDB}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="diskSpace">{gt text="Espai disc"}:</label>
                <div class="col-sm-8">
                    <input class="form-control" id="diskSpace" type="text" name="diskSpace" size="7" maxlength="5" value="{$service->diskSpace}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="observations">{gt text="Observacions (visible per part dels clients)"}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="observations" rows="5" name="observations">{$service->observations}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="annotations">{gt text="Anotacions (només no veuen els administradors)"}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="5" id="annotations" name="annotations">{$service->annotations}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-success" title="Desa" onclick="editClientService();">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Desa"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='main'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>
<script>
    var confirmDischarge = "{{gt text='Estàs a punt de donar de baixa un servei. Aquesta acció no es pot desfer. N\'estàs completament segur/a?'}}";
    var autoAnnotations = "{{$service->annotations}}{{gt text='Deixa la base de dades:'}}" + " {{$service->serviceDB}}";
    var autoObservations = "{{$service->observations}}{{gt text='Baixa automàtica del servei per inactivitat durant més de 12 mesos.'}}";
</script>
