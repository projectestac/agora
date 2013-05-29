{include file="user/header.tpl"}
<div class="wl-borderbox">

    <div class="wl-center">
        {if $query}
        <h3>{gt text="Search results for"}: {$query|safetext}</h3>

        {if $categories}
        <h4>{gt text="Sub-categories"}</h4>
        <ul>
            {foreach from=$categories item=categories}
            <li>
                <a href="{modurl modname='Weblinks' type='user' func='category' cid=$categories.cat_id}" class="wl-catsub" >
                    {catpath cid=$categories.cat_id start=0 links=1 linkmyself=1}
                </a>
            </li>
            {/foreach}
        </ul>
        {/if}

        <h4>{gt text="Links"}</h4>
    </div>

    {if $weblinks}
    <dl class="wl-sortlinks wl-center">
        <dt><strong>{gt text="Sites currently sorted by"}: {orderbyTrans orderby=$orderby}</strong></dt>
        <dd>{gt text="Sort links by"}:
            {gt text="Title"} ( <a href="{modurl modname='Weblinks' type='user' func='search' orderby=titleA query=$query}" title="{gt text="Title (A to Z)"}">+</a> | <a href="{modurl modname='Weblinks' type='user' func='search orderby=titleD query=$query}" title="{gt text="Title (Z to A)"}">-</a> )
            {gt text="Date"} ( <a href="{modurl modname='Weblinks' type='user' func='search' orderby=dateA query=$query}" title="{gt text="Date (oldest links listed first)"}">+</a> | <a href="{modurl modname='Weblinks' type='user' func='search orderby=dateD query=$query}" title="{gt text="Date (newest links listed first)"}">-</a> )
            {gt text="Popularity"} ( <a href="{modurl modname='Weblinks' type='user' func='search' orderby=hitsA query=$query}" title="{gt text="Popularity (from fewest hits to most hits)"}">+</a> | <a href="{modurl modname='Weblinks' type='user' func='search orderby=hitsD query=$query}" title="{gt text="Popularity (from most hits to fewest hits)"}">-</a> )
        </dd>
    </dl>
    
    {foreach from=$weblinks item='link'}
    <div class="wl-linkbox">
        {include file="user/linkbox.tpl"}
    </div>
    {/foreach}

    {pager rowcount=$pagernumlinks limit=$modvars.Weblinks.perpage show="page" posvar=startnum shift=1}

    {else}
    <p class="wl-center"><em>{gt text="No matches found to your query"} [ <a href="{modurl modname='Weblinks' type='user' func='view'}">{gt text="Back"}</a> ]</em></p>
    {/if}

    <p class="wl-center">
        {gt text="Try to search"} "{$query|safetext}" {gt text="on other search engines"}<br />
        <a href="http://www.google.com/search?q={$query|safetext}">Google</a> -
        <a href="http://www.altavista.com/cgi-bin/query?pg=q&amp;sc=on&amp;hl=on&amp;act=2006&amp;par=0&amp;q={$query|safetext}&amp;kl=XX&amp;stype=stext">Alta Vista</a> -
        <a href="http://www.hotbot.com/?MT={$query|safetext}&amp;DU=days&amp;SW=web">HotBot</a> -
        <a href="http://sjc-search.sjc.lycos.com/?query={$query|safetext}">Lycos</a> -
        <a href="http://search.yahoo.com/bin/search?p={$query|safetext}">Yahoo</a> -
        <a href="http://web.ask.com/web?q={$query|safetext}&amp;o=0&amp;qsrc=0">Ask Jeeves</a>
    </p>
    {else}
    <p class="wl-center"><strong>{gt text="No matches found to your query"}</strong></p>
    {/if}
</div>
{include file="user/footer.tpl"}