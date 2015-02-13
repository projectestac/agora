{if $field.fieldType eq 1 && $field.access}
<!--Init text field-->
<div class="z-formrow">
    {if $field.statusActive}
    <label>
        {$field.fieldName|safehtml}
        <span class="required">
            {$field.required}
        </span>
    </label>
    <div class="field"><input type="text" size="{$size}" name="field{$field.fndid}" id="field{$field.fndid}"/></div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
    {else}
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}<span class="required">{$field.required}</span></div>
    <div class="field"><input class="fieldInnactive" type="text" size="{$size}" onFocus=blur() value="{gt text="Non-editable"}"/></div>
    {/if}
</div>
<!--End text field-->
{/if}

{if $field.fieldType eq 2 && $field.access}
<!--Init textarea field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">
            {$field.required}
        </span>
    </label>
    <div class="field"><textarea cols="{$cols}" rows="{$rows}" name="field{$field.fndid}" id="field{$field.fndid}"{if $field.editor neq 1} class="noeditor"{/if}></textarea></div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
	
    {/if}
</div>
<div style="clear:both"></div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}</div>
    <div class="field"><textarea class="fieldInnactive" cols="{$cols}" rows="{$rows}" onFocus=blur()>{gt text="Non-editable"}</textarea></div>
</div>
{/if}
<!--End textarea field-->
{/if}

{if $field.fieldType eq 3 && $field.access}
<!--Init URL field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">{$field.required}</span>
    </label>
    <div class="field">
        <div style="float:left; width: 100px;">
            <select name="fieldbis{$field.fndid}" id="fieldbis{$field.fndid}">
                <option value=''></option>
                <option selected value='http://'>http://</option>
                <option value='https://'>https://</option>
                <option value='mailto:'>mailto:</option>
            </select>
        </div>
        <div  style="float:left;">
            <input type="text" size="50" maxlength="255" name="field{$field.fndid}" id="field{$field.fndid}" />
        </div>
        <div style="clear: both;">
            <div style="float:left; width: 100px;">
                {gt text="Link text"}:
            </div>
            <div style="float:left;">
                <input type="text" size="50" maxlength="100" name="fieldbisbis{$field.fndid}" id="fieldbisbis{$field.fndid}" />
            </div>
        </div>
    </div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
</div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}</div>
    <div class="field">
        <div style="float:left; width: 100px;">
            <select class="fieldInnactive">
                <option value='http://'>http://</option>
                <option value='https://'>https://</option>
                <option value='mailto:'>mailto:</option>
            </select>
        </div>
        <div  style="float:left;">
            <input class="fieldInnactive" type="text" size="50" maxlength="255" onFocus=blur() value="{gt text="Non-editable"}"/>
        </div>
        <div style="clear: both;">
            <div style="float:left; width: 100px;">
                {gt text="Link text"}:
            </div>
            <div style="float:left;">
                <input class="fieldInnactive" type="text" size="50" maxlength="100" onFocus=blur() value="{gt text="Non-editable"}"/>
            </div>
        </div>
    </div>
</div>
{/if}
<!--End URL field-->
{/if}

{if $field.fieldType eq 4 && $field.access}
<!--Init date field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">{$field.required}</span>
    </label>
    <div class="field">
        {if $calendar}
        <input size="10" id="calendarDate{$field.fndid}" name="field{$field.fndid}" onfocus="blur();" />
        <img id="calendarDate{$field.fndid}_btn" src="modules/IWmain/images/calendar.gif" style="cursor:pointer;" />
        <script type="text/javascript">
            var calendar = Calendar.setup({
                onSelect       :    function(calendar) { calendar.hide() }
            });
            calendar.manageFields("calendarDate{{$field.fndid}}_btn", "calendarDate{{$field.fndid}}", "%d/%m/%y");
        </script>
        {else}
        <select name="field{$field.fndid}" id="field{$field.fndid}">
            <option></option>
            {foreach item=day from=$days}
            <option value="{$day}">{$day}</option>
            {/foreach}
        </select>
        /
        <select name="fieldbis{$field.fndid}" id="fieldbis{$field.fndid}">
            <option></option>
            {foreach item=month from=$months}
            <option {if $monthNow eq $month}selected{/if} value="{$month}">{$month}</option>
            {/foreach}
        </select>
        /
        <select name="fieldbisbis{$field.fndid}" id="fieldbisbis{$field.fndid}">
            <option></option>
            {foreach item=year from=$years}
            <option {if $yearNow eq $year}selected{/if} value="{$year}">{$year}</option>
            {/foreach}
        </select>
        (dd/mm/yy)
        {/if}
    </div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
</div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}<span class="required">{$field.required}</span></div>
    <div class="fieldInnactive">
        <input class="fieldInnactive" type="text" size="15" maxlength="15" value="{gt text="Non-editable"}" onFocus=blur() />
    </div>
</div>
{/if}
<!--End date field-->
{/if}

