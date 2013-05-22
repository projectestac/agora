<ul>
    {foreach from=$comments item=comment}
    <li>
        {if $comment.subject neq ''}
        <a href="{$comment.url|safetext}#comment{$comment.id|safetext}">{$comment.subject|safetext}</a>
        {else}
        <a href="{$comment.url|safetext}#comment{$comment.id|safetext}">{$comment.comment|strip_tags:false|truncate:30|safetext}</a>
        {/if}
        {if $showcount}
        ({$comment.count})
        {/if}
    </li>
    {/foreach}
</ul>
