{ajaxheader modname='Downloads' ui=true}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Downloads main'}</h3>
</div>

{insert name="getstatusmsg"}
<form class="z-form" action="{modurl modname='Downloads' type='admin' func='main'}" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset{if $filter_active} class='filteractive'{/if}>
        {if $filter_active}{gt text='active' assign='filteractive'}{else}{gt text='inactive' assign='filteractive'}{/if}
        <legend>{gt text='Filter %1$s, %2$s item listed' plural='Filter %1$s, %2$s items listed' count=$rowcount tag1=$filteractive tag2=$rowcount}</legend>
        <input type="hidden" name="startnum" value="{$startnum}" />
        <input type="hidden" name="orderby" value="{$orderby}" />
        <input type="hidden" name="sdir" value="{$sdir}" />
        <div id="pages_multicategory_filter">
            <span id='categoryfilter'>
                <select id='category' name='category'>
                    {$catselectoptions}
                </select>
            </span>
            <span class="z-nowrap z-buttons">
                <input class='z-bt-filter z-bt-small' name="submit" type="submit" value="{gt text='Filter'}" />
                <a class="z-bt-small" href="{modurl modname="Downloads" type='admin' func='main'}" title="{gt text="Clear"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Clear" __title="Clear"} {gt text="Clear"}</a>
            </span>
        </div>
    </fieldset>
</form>
<table class="z-datatable">
    <thead>
        <tr>
            <th><a class='{$sort.class.title}' href='{$sort.url.title|safetext}'>{gt text='Title'}</a></th>
            <th><a class='{$sort.class.status}' href='{$sort.url.status|safetext}'>{gt text='Status'}</a></th>
            <th>{gt text='Version'}</th>
            <th>{gt text='Description'}</th>
            <th><a class='{$sort.class.submitter}' href='{$sort.url.submitter|safetext}'>{gt text='Submitter'}</a></th>
            <th>{gt text='Categories'}</th>
            <th class="z-nowrap z-right">{gt text='Actions'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$downloads item='d'}
        <tr class="{cycle values="z-odd,z-even"}">
            <td>{$d->getTitle()|safetext}</td>
            <td>{if $d->getStatus()}{img src='greenled.png' modname='core' set='icons/extrasmall' __title="Active" __alt="Active" class="tooltips"}{else}{img src='redled.png' modname='core' set='icons/extrasmall' __title="Inactive" __alt="Inactive" class="tooltips"}{/if}</td>
            <td>{$d->getVersion()|safetext}</td>
            <td>{$d->getDescription()|truncate:60|safetext}</td>
            <td>{$d->getSubmitter()|safetext}</td>
            <td>{assign var='category' value=$d->getCategory()}{$category->getTitle()|safetext}</td>
            <td class="z-nowrap z-right">
                <a href="{modurl modname="Downloads" type="user" func="display" lid=$d->getLid()}">{img modname='core' set='icons/extrasmall' src='14_layer_visible.png' __title='View' __alt='View' class='tooltips'}</a>
                <a href="{modurl modname="Downloads" type="user" func="prepHandOut" lid=$d->getLid()}">{img modname='core' set='icons/extrasmall' src='download.png' __title='Download' __alt='Download' class='tooltips'}</a>
                <a href="{modurl modname="Downloads" type="admin" func="edit" id=$d->getLid()}">{img modname='core' set='icons/extrasmall' src='xedit.png' __title='Edit' __alt='Edit' class='tooltips'}</a>
            </td>
        </tr>
        {foreachelse}
        <tr class='z-datatableempty'><td colspan='6' class='z-center'>{gt text='No records in category "%1$s". Try a sub-category, or a different category.' tag1=$cid|getcategorynamefromid}</td></tr>
        {/foreach}
    </tbody>
</table>
{pager rowcount=$rowcount limit=$modvars.Downloads.perpage posvar='startnum'}
{adminfooter}
<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>