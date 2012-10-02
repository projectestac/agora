<div class="hmenu">
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='user' func='sitesList'}">
            {gt text="Inici"}
        </a>
    </div>
    {if not $logedIn}
    <div class="hmenuElement">
        <a href="{modurl modname='users' type='user' func='loginscreen'}">
            {gt text="Entra"}
        </a>
    </div>
    {/if}
    {if $accessLevel eq 'comment' OR $accessLevel eq 'add'}
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='user' func='myAgora'}">
            {gt text="El meu Àgora"}
        </a>
    </div>
    {/if}
    {if $accessLevel eq 'admin'}
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='admin' func='main'}">
            {gt text="Administra"}
        </a>
    </div>
    {/if}
    { if $allowedAccessRequest}
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='user' func='register'}">
            {gt text="Sol·licita l'accés a un centre"}
        </a>
    </div>
    {/if}
    <div class="hmenuElement">
        <a href="http://agora.xtec.cat/moodle/moodle/mod/resource/view.php?id=581" target="_blank">
            {gt text="PMF"}
        </a>
    </div>
    {if $logedIn}
    <div class="hmenuElement">
        <a href="{modurl modname='users' type='user' func='logout'}">
            {gt text="Surt"}
        </a>
    </div>
    <div class="z-right uname">
        [ {$uname} ]
    </div>
    {/if}
</div>