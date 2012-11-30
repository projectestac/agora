{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text="View contacts"}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text='ID'}</th>
            <th>{gt text='Name'}</th>
            <th>{gt text='Email'}</th>
            <th>{gt text='Public'}</th>
            <th class="z-right z-nowrap">{gt text='Options'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=contact from=$contacts}
        <tr class="{cycle values="z-odd,z-even" name=contacts}">
            <td>{$contact.cid}</td>
            <td>{$contact.name}</td>
            <td>{$contact.email}</td>
            <td>
                {if $contact.public==1}
                {gt text="Yes"}
                {else}
                {gt text="No"}
                {/if}
            </td>
            <td class="z-right z-nowrap">
                {if $contact.acc_edit==true}
                <a href="{modurl modname=Formicula type=admin func=edit cid=$contact.cid}" class="tooltips" title="{gt text="Edit contact"}">{img src="xedit.png" modname="core" set="icons/extrasmall" __alt="Edit contact" }</a>
                {/if}
                {if $contact.acc_delete==true}
                <a href="{modurl modname=Formicula type=admin func=delete cid=$contact.cid}" class="tooltips" title="{gt text="Delete contact"}">{img src="14_layer_deletelayer.png" modname="core" set="icons/extrasmall" __alt="Delete contact" }</a>
                {/if}
            </td>
        </tr>
        {foreachelse}
        <tr class="z-admintableempty"><td colspan="5">{gt text="No items found."}</td></tr>
        {/foreach}
    </tbody>
</table>

{adminfooter}
<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>