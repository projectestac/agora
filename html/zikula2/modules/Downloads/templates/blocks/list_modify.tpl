<div class="z-formrow">
    <label for='category'>{gt text='Select a category'}</label>
    <select id='category' name='category'>
        {$catselectoptions}
    </select>
</div>
<div class="z-formrow">
    <label for="limit">{gt text="Maximum items to display"}</label>
    <input id="limit" type="text" name="lmit" value="{$vars.limit}" size="5" />
</div>