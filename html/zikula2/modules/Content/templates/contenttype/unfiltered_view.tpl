{if $useiframe}
<div class="content-paragraph">
<iframe 
 name="{$iframename}" 
 title="{$iframetitle}" 
 src="{$iframesrc}" 
 style="{$iframestyle}" 
 width="{$iframewidth}" 
 height="{$iframeheight}" 
 frameborder="{$iframeborder}" 
 scrolling="{$iframescrolling}">
 {if $iframeallowtransparancy}allowtransparancy{/if}
</iframe>
</div>
{else}
<div class="content-paragraph">
    {$text}
</div>
{/if}