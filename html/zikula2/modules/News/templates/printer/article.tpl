<div id="news_articlecontent">
    {* Remove this line to show links to the categories as well
    <span class="news_category">
    {foreach name='categorylinks' from=$preformat.categories item='categorylink'}
    {$categorylink}
    {if $smarty.foreach.categorylinks.last neq true}<span class="text_separator"> | </span>{/if}
    {/foreach}
    </span>
    *}
    <h3 class="news_title">{$info.catandtitle}</h3>

    <p class="news_meta z-sub">{gt text='Contributed'} {gt text='by %1$s on %2$s' tag1=$info.contributor tag2=$info.from|dateformat:'datetimebrief'}</p>

    {if $links.searchtopic neq '' AND $info.topicimage neq ''}
    <p id="news_topic" class="news_meta"><a href="{$links.searchtopic}"><img src="{$catimagepath}{$info.topicimage}" alt="{$info.topicname}" title="{$info.topicname}" /></a></p>
    {/if}

    <div id="news_body" class="news_body">
        {if $picupload_enabled AND $info.pictures gt 0}
        <div class="news_photo news_thumbs" style="float:{$picupload_article_float}">
            <img src="{$picupload_uploaddir}/pic_sid{$info.sid}-0-thumb2.jpg" alt="{gt text='Picture %1$s for %2$s' tag1='0' tag2=$info.title}" />
        </div>
        {/if}
        <div class="news_hometext">
            {$preformat.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
        </div>
        {$preformat.bodytext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}

        {if $picupload_enabled AND $info.pictures gt 1}
        <div class="news_pictures"><div><strong>{gt text='Picture gallery'}</strong></div>
            {section name=counter start=1 loop=$info.pictures step=1}
                <div class="news_photoslide news_thumbsslide">
                    <img src="{$picupload_uploaddir}/pic_sid{$info.sid}-{$smarty.section.counter.index}-thumb.jpg" alt="{gt text='Picture %1$s for %2$s' tag1=$smarty.section.counter.index tag2=$info.title}" />
                </div>
            {/section}
        </div>
        {/if}
    </div>

    {if $preformat.notes neq ''}
    <span id="news_notes" class="news_meta">{$preformat.notes|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}</span>
    {/if}

    {* the next code is to display the pager *}
    {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='page' shift=1}
</div>

{if !empty($morearticlesincat)}
<div id="news_morearticlesincat">
<h4>{gt text='More articles in category '}
{foreach name='categorynames' from=$preformat.categorynames item='categoryname'}
{$categoryname}{if $smarty.foreach.categorynames.last neq true}&nbsp;&amp;&nbsp;{/if}
{/foreach}</h4>
<ul>
    {foreach from=$morearticlesincat item='morearticle'}
    <li><a href="{modurl modname='News' type='user' func='display' sid=$morearticle.sid}">{$morearticle.title|safehtml}</a> ({gt text='by %1$s on %2$s' tag1=$morearticle.contributor tag2=$morearticle.from|dateformat})</li>
    {/foreach}
</ul>
</div>
{/if}

{* the next code is to display any hooks (e.g. comments, ratings). All hooks are stored in $hooks and called individually. EZComments is not called when Commenting is not allowed *}
{notifydisplayhooks eventname='news.ui_hooks.articles.display_view' id=$info.sid assign='hooks'}
{foreach from=$hooks key='provider_area' item='hook'}
{if !(($provider_area eq 'provider_area.ui.ezcomments.comments') and ($info.allowcomments eq 0))}
{$hook}
{/if}
{/foreach}