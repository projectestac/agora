{$pager}
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>{gt text="Nom Client"}</th>
            <th>{gt text="Servei"}</th>
            <th>{gt text="Sol·licitant"}</th>
            <th>{gt text="Estat"}</th>
            <th>{gt text="Tipus"}</th>
            <th>{gt text="Resposta dels administradors"}</th>
            <th>{gt text="Data de petició"}</th>
            <th>{gt text="Darrera modificació"}</th>
            <th style="width:96px;">{gt text="Opcions"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=request from=$requests}
        <tr
            {if $request->requestStateId eq 1}
                 class="warning"
            {elseif $request->requestStateId eq 2}
                class="info"
            {elseif $request->requestStateId eq 3}
                class=""
            {elseif $request->requestStateId eq 4}
                class="danger"
            {/if}
            >
            <td>
                 <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$request->service->client->clientCode}" target="_blank">
                     {$request->service->client->clientName}
                 </a>
             </td>
             <td>{$request->service->logo_with_link} </td>
             <td>{$request->username} </td>
             <td>
                 {if $request->requestStateId eq 1}
                     <span class="btn btn-warning glyphicon glyphicon-time" aria-hidden="true" aria-label="Pendent" title="Pendent"></span>
                 {elseif $request->requestStateId eq 2}
                     <span class="btn btn-info glyphicon glyphicon-cog" aria-hidden="true" aria-label="En estudi" title="En estudi"></span>
                 {elseif $request->requestStateId eq 3}
                     <span class="btn btn-success glyphicon glyphicon-ok" aria-hidden="true" aria-label="Solucionada" title="Solucionada"></span>
                 {elseif $request->requestStateId eq 4}
                     <span class="btn btn-alert glyphicon glyphicon-ban-circle" aria-hidden="true" aria-label="Denegada" title="Denegada"></span>
                 {/if}
             </td>
             <td>{$request->type_name} </td>
             <td>{$request->adminComments|truncate:30} </td>
             <td>{$request->timeCreated|dateformat:"%d/%m/%Y - %H:%m"} </td>
             <td>{$request->timeClosed|dateformat:"%d/%m/%Y - %H:%m"} </td>
             <td>
                <div class="btn-group" role="group">
                    <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editRequest' requestId=$request->requestId}" title="Edita">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        <span class="sr-only">Edita</span>
                    </a>
                    <a class="btn btn-danger" onclick="return confirm_delete('la sol·licitud {$request->type_name|escape:'quotes'} de {$request->service->client->clientName|escape:'quotes'}')" href="{modurl modname='Agoraportal' type='admin' func='deleteRequest' requestId=$request->requestId}" title="Esborra">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        <span class="sr-only">Esborra</span>
                    </a>
                </div>

             </td>
         </tr>
         {foreachelse}
         <tr>
             <td colspan="10">
                 <div class="alert alert-warning">{gt text="No s'han trobat continguts"}</div>
             </td>
         </tr>
         {/foreach}
        </tbody>
    </table>
