<item>
    <title>{$info.title|safetext}</title>
    <link>{modurl modname='News' type='user' func='display' sid=$info.sid title=$info.urltitle fqurl=true}</link>
    <description>
        {if $modvars.News.picupload_enabled AND $info.pictures gt 0}
            &lt;img src="{$modvars.News.picupload_uploaddir}/pic_sid{$info.sid}-0-thumb.jpg" alt="{gt text='Picture %1$s for %2$s' tag1='0' tag2=$info.title}" /&gt;
        {/if}
        {$info.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml}
    </description>
    <pubDate>{$info.from|updated|published}</pubDate>
    <guid>{modurl modname='News' type='user' func='display' sid=$info.sid title=$info.urltitle fqurl=true}</guid>
</item>
