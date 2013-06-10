{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="info" size="small"}
    <h3>{gt text='Comment statistics for %s' tag1=$name}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text="Item ID"}</th>
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
            <td><a href="{$commentstat.url|urldecode|safetext}">{$commentstat.objectid|safetext}</a></td>
            <td>{$commentstat.totalcomments|safetext}</td>
            <td>{$commentstat.approvedcomments|safetext}</td>
            <td>{$commentstat.pendingcomments|safetext}</td>
            <td>{$commentstat.rejectedcomments|safetext}</td>
            <td>
                <a href="{modurl modname='EZComments' type='admin' func='deleteitem' mod=$name objectid=$commentstat.objectid}">{img modname='core' set='icons/extrasmall' src='14_layer_deletelayer.png' __title='Delete' __alt='Delete'}</a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{adminfooter}
