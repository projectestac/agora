{if $users}
<ul>
    {foreach from=$users item='user'}
        <li>{$user.uname|profilelinkbyuname} ({$user.user_regdate|dateformat})</li>
    {/foreach}
</ul>
{/if}