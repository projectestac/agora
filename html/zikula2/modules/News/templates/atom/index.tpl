<entry>
    <title>{$info.title|safehtml}</title>
    <link rel="alternate" type="text/html" href="{modurl modname='News' type='user' func='display' sid=$info.sid}" />
    <author><name>{$info.contributor}</name></author>
    <id>{modurl modname='News' type='user' func='display' sid=$info.sid fqurl=true}</id>
    <published>{$info.from|published}</published>
    <updated>{$info.lu_date|updated}</updated>
    <summary type="html">
        {if $modvars.News.picupload_enabled AND $info.pictures gt 0}
            &lt;img src="{$modvars.News.picupload_uploaddir}/pic_sid{$info.sid}-0-thumb.jpg" alt="{gt text='Picture %1$s for %2$s' tag1='0' tag2=$info.title}" /&gt;
        {/if}
        {$info.hometext|notifyfilters:'news.hook.articlesfilter.ui.filter'|safehtml|htmlentities}
    </summary>
</entry>