{include file="agoraportal_user_menu.tpl"}
<h3>{gt text="Gestors del centre"}&nbsp;{$client->clientName}</h3>
<div class="alert alert-info">
    {gt text='Els centres docents poden designar fins a <strong>quatre persones</strong> com a gestores dels serveis d\'Àgora del centre. En tot moment podran consultar la llista de gestors, així com l\'estat dels serveis sol·licitats.'}
</div>

{if $managers|@count gt 0}
<div class="form-horizontal">
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text='Usuari'}</th>
            <th>{gt text='Correu electrònic'}</th>
            <th>{gt text='Esborra'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item="manager" from=$managers}
        <tr>
            <td width="120" class="actived">{$manager->managerUName}</td>
            <td>{$manager->useremail}</td>
            <td>
                {if $uname neq $manager->managerUName}
                    {assign var='managerName' value=$manager->managerUName}
                    <a class="btn btn-danger" onclick="return confirm_delete('el gestor {$manager->managerUName|escape:quotes}')" href="{modurl modname='Agoraportal' type='user' func='deleteManager' clientCode=$client->clientCode managerId=$manager->managerId}" title="Elimina {$manager->managerUName|escape:quotes} com a gestor">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        <span class="sr-only">Esborra el gestor</span>
                    </a>
                {else}
                    &nbsp;
                {/if}
            </td>
        </tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/if}

{if $can_add_managers}
    <div class="panel panel-default">
        <div class="panel-heading">{gt text="Afegeix un gestor"}</div>
        <div class="panel-body">
            <div class="alert alert-warning">
                {gt text="Aviseu a l'usuari designat que a partir d'ara podrà gestionar els serveis del centre des d'aquest portal."}
            </div>
            <form id="addManager" class="form-horizontal" action="{modurl modname='Agoraportal' type='user' func='addManager'}" method="post" enctype="application/x-www-form-urlencoded" onsubmit="addManager();">
                <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
                <input type="hidden" name="clientCode" value="{$client->clientCode}" />
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="managerUName">{gt text="Nom d'usuari <em>XTEC</em> del gestor"}:</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="managerUName" type="text" name="managerUName"/>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" title="Afegeix" type="submit">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Afegeix"}
                    </button>
                </div>
            </form>
        </div>
    </div>
{/if}

<script>
    var _AGORAPORTALCONFIRMMANAGERDELETION = "{{gt text='Confirmeu que voleu esborrar el gestor.'}}";
    var _AGORAPORTALNOTUSERNAME = "{{gt text='No heu escrit el nom d\'usuari XTEC.'}}";
    var _AGORAPORTALUSERNAMENOTVALID = "{{gt text='No heu escrit un nom d\'usuari XTEC vàlid.'}}";
</script>
