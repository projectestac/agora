{if $logedIn}
    <p class="navbar-text">[ {$uname} ]</p>
{/if}
<ul class="nav navbar-nav">
    {if not $logedIn}
        <li>
            <a href="{modurl modname='xtecoauth' type='user' func='main'}">
                {gt text="Entra"}
            </a>
        </li>
    {elseif $accessLevel eq 'client' OR $accessLevel eq 'manager'}
        <li>
            <a href="{modurl modname='Agoraportal' type='user' func='myAgora'}">
                {gt text="El meu Àgora"}
            </a>
        </li>
    {elseif $accessLevel eq 'admin'}
        <li>
            <a href="{modurl modname='Agoraportal' type='admin' func='main'}">
                {gt text="Administra"}
            </a>
        </li>
    {elseif $allowedAccessRequest}
        <li>
            <a href="{modurl modname='Agoraportal' type='user' func='register'}">
                {gt text="Sol·licita l'accés a un centre"}
            </a>
        </li>
    {/if}
    <li>
        <a href="https://educaciodigital.cat/moodle/moodle/mod/page/view.php?id=1781" target="_blank">
            {gt text="PMF"}
        </a>
    </li>
    {if $logedIn}
        <li>
            <a href="{modurl modname='users' type='user' func='logout'}" title="Tanca la sessió del portal">
                {gt text="Surt del portal"}
            </a>
        </li>
        <li>
            <a href="https://accounts.google.com/Logout?continue=http://google.com" target="_blank" title="Tanca totes les sessions de Google">
                {gt text="Surt de Google"}
            </a>
        </li>
    {/if}
</ul>
