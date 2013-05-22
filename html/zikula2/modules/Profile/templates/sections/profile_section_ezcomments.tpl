{if $section}

<h4>{gt text='Latest comments of %s' tag1=$userinfo.uname}</h4>
<ul>
{foreach from=$section item='item'}
    <li>
        <a href="{$item.url|safetext}">{if $item.subject}{$item.subject|safetext}{else}{$item.comment|safetext|truncate:50}{/if}</a><br />
        <span class="z-sub">{gt text='On %s' tag1=$item.date|dateformat:'datelong'}</span>
    </li>
{/foreach}
</ul>

{else}
<p class="profile-emptysection">
    {gt text='No recent commets found.'}
</p>
{/if}
