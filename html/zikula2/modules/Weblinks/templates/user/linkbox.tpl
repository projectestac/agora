<div class="wl-topbox">
    <a href="{modurl modname='Weblinks' type='user' func='visit' lid=$link.lid}" {if $modvars.Weblinks.targetblank == 1}target="_blank"{/if} >
        {$link.title|safetext}
    </a>
    {newlinkgraphic time=$link.date}{popgraphic hits=$link.hits}
</div>

<div class="wl-centerbox z-clearfix">
    {if $modvars.Weblinks.thumber}
    <div class="wl-thumb">
        <a href="{modurl modname='Weblinks' type='user' func='visit' lid=$link.lid}" {if $modvars.Weblinks.targetblank == 1}target="_blank"{/if} >
            <img src="http://image.thumber.de/?size={$modvars.Weblinks.thumbersize}&amp;url={$link.url}" />
        </a>
    </div>
    {/if}

    {if $link.description}
    <p>{$link.description|notifyfilters:'weblinks.filter_hooks.linkfilter.filter'|safehtml}</p>
    {/if}

    {if $helper.showcat == 1}
    <p>{gt text="Category"}: {catpath cid=$link.category.cat_id links=1 linkmyself=1}</p>
    {/if}

    <p>{gt text="Added on"}: {$link.date|dateformat:"datebrief"} | {gt text="Hits"}: {$link.hits}</p>
    
    {notifydisplayhooks eventname='weblinks.ui_hooks.link.ui_view' id=$link.lid}

</div>

<div class="wl-bottombox">
    {linkbottommenu cid=$link.category.cat_id lid=$link.lid details=$helper.details}
</div>