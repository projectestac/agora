{include file="agoraportal_user_menu.tpl" askServices=true clientCode=$clientCode}
<div class="usercontainer">
    <div class="z-pageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Serveis disponibles que no han estat sol·licitats"}</h2>	
    {if $isAdmin}
    {include file="agoraportal_admin_clientInfo.tpl"}
    {/if}
    <div class="serviceInfo">
        {if $notsolicitedServices|@count gt 0}
        <fieldset>
            <form id="askForService" class="userForm" action="{modurl modname='Agoraportal' type='user' func='updateAskService'}" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
                <input type="hidden" name="clientCode" value="{$clientCode}" />
                <div class="serviceImgx">
                    <div class="z-informationmsg" style="clear:both;">
                        {gt text="Els serveis que encara no heu sol·licitat són els següents:"}
                        <ul>
                            {foreach item=service from=$notsolicitedServices}
                            <li><b>{$service.serviceName}</b>. {$service.description}</li>
                            {/foreach}                        
                        </ul>
                        {gt text="Marqueu només els serveis que vulgueu sol·licitar i llegiu atentament les condicions d'ús abans d'acceptar-les."}
                    </div>
                    {foreach item=service from=$notsolicitedServices}
                    <div class="serviceCheckbox">
                        <input type="checkbox" id="{$service.serviceName}" name="serviceId[]" value="{$service.serviceId}" onClick="javascript:askServiceCheckActive('{$service.serviceName}');" />
                               <img src="modules/Agoraportal/images/{$service.serviceName}.gif" alt="{$service.serviceName}" title="{$service.serviceName}" align="middle" />
                    </div>
                    {/foreach}
                </div>
                <br/><br/><br/>
                <div class="userFormInputs">
                    <div class="userFormRow">
                        <label for="contactName">{gt text="Sol·licitud enviada per"}:</label>
                        <span><strong>{$contactName}</strong></span>
                    </div>
                    <div class="userFormRow">
                        <label for="contactProfile">{gt text="Càrrec en el centre"}:</label>
                        <input type="text" name="contactProfile" size="30" maxlength="50" value="{$contactProfile}"/>
                    </div>

                    {if !$isAdmin}
                    <div class="userFormRow">
                        <div class="useTerms">
                            {include file="agoraportal_user_terms.tpl"}
                        </div>
                    </div>
                    <div class="touAcceptance">
                        <input id="userTerms" class="userFormRow" type="checkbox" name="acceptUseTerms" {if $acceptUseTerms eq 1}checked{/if} value="1" />
                        <label for="userTerms">{gt text="En nom del centre <strong>%s</strong> accepto les condicions d'ús del servei." tag1=$client.clientName}</label>
                    </div>
                    {/if}
                </div>
                <div class="z-center">
                    <span class="z-buttons optionButton">
                        <a href="javascript:document.forms['askForService'].submit();">
                            {img modname='core' src='button_ok.png' set='icons/small' __alt="Envia" __title="Envia"} {gt text="Envia"}
                        </a>
                    </span>
                    <span class="z-buttons optionButton">
                        <a href="{modurl modname='Agoraportal' type='user' func='main'}">
                            {img modname='core' src='button_cancel.png' set='icons/small'   __alt="Cancel·la" __title="Cancel·la"} {gt text="Cancel·la"}
                        </a>
                    </span>
                </div>
            </form>
        </fieldset>
        {else}
        {gt text="Ja teniu activats tots els serveis possibles."}
        {/if}
    </div>
</div>