{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="info" size="small"}
    <h3>{gt text='Comment statistics'}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text="Module"}</th>
            <th>{gt text="Total comments"}</th>
            <th>{gt text="Approved"}</th>
            <th>{gt text="Pending"}</th>
            <th>{gt text="Rejected"}</th>
            <th>{gt text="Options"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$commentstats item=commentstat}
        <tr class="{cycle values=z-odd,z-even}">
            <td><a href="{modurl modname='EZComments' type='admin' func='modulestats' mod=$commentstat.name}">{$commentstat.name|safetext}</a></td>
            <td>{$commentstat.totalcomments|safetext}</td>
            <td>{$commentstat.approvedcomments|safetext}</td>
            <td>{$commentstat.pendingcomments|safetext}</td>
            <td>{$commentstat.rejectedcomments|safetext}</td>
            <td>
                {if $commentstat.totalcomments gt 0}
                <a href="{modurl modname='EZComments' type='admin' func='deletemodule' modid=$commentstat.modid}">{img modname='core' set='icons/extrasmall' src='14_layer_deletelayer.png' __title='Delete' __alt='Delete'}</a>
                {else}
                &nbsp;
                {/if}
            </td>
        </tr>
        {foreachelse}
        <tr class="z-admintableempty"><td colspan="6">{gt text="No items found"}</td></tr>
        {/foreach}
    </tbody>
</table>
{adminfooter}
