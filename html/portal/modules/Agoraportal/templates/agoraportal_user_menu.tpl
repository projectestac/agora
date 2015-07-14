{ajaxheader modname=Agoraportal filename=Agoraportal.js}

<h2>{gt text="Gestió d'Àgora del centre"}&nbsp;{$client->clientName}</h2>

<nav class="navbar navbar-border">
    <div class="container-fluid">
        {AgoraportalMenuLinks clientCode=$client->clientCode}
    </div>
</nav>

{insert name="getstatusmsg"}

{if $isAdmin}
    {include file="agoraportal_admin_clientInfo.tpl"}
{/if}