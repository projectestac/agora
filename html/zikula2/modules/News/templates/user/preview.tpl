<h3 class="news_title">{$preview.title|safehtml}</h3>

<div id="news_body" class="news_body">
    {$preview.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
    <hr />
    {$preview.bodytext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
</div>

{if $preview.notes neq ''}
<span id="news_notes" class="news_meta">{$preview.notes|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}</span>
{/if}
{if $preview.pictures > 0}
{include file='user/preview_pics.tpl'}
{/if}