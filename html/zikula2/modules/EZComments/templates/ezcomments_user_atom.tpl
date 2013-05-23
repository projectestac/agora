{nocache}{php}header("Content-type: text/xml");{/php}{/nocache}
<?xml version="1.0" encoding="{charset}"?>
<feed version="0.3" xmlns="http://purl.org/atom/ns#">
    <title>{configgetvar name=sitename}</title>
    <link rel="alternate" type="text/html" href="{getbaseurl}" />
    <author>
        <name>{configgetvar name=adminmail}</name>
    </author>
    <tagline>{configgetvar name=backend_title} - {configgetvar name=slogan}</tagline>
    <generator>Zikula - http://www.zikula.org</generator>
    <copyright>{configgetvar name=sitename}</copyright>
    <info>{configgetvar name=backend_title}</info>
    {foreach from=$comments item=comment}
    <entry>
        <title>{$comment.subject|safetext}</title>
        <link rel="alternate" type="text/html" href="{getbaseurl}{$comment.url|safetext}#comment{$comment.id|safetext}" />
        <author>
            <name>{usergetvar name=uname uid=$comment.uid}</name>
        </author>
        <id>{getbaseurl}{$comment.url|safetext}#comment{$comment.id|safetext}</id>
        <issued>{$comment.date|issued}</issued>
        <modified>{$comment.date|modified}</modified>
        <summary type="text/html" mode="escaped">{$comment.comment|strip_tags|safetext}</summary>
    </entry>
    {if $comment.date gt $modified}
    {assign var=modified value=$info.time}
    {/if}
    {/foreach}
</feed>