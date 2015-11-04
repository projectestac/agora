{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <h2>{gt text="Creació Massiva"}</h2>
    <strong>{gt text="Codis a crear:"}</strong> {$schoolCodes}<br/>
    <strong>{gt text="DbHost:"}</strong> {$dbHost}<br/>
    <strong>{gt text="Plantilla:"}</strong> {$template}<br/>
    <strong>{gt text="Servei:"}</strong> {$serviceName}<br/>
    <strong>{gt text="Crea els clients que no existeixin:"}</strong> {if $createClient eq 1}Si{else}No{/if}<br/>

    <strong>{gt text="Resultat:"}</strong>
    <div>
        S'han trobat {$error} errors<br/>
        <table class="z-datatable"><thead>
                <tr>
                    <th>{gt text="Codi"}</th>
                    <th>{gt text="Missatge"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=message key=id from=$results}
                {if $success[$id]}
                <tr class="{cycle values='ok-odd,ok-even'}">
                    {else}
                <tr class="{cycle values='error-odd,error-even'}">
                    {/if}
                    <td>
                        {$id}
                    </td>
                    <td>
                        {$message}
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
