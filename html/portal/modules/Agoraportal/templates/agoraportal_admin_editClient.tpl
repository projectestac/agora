{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Edita el client"}</h3>
<form id="editService" class="form-horizontal" action="{modurl modname='Agoraportal' type='admin' func='updateClient'}" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="clientId" value="{$client->clientId}" />
    <input type="hidden" name="onlyClient" value="1" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientCode">{gt text="Codi"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientCode" type="text" name="clientCode" size="15" maxlength="15" value="{$client->clientCode}" disabled/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientDNS">{gt text="Nom propi"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientDNS" type="text" name="clientDNS" size="15" maxlength="50" value="{$client->clientDNS}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientName">{gt text="Nom client"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientName" type="text" name="clientName" size="15" maxlength="50" value="{$client->clientName}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientAddress">{gt text="Adreça"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientAddress" type="text" name="clientAddress" size="30" maxlength="150" value="{$client->clientAddress}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientCity">{gt text="Població"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientCity" type="text" name="clientCity" size="30" maxlength="50" value="{$client->clientCity}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientPC">{gt text="Codi postal"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientPC" type="text" name="clientPC" size="5" maxlength="5" value="{$client->clientPC}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="location">{gt text="Servei Territorial"}:</label>
        <div class="col-sm-8">
            <select class="form-control" id="location" name="locationId">
                <option value="0">{gt text="Tria un Servei Territorial..."}</option>
                {foreach item=location key=locationId from=$locations}
                    <option {if $client->locationId eq $locationId}selected{/if} value="{$locationId}">{$location}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="type">{gt text="Tipus de centre"}:</label>
        <div class="col-sm-8">
            <select class="form-control" id="type" name="typeId">
                <option value="0">{gt text="Tria un tipus de centre..."}</option>
                {foreach item=type key=typeId from=$types}
                    <option {if $client->typeId eq $typeId}selected{/if} value="{$typeId}">{$type}</option>
                {/foreach}
            </select>
        </div>
    </div>
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

    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientDescription">{gt text="Descripció"}:</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="clientDescription" cols="50" rows="5" name="clientDescription">{$client->clientDescription}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-sm-8">
            <label class="control-label" for="educat">
            <input id="educat" type="checkbox" {if $client->educat eq 1}checked{/if} name="educat" value="1"/>
                {gt text="Centre eduCAT 1x1"}
                <img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle"/>
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-sm-8">
            <label class="control-label" for="noVisible">
                <input id="noVisible" type="checkbox" {if $client->noVisible eq 1}checked{/if} name="noVisible" value="1"/>
                {gt text="No visible a la llista pública de centres"}
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-sm-8">
            <label class="control-label" for="clientState">
                <input id="clientState" type="checkbox" {if $client->clientState eq 1}checked{/if} name="clientState" value="1"/>
                {gt text="Actiu"}
            </label>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-success" title="Desa" type="submit">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Desa"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='main'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>
