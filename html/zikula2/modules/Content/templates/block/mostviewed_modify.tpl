<div class="z-formrow">
    <label for="Content_root">{gt text="Include the following subpages"}</label>
    <select id="Content_root" name="root">
        {foreach from=$pidItems item=item}
        <option value="{$item.value}"{if $item.value eq $root} selected="selected"{/if}>
            {$item.text}
        </option>
        {/foreach}
    </select>
</div>

<div class="z-formrow">
    <label for="Content_count">{gt text="How many pages should be shown"}</label>
    <input id="Content_count" type="text" value="{$count|safetext}" name="count" />
</div>

<div class="z-formrow">
    <label for="Content_usecaching">{gt text="Use caching in this block"}</label>
    <input id="Content_usecaching" type="checkbox" value="1" name="usecaching"{if $usecaching} checked="checked"{/if} />
    <em class="z-sub z-formnote">{gt text='Overrides global setting.'}</em>
</div>

<div class="z-formrow">
    <label for="Content_checkinmenu">{gt text="Use only pages activated for the menu"}</label>
    <input id="Content_checkinmenu" type="checkbox" value="1" name="checkinmenu"{if $checkinmenu} checked="checked"{/if} />
</div>