{if $logedIn}
<p class="navbar-text">[ {$uname} ]</p>
{/if}
<ul class="nav navbar-nav">
    {if not $logedIn}
    <li>
        <a href="{modurl modname='users' type='user' func='login' ssl=true}">
            {gt text="Entra"}
        </a>
    {elseif $accessLevel eq 'client' OR $accessLevel eq 'manager'}
    <li>
        <a href="{modurl modname='Agoraportal' type='user' func='myAgora' ssl=false}">
            {gt text="El meu Àgora"}
        </a>
    {elseif $accessLevel eq 'admin'}
    <li>
        <a href="{modurl modname='Agoraportal' type='admin' func='main' ssl=false}">
            {gt text="Administra"}
        </a>
    {elseif $allowedAccessRequest}
    <li>
        <a href="{modurl modname='Agoraportal' type='user' func='register' ssl=false}">
            {gt text="Sol·licita l'accés a un centre"}
        </a>
    {/if}
    <li>
        <a href="http://agora.xtec.cat/moodle/moodle/mod/page/view.php?id=1781" target="_blank" ssl=false>
            {gt text="PMF"}
        </a>
    {if $logedIn}
    <li>
        <a href="{modurl modname='users' type='user' func='logout' ssl=false}">
            {gt text="Surt"}
        </a>
    {/if}
</ul>
