<strong>{gt text='Publication Data for #%s:' tag1=$newsitem.sid}</strong>
{if $newsitem.published_status neq 0}
<p class="z-icon-es-flag"><em>{gt text='Article unpublished'} ({$newsitem.status})</em></p>
{/if}
{gt text='forever' assign='forever'}
<ul>
    <li><strong>{gt text='Approved/Rejected By'}:</strong> {if $newsitem.approver gt 0}{usergetvar uid=$newsitem.approver name='uname'} ({$newsitem.approver}){else}<em>{gt text='Pending'}</em>{/if}</li>
    <li><strong>{gt text='Created By'}:</strong> {usergetvar uid=$newsitem.cr_uid name='uname'} ({$newsitem.cr_uid}) <strong>{gt text='On'}:</strong> {$newsitem.cr_date}</li>
    <li><strong>{gt text='Last Updated By'}:</strong> {usergetvar uid=$newsitem.lu_uid name='uname'} ({$newsitem.lu_uid}) <strong>{gt text='On'}:</strong> {$newsitem.lu_date}</li>
    <li><strong>{gt text='Publish From'}:</strong> {$newsitem.from} <strong>{gt text='To'}:</strong> {$newsitem.to|default:$forever}</li>
</ul>