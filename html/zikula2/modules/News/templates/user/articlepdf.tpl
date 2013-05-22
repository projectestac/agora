<span class="news_category">{$preformat.category}</span>
<h3 class="news_title">{$info.catandtitle|safehtml}</h3>
<p class="news_meta z-sub">{gt text='Contributed'} {gt text='by %1$s on %2$s' tag1=$info.contributor tag2=$info.from|dateformat:'datetimebrief'}</p>
{if $links.searchtopic neq '' AND $info.topicimage neq ''}
<p id="news_topic" class="news_meta"><a href="{$links.searchtopic}"><img src="{$modvars.News.catimagepath}{$info.topicimage}" alt="{$info.topicname}" title="{$info.topicname}" /></a></p>
{/if}
<div id="news_body" class="news_body">
    <div class="news_hometext">
        {$preformat.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
    </div>
    {$preformat.bodytext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
</div>
{if $preformat.notes neq ''}
<span id="news_notes" class="news_meta">{$preformat.notes|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}</span>
{/if}