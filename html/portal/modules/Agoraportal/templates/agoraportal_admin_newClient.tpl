{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Crea un client nou"}</h3>
<form class="form-horizontal" action="{modurl modname='Agoraportal' type='admin' func='createClient'}" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientCode">{gt text="Codi"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientCode" name="clientCode" type="text" size="12" maxlength="15" value="{$client.clientCode}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientName">{gt text="Nom client"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientName" name="clientName" type="text" size="50" maxlength="150" value="{$client.clientName}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientDNS">{gt text="Nom propi"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientDNS" name="clientDNS" type="text" size="20" maxlength="50" value="{$client.clientDNS}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientAddress">{gt text="Adreça"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientAddress" name="clientAddress" type="text" size="50" maxlength="150" value="{$client.clientAddress}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientCity">{gt text="Població"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientCity" name="clientCity" type="text" size="50" maxlength="50" value="{$client.clientCity}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientPC">{gt text="Codi postal"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientPC" name="clientPC" type="text" size="7" maxlength="5" value="{$client.clientPC}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientDescription">{gt text="Descripció"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="clientDescription" name="clientDescription" type="text" size="50" maxlength="255" value="{$client.clientDescription}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="clientState">{gt text="Actiu"}:</label>
        <div class="col-sm-8">
            <input id="clientState" name="clientState" type="checkbox" {if $client.clientState eq 1}checked{/if} value="1" />
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  {gt text="Crea"}
        </button>
        <a class="btn btn-danger" href="{modurl modname='Agoraportal' type='admin' func='main'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  {gt text="Cancel·la"}
        </a>
    </div>
</form>
