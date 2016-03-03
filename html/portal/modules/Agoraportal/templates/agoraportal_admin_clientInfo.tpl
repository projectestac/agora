<div class="panel panel-default">
    <div class="panel-heading row-fluid clearfix">{gt text="Informació del client: "}
        <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client->clientCode}">
            {$client->clientName}
        </a>&nbsp;
        {$client->logos}
        {if $client->educat eq 1} &nbsp; <img src="modules/Agoraportal/images/educat.png" alt="educat" title="educat" align="middle"/> {/if}

        <div class="pull-right">

            <span class="btn btn-info" title="Detalls" onclick="Effect.toggle('client-info', 'appear'); return false;">
                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                <span class="sr-only">Detalls</span>
            </span>

            {if $accessLevel eq 'admin'}
                <a class="btn btn-info" href="{modurl modname='Agoraportal' type='admin' func='editClient' clientId=$client->clientId}" title="Edita el client">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="sr-only">Edita el servei</span>
                </a>
            {/if}

            <span class="btn-group" role="group">
                {if $client->clientState eq 0}
                    <span class="btn btn-danger" title="No actiu">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span class="sr-only">No actiu</span>
                    </span>
                {elseif $client->clientState eq 1}
                    <span class="btn btn-success" title="Actiu">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <span class="sr-only">Actiu</span>
                    </span>
                {/if}
                {if $client->noVisible eq 1}
                    <span class="btn btn-danger" title="No visible">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        <span class="sr-only">No visible</span>
                    </span>
                {elseif $client->noVisible eq 0}
                    <span class="btn btn-success" title="Visible">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        <span class="sr-only">Visible</span>
                    </span>
                {/if}
            </span>
        </div>
    </div>

    <div id="client-info" class="panel-body" style="display: none;">
        <div>
            <p><strong>{gt text="Codi"}</strong>: {$client->clientCode}</p>
            <p><strong>{gt text="Nom propi"}</strong>: {$client->clientDNS}
                {if $client->clientOldDNS}
                    (<strong>{gt text="Antic"}</strong>: {$client->clientOldDNS})
                {/if}
            </p>
            <p><strong>{gt text="Servei Territorial"}</strong>: {$client->location_name}</p>
            <p><strong>{gt text="Tipus de centre"}</strong>: {$client->type_name}</p>
            {if $client->extraFunc}
                <p><strong>{gt text="Plantilla de Nodes"}</strong>: {$client->template_name}</p>
            {/if}
            <p><strong>{gt text="Adreça completa"}</strong>: {$client->clientAddress}, {$client->clientPC} - {$client->clientCity} ({$client->clientCountry})</p>
            {if $client->clientDescription}
                <p><strong>{gt text="Descripció"}</strong>: {$client->clientDescription}</p>
            {/if}
        </div>
    </div>
</div>

