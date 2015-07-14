<div class="container-fluid">
{foreach from=$commands item=command}
    <div class="row list-group-item">
        <a href="#sqlForm" onclick="sqlFunctionUpdate('insert', {$command->comandId})" id="comandBox_"{$command->comandId} title="Insereix">
            <div class="col-md-10">
                {$command->description|nl2br}
                <div style="font-size: 0.8em; color: #999;">{$command->comand}</div>
            </div>
            <div class="col-md-2 btn-group text-right" role="group">
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
 </div>