{if $field.fieldType eq 5 && $field.access}
<!--Init time field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">{$field.required}</span>
    </label>
    <div class="field">
        <select name="field{$field.fndid}" id="field{$field.fndid}">
            <option></option>
            {foreach item=hour from=$hours}
            <option value="{$hour}">{$hour}</option>
            {/foreach}
        </select>
        .
        <select name="fieldbis{$field.fndid}" id="fieldbis{$field.fndid}">
            <option></option>
            {foreach item=minute from=$minutes}
            <option value="{$minute}">{$minute}</option>
            {/foreach}
        </select>
    </div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
</div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}<span class="required">{$field.required}</span></div>
    <div class="fieldInnactive">
        <input class="fieldInnactive" type="text" size="15" maxlength="15" value="{gt text="Non-editable"}" onFocus=blur() />
    </div>
</div>
{/if}
<!--End time field-->
{/if}

{if $field.fieldType eq 6 && $field.access}
<!--Init list field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">{$field.required}</span>
    </label>
    <div class="field">
        <select name="field{$field.fndid}" id="field{$field.fndid}">
            {foreach item=option from=$options}
            <option value="{$option}">{$option}</option>
            {/foreach}
        </select>
    </div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
</div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}<span class="required">{$field.required}</span></div>
    <div class="fieldInnactive">
        <input class="fieldInnactive" type="text" size="25" value="{gt text="Non-editable"}" onFocus=blur() />
    </div>
</div>
{/if}
<!--End list field-->
{/if}

{if $field.fieldType eq 7 && $field.access}
<!--Init file field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">{$field.required}</span>
    </label>
    <div class="field">
        <input type="file" size="30" maxlength="255" name="field{$field.fndid}" id="field{$field.fndid}" />
    </div>
    {if $field.publicFile}
    &nbsp;&nbsp;&nbsp;<a onClick="return overlay(this, 'help1')">{img modname='core' src='info.png' set='icons/extrasmall'}</a>
    <div id="help1" class="helpBox">
        <div class="helpHeader"><div class="helpTitle">{gt text="Public File"}</div></div>
        <div class="helpContent">
            {gt text="If the file is public will be accessible to everyone from a URL like:"}<br />{$publicFileURL}
            <div class="helpBoxClose"><a href="#" onClick="overlayclose('help1'); return false">{gt text="Close the window"} {img modname='IWmain' src='postitcloseicon.png'}</a></div>
        </div>
    </div>
    {/if}
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
    {if $field.extensions != ''}
    <div style="clear:left;">
        {gt text="Allowed files extensions: "} {$field.extensions|replace:",":", "}
    </div>
    {/if}
    {if $field.imgWidth != 0}
    <div style="clear:left;">
        {gt text="Maximum width: %spx" tag1=$field.imgWidth}
    </div>
    {/if}
    {if $field.imgHeight != 0}
    <div style="clear:left;">
        {gt text="Maximum height: %spx" tag1=$field.imgHeight}
    </div>
    {/if}
</div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}<span class="required">{$field.required}</span></div>
    <div class="fieldInnactive">
        <input class="fieldInnactive" type="text" size="50" value="{gt text="Non-editable"}" onFocus=blur() />
    </div>
</div>
{/if}
<!--End file field-->
{/if}

{if $field.fieldType eq 8 && $field.access}
<!--Init file field-->
{if $field.statusActive}
<div class="z-formrow">
    <label>
        {$field.fieldName|safehtml}
        <span class="required">{$field.required}</span>
    </label>
    <div class="field">
        <input type="radio" name="field{$field.fndid}" id="field{$field.fndid}" {if $checked}checked{/if} value="{gt text="Yes"}"/>{gt text="Yes"}
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="radio" name="field{$field.fndid}" id="field{$field.fndid}" {if not $checked}checked{/if} value="{gt text="No"}"/>{gt text="No"}
    </div>
    {if $field.help neq ''}
    {include file="IWforms_user_fieldContentHelp.tpl"}
    {/if}
</div>
{else}
<div class="fieldContent">
    <div class="fieldTitleInnactive">{$field.fieldName|safehtml}<span class="required">{$field.required}</span></div>
    <div class="fieldInnactive">
    </div>
</div>
{/if}
<!--End file field-->
{/if}

{if $field.fieldType eq 51 && $field.access}
<!--Init information field-->
<div class="fieldContent">
    <div class="field">{$field.fieldName|safehtml}</div>
</div>
<!--end information field-->
{/if}

{if $field.fieldType eq 52 && $field.access}
<!--Init line field-->
<div class="fieldContent">
    <div style="border: {$height}px solid {$color};"></div>
</div>
<!--end line field-->
{/if}

{if $field.fieldType eq 53 && $field.access}
<!--Init open fieldset field-->
<div style="clear:both;"></div>
<fieldset style="margin-left: 20px; padding-bottom: 10px; background-color:{$colorf};">
    {if $field.fieldName neq ''}<legend style="border: 1px solid; background-color:{$colorf};"><strong>&nbsp;{$field.fieldName|safehtml}&nbsp;</strong></legend>{/if}
    <!--end open fieldset field-->
    {/if}
    {if $field.fieldType eq 100 && $field.access}
    <!--Init close fieldset field-->
</fieldset>
<!--end close fieldset field-->
{/if}
{notifydisplayhooks eventname='iwforms.ui_hooks.iwforms.form_edit'}
