<div class="{$class|default:'z-formrow'}">
    {if $required}
    <p id="advice-required-prop_{$attributename}" class="custom-advice z-formnote" style="display:none">
        {gt text='Sorry! A required personal info item is missing. Please correct and try again.'}
    </p>
    {/if}

    <label for="prop_{$attributename}">{gt text=$proplabeltext}{if $required}<span class="z-form-mandatory-flag">{gt text='*'}</span>{/if}</label>
    <input id="prop_{$attributename}" type="text" name="dynadata[{$attributename}]" value="{$value}" size="30" class="{if $required}required{/if} {if $error}z-form-error{/if}" />
    {if $note}
    <em class="z-sub z-formnote">{$note}</em>
    {/if}
    <p id="prop_{$attributename}_error" class="z-formnote z-errormsg {if !$error}z-hide{/if}">{if $error}{$error}{/if}</p>
</div>
