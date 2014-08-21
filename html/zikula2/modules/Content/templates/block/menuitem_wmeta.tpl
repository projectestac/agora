<li{if !empty($page.subPages)} class="sub"{/if}><a href="{modurl modname='Content' type='user' func='view' pid=$page.id}" title="{$page.title|safetext}">{$page.title|safetext}</a>
{usergetvar name='uname' uid=$page.lu_uid assign='lu_uname'}
({gt text='on %1$s by %2$s' tag1=$page.lu_date|dateformat tag2=$lu_uname})
    {if !empty($page.subPages)}
    <ul>
        {foreach from=$page.subPages item=subpage}
        {include file='block/menuitem_wmeta.tpl' page=$subpage}
        {/foreach}
    </ul>
    {/if}
</li>
