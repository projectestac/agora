{if $title neq ''}
{* Display title if there is one *}
<h4 class="z-block-title">{$title}</h4>
<div class="z-block-content">
    {else}
    <div class="z-block-content z-block-content-complete">
        {/if}
        {$content}
    </div>
