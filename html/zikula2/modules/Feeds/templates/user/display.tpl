{insert name='getstatusmsg'}

{assign var='link' value=$feed->get_image_link()}
{if $link neq ''}
<div class="feed-image">
    {assign var='image' value=$feed->get_image_url()}
    {assign var='title' value=$feed->get_image_title()}
    {if $link neq ''}
    <a href="{$link|safetext}"><img src="{$image}" alt="{$title|safetext}" /></a>
    {else}
    <img src="{$link|safetext}" alt="{$title|safetext}" />
    {/if}
</div>
{/if}

<h3 class="feed-title">
    {gt text='Feed'}: {$item.name|safehtml}
</h3>

<div class="feed-list">
    <p>{gt text='URL'} : {$item.url}</p>
    {assign var='feeditems' value=$feed->get_items($feedstartnum, $modvars.Feeds.itemsperpage)}
    {foreach from=$feeditems item='feeditem'}
    <div class="feeditem">
        {assign var='feeditemlink' value=$feeditem->get_link()}
        {assign var='feeditemdescription' value=$feeditem->get_description()}
        {assign var='feeditemtitle' value=$feeditem->get_title()}
        {assign var='feeditemdate' value=$feeditem->get_date()}
        {assign var='feeditemauthorid' value=$feeditem->get_author()}
        {if $feeditemauthorid}
        {assign var='feeditemauthor' value=$feeditemauthorid->get_name()}
        {/if}
        <h4 class="feeditem-title">
            <a href="{$feeditemlink|safetext}" {if $modvars.Feeds.openinnewwindow eq 1}target="_blank"{/if}>{$feeditemtitle|safetext}</a>
        </h4>
        <span class="feeditem-info" >
            {$feeditemdate|dateformat:'%I:%M %p %A, %B %e, %Y'}
            &nbsp;
            {if $feeditemauthor neq ''}
            {gt text='by %s' tag1=$feeditemauthor|safetext}
            {/if}
        </span>
        {if $feeditemdescription neq ''}
        <div class="feeditem-text">{$feeditemdescription|safehtml}</div>
        <span class="feeditem-more">
            <a href="{$feeditemlink|safetext}" {if $modvars.Feeds.openinnewwindow eq 1}target="_blank"{/if}>{gt text='Read more'}</a>
        </span>
        {/if}
    </div>
    {/foreach}
</div>

<div class="feed-bottom" >
    {pager show='page' rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum' shift=1}
</div>
