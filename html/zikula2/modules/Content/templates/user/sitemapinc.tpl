{if count($pages) > 0}
<ul>
    {foreach from=$pages item=page}
    <li>
        <a href="{modurl modname='Content' type='user' func='view' pid=$page.id}">{$page.title}</a>
        {include file='user/sitemapinc.tpl' pages=$page.subPages}
    </li>
    {/foreach}
</ul>
{/if}
