
<table class="z-admintable" style="line-height:1em;box-shadow: 3px 3px 3px #888888;">
    <thead>
    <th>
        <span style="color: #59110A; cursor:pointer" onclick="javascript:orderGroupInfo('gid');">{gt text="Id"}</span>
    </th>
    <th>
        <span style="color: #59110A;cursor:pointer"  onclick="javascript:orderGroupInfo('name');">{gt text="Name"}</span>  
        <span style="color: #59110A;float:right; cursor:pointer" onclick = "javascript:showLessInfo('#groupInfo');">
            {img modname=core set="icons/extrasmall" src="button_cancel.png" alt="" style="vertical-align:middle;"} {gt text="Close"}
        </span>
    </th>
</thead>                      
{foreach from=$groupInfo item=group}
    <tr class="{cycle values='z-odd,z-even'}">
        <td width="7%">
            {$group.gid}
        </td>
        <td>
            {$group.name}
        </td>
    </tr>
{/foreach}
<tr>
    <td colspan="2" style="text-align:center">
        <span style="color: #59110A;font-weight:bold;margin-left:auto; margin-right:auto; cursor:pointer" onclick = "javascript:showLessInfo('#groupInfo');">
            {img modname=core set="icons/extrasmall" src="button_cancel.png" alt="" style="vertical-align:middle;"} {gt text="Close"}
        </span>
    </td>
</tr>
</table>

