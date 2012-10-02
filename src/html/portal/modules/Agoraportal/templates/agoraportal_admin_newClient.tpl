{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='filenew.png' set='icons/large'}</div>
    <h2>{gt text="Crea un client nou"}</h2>
    <form id="create" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='createClient'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <div class="z-formrow">
            <label for="clientCode">{gt text="Codi"}:</label>
            <input id="clientCode" name="clientCode" type="text" size="12" maxlength="15" value="{$client.clientCode}"/>
        </div>
        <div class="z-formrow">
            <label for="clientName">{gt text="Nom client"}:</label>
            <input id="clientName" name="clientName" type="text" size="50" maxlength="150" value="{$client.clientName}"/>
        </div>		
        <div class="z-formrow">
            <label for="clientDNS">{gt text="Nom propi"}:</label>
            <input id="clientDNS" name="clientDNS" type="text" size="20" maxlength="50" value="{$client.clientDNS}"/>
        </div>
        <div class="z-formrow">
            <label for="clientAddress">{gt text="Adreça"}:</label>
            <input id="clientAddress" name="clientAddress" type="text" size="50" maxlength="150" value="{$client.clientAddress}"/>
        </div>
        <div class="z-formrow">
            <label for="clientCity">{gt text="Població"}:</label>
            <input id="clientCity" name="clientCity" type="text" size="50" maxlength="50" value="{$client.clientCity}"/>
        </div>
        <div class="z-formrow">
            <label for="clientPC">{gt text="Codi postal"}:</label>
            <input id="clientPC" name="clientPC" type="text" size="7" maxlength="5" value="{$client.clientPC}"/>
        </div>
        <div class="z-formrow">
            <label for="clientDescription">{gt text="Descripció"}:</label>
            <input id="clientDescription" name="clientDescription" type="text" size="50" maxlength="255" value="{$client.clientDescription}"/>
        </div>
        <div class="z-formrow">
            <label for="clientState">{gt text="Actiu"}:</label>
            <input id="clientState" name="clientState" type="checkbox" {if $client.clientState eq 1}checked{/if} value="1" />
        </div>		
        <div class="z-center">
            <span class="z-buttons">
                <a href="javascript: document.forms['create'].submit();">
                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Crea" __title="Crea"}
                    {gt text="Crea"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='Agoraportal' type='admin' func='main'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                    {gt text="Cancel·la"}
                </a>
            </span>
        </div>
    </form>
</div>