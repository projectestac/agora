<li><a href="{modurl modname='Content' type='user' func='view' pid=$page.id}">{$page.title}</a>
    {if $page.subPages}
    <ul>
        {foreach from=$page.subPages item=subpage}
        {include file='user/subpagelistitem.tpl' page=$subpage}
        {/foreach}
    </ul>
    {/if}
</li>