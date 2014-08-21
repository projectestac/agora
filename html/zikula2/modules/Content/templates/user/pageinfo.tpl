{nocache}
{if $access.pageEditAllowed && !$preview}
{ajaxheader modname='Content' filename='ajax.js'}
{modapifunc modname='Content' type='History' func='getPageVersionNo' pageId=$page.id assign='versionNo'}
<div class="content-pageinfo">
    <a href="#" onclick="return content.pageInfo.toggle({$page.id})" style="float: left; padding: 5px 3px;">{img src='info.png' modname='core' set='icons/extrasmall' __alt='Properties' }</a>
    <div class="content" id="contentPageInfo-{$page.id}" style="display: none" onmouseover="content.pageInfo.mouseover({$page.id})" onmouseout="content.pageInfo.mouseout({$page.id})">
        <h4>{$page.title|truncate:200|safetext} [{$page.id}]</h4>
        <ul>
            {if $editmode}
            <li><a class="con_image editoff" href="{modurl modname='Content' type='user' func='view' pid=$page.id editmode="0"}">{gt text="Edit-mode off"}</a></li>
            {else}
            <li><a class="con_image editon" href="{modurl modname='Content' type='user' func='view' pid=$page.id editmode="1"}">{gt text="Edit-mode on"}</a></li>
            {/if}
            <li><a class="con_image edit" href="{modurl modname='Content' type='admin' func='editpage' pid=$page.id back=1}">{gt text="Edit page"}</a></li>
            {if $multilingual}
            <li><a class="con_image translate" href="{modurl modname='Content' type='admin' func='translatepage' pid=$page.id back=1}">{gt text="Translate page"}</a></li>
            {/if}
            {if $access.pageCreateAllowed}
            <li><a class="con_image insertsub" href="{modurl modname='Content' type='admin' func='newpage' pid=$page.id loc=sub}">{gt text="New sub-page"}</a></li>
            <li><a class="con_image insertpage" href="{modurl modname='Content' type='admin' func='newpage' pid=$page.id}">{gt text="Add new page"}</a></li>
            {/if}
            <li><a class="con_image pagelist" href="{modurl modname='Content' type='admin' func='main'}">{gt text="Page list"}</a></li>
        </ul>
        <ul>
            <li>{gt text='Created by %1$s on %2$s' tag1=$page.cr_uid|profilelinkbyuid tag2=$page.cr_date|dateformat:"datebrief"}</li>
            <li>{gt text='Last updated by %1$s on %2$s' tag1=$page.lu_uid|profilelinkbyuid tag2=$page.lu_date|dateformat:"datebrief"}</li>
            {if $enableVersioning}<li>{gt text="Version"} #{$versionNo}</li>{/if}
            {if $multilingual}<li>{gt text="Language"}: {$page.language}</li>{/if}
        </ul>
    </div>
</div>
{/if}
{/nocache}
