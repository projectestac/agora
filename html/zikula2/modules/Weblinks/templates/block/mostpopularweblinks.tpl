{if $weblinks}
<ol class="mostpopularweblinks">
    {foreach from=$weblinks item=weblinks name=loop}
    {* $smarty.foreach.loop.iteration *}
    <li>
        <a href="{modurl modname='Weblinks' type='user' func='visit' lid=$weblinks.lid}"{if $modvars.Weblinks.targetblank eq 1} target="_blank"{/if}>{$weblinks.title|safetext}</a>
        <em>({$weblinks.hits|safetext})</em>
    </li>
    {/foreach}
</ol>
{/if}