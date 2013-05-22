<ul>
    {foreach from=$articles item="article"}
    {if $readperm}
    <li><a href="{modurl modname='News' type='user' func='display' sid=$article.sid fqurl=true}">{$article.title|safehtml}</a> ({gt text='by %1$s on %2$s' tag1=$article.contributor tag2=$article.from|dateformat:'datebrief'})</li>
    {else}
    <li>{$article.title|safehtml} ({gt text='by %1$s on %2$s' tag1=$article.contributor tag2=$article.from|dateformat:'datebrief'})</li>
    {/if}
    {/foreach}
</ul>
