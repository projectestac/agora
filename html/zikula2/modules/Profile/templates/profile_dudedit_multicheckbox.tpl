<div class="{$class|default:'z-formrow'}">
    <label for="prop_{$attributename}">{gt text=$proplabeltext}{if $required}<span class="z-form-mandatory-flag">{gt text='*'}</span>{/if}</label>
    <div id="prop_{$attributename}">
        {html_checkboxes name="dynadata[$attributename]" labels=true options=$fields selected=$value assign='fields'}
        {foreach from=$fields item='field'}
        <span class="z-formnote">{$field}</span>
        {/foreach}
    </div>

    {if $note neq ''}
    <em class="z-sub z-formnote">{$note}</em>
    {/if}
    <p id="prop_{$attributename}_error" class="z-formnote z-errormsg {if !$error}z-hide{/if}">{if $error}{$error}{/if}</p>
</div>
