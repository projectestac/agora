<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text="Group"}</th>
            <th>{gt text="Quota (MB)"}</th>
            <th>{gt text="Delete"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item="group" from=$groupsQuotas}
        {if $group.name neq ''}
        <tr class="{cycle values="z-odd,z-even"}">
            <td>{$group.name}</td>
            <td>{$group.quota}</td>
            <td>
                <a href="javascript:deleteGroupQuota({$group.gid})">
                    {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete disk quota" __title="Delete disk quota"}
                </a>
            </td>
        </tr>
        {/if}
        {/foreach}
        <tr class="z-admintableempty">
            <td colspan="3">
                <div id="newQuota">
                    <a href="javascript:newGroupQuota();">
                        {if not $noMoreGroups}{gt text="Assign a new disk quota"}{/if}
                    </a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<em>{gt text="(A value of -1 means no disk quota assigned)"}</em>
