{if $headline}<h2>{$headline}</h2>{/if}
{if $links}
<ol class="weblinks">
    {foreach from=$links item='link'}
    <li>
        <a href="{modurl modname='Weblinks' type='user' func='visit' lid=$link.lid}"{if $modvars.Weblinks.targetblank eq 1} target="_blank"{/if}>{$link.title|safetext}</a>
    </li>
    {/foreach}
</ol>
{/if}