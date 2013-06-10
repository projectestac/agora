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

<p class="z-formnote z-informationmsg">{gt text='Notice: the news publisher slideshow block is developed for the case where every article has pictures that were uploaded with the picture upload functionality. Furthermore it only works fine if the sizing is set to "fixed size (scale and crop)", since that will give fixed size images and thumbnails.'}</p>
<div class="z-formrow">
    <label for="slideshowblock_limit">{gt text='Maximum number of articles to display'}</label>
    <input id="slideshowblock_limit" type="text" name="limit" size="2" value="{$limit|safetext}" />
</div>
