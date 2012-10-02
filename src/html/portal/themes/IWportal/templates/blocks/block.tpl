{if $title neq ''}
{* Display title if there is one *}
<h4 class="pn-block-title">{$title}</h4>
<div class="pn-block-content">
    {else}
    <div class="pn-block-content pn-block-content-complete">
        {/if}
        {$content}
    </div>
