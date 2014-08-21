{if isset($toc.toc)}
<ul class="content-toc">
    {foreach from=$toc.toc item="item"}
    {if isset($item.pid) && ($item.pid == $page.id)}
    <li class="content-toc-level_{$item.level} content-toc-active">{$item.title|safetext}
    {else}
    <li class="content-toc-level_{$item.level} {$item.css}"><a href="{$item.url|safetext}">{$item.title|safetext}</a>
    {/if}
        {if !empty($item.toc)}
        {include file="contenttype/tableofcontents_view.tpl" toc=$item}
        {/if}
    </li>
    {/foreach}
</ul>
{/if}