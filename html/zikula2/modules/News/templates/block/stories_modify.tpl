<div class="z-formrow">
    <label for="storiesblock_storiestype">{gt text='Scope of news article listing'}</label>
    <select id="storiesblock_storiestype" name="storiestype">
        <option value="2"{if $storiestype eq 2} selected="selected"{/if}>{gt text='Show all news articles'}</option>
        <option value="3"{if $storiestype eq 3} selected="selected"{/if}>{gt text='Show only articles set for index page listing'}</option>
        <option value="1"{if $storiestype eq 1} selected="selected"{/if}>{gt text='Show only articles not set for index page listing'}</option>
    </select>
</div>

{if $enablecategorization}
<div class="z-formrow">
    <label for="category">{gt text='Category'}</label>
    <div>
        {gt text='Choose category' assign='lblDef'}
        {nocache}
        {selector_category category=$mainCategory name='category' field='id' selectedValue=$category defaultValue='0' defaultText=$lblDef}
        {/nocache}
    </div>
</div>
{/if}

<div class="z-formrow">
    <label for="storiesblock_limit">{gt text='Maximum number of articles to display'}</label>
    <input id="storiesblock_limit" type="text" name="limit" size="2" value="{$limit|safetext}" />
</div>
