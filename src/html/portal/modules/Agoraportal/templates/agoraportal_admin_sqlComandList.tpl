
{foreach from=$comands item=comand}
<div class="{cycle values="z-odd,z-even"}" id="comandBox_".{$comand.comandId} style="padding:5px;">
     {$comand.description|nl2br}
     <div style="text-align:right; margin:3px;">
         <span onClick="javascript:sqlFunctionUpdate(1, {$comand.comandId})">
             {img modname='core' src='db_add.png' set='icons/extrasmall' __alt="Insereix" __title="Insereix"}
         </span>
         <span onClick="javascript:sqlFunctionUpdate(2, {$comand.comandId})">
             {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Modifica" __title="Modifica"}
         </span>
         <span onClick="javascript:sqlComandsUpdate(2, {$comand.comandId})">
             {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Esborra" __title="Esborra"}
         </span>
     </div>
 </div>
 {/foreach}
