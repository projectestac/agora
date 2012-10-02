<div class="pager">
    {$numLogs}
    {gt text=" registres - <b>Pàgines: </b>"}
    {foreach from=$pags item=pag}
    {if $pag eq $config.pag} 
    <b>{$pag}</b>
    {else}
    <a href='javascript:logs({$config.init},
       {if $config.actionCode eq ""}null{else}{$config.actionCode}{/if},
       {if $config.fromDate eq ""}null{else}"{$config.fromDate}"{/if},
       {if $config.toDate eq ""}null{else}"{$config.toDate}"{/if},
       {if $config.uname eq ""}null{else}{$config.uname}{/if},
       {$pag})'>{$pag}</a>
    {/if}
    {foreachelse} 0
    {/foreach}
</div>
<table class="logtable">
    <thead>
        <tr>
            <th>{gt text="Tipus d'acció"}</th>
            <th>{gt text="Acció"}</th>
            <th>{gt text="Autor"}</th>
            <th>{gt text="Data"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$logs item=log}
        <tr class="{cycle values='z-odd,z-even'}" id="formRow_{$log.logId}">
            <td class="icon">
                {if $log.actionCode eq 1}
                <img class="icon" src="images/icons/medium/db_add.png" alt="log_add" title="log_add"/>
                {elseif $log.actionCode eq 2}
                <img class="icon" src="images/icons/medium/db_comit.png" alt="log_modify" title="log_modify"/>
                {else}
                <img class="icon" src="images/icons/medium/db_remove.png" alt="log_delete" title="log_delete"/>
                {/if}
            </td>
            <td>
                {$log.action|stripslashes}
            </td>
            <td class="autor">
                {$log.uname}
            </td>				
            <td class="time">
                {$log.time|dateformat:"%d-%m-%Y"}
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="5" align="left">
                {gt text="No s'han trobat registres"}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>