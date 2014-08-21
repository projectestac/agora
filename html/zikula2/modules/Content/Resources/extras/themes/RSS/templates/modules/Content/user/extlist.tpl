{*Template for the rss theme*}

{foreach from=$pages item=page}
<item>
    <title>{$page.title|safetext}</title>
    <link>{pnmodurl modname=content type=user func=view pid=$page.id fqurl=true}</link>
    {if !empty($page.content[0])}
    {foreach from=$page.content[0] item=c}
    <description>{$c.output}</description>      
    {/foreach}
    {/if}
    <pubDate>{$page.ludate|updated|published}</pubDate>
    <guid>{pnmodurl modname=content type=user func=view pid=$page.id fqurl=true}</guid>
</item>
{/foreach}