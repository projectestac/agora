<div class="">
{if empty($commands)}
    <div class="tab-content" style="padding: 20px;">
        <strong>{gt text="No s'ha trobat cap SQL"}</strong>
    </div>
{else}
    {foreach from=$commands item=command}
        <div class="tab-content">
            <a href="#sqlForm" onclick="sqlFunctionUpdate('insert', {$command->comandId})" id="comandBox_"{$command->comandId} title="Insereix">
                <div class="">
                    {$command->description|nl2br}
                    <div style="font-size: 0.8em; color: #999;">{$command->comand}</div>
                </div>
                <div class="text-right" role="group">
                     <button type="button" class="btn btn-info"  onClick="sqlFunctionUpdate('edit', {$command->comandId})" title="Modifica">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        <span class="sr-only">Modifica</span>
                     </button>
                     <button type="button" class="btn btn-danger"  onClick="sqlDelete({$command->comandId})" title="Esborra">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        <span class="sr-only">Esborra</span>
                     </button>
                </div>
             </a>
        </div>
    {/foreach}
{/if}
</div>
