{if !empty($anchorName)}<a id="{$anchorName}" name="{$anchorName}"></a>{/if}
<{$headerSize} id="heading_{$contentId}" class="content-heading">
    {if $displayPageTitle}
    {$title|safetext}
    {else}
    {$text}
    {/if}
</{$headerSize}>
