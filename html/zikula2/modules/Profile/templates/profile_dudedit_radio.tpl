<div class="{$class|default:'z-formrow'}">
    {if $required}
    <p id="advice-required-prop_{$attributename}" class="custom-advice z-formnote" style="display:none">
        {gt text='Sorry! A required personal info item is missing. Please correct and try again.'}
    </p>
    {/if}

    <label>
        {gt text=$proplabeltext}
        {if $required}<span class="z-form-mandatory-flag">{gt text='*'}</span>{/if}
    </label>
    {html_radios name="dynadata[$attributename]" values=$listoptions output=$listoutput checked=$value labels=false assign='listoptions'}
    {foreach from=$listoptions item='item'}
    <span class="z-formnote">{$item}</span>
    {/foreach}

    {if $note neq ''}
    <em class="z-sub z-formnote">{$note}</em>
    {/if}
    <p id="prop_{$attributename}_error" class="z-formnote z-errormsg {if !$error}z-hide{/if}">{if $error}{$error}{/if}</p>
</div>
