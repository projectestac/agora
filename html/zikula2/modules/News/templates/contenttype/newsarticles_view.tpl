<h4>{$title}</h4>
{if $stories}
<ul class="content_stories">
    {foreach from=$stories item='story'}
    <li>
        {if $story.readperm}
            {if $useshorturls}
                {modurl modname='News' type='user' func='display' sid=$story.sid from=$story.from urltitle=$story.urltitle assign='storylink'}
            {else}
                {modurl modname='News' type='user' func='display' sid=$story.sid assign='storylink'}
            {/if}
        {/if}
        {if $story.readperm}<a href="{$storylink}">{/if}
        {if $story.dispnewimage}{img modname='core' set=$newimageset src=$newimagesrc __alt='Create new article' __title='Create new article'}{/if}
        {$story.title|safehtml}
        {if $story.titlewrapped}{$titlewraptext|safehtml}{/if}
        {if $story.readperm}</a>{/if}

        {* Optional additional info on the story *}
        {if $dispinfo}
            ({if $dispuname}
                {gt text='Contributed by %s' tag1=$story.uname|profilelinkbyuname}
                {if $dispdate} {gt text='on %s' tag1=$story.from|dateformat:$dateformat}{/if}
                {if $dispreads||$dispcomments}{$dispsplitchar} {/if}
            {/if}
            {if $dispreads}{gt text='%s pageview' plural='%s pageviews' count=$story.counter tag1=$story.counter}
                {if $dispcomments}{$dispsplitchar} {/if}
            {/if}
            {if $dispcomments}{gt text='%s comment' plural='%s comments' count=$story.comments tag1=$story.comments}{/if})
        {/if}<br />

        {* Optional hometext display *}
        {if $disphometext}
        <div class="content_newsarticles_hometext">
            {if $story.hometextwrapped}
                {$story.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|truncatehtml:$maxhometextlength:''|safehtml}
            {else}
                {$story.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
            {/if}
            {if ($story.hometextwrapped || strlen($story.bodytext) > 0) && $story.readperm}
                <a href="{modurl modname='News' type='user' func='display' sid=$story.sid}">{$hometextwraptext|safehtml}</a>
            {/if}
        </div>
        {/if}

        {* Remove this line to use the topic link and topicimage per News item as below
        {if $story.topicsearchurl neq ''}
        <div class="content_newsarticles_news_meta">
            <a href="{$story.topicsearchurl}">
                {if $story.topicimage neq ''}
                    <img src="{$catimagepath}{$story.topicimage}" alt="{$story.topicname|safehtml}" title="{$story.topicname|safehtml}" />
                {else}
                    {$story.topicname|safehtml}
                {/if}
            </a>
        </div>
        {/if}
        Remove this line to use the topic link and topicimage per News item as above *}
    </li>
    {/foreach}
</ul>
{else}
<p>{gt text='No articles published recently.'}</p>
{/if}

{checkpermission component='News::' instance='::' level=ACCESS_COMMENT assign='submitauth'}
{if $linktosubmit && $submitauth}
<p><a href="{modurl modname='News' type='user' func='newitem'}">{img modname='core' set='icons/extrasmall' src='edit_add.png' __alt='Submit an article'}&nbsp;{gt text='Submit an article'}</a></p>
{/if}
