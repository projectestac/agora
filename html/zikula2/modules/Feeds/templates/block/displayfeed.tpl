{if $displayimage eq 1}
    {assign var='link' value=$feed.feed->get_image_link()}
    {if $link neq ''}
    <div class="feed-image">
        {assign var='image' value=$feed.feed->get_image_url()}
        {assign var='title' value=$feed.feed->get_image_title()}
        {if $link neq ''}
        <a href="{$link|safetext}"><img src="{$image}" alt="{$title|safetext}" /></a>
        {else}
        <img src="{$link|safetext}" alt="{$title|safetext}" />
        {/if}
    </div>
    {/if}
{/if}

{if $alternatelayout eq 1}
    {include file='block/displayfeed_alt.tpl'}
{else}
    <ul class="feed-list">
    {assign var='feeditems' value=$feed.feed->get_items(0, $numitems)}
    {foreach from=$feeditems item='feeditem'}
        {assign var='feeditemlink' value=$feeditem->get_link()}
        {assign var='feeditemtitle' value=$feeditem->get_title()}
            <li><a href="{$feeditemlink|safetext}" {if $openinnewwindow eq 1}target="_blank"{/if}>{$feeditemtitle|safetext}</a>
        {if $displaydescription ne 0}
            {assign var='feeditemdesc' value=$feeditem->get_description()}
            <div class="feeditem-desc">{$feeditemdesc|safehtml}</div>
        {/if}
            </li>
    {/foreach}
    </ul>
{/if}
