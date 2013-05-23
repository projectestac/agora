{foreach from=$news item='news' key='date'}
<h5>{$date|dateformat:'datestring2'}</h5>
<ul>
    {foreach from=$news item='article'}
    <li>
        {$article.preformat.title|safehtml}
        {if isset($article.info.commentcount)}&nbsp;({$article.info.commentcount}){/if}
    </li>
    {/foreach}
</ul>
{/foreach}
