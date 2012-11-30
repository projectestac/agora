{if !empty($content[$contentAreaIndex])}
{foreach from=$content[$contentAreaIndex] item=c}
<div class="content-item">
    {$c.output}
</div>
{/foreach}
{/if}