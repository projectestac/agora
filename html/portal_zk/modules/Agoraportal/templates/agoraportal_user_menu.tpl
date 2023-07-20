{ajaxheader modname=Agoraportal filename=Agoraportal.js}

<nav class="navbar navbar-border" style="margin-top:10px;">
    <div class="container-fluid">
        {AgoraportalMenuLinks clientCode=$client->clientCode}
    </div>
</nav>

{insert name="getstatusmsg"}

{if $isAdmin and isset($noclient) and $noclient eq 0}
    {include file="agoraportal_admin_clientInfo.tpl"}
{/if}