{if $users}
<ul>
    {foreach from=$users item='user'}
        <li>{$user.uname|profilelinkbyuname} ({$user.lastlogin|dateformat})</li>
    {/foreach}
</ul>
{/if}