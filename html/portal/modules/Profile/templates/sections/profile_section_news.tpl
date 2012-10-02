{if $section}

<h4>{gt text='Latest articles of %s' tag1=$userinfo.uname}</h4>
<ul>
    {foreach from=$section item='item'}
    <li>
        <a href="{modurl modname='News' type='user' func='display' title=$item.urltitle sid=$item.sid}">{$item.title|safetext}</a><br />
        <span class="z-sub">{gt text='On %s' tag1=$item.time|dateformat:'datelong'}</span>
    </li>
    {/foreach}
</ul>

{else}
<p class="profile-emptysection">
    {gt text='No recent articles found.'}
</p>
{/if}
