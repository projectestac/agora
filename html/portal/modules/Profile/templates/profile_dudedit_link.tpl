<div class="{$class|default:'z-formrow'}">
    <label for="prop_{$attributename}">{gt text=$proplabeltext}</label>
    <span id="prop_{$attributename}"><a href="{$linkurl|default:'#'}">{$linktext|default:'-'}</a></span>
    {if $note neq ''}
    <em class="z-sub z-formnote">{$note}</em>
    {/if}
</div>
