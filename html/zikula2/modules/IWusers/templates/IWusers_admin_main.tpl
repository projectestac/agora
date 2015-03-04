{*include file="IWusers_admin_menu.tpl"*}
{ajaxheader modname=$modinfo.name filename='IWusers.js' ui=true}
{pageaddvar name=javascript value=jQuery}
{pageaddvar name='javascript' value='vendor/bootstrap/js/bootstrap.js'}
{pageaddvar name='stylesheet' value='vendor/bootstrap/css/bootstrap.css'}
{pageaddvar name="stylesheet" value="vendor/datatables/media/css/jquery.dataTables.css"}
{pageaddvar name="javascript" value="vendor/datatables/media/js/jquery.dataTables.js"}

{adminheader}
 {insert name='csrftoken' assign='csrftoken'}
<div id = "maincontent" class="z-admincontainer">
    <h2>{icon type="view" size="small"}&nbsp;{gt text="List of users"}</h2>
    
    <form  class="z-adminform z-form" enctype="application/x-www-form-urlencoded" method="post" name="usersList" action="{modurl modname="IWusers" type="admin" func="main"}">
        <input type="hidden" name="filtre" value="{$filtre}" />
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="campfiltre" value="{$campfiltre}" />
        <input type="hidden" name="numitems" value="{$numitems}" />
        <input type="hidden" name="inici" value="0" />
        <table width="100%">
            <tbody>
                <tr>            
                    <td align="left">
                        [
                        {section name=leters loop=$leters}
                            {if $filtre neq $leters[leters]}
                                <a href="{modurl modname=IWusers type=admin func=main inici=0 filtre=$leters[leters]}">{$leters[leters]}</a> |
                            {else}
                                <strong><u>{$leters[leters]}</u></strong> |
                                    {/if}
                                {/section}
                                {if $filtre eq '' or $filtre eq '0'}
                            <strong><u>{gt text="All"}</u></strong>
                                {else}
                            <a href="{modurl modname=IWusers type=admin func=main inici=0 filtre=0}">
                                {gt text="All"}
                            </a>
                        {/if}
                        ]
                    </td>
                    <td align="right">
                        <div class="z-formrow">
                            <span>{gt text="N. records"}:&nbsp;
                            <select name="numitems" onchange='this.form.submit()'>
                                {section name=numitems_MS loop=$numitems_MS}
                                    <option {if $numitems eq $numitems_MS[numitems_MS].id}selected{/if} value="{$numitems_MS[numitems_MS].id}">{$numitems_MS[numitems_MS].name}</option>
                                {/section}
                            </select></span>
                        </div>
                    </td>
                    <td align="right">
                        <div class="z-formrow">
                            <span>
                                {gt text="Order"}:&nbsp;
                                <select name="campfiltre" onchange='this.form.submit()'>
                                    {section name=campsfiltre_MS loop=$campsfiltre_MS}
                                        <option {if $campfiltre eq $campsfiltre_MS[campsfiltre_MS].id}selected{/if} value="{$campsfiltre_MS[campsfiltre_MS].id}">{$campsfiltre_MS[campsfiltre_MS].name}</option>
                                    {/section}
                                </select>
                            </span>
                        </div>
                    </td>                    
                </tr>
            </tbody>
        </table>
    </form>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" name="usersListOptions" action="">
        <table id="tblUsers" class="z-datatable">
            <thead>
                <tr>
                    <th>{gt text="Id"}</th>
                    <th>&nbsp;</th>
                    <th>{gt text="User name"}</th>
                    <th>{gt text="Name"}</th>
                    <th>{gt text="1st surname"}</th>
                    <th>{gt text="2nd surname"}</th>
                    <th>{gt text="Group/a"}</th>
                    <th>{gt text="Options"}</th>
                </tr>
            </thead>
            <tbody>
                {foreach item=user from=$users}
                    <tr class="{cycle values='z-odd,z-even'}" id="uid_{$user.uid}">
                        <td>
                            {$user.uid}
                        </td>
                        <td width="10">
                            {if $user.photo neq ''}
                                <img src="{modurl modname=IWmain type=user func=getPhoto fileName=$user.photo}" alt="{$user.uname}"/>
                            {else}
                                &nbsp;
                            {/if}
                        </td>
                        <td>
                            {$user.uname}
                            <br />
                            <font size='-2'>{$user.email}</font>
                        </td>
                        <td>
                            {$user.nom}
                        </td>
                        <td>
                            {$user.cognom1}
                        </td>
                        <td>
                            {$user.cognom2}
                        </td>
                        <td>
                            <div id="userGroupsList_{$user.uid}">
                                {include file="IWusers_admin_userGroupsList.htm"}
                            </div>
                            <div id="addGroup_{$user.uid}" style="float: right;">
                                {include file="IWusers_admin_addGroupForm.htm"}
                            </div>
                        </td>
                        <td align="center">
                            <a href="javascript:doIt({$user.uid}, 0)"><img id="iconGroup_{$user.uid}{$group}" style="vertical-align:text-middle;" src="images/icons/extrasmall/xedit.png" title="{gt text='Edit'}" alt="{gt text='Edit'}"></a>
                            <a href="javascript:doIt({$user.uid}, 1)"><img id="iconDelUsr_{$user.uid}" style="vertical-align:middle;" src="images/icons/extrasmall/14_layer_deletelayer.png" title="{gt text="Delete '%s'" tag1=$user.uname}" alt="{gt text="Delete '%s'" tag1=$user.uname}"></a>                        
                            {*<a href="javascript:deleteUsr('{$user.uid}', '{$user.uname}','{gt text="Confirm the deletion"}')"><img id="iconDelUsr_{$user.uid}" src="images/icons/extrasmall/14_layer_deletelayer.png" title="{gt text="Delete '%s'" tag1=$user.uname}" alt="{gt text="Delete '%s'" tag1=$user.uname}"></a>                        *}
                            <input style="vertical-align: bottom" type="checkbox" id="cb{$user.uid}" name="userId[]" value="{$user.uid}">
                        </td>
                    </tr>
                {/foreach}
        </table>
        <table width="100%">
                <tr>
                    <td align="right">
                        <div style="width:30%;background-color:#EEE; box-shadow: 5px 5px 8px #888888; padding-bottom:3px; padding-right: 5px;	border-radius: 5px;">
                        <b>{gt text="Apply to selected items"}</b>:&nbsp;<input type="image" style="vertical-align:middle;" src="images/icons/extrasmall/xedit.png" onClick="javascript:send(0)" title="{gt text='Edit selected items'}" alt="{gt text='Edit selected items'}" />
                        <input type="image" style="vertical-align:middle;" src="images/icons/extrasmall/14_layer_deletelayer.png" onClick="javascript:send(1)" title="{gt text='Delete selected items'}" alt="{gt text='Delete selected items'}" />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

       
        <table>
            <tr>
                <td>
                    {gt text="No. Records"}: {$usersNumber}
                </td>
            </tr>
            <tr>
                <td>
                    {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='inici'}
                </td>
            </tr>
        </table>
    </form>
</div>

{adminfooter}
<script>
    //jQuery('#tblUsers').DataTable({'paging': true,'columnDefs': [{ 'orderable': false, 'targets': [1,6,7] }],'info': false,'language': {'search': 'Cerca:'} });
</script>