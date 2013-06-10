{assign var='feeditems' value=$feed.feed->get_items(0, $numitems)}

{foreach from=$feeditems item='feeditem' name='feeditems'}
    {assign var='feeditemlink' value=$feeditem->get_link()}
    {assign var='feeditemtitle' value=$feeditem->get_title()}
    {if $displaydescription eq 0}
        <div>
            <a href="{$feeditemlink|safetext}" {if $openinnewwindow eq 1}target="_blank"{/if}>{$feeditemtitle|safetext}</a>
        </div>
    {else}
        {assign var='feeditemdesc' value=$feeditem->get_description()}
        <div>
            <a href="{$feeditemlink|safetext}" {if $openinnewwindow eq 1}target="_blank"{/if}>{$feeditemtitle|safetext}</a>
            <div class="feeditem-desc">{$feeditemdesc|safehtml}</div>
        </div>
    {/if}
    {if $smarty.foreach.feeditems.last neq true}
        <hr />
    {/if}
{/foreach}
