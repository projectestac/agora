<div class="z-formrow">
    <label for="ezcomments_numentries">{gt text="Number of comments to display"}</label>
    <input id="ezcomments_numentries" type="text" name="numentries" value="{$numentries|safehtml}" size="5" maxlength="5" />
</div>
<div class="z-formrow">
    <label for="ezcomments_modname">{gt text="Show comments for the following module"}</label>
    <select id="ezcomments_modname" name="mod">
        <option label="*" value="*" {if $mod eq "*"}selected="selected"{/if}>{gt text="All"}</option>
        {html_options values=$usermods output=$usermods selected=$mod}
    </select>
</div>
<div class="z-formrow">
    <label for="ezcomments_showcount">{gt text="Show count"}</label>
    {if $showcount}
    <input id="ezcomments_showcount" type="checkbox" name="showcount" value="1" checked="checked" />
    {else}
    <input id="ezcomments_showcount" type="checkbox" name="showcount" value="1" />
    {/if}
</div>
