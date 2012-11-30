{if count($pages) > 0}
<ul>
    {foreach from=$pages item=page}

    <li id="page_{$page.id}">
        {if $access.pageEditAllowed}
        <img src="modules/Content/images/drag.gif" alt="" class="draggable"/>
        {/if}
        <a href="{modurl modname='Content' type='user' func='page' pid=$page.id}" id="droppable_{$page.id}">{$page.title}</a>
        {if $access.pageEditAllowed}
        {formcontextmenureference menuId="contentTocMenu" commandArgument=$page.id imageURL="modules/Content/images/contextarrow.png"}
        {/if}

        {include file=cotype_include_toc2.tpl pages=$page.subpages}
    </li>

    {/foreach}
</ul>
{/if}
