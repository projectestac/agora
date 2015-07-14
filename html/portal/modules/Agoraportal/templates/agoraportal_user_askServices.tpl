{include file="agoraportal_user_menu.tpl" askServices=true clientCode=$client->clientCode}
<h3>{gt text="Sol·licita el servei"} <strong>{$service->serviceName|capitalize}</strong></h3>
<div class="serviceInfo">
    <form action="{modurl modname='Agoraportal' type='user' func='updateAskService'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="clientCode" value="{$client->clientCode}" />
        <input type="hidden" name="serviceId" value="{$service->serviceId}" />
        <div class="panel panel-info">
            <div class="panel-heading">
                <img src="modules/Agoraportal/images/{$service->serviceName}.gif" alt="{$service->serviceName}" title="{$service->serviceName}" align="middle" />
            </div>
            <div class="panel-body">
                <p><strong>Descripció del servei:</strong> {$service->description}</p>
                {if $service->serviceName == 'nodes'}
                    <strong>{gt text="Indica la plantilla que vols fer servir:"}</strong>
                    <div style="margin: 5px 0px 20px 15px;">
                        {foreach item=template key=code from=$templates}
                            <label>
                                <input type="radio" name="template" value="{$code}"> {$template}
                            </label><br>
                        {/foreach}
                    </div>
                {/if}
            </div>
        </div>
        <div class="form-group">
            <label>{gt text="Sol·licitud enviada per"}:</label> {$contactName}
        </div>
        <div class="form-group">
            <label class="control-label" for="contactProfile">{gt text="Càrrec en el centre"}:</label>
            <input class="form-control" type="text" id="contactProfile" name="contactProfile" size="30" maxlength="50" value="{$contactProfile}"/>
        </div>
        {if $accessLevel neq 'admin'}
            <h4>Condicions d'ús del servei Àgora</h4>
            <div class="form-group">
                <article class="useTerms">
                    {include file="agoraportal_user_terms.tpl"}
                </article>
            </div>
            <div class="form-group">
                <input id="userTerms" type="checkbox" name="acceptUseTerms" {if $acceptUseTerms eq 1}checked{/if} value="1" />
                <label for="userTerms">{gt text="En nom del centre <strong>%s</strong> accepto les condicions d'ús del servei." tag1=$client->clientName}</label>
        </div>
        {/if}
        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Envia"}
            </button>
            <a role="button"  class="btn btn-danger" href="{modurl modname='Agoraportal' type='user' func='main'}">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
            </a>
        </div>
    </form>
    </div>
