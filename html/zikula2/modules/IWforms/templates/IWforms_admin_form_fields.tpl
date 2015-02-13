<div class="formAdd">
    {*}<a href="{modurl modname='IWforms' type='admin' func='form' action='field' do='add' fid=$item.fid}">{*}
        <a href="javascript:newField({$item.fid})">
            {img modname='core' src='insert_table_row.png' set='icons/extrasmall' __alt="Create a new form field" __title="Create a new form field"}
            {gt text="Create a new form field"}
        </a>
</div>
<div class="formContent" id="fieldsList">
    <div class="z-adminpageicon">{img modname='core' src='lists.png' set='icons/large'}</div>
    <h2>{gt text="List of form fields"}</h2>
    <form id="fields" class="z-form" action="{modurl modname='IWforms' type='admin' func='changeOrder'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="fid" value="{$fid}" />
        <table class="z-datatable">
            <thead>
                <tr>
                    <th>{gt text="Order"}</th>
                    <th>Id</th>
                    <th>{gt text="Name field"}</th>
                    <th>{gt text="Description"}</th>
                    <th>{gt text="Type field"}</th>
                    <th>{gt text="Characteristics"}</th>
                    {*}<th>{gt text="Dependence"}</th>{*}
                    {*}<th>{gt text="Validators"}</th>{*}
                    <th>{gt text="Options"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=field from=$fields}
                {include file="IWforms_admin_form_fieldChar.tpl" field=$field users=$users}
                {foreachelse}
                <tr>
                    <td colspan="20">
                        {gt text="No fields have been found for this form"}
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        <div>
            {img modname='IWforms' src='orderLine.gif' __alt="Change order" __title="Change order"}
            <span class="orderButton z-buttons">
                <a onClick="javascript:forms['fields'].submit()">
                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Change order" __title="Change order"} {gt text="Change order"}
                </a>
            </span>
        </div>
        <div class="z-center">
            <span class="z-buttons">
                <a href="{modurl modname='IWforms' type='admin' func='collexpand' value='0' fid=$item.fid}" title="{gt text='Expand all'}">
                    {img modname='core' src='db_update.png' set='icons/extrasmall'   __alt="Expand all" __title="Expand all"} {gt text="Expand all"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='IWforms' type='admin' func='collexpand' value='1' fid=$item.fid}" title="{gt text='Collapse all'}">
                    {img modname='core' src='db_comit.png' set='icons/extrasmall' __alt="Collapse all" __title="Collapse all"} {gt text="Collapse all"}
                </a>
            </span>
        </div>
    </form>
