{nocache}{php}header("Content-type: text/xml");{/php}{/nocache}
<?xml version="1.0" encoding="{charset}"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
    <channel>
        <title>{$sitename|safetext}- {gt text="Comments"}</title>
        <link>{getbaseurl}</link>
        <description>{$sitename|safetext} - {$slogan|safetext}</description>
        <language>{$language}</language>
        <pubDate>{$current_date}</pubDate>
        <image>
            <title>{$sitename|safetext}</title>
            <url>{getbaseurl}images/{configgetvar name=site_logo}</url>
        </image>
        <webMaster>{$adminmail|safetext} ({$adminmail|safetext})</webMaster>
        {foreach from=$comments item=comment}
        <item>
            <title>
                {$comment.modname|safetext}:
                {if $comment.subject}
                {$comment.subject|safetext}
                {else}
                {gt text="No subject"}
                {/if}
                {if $comment.uid > 0}
                ({usergetvar name=uname uid=$comment.uid})
                {else}
                ({$comment.anonname|safetext})
                {/if}
            </title>
        <link>{$comment.url|safetext}#comment{$comment.id|safetext}</link>
        <pubDate>{$comment.date|strtotime|dateformat:"%a, %d %b %Y %H:%M:%S %z"}</pubDate>
        <guid>{$comment.url|safetext}#comment{$comment.id|safetext}</guid>
        <description>{$comment.comment|safetext}</description>
        </item>
        {/foreach}
    </channel>
</rss>