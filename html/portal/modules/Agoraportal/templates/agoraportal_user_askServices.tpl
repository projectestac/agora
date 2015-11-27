{include file="agoraportal_user_menu.tpl" askServices=true clientCode=$clientCode}
<div class="usercontainer">
    {if $noaccess}
        <div class="z-informationmsg" style="margin: 200px;">
            {gt text="Només poden sol·licitar serveis d'Àgora les persones que el centre ha designat com a gestores. Trobareu informació sobre què són i com es designen els gestors de centre en <a href=\"http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=461&mode=entry&hook=941\" target=\"_blank\">aquesta pàgina</a>."}
        </div>
    {else}
        <h2>{gt text="Sol·licita el servei"} <strong>{$service.serviceName|capitalize}</strong></h2>
        {if $isAdmin}
            {include file="agoraportal_admin_clientInfo.tpl"}
        {/if}
        <div class="serviceInfo">
            <form id="askForService" class="userForm" action="{modurl modname='Agoraportal' type='user' func='updateAskService'}" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
                <input type="hidden" name="clientCode" value="{$clientCode}" />
                <input type="hidden" name="serviceId" value="{$service.serviceId}" />

                <div class="askServiceDescription">
                    <img src="modules/Agoraportal/images/{$service.serviceName}.gif" alt="{$service.serviceName}" title="{$service.serviceName}" align="middle" />
                    <p><strong>Descripció del servei:</strong> {$service.description}</p>

                    {if $service.serviceName == 'nodes'}
                        <strong>{gt text="Indica la plantilla que vols fer servir:"}</strong>
                        <div style="margin: 5px 0px 20px 15px;">
                            {foreach item=modeltype from=$modeltypes}
                                <input type="radio" id="{$service.serviceName}_{$modeltype.shortcode}" name="{$service.serviceName}" value="{$modeltype.shortcode}" />
                                <label for="{$service.serviceName}_{$modeltype.shortcode}">{$modeltype.description}</label>
                                <br />
                            {/foreach}
                        </div>
                    {/if}
                </div>

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
        </div>
    {/if}
</div>