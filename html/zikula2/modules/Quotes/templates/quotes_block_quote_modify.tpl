<div class="z-formrow">
    <label for="block_hourfrom">{gt text="From hour"}</label>
    <select id="block_hourfrom" name="hourfrom" style="width:70px">
        <option value="-1"{if $hourfrom eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='hour' loop=$hours}
        <option value="{$hours[hour]}"{if $hourfrom eq $hours[hour]} selected="selected"{/if}>{$hours[hour]}</option>
		{/section}
    </select>
    <label for="block_hourto">{gt text="To hour"}</label>
    <select id="block_hourto" name="hourto" style="width:70px">
        <option value="-1"{if $hourto eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='hour' loop=$hours}
        <option value="{$hours[hour]}"{if $hourto eq $hours[hour]} selected="selected"{/if}>{$hours[hour]}</option>
		{/section}
    </select>
</div>
<div class="z-formrow">
    <label for="block_wdayfrom">{gt text="From day of the week"}</label>
    <select id="block_wdayfrom" name="wdayfrom" style="width:70px">
        <option value="-1"{if $wdayfrom eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='wday' loop=$wdays}
        <option value="{$wdays[wday]}"{if $wdayfrom eq $wdays[wday]} selected="selected"{/if}>{$wdays[wday]}</option>
		{/section}
    </select>
    <label for="block_wdayto">{gt text="To day of the week"}</label>
    <select id="block_wdayto" name="wdayto" style="width:70px">
        <option value="-1"{if $wdayto eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='wday' loop=$wdays}
        <option value="{$wdays[wday]}"{if $wdayto eq $wdays[wday]} selected="selected"{/if}>{$wdays[wday]}</option>
		{/section}
    </select>
</div>
<div class="z-formrow">
    <label for="block_mdayfrom">{gt text="From day of the month"}</label>
    <select id="block_mdayfrom" name="mdayfrom" style="width:70px">
        <option value="-1"{if $mdayfrom eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='mday' loop=$mdays}
        <option value="{$mdays[mday]}"{if $mdayfrom eq $mdays[mday]} selected="selected"{/if}>{$mdays[mday]}</option>
		{/section}
    </select>
    <label for="block_mdayto">{gt text="To day of the month"}</label>
    <select id="block_mdayto" name="mdayto" style="width:70px">
        <option value="-1"{if $mdayto eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='mday' loop=$mdays}
        <option value="{$mdays[mday]}"{if $mdayto eq $mdays[mday]} selected="selected"{/if}>{$mdays[mday]}</option>
		{/section}
    </select>
</div>
<div class="z-formrow">
    <label for="block_monfrom">{gt text="From month"}</label>
    <select id="block_monfrom" name="monfrom" style="width:70px">
        <option value="-1"{if $monfrom eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='month' loop=$months}
        <option value="{$months[month]}"{if $monfrom eq $months[month]} selected="selected"{/if}>{$months[month]}</option>
		{/section}
    </select>
    <label for="block_monto">{gt text="To month"}</label>
    <select id="block_monto" name="monto" style="width:70px">
        <option value="-1"{if $monto eq -1} selected="selected"{/if}>{gt text="Not set"}</option>
		{section name='month' loop=$months}
        <option value="{$months[month]}"{if $monto eq $months[month]} selected="selected"{/if}>{$months[month]}</option>
		{/section}
    </select>
</div>
{if $enablecategorization}
<div class="z-formrow">
    <label>{gt text='Choose categories'}</label>
    {nocache}
    {foreach from=$catregistry key='prop' item='cat'}
    {array_field_isset array=$category field=$prop returnValue=1 assign='selectedValue'}
    <div class="z-formnote">
        {selector_category category=$cat name="category[$prop]" multipleSize=5 selectedValue=$selectedValue}
    </div>
    {/foreach}
    {/nocache}
</div>
{/if}
<div class="z-formrow">
    <label for="blocks_ballooncolor">{gt text="Color for Author divider line"}</label>
    <select id="blocks_ballooncolor" name="ballooncolor">
	<option value="grey" {$balloonselectedgrey}>Grey</option>
	<option value="black" {$balloonselectedblack}>Black</option>
	<option value="green" {$balloonselectedgreen}>Green</option>
	<option value="white" {$balloonselectedwhite}>White</option>
	<option value="yellow" {$balloonselectedyellow}>Yellow</option>
    </select>
</div>
<div class="z-formrow">
    <label for="blocks_cache_time">{gt text="Cache time (enter positive number in seconds to enable cache)"}</label>
    <input id="blocks_cache_time" type="text" name="cache_time" size="10" maxlength="50" value="{$cache_time|safetext}" />
</div>
<div class="z-formrow">
    <label for="blocks_cache_dir">{gt text="Cache directory name (within Zikula Temp directory)"}</label>
    <input id="blocks_cache_dir" type="text" name="cache_dir" size="30" maxlength="255" value="{$cache_dir|safetext}" />
</div>
