{ajaxheader modname='Downloads' ui=true}
<h3>{gt text='Download Items'} :: {gt text='Category'}: {$cid|getcategorynamefromid|safetext}</h3>

{insert name="getstatusmsg"}
<table class="z-datatable">
    <tbody>
        {if ($cid <> 0)}
        <tr class='downloads-rootparent'>
            <td><a href="{modurl modname="Downloads" type="user" func="view" category=0}">{img modname='core' set='icons/medium' src='folder_red.png' __title='View root category' __alt='View root category' class='tooltips'}</a></td>
            <td colspan='2'><a href="{modurl modname="Downloads" type="user" func="view" category=0}">{gt text='Back to'} <strong>{gt text='Root'}</strong></a></td>
        </tr>
        {/if}
        {if (isset($categoryinfo)) && ($categoryinfo->getPid() <> 0)}
        <tr class='downloads-parent'>
            <td><a href="{modurl modname="Downloads" type="user" func="view" category=$categoryinfo->getPid()}">{img modname='core' set='icons/medium' src='folder_blue.png' __title='View parent category' __alt='View parent category' class='tooltips'}</a></td>
            <td colspan='2'><a href="{modurl modname="Downloads" type="user" func="view" category=$categoryinfo->getPid()}">{gt text='Back to parent: '} <strong>{$categoryinfo->getTitle()|safetext}</strong></a></td>
        </tr>
        {/if}
        {foreach from=$subcategories item='sc'}
        <tr class="{cycle values="z-odd,z-even"}">
            <td><a href="{modurl modname="Downloads" type="user" func="view" category=$sc->getCid()}">{img modname='core' set='icons/medium' src='folder_green.png' __title='View subcategory' __alt='View subcategory' class='tooltips'}</a></td>
            <td><a href="{modurl modname="Downloads" type="user" func="view" category=$sc->getCid()}">{$sc->getTitle()|safetext}</a></td>
            <td>{$sc->getDescription()|truncate:60|safetext}</td>
        </tr>
        {foreachelse}
        <tr class='z-datatableempty'><td colspan='3' class='z-center'>{gt text='No subcategories in category "%1$s".' tag1=$cid|getcategorynamefromid|safetext}</td></tr>
        {/foreach}
    </tbody>
</table>
{if ($cid <> 0)}
<table class="z-datatable">
    <thead>
        <tr>
            <th><a class='{$sort.class.title}' href='{$sort.url.title|safetext}'>{gt text='Title'}</a></th>
            <th>{gt text='Version'}</th>
            <th><a class='{$sort.class.hits}' href='{$sort.url.hits|safetext}'>{gt text='Downloads'}</a></th>
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
            <td>{$d->getVersion()|safetext}</td>
            <td>{$d->getHits()|safetext}</td>
            <td>{$d->getDescription()|truncate:60|safehtml}</td>
            <td>{$d->getSubmitter()|safetext}</td>
            <td>{assign var='category' value=$d->getCategory()}{$category->getTitle()|safetext}</td>
            <td class="z-nowrap z-right">
                <a href="{modurl modname="Downloads" type="user" func="display" lid=$d->getLid()}">{img modname='core' set='icons/extrasmall' src='14_layer_visible.png' __title='View' __alt='View' class='tooltips'}</a>
                <a href="{modurl modname="Downloads" type="user" func="prepHandOut" lid=$d->getLid()}">{img modname='core' set='icons/extrasmall' src='download.png' __title='Download' __alt='Download' class='tooltips'}</a>
            </td>
        </tr>
        {foreachelse}
        <tr class='z-datatableempty'><td colspan='6' class='z-center'>{gt text='No records in category "%1$s". Try a sub-category, or a different category.' tag1=$cid|getcategorynamefromid|safetext}</td></tr>
        {/foreach}
    </tbody>
</table>
{pager rowcount=$rowcount limit=$modvars.Downloads.perpage posvar='startnum'}
{/if}
<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>