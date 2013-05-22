<ul class="pages-list">
    {section name='items' loop=$items}
    <li>
        {if $items[items].url neq ''}
        <a href="{$items[items].url|safetext}">{$items[items].title|notifyfilters:'pages.filter_hooks.pages.filter'|safehtml}</a>
        {else}
        {$items[items].title|notifyfilters:'pages.filter_hooks.pages.filter'|safehtml}
        {/if}
    </li>
    {/section}
</ul>