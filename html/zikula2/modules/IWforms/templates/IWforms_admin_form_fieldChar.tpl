<tr class="{cycle values='z-odd, z-even'}" id="fieldrow_{$field.fndid}">
    <td valign="top">
        <input type="text" style="text-align:right;" name="f[{$field.fndid}]" size="3" value="{$field.order}" />
    </td>
    <td valign="top">
        {$field.fndid}
    </td>
    <td align="left" valign="top">
        {$field.fieldName}
    </td>
    <td valign="top">
        {$field.description}
    </td>
    <td valign="top">
        {$field.fieldTypeText}
    </td>
    <td width="180" valign="top">
        <div id="field_{$field.fndid}" name="field_{$field.fndid}">
            {include file="IWforms_admin_form_fieldCharContent.tpl" field=$field}
        </div>
    </td>

    {*}
    <td valign="top">
        {foreach item=validator from=$field.validatorsNames}
        {$users[$validator.id]}
        <a href="{modurl modname='IWforms' type='admin' func='deleteFieldValidator' fid=$item.fid fndid=$field.fndid id=$validator.id}">
            {img modname='core' src='delete_user.png' set='icons/extrasmall' __alt="Delete the validator" __title="Delete the validator"}
        </a>
        <br />
        {/foreach}
        <div class="formOptions">
            <a href="{modurl modname='IWforms' type='admin' func='form' action='field' do=addFieldValidator fid=$item.fid fndid=$field.fndid}">
                {img modname='core' src='add_user.png' set='icons/extrasmall' __alt="Add a validator" __title="Add a validator"}
            </a>
        </div>
    </td>
    {*}
    <td align="right" valign="top" width="80">
        <a href="{modurl modname='IWforms' type='admin' func='form' action='field' do='edit' fndid=$field.fndid fid=$item.fid}">
            {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Edit the field" __title="Edit the field"}
        </a>
        {*}
        <a href="{modurl modname='IWforms' type='admin' func='form' action='field' do='delete' fndid=$field.fndid fid=$item.fid}">
            {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete the field" __title="Delete the field"}
        </a>
        {*}
        <a href="javascript:deleteFormField({$field.fndid},{$item.fid});">
            {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete the field" __title="Delete the field"}
        </a>
        {if $field.order neq $number*10}
        <a href="{modurl modname='IWforms' type='admin' func='order' puts='-1' fndid=$field.fndid fid=$item.fid}">
            {img modname='IWforms' src='down.gif' __alt="A low" __title="A low"}
        </a>
        {/if}
        {if $field.order neq 10}
        <a href="{modurl modname='IWforms' type='admin' func='order' puts='1' fndid=$field.fndid fid=$item.fid}">
            {img modname='IWforms' src='up.gif' __alt="Up one place" __title="Up one place"}
        </a>
        {/if}
    </td>
</tr>
