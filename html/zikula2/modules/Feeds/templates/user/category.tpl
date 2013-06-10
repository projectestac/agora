{insert name='getstatusmsg'}

{if isset($category.display_name.$lang)}{assign var='categoryname' value=$category.display_name.$lang}{else}{assign var='categoryname' value=$category.name}{/if}

<div class="feed-title">
    {if $modvars.ZConfig.shorturls}
        <a href="{modurl modname='Feeds' type='user' func='view' prop=$property cat=$category.path|replace:$rootCat.path:''}" title="{gt text='Category: %s' tag1=$categoryname}">{gt text='Category: %s' tag1=$categoryname}</a>
    {else}
        <a href="{modurl modname='Feeds' type='user' func='view' prop=$property cat=$category.id}" title="{gt text='Category: %s' tag1=$categoryname}">{gt text='Category: %s' tag1=$categoryname}</a>
    {/if}
</div>

<div class="feed-list">
    <p>&nbsp;</p>
    {foreach from=$feeditems item='feeditem'}
    <div class="feeditem">
        {assign var='feeditemlink' value=$feeditem->get_link()}
        {assign var='feeditemdescription' value=$feeditem->get_description()}
        {assign var='feeditemtitle' value=$feeditem->get_title()}
        {assign var='feeditemdate' value=$feeditem->get_date()}
        {assign var='feeditemfeed' value=$feeditem->get_feed()}
        {assign var='feedindex' value=$feeditemfeed->subscribe_url()}
        {assign var='FeedLinkInfo' value=$FeedLinkBack.$feedindex}
        {assign var='feeditemauthorid' value=$feeditem->get_author()}
        {if $feeditemauthorid}
            {assign var='feeditemauthor' value=$feeditemauthorid->get_name()}
        {/if}
        <div class="feeditem-title">
            <a href="{$feeditemlink|safetext}" {if $modvars.Feeds.openinnewwindow eq 1}target="_blank"{/if}>{$feeditemtitle|safetext}</a>
        </div>
        <div class="feeditem-info">
            {$feeditemdate|dateformat:'%I:%M %p %A, %B %e, %Y'}
            &nbsp;-&nbsp;
            <a href="{modurl modname='Feeds' type='user' func='display' fid=$FeedLinkInfo.fid}" title="{$FeedLinkInfo.name|safetext}">{$FeedLinkInfo.name|safetext}</a>
            &nbsp;
            {if $feeditemauthor neq ''}
                {gt text='by %s' tag1=$feeditemauthor|safetext}
            {/if}
        </div>
        <div class="feeditem-text">
            {if $feeditemdescription neq ''}
                <p>{$feeditemdescription|safehtml}</p>
                <div class="feeditem-more">
                    <a href="{$feeditemlink|safetext}" {if $modvars.Feeds.openinnewwindow eq 1}target="_blank"{/if}>{gt text='Read more'}</a>
                </div>
            {/if}
        </div>
    </div>
    {/foreach}
</div>

<div class="feed-bottom">
    {pager show='page' rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum' shift=1}
</div>
