{$pager}
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>{gt text="Tipus d'acció"}</th>
            <th>{gt text="Acció"}</th>
            {if $isAdmin}
                <th>{gt text="Autor/a"}</th>
            {/if}
            <th>{gt text="Data"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$logs item=log}
        <tr>
            <td>
                {if $log.actionCode eq 1}
                    <span class="btn btn-success glyphicon glyphicon-plus" aria-hidden="true" aria-label="Addició/Alta" title="Addició/Alta"></span>
                {elseif $log.actionCode eq 2}
                    <span class="btn btn-info glyphicon glyphicon-flag" aria-hidden="true" aria-label="Modificació/Notificació" title="Modificació/Notificació"></span>
                {elseif $log.actionCode eq 3}
                    <span class="btn btn-warning glyphicon glyphicon-trash" aria-hidden="true" aria-label="Eliminació/Baixa" title="Eliminació/Baixa"></span>
                {elseif $log.actionCode eq 4}
                    <span class="btn btn-alert glyphicon glyphicon-remove" aria-hidden="true" aria-label="Error" title="Error"></span>
                {elseif $log.actionCode eq -1}
                    <span class="btn btn-primary glyphicon glyphicon-user" aria-hidden="true" aria-label="Adminitració" title="Adminitració"></span>
                {/if}
            </td>
            <td>{$log.action|stripslashes}</td>
            {if $isAdmin}
                <td>
                    {$log.uname}
                </td>
            {/if}
            <td>
                {$log.time|dateformat:"%d/%m/%Y"}
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="4">
                {gt text="No s'han trobat registres"}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>