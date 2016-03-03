{adminheader}

{include file="agoraportal_admin_menu.tpl"}

<h3>{gt text="Creació Massiva"}</h3>
<div class="panel panel-info">
    <div class="panel-heading">
        {gt text="Opcions de la creació"}
    </div>
    <div class="panel-body">
        {$logo}<br />
        <strong>{gt text="Codis a crear:"}</strong> {$schoolCodes}<br/>
        <strong>{gt text="dbHost:"}</strong> {$dbHost}<br/>
        <strong>{gt text="serviceDB:"}</strong> {$serviceDB}<br/>
        <strong>{gt text="Plantilla:"}</strong> {$template}<br/>
        <strong>{gt text="Crea els clients que no existeixin:"}</strong> {if $createClient eq 1}{gt text="Sí"}{else}{gt text="No"}{/if}<br />
    </div>
</div>

<strong>{gt text="Resultat:"}</strong>
<div>
    S'han trobat {$error} errors<br/>
    <table class="table table-hover table-striped">
        <thead><tr><th>{gt text="Codi"}</th><th>{gt text="Missatge"}</th></tr></thead>
        <tbody>
            {foreach item=message key=id from=$results}
                {if $success[$id]}
                    <tr class="success">
                {else}
                    <tr class="danger">
                {/if}
                <td>{$id}</td>
                <td>{$message}</td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>

{adminfooter}
