<div class="z-formrow">
    <label for="Content_page">{gt text="Include the following page"}</label>
    <select id="Content_page" name="page">
        {foreach from=$pidItems item=item}
        <option value="{$item.value}"{if $item.value eq $page} selected="selected"{/if}>
            {$item.text}
        </option>
        {/foreach}
    </select>
</div>