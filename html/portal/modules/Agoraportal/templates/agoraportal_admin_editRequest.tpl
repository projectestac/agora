{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
    <h2>{gt text="Edita la sol·licitud"}</h2>
    {foreach item=client from=$requests}	
    <form id="editRequestForm" class="z-form" action="{modurl modname='Agoraportal' type='admin' func='updateRequest'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="requestId" value="{$requestId}" />
        <input type="hidden" name="clientId" value="{$client.clientId}" />
        <input type="hidden" name="clientCode" value="{$client.clientCode}" />
        <input type="hidden" name="init" value="{$init}" />
        <input type="hidden" name="search" value="{$search}" />
        <input type="hidden" name="searchText" value="{$searchText}" />
        <input type="hidden" name="service" value="{$service}" />
        <input type="hidden" name="stateFilter" value="{$stateFilter}" />
        <div class="userFormInputs">
            <fieldset>
                <legend>&nbsp;{gt text="Dades del client"}&nbsp;</legend>
                <div class="z-formrow">
                    <label><strong>{gt text="Codi"}</strong></label>
                    {$client.clientCode}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Nom propi"}</strong></label>
                    {$client.dns}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Nom client"}</strong></label>
                    {$client.clientName}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Adreça"}</strong></label>
                    {$client.clientAddress}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Població"}</strong></label>
                    {$client.clientCity}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Codi postal"}</strong></label>
                    {$client.clientPC}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Actiu"}</strong></label>
                    {if $client.clientState eq 1}Sí {else}No{/if}
                </div>
            </fieldset>

            <fieldset>
                <legend>&nbsp;{gt text="Dades de contacte"}&nbsp;</legend>
                <div class="z-formrow">
                    <label><strong>{gt text="Ha Enviat"}</strong></label>
                    {$client.username}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Correu electrònic de la persona que ha enviat la sol·licitud"}</strong></label>
                    {$client.email}
                </div>
            </fieldset>

            <fieldset>
                <legend>&nbsp;{gt text="Estat de la sol·licitud"}&nbsp;</legend>
                <div class="z-formrow">
                    <label for="state"><strong>{gt text="Estat"}</strong></label>
                    <select id="state" name="state" onchange="autoActionsRequests()" >
                        {foreach item=state from=$requestsstates}
                        <option value="{$state.requestStateId}" {if $client.requestStateId eq $state.requestStateId}selected{/if}>{$state.name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="sendMail"><strong>{gt text="Notifica el canvi d'estat per correu al centre i als gestors"}</strong></label>
                    {if $mailer}
                    <input id="sendMail" name="sendMail" type="checkbox" />
                    <input name="stateOriginal" type="hidden" value="{$client.requestStateId}"/>
                    {else}
                    <span class="denegated">
                        {gt text="El Mailer no està operatiu"}
                    </span>
                    {/if}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Tipus de sol·licitud"} </strong></label>
                    {$client.type}
                </div>
                <div class="z-formrow">
                    <label><strong>{gt text="Servei"} </strong></label>
                    {$client.serviceName}
                </div>
                <div class="z-formrow">
                    <label for="userComments"><strong>{gt text="Observacions enviades pel client"}</strong></label>
                    <textarea id="userComments" name="userComments" rows="5">{$client.userComments}</textarea>
                </div>
                <div class="z-formrow">
                    <label for="adminComments"><strong>{gt text="Observacions a enviar al client"}</strong></label>
                    <textarea id="adminComments" name="adminComments" rows="10">{$client.adminComments}</textarea>
                </div>
                <div class="z-formrow">
                    <label for="privateNotes"><strong>{gt text="Anotacions (només ho veuen els administradors)"}</strong></label>
                    <textarea id="privateNotes" name="privateNotes" rows="4">{$client.privateNotes}</textarea>
                </div>
            </fieldset>

            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:sendUpdateRequest();">
                        {img modname='core' src='button_ok.png' set='icons/small' __alt='Desa' __title='Desa'}
                        {gt text="Desa"}
                    </a>
                </span>
                <span class="z-buttons">
                    <a href="{modurl modname='Agoraportal' type='admin' func='requestsList'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt='Cancel·la' __title='Cancel·la'}
                        {gt text="Cancel·la"}
                    </a>
                </span>
            </div>
        </div>
    </form>
</div>
{/foreach}