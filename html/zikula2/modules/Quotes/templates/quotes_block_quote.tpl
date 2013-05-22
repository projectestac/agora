{if $quote.error}
{$quote.error|safehtml}
{else}
<q>{$quote.quote|safehtml}</q>
{if !empty($quote.author)}<span class="balloon_color_{$ballooncolor}">{$quote.author|safehtml}</span>{/if}
{/if}
