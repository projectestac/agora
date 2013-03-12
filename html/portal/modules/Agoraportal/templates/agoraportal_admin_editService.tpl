{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    <h2>{gt text="Edita el servei"}</h2>
    <form id="editClientServiceForm" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='updateService'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="clientServiceId" value="{$client.clientServiceId}" />
        <input type="hidden" name="clientId" value="{$client.clientId}" />
        <input type="hidden" name="init" value="{$init}" />
        <input type="hidden" name="search" value="{$search}" />
        <input type="hidden" name="searchText" value="{$searchText}" />
        <input type="hidden" name="service" value="{$service}" />
        <input type="hidden" name="stateFilter" value="{$stateFilter}" />
        <div class="serviceImg">
            <img src="modules/Agoraportal/images/{$services[$client.serviceId].serviceName}.gif" alt="{$services[$client.serviceId].serviceName}" title="{$services[$client.serviceId].serviceName}" align="middle"/>
        </div>
        <div class="userFormInputs">
            <fieldset>
                <legend>{gt text="Dades del client"}</legend>
                <div class="z-formrow">
                    <label for="clientCode">{gt text="Codi"}:</label>
                    <input id="clientCode" type="text" name="clientCode" size="15" maxlength="15" value="{$client.clientCode}" onFocus=blur() class="noEditable" />
                </div>
                <div class="z-formrow">
                    <label for="clientDNS">{gt text="Nom propi"}:</label>
                    <input id="clientDNS" type="text" name="clientDNS" size="15" maxlength="50" value="{$client.clientDNS}"/>
                </div>
                <div class="z-formrow">
                    <label for="clientName">{gt text="Nom client"}:</label>
                    <input id="clientName" type="text" name="clientName" size="15" maxlength="50" value="{$client.clientName}"/>
                </div>
                <div class="z-formrow">
                    <label for="clientAddress">{gt text="Adreça"}:</label>
                    <input id="clientAddress" type="text" name="clientAddress" size="30" maxlength="150" value="{$client.clientAddress}"/>
                </div>
                <div class="z-formrow">
                    <label for="clientCity">{gt text="Població"}:</label>
                    <input id="clientCity" type="text" name="clientCity" size="30" maxlength="50" value="{$client.clientCity}"/>
                </div>
                <div class="z-formrow">
                    <label for="clientPC">{gt text="Codi postal"}:</label>
                    <input id="clientPC" type="text" name="clientPC" size="5" maxlength="5" value="{$client.clientPC}"/>
                </div>
                <div class="z-formrow">
                    <label for="locationId">{gt text="Servei Territorial"}:</label>
                    <select id="locationId" name="locationId">
                        <option value="0">{gt text="Tria un Servei Territorial..."}</option>
                        {foreach item=location from=$locations}
                        <option {if $client.locationId eq $location.locationId}selected{/if} value="{$location.locationId}">{$location.locationName}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="type">{gt text="Tipus de centre"}:</label>
                    <select id="type" name="typeId">
                        <option value="0">{gt text="Tria un tipus de centre..."}</option>
                        {foreach item=type from=$types}
                        <option {if $client.typeId eq $type.typeId}selected{/if} value="{$type.typeId}">{$type.typeName}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="extraFunc">{gt text="Funcionalitats addicionals"}:</label>
                    <input id="extraFunc" type="text" name="extraFunc" size="15" maxlength="15" value="{$client.extraFunc}"/>
                </div>
                <div class="z-formrow">
                    <label for="educat">{gt text="Centre eduCAT 1x1"} <img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle"/>:</label>
                    <input id="educat" type="checkbox" {if $client.educat eq 1}checked{/if} name="educat" value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="educatNetwork">{gt text="Fa ús de la xarxa eduCAT 1x1"}:</label>
                    <input id="educatNetwork" type="checkbox" {if $client.educatNetwork eq 1}checked{/if} name="educatNetwork" value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="noVisible">{gt text="No visible a la llista pública de centres"}:</label>
                    <input id="noVisible" type="checkbox" {if $client.noVisible eq 1}checked{/if} name="noVisible" value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="clientDescription">{gt text="Descripció"}:</label>
                    <textarea id="clientDescription" style="width: 90%" rows="5" name="clientDescription">{$client.clientDescription}</textarea>
                </div>
                <div class="z-formrow">
                    <label for="clientState">{gt text="Actiu"}:</label>
                    <input id="clientState" type="checkbox" {if $client.clientState eq 1}checked{/if} name="clientState" value="1"/>
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Dades de contacte"}</legend>
                <div class="z-formrow">
                    <label for="contactName">{gt text="Ha Enviat"}:</label>
                    <input id="contactName" type="text" name="contactName" size="30" maxlength="150" value="{$client.contactName}"/>
                </div>
                <div class="z-formrow">
                    <label for="contactMail">{gt text="Correu electrònic de la persona que ha enviat la sol·licitud"}:</label>
                    <input id="contactMail" type="text" name="contactMail" size="30" maxlength="30" value="{$client.contactMail}"/>
                </div>
                <div class="z-formrow">
                    <label for="contactProfile">{gt text="Càrrec"}:</label>
                    <input id="contactProfile"  type="text" name="contactProfile" size="30" maxlength="50" value="{$client.contactProfile}"/>
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Estat del servei"}</legend>
                <div class="z-formrow">
                    <label for="state">{gt text="Estat"}:</label>
                    <select id="state" name="state" onchange="javascript:autoActions({$client.serviceId})">
                        <option {if $client.state eq 0}selected{/if} value="0">{gt text="Per revisar"}</option>
                        <option {if $client.state eq 1}selected{/if} value="1">{gt text="Actiu"}</option>
                        <option {if $client.state eq -2}selected{/if} value="-2">{gt text="Denegat"}</option>
                        <option {if $client.state eq -3}selected{/if} value="-3">{gt text="Donat de baixa"}</option>
                        <option {if $stateFilter eq -4}selected{/if} value="-4">{gt text="Desactivat"}</option>
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="sendMail">{gt text="Envia un correu al centre i a la persona que ha sol·licitat l'ativació en cas de canvis"}:</label>
                    {if $mailer}
                    <input id="sendMail" type="checkbox" name="sendMail" value="1" />
                    <input type="hidden" name="stateOriginal" value="{$client.state}"/>
                    {else}
                    <span class="denegated">
                        {gt text="El Mailer no està operatiu"}
                    </span>
                    <input id="sendMail" type="checkbox" name="sendMail" value="0"/>
                    {/if}
                </div>
                <div class="z-formrow">
                    <label for="dbHost">{gt text="Servidor de base de dades"}:</label>
                    <input id="dbHost" type="text" name="dbHost" size="30" maxlength="30" value="{$client.dbHost}" />
                </div>
                <div class="z-formrow">
                    <label for="version">{gt text="Versió del programari"}:</label>
                    <input id="version" type="text" name="version" size="30" maxlength="30" value="{$client.version}" />
                </div>
                <div class="z-formrow">
                    <label for="serviceDB">{gt text="Base de dades"}:</label>
                    <input id="serviceDB" type="text" name="serviceDB" size="30" maxlength="30" value="{$client.serviceDB}" />
                </div>
                <div class="z-formrow">
                    <label for="diskSpace">{gt text="Espai disc"}:</label>
                    <input id="diskSpace" type="text" name="diskSpace" size="7" maxlength="5" value="{$client.diskSpace}" />
                </div>
                <div class="z-formrow">
                    <label for="observations">{gt text="Observacions (visible per part dels clients)"}:</label>
                    <textarea id="observations" rows="5" name="observations">{$client.observations}</textarea>
                </div>
                <div class="z-formrow">
                    <label for="annotations">{gt text="Anotacions (només no veuen els administradors)"}:</label>
                    <textarea rows="5" id="annotations" name="annotations">{$client.annotations}</textarea>
                </div>
            </fieldset>
            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:editClientService();">
                        {img modname='core' src='button_ok.png' set='icons/small' __alt="Edita" __title="Edita"}
                        {gt text="Edita"}
                    </a>
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
