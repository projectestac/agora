{ajaxheader modname='Pages' filename='pages.js'}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='View pages list'}</h3>
</div>

{if ($modvars.ZConfig.multilingual OR $modvars.Pages.enablecategorization)}
<form class="z-form" action="{modurl modname='Pages' type='admin' func='view'}" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset{if $filter_active} class='filteractive'{/if}>
        {if $filter_active}{gt text='active' assign='filteractive'}{else}{gt text='inactive' assign='filteractive'}{/if}
        <legend>{gt text='Filter %1$s, %2$s page listed' plural='Filter %1$s, %2$s pages listed' count=$pager.numitems tag1=$filteractive tag2=$pager.numitems}</legend>
        <input type="hidden" name="startnum" value="{$startnum}" />
        <input type="hidden" name="orderby" value="{$orderby}" />
        <input type="hidden" name="sdir" value="{$sdir}" />
        <div id="pages_multicategory_filter">
            {if $modvars.Pages.enablecategorization}
            <span id='categoryfilter'>{include file='admin/filtercats.tpl'}</span>
            {/if}
            {if $modvars.ZConfig.multilingual}
            &nbsp;&nbsp;
            <label for="pages_language">{gt text='Language'}</label>
            {nocache}
            {html_select_languages id='pages_language' name='language' all=true installed=true selected=$language}
            {/nocache}
            {/if}
            &nbsp;&nbsp;
            <span class="z-nowrap z-buttons">
                <input class='z-bt-filter' name="submit" type="submit" value="{gt text='Filter'}" />
                <a href="{modurl modname="Pages" type='admin' func='view'}" title="{gt text="Clear"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Clear" __title="Clear"} {gt text="Clear"}</a>
            </span>
        </div>
    </fieldset>
</form>
{/if}

<table class="z-datatable">
    <thead>
        <tr>
            <th><a class='{$sort.class.pageid}' href='{$sort.url.pageid|safetext}'>{gt text='ID'}</a></th>
            <th><a class='{$sort.class.title}' href='{$sort.url.title|safetext}'>{gt text='Title'}</a></th>
            <th>{gt text='Creator'}</th>
            {if $modvars.Pages.enablecategorization}
            <th>{gt text='Category'}</th>
            {/if}
            {if $modvars.ZConfig.multilingual}
            <th>{gt text='Language'}</th>
            {/if}
            <th><a class='{$sort.class.cr_date}' href='{$sort.url.cr_date|safetext}'>{gt text='Created'}</a></th>
            <th>{gt text='Actions'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$pages item='page'}
        <tr class="{cycle values='z-odd,z-even'}">
            <td>{$page.pageid|safehtml}</td>
            <td>{$page.title|safehtml}</td>
            {usergetvar uid=$page.cr_uid name='uname' assign='uname'}
            <td>{$uname|safehtml}</td>
            {if $modvars.Pages.enablecategorization}
            <td>{assignedcategorieslist item=$page}</td>
            {/if}
            {if $modvars.ZConfig.multilingual}
            <td>{$page.language|getlanguagename|safehtml}</td>
            {/if}
            <td>{$page.cr_date|dateformat|safehtml}</td>
            <td>
                {assign var='options' value=$page.options}
                {section name='options' loop=$options}
                <a href="{$options[options].url|safetext}">{img modname='core' set='icons/extrasmall' src=$options[options].image title=$options[options].title alt=$options[options].title}</a>
                {/section}
            </td>
        </tr>
        {foreachelse}
        {assign var='colspan' value=4}
        {if $modvars.Pages.enablecategorization}
        {assign var='colspan' value=$colspan+1}
        {/if}
        {if $modvars.ZConfig.multilingual}
        {assign var='colspan' value=$colspan+1}
        {/if}
        <tr class="z-datatableempty"><td colspan="{$colspan}">{gt text='No pages found.'}</td></tr>
        {/foreach}
    </tbody>
</table>

{pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}

{adminfooter}