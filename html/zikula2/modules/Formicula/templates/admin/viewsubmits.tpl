{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text="View form submits"}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text='ID'}</th>
            <th>{gt text='Form #'}</th>
            <th>{gt text='Contact ID'}</th>
            <th>{gt text='Date'}</th>
            <th>{gt text='Name'}</th>
            <th class="z-right">{gt text='Options'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=submit from=$formsubmits}
        <tr class="{cycle values="z-odd,z-even" name=submits}">
            <td>{$submit.sid|safetext}</td>
            <td>{$submit.form|safetext}</td>
            <td>{$submit.cid|safetext}</td>
            <td>{$submit.cr_date|dateformat:'datetimebrief'}</td>
            <td><a href="#" class="tooltips" title="{gt text='Email: %1$s - UID: %2$s' tag1=$submit.email|safetext tag2=$submit.cr_uid|safetext}">{$submit.name|safetext}</a></td>
            <td class="z-right">
                <a href="{modurl modname=Formicula type=admin func=displaysubmit sid=$submit.sid}" class="tooltips" title="{gt text="View form submit"}">{img src="14_layer_visible.png" modname="core" set="icons/extrasmall" __alt="View form submit" }</a>
                <a href="{modurl modname=Formicula type=admin func=deletesubmit sid=$submit.sid}" class="tooltips" title="{gt text="Delete form submit"}">{img src="14_layer_deletelayer.png" modname="core" set="icons/extrasmall" __alt="Delete form submit" }</a>
            </td>
        </tr>
        {foreachelse}
        <tr class="z-admintableempty"><td colspan="6">{gt text="No items found."}</td></tr>
        {/foreach}
    </tbody>
</table>

{adminfooter}
<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>
