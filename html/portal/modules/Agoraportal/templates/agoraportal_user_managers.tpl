{include file="agoraportal_user_menu.tpl" clientCode=$client.clientCode}
<div class="usercontainer">
    <div class="z-pageicon">{img modname='core' src='agt_family.png' set='icons/large'}</div>
    <h2>{gt text="Gestors del centre"}&nbsp;{$client.clientName}</h2>
    {if $isAdmin}
    {include file="agoraportal_admin_clientInfo.tpl"}
    {/if}
    {if $accessLevel eq 'comment'}
    <div class="z-informationmsg">
        {gt text='Els centres docents només poden designar el primer gestor/a. Una vegada ho hagin fet i aquest/a hagi acceptat, no podran assignar a cap altra persona aquesta responsabilitat. Tot i això, en tot moment podran consultar la llista de gestors, així com l\'estat dels serveis sol·licitats. Cada centre pot tenir fins a <u>tres gestors</u>.'}
        <br />
    </div>
    {/if}

    {if $managers|@count gt 0}
    <div class="z-form">
        <fieldset>
            <legend>{gt text='Persones que poden administrar els serveis del centre'} </legend>
            <table style="margin: 10px 30px 10px 30px;">
                <th>
                    {gt text='Usuari/ària'}
                </th>
                <th>
                    {gt text='Estat'}
                </th>
                <th>
                    {gt text='Esborra'}
                </th>
                {foreach item="manager" from=$managers}
                {if $manager.state eq 1}
                {assign var="stateStyle" value="actived"}
                {elseif $manager.state eq -1}
                {assign var="stateStyle" value="denegated"}
                {else}
                {assign var="stateStyle" value="toCheck"}
                {/if}
                <tr>
                    <td width="120">
                        <div class="{$stateStyle}">{$manager.managerUName}</div>
                    </td>
                    <td width="220">
                        {if $manager.state eq 1}
                        {gt text='És un gestor/a del centre'}
                        {elseif $manager.state eq -1}
                        {gt text='L\'usuari/ària ha rebutjat l\'encàrrec'}
                        {else}
                        {gt text='L\'usuari/ària ha d\'acceptar l\'encàrrec'}
                        {/if}
                    </td width="120">
                    {if $canDelegate || ($managers|@count eq 1 && $manager.state lt 1 && $accessLevel eq 'comment') || $accessLevel == 'add'}
                    <td>
                        {if $uname neq $manager.managerUName}
                        {assign var='managerName' value=$manager.managerUName}
                        <form id="deleteManager_{$manager.managerId}" action="{modurl modname='Agoraportal' type='user' func='deleteManager'}"  method="post" enctype="application/x-www-form-urlencoded">
                            <a href="javascript:deleteManager({$manager.managerId})" >
                                {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Si cliqueu aquí $managerName deixarà de ser gestor/a"}
                            </a>
                            <input type="hidden" name="managerId" value="{$manager.managerId}" />
                        </form>
                        {else}
                        &nbsp;
                        {/if}
                    </td>
                    {/if}
                </tr>
                {/foreach}
            </table>
        </fieldset>
    </div>
    {/if}
    {if $canDelegate && $managers|@count lt 3}
    <form id="addManager" class="z-form" action="{modurl modname='Agoraportal' type='user' func='addManager'}" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend>{gt text='Creació de gestors addicionals'}</legend>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="clientCode" value="{$client.clientCode}" />
            <div class="z-formrow">
                <label for="managerUName">{gt text="Nom d'usuari/ària XTEC del gestor/a"}:</label>
                <input name="managerUName" type="text" name="managerUName" />
            </div>
            <div class="z-formrow">
                <label for="verifyCode">{gt text='Paraula clau de confirmació'}:</label>
                <input name="verifyCode" type="text" name="verifyCode" />			
                <div class="z-warningmsg z-formnote">
                    {gt text='La persona designada com a gestora haurà d\'acceptar i escriure la paraula clau de confirmació indicada. Per fer-ho, haurà d\'entrar en aquest portal.'}
                </div>
            </div>
            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:addManager();">
                        {img modname='core' src='button_ok.png' set='icons/small' __alt="Modifica" __title="Afegeix"}
                        {gt text="Afegeix"}
                    </a>
                </span>
                <span class="z-buttons">
                    {if $isAdmin}
                    <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client.clientCode}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                        {gt text="Cancel·la"}
                    </a>
                    {else}
                    <a href="{modurl modname='Agoraportal' type='user' func='myAgora'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                        {gt text="Cancel·la"}
                    </a>
                    {/if}
                </span>
            </div>
        </fieldset>
    </form>
    {/if}
    <script>
        var _AGORAPORTALCONFIRMMANAGERDELETION = "{{gt text='Confirmeu que voleu esborrar el gestor/a.'}}";
        var _AGORAPORTALNOTUSERNAME = "{{gt text='No heu escrit el nom d\'usuari/ària XTEC.'}}";
        var _AGORAPORTALNOTCONFIRMKEY = "{{gt text='No heu escrit la paraula clau de confirmació.'}}";
    </script>
</div>