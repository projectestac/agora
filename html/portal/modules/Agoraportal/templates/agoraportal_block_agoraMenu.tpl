<div class="hmenu">
    <div class="hmenuElement">
        <a href="index.php">
            {gt text="Inici"}
        </a>
    </div>
    {if not $logedIn}
    <div class="hmenuElement">
        <a href="{modurl modname='users' type='user' func='loginscreen' ssl=true}">
            {gt text="Entra"}
        </a>
    </div>
    {/if}
    {if $accessLevel eq 'comment' OR $accessLevel eq 'add'}
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='user' func='myAgora' ssl=false}">
            {gt text="El meu Àgora"}
        </a>
    </div>
    {/if}
    {if $accessLevel eq 'admin'}
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='admin' func='main' ssl=false}">
            {gt text="Administra"}
        </a>
    </div>
    {/if}
    { if $allowedAccessRequest}
    <div class="hmenuElement">
        <a href="{modurl modname='Agoraportal' type='user' func='register' ssl=false}">
            {gt text="Sol·licita l'accés a un centre"}
        </a>
    </div>
    {/if}
    <div class="hmenuElement">
        <a href="http://agora.xtec.cat/moodle/moodle/mod/resource/view.php?id=581" target="_blank" ssl=false>
            {gt text="PMF"}
        </a>
    </div>
    {if $logedIn}
    <div class="hmenuElement">
        <a href="{modurl modname='users' type='user' func='logout' ssl=false}">
            {gt text="Surt"}
        </a>
    </div>
    <div class="z-right uname">
        [ {$uname} ]
    </div>
    {/if}
</div>