<ul class="wl-nav">
    {if $helper.main != 1}
    <li><a href="{modurl modname='Weblinks' type='user' func='main'}">{gt text="Link-Index"}</a></li>
    {/if}
    <li><a href="{modurl modname='Weblinks' type='user' func='addlink'}">{gt text="Add link"}</a></li>
    <li><a href="{modurl modname='Weblinks' type='user' func='newlinks'}">{gt text="New"}</a></li>
    <li><a href="{modurl modname='Weblinks' type='user' func='mostpopular'}">{gt text="Popular"}</a></li>
    <li><a href="{modurl modname='Weblinks' type='user' func='randomlink'}"{if $modvars.Weblinks.targetblank eq 1} target="_blank"{/if}>{gt text="Random"}</a></li>
</ul>