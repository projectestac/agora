<ul>
    {foreach from=$comments item=comment}
    <li>
        {if $comment.subject neq ''}
        <a href="{$comment.url|safetext}#comment{$comment.id|safetext}">{$comment.subject|safetext}</a>
        {else}
        <a href="{$comment.url|safetext}#comment{$comment.id|safetext}">{$comment.comment|strip_tags:false|truncate:30|safetext}</a>
        {/if}
        {if $showusername and $comment.uname neq ''}
        {gt text="by" domain="module_ezcomments"}
        {if $linkusername}
        {$comment.uid|profilelinkbyuid}
        {else}
        {$comment.uname|safetext}
        {/if}
        {/if}
        {if $showdate}
        {gt text="on" domain="module_ezcomments"}&nbsp;{$comment.date|dateformat|safehtml}
        {/if}
    </li>
    {/foreach}
</ul>
