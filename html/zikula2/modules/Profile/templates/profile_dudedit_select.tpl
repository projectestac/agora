{modgetvar module='Users_Constant::MODNAME'|constant name='Users_Constant::MODVAR_AVATAR_IMAGE_PATH'|constant assign='avatarpath'}

<div class="{$class|default:'z-formrow'}">
    {if $required}
    <p id="advice-required-prop_{$attributename}" class="custom-advice z-formnote" style="display:none">
        {gt text='Sorry! A required personal info item is missing. Please correct and try again.'}
    </p>
    {/if}

    <label for="prop_{$attributename}">{gt text=$proplabeltext}{if $required}<span class="z-form-mandatory-flag">{gt text='*'}</span>{/if}</label>
    <select id="prop_{$attributename}" name="dynadata[{$attributename}]{if $selectmultiple}[]{/if}"{$selectmultiple} class="{if $required}required{/if} {if $error}z-form-error{/if}">
        {html_options id=$attributename values=$listoptions output=$listoutput selected=$value}
    </select>

    {if $attributename eq 'avatar'}
    <p id="youravatarcontainer" class="z-formnote">
        <span id="youravatarpath" style="display:none">{$avatarpath}</span>{gt text=$proplabeltext assign='avatarlabeltext'}
        <img id="youravatardisplay" src="{$avatarpath}/{$value}" alt="{$avatarlabeltext}" />
    </p>
    {/if}
    {if $note}
    <em class="z-sub z-formnote">{$note}</em>
    {/if}
    <p id="prop_{$attributename}_error" class="z-formnote z-errormsg {if !$error}z-hide{/if}">{if $error}{$error}{/if}</p>
</div>

{if $attributename eq 'avatar'}
{ajaxheader modname='Profile' filename='showavatar.js'}
<script type="text/javascript">
    // <![CDATA[
    Event.observe($('prop_avatar'), 'change', showavatar);
    // ]]>
</script>
{/if}
