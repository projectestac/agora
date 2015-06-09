{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    <h2>{gt text="Edita el client"}</h2>
    <form id="editService" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='updateService'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="clientId" value="{$client.clientId}" />
        <input type="hidden" name="init" value="{$init}" />
        <input type="hidden" name="search" value="{$search}" />
        <input type="hidden" name="searchText" value="{$searchText}" />
        <input type="hidden" name="onlyClient" value="1" />
        <div class="z-formrow">
            <label for="clientCode">{gt text="Codi"}:</label>
            <input id="clientCode" type="text" name="clientCode" size="15" maxlength="15" value="{$client.clientCode}" onFocus=blur() class="noEditable"/>
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
            <label for="location">{gt text="Servei Territorial"}:</label>
            <select id="location" name="locationId">
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
            <label for="educat">{gt text="Centre eduCAT 1x1"}:</label>
            <input id="educat" type="checkbox" {if $client.educat eq 1}checked{/if} name="educat" value="1"/>
        </div>
        <div class="z-formrow">
            <label for="noVisible">{gt text="No visible a la llista pública de centres"}:</label>
            <input id="noVisible" type="checkbox" {if $client.noVisible eq 1}checked{/if} name="noVisible" value="1"/>
        </div>
        <div class="z-formrow">
            <label for="clientDescription">{gt text="Descripció"}:</label>
            <textarea id="clientDescription" cols="50" rows="5" name="clientDescription">{$client.clientDescription}</textarea>
        </div>
        <div class="z-formrow">
            <label for="clientState">{gt text="Actiu"}:</label>
            <input id="clientState" type="checkbox" {if $client.clientState eq 1}checked{/if} name="clientState" value="1"/>
        </div>
        <div class="z-center">
            <a href="javascript: document.forms['editService'].submit();">
                {img modname='core' src='button_ok.png' set='icons/small' __alt="Edita" __title="Edita"}
                {gt text="Edita"}
            </a>
            <a href="{modurl modname='Agoraportal' type='admin' func='main'}">
                {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                {gt text="Cancel·la"}
            </a>
        </div>
    </form>
</div>