{ajaxheader modname='Downloads' ui=true}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Downloads category list'}</h3>
</div>

{insert name="getstatusmsg"}

<table class="z-datatable">
    <thead>
        <tr>
            <th>{gt text='Title'}</th>
            <th>{gt text='Description'}</th>
            <th>{gt text='Parent'}</th>
            <th class="z-nowrap z-right">{gt text='Action'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$cats item='c'}
        <tr class="{cycle values="z-odd,z-even"}">
            <td>{$c->getTitle()|safetext}</td>
            <td>{$c->getDescription()|truncate:60|safetext}</td>
            <td>{$c->getPid()|getcategorynamefromid|safetext}</td>
            <td class="z-nowrap z-right">
                <a href="{modurl modname="Downloads" type="admin" func="editCategory" id=$c->getCid()}">{img modname='core' set='icons/extrasmall' src='xedit.png' __title='Edit' __alt='Edit' class='tooltips'}</a>
            </td>
        </tr>
        {foreachelse}
        <tr class='z-datatableempty'>
            <td colspan='4'>{gt text='There are no categories to display.'}</td>
        </tr>
        {/foreach}
    </tbody>
</table>

{adminfooter}
<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>