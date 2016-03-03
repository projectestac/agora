{adminheader}

{include file="agoraportal_admin_menu.tpl"}

<h3>{gt text="Edita la sol·licitud"}</h3>
<form id="editRequestForm" class="form-horizontal" action="{modurl modname='Agoraportal' type='admin' func='updateRequest'}" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="requestId" value="{$request->requestId}" />
    <input type="hidden" name="clientId" value="{$client->clientId}" />
    <input type="hidden" name="clientCode" value="{$client->clientCode}" />

    {include file="agoraportal_admin_clientInfo.tpl"}
    {include file="agoraportal_user_serviceInfo.tpl"}

    <div class="panel panel-info">
        <div class="panel-heading">{gt text="Dades de la sol·licitud"}</div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Sol·licitant"}:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {$request->username} ({$request->useremail})
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Tipus de sol·licitud"}:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {$type->name}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Data de sol·licitud"}:</label>
                <div class="col-sm-8"><p class="form-control-static">{$request->timeCreated|dateformat:"%d/%m/%Y - %H:%m"}</p></div>
            </div>
            {if $request->timeClosed}
                <div class="form-group">
                    <label class="col-sm-4 control-label">{gt text="Data de modificació"}:</label>
                    <div class="col-sm-8"><p class="form-control-static">{$request->timeClosed|dateformat:"%d/%m/%Y - %H:%m"}</p></div>
                </div>
            {/if}
            <div class="form-group">
                <label class="col-sm-4 control-label">{gt text="Observacions del client"}:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {$request->userComments}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">{gt text="Resposta a la sol·licitud"}</div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label" for="state">{gt text="Estat"}:</label>
                <div class="col-sm-8">
                    <select  class="form-control" id="state" name="state" onchange="autoActionsRequests()">
                        {foreach item=state key=stateid from=$requestsstates}
                            <option value="{$stateid}" {if $request->requestStateId eq $stateid}selected{/if}>{$state}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-4 col-sm-8">
                    {if $mailer}
                        <label class="control-label" for="sendMail">
                            <input id="sendMail" type="checkbox" name="sendMail" value="1" />
                            {gt text="Notifica el canvi d'estat per correu al centre i als gestors"}
                        </label>
                    {else}
                        <span class="alert alert-danger">
                            {gt text="El Mailer no està operatiu"}
                        </span>
                    {/if}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label" for="adminComments">{gt text="Observacions a enviar al client"}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="adminComments" rows="10" name="adminComments">{$request->adminComments}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="privateNotes">{gt text="Anotacions (només ho veuen els administradors)"}:</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="privateNotes" rows="10" name="privateNotes">{$request->privateNotes}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success" title="Desa">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Desa"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='requestsList'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>

{adminfooter}
