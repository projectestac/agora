<div class="news_index">
    <h3 class="news_title">{$preformat.title|safehtml}</h3>
    <span class="news_meta z-sub">{gt text='Contributed'} {gt text='by %1$s on %2$s' tag1=$info.contributor tag2=$info.from|dateformat:'datetimebrief'}</span>

    <div class="news_body">
        {if $modvars.News.picupload_enabled AND $info.pictures gt 0}
        <div class="news_photoindex news_thumbsindex" style="float:{$modvars.News.picupload_index_float}">
            {if $modvars.ZConfig.shorturls}
                <a href="{modurl modname='News' type='user' func='display' sid=$info.sid from=$info.from urltitle=$info.urltitle}">{*<span></span>*}<img src="{$modvars.News.picupload_uploaddir}/pic_sid{$info.sid}-0-thumb.jpg" alt="{gt text='Picture %1$s for %2$s' tag1='0' tag2=$info.title}" /></a>
            {else}
                <a href="{modurl modname='News' type='user' func='display' sid=$info.sid}">{*<span></span>*}<img src="{$modvars.News.picupload_uploaddir}/pic_sid{$info.sid}-0-thumb.jpg" alt="{gt text='Picture %1$s for %2$s' tag1='0' tag2=$info.title}" /></a>
            {/if}
        </div>
        {/if}
        {$preformat.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
    </div>

    {if $preformat.notes neq ''}
    <p class="news_meta">{$preformat.notes|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}</p>
    {/if}

    <p class="news_footer">
        {if !empty($info.categories)}
        {gt text='Filed under:'}
        {foreach name='categorylinks' from=$preformat.categories item='categorylink'}
        {$categorylink}{if $smarty.foreach.categorylinks.last neq true},&nbsp;{/if}
        {/foreach}
        <span class="text_separator">|</span>
        {/if}
        {if !empty($preformat.readmore)}
          {$preformat.readmore}
          <span class="text_separator">|</span>
        {/if}

        {$preformat.print}
        {checkpermission component="News::" instance=".*" level="ACCESS_READ" assign="readaccess"}
        {if $modvars.News.pdflink && $readaccess}
        <span class="text_separator">|</span>
        <a title="PDF" href="{modurl modname='News' type='user' func='displaypdf' sid=$info.sid}" target="_blank">PDF <img src="modules/News/images/pdf.gif" width="16" height="16" alt="PDF" /></a>
        {/if}
    </p>
</div>
