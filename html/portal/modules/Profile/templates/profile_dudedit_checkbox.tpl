<div class="{$class|default:'z-formrow'}">
    <label for="prop_{$attributename}">
        {gt text=$proplabeltext}
    </label>
    <input id="prop_{$attributename}" type="checkbox" name="dynadata[{$attributename}]" value="1"{if $value} checked="checked"{/if} />

    {if $note neq ''}
    <em class="z-sub z-formnote">{$note}</em>
    {/if}
    <p id="prop_{$attributename}_error" class="z-formnote z-errormsg {if !$error}z-hide{/if}">{if $error}{$error}{/if}</p>
</div>
