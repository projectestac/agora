<li{if !empty($page.subPages)} class="sub"{/if}><a href="{modurl modname='Content' type='user' func='view' pid=$page.id}" title="{$page.title|safetext}">{$page.title|safetext}</a>
    {if !empty($page.subPages)}
    <ul>
        {foreach from=$page.subPages item=subpage}
        {include file='block/menuitem.tpl' page=$subpage}
        {/foreach}
    </ul>
    {/if}
</li>
