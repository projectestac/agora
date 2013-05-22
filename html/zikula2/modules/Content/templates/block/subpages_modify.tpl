<p class="z-informationmsg">{gt text='This block will only show the subpages of a Content page when that Content page is being displayed.'}</p>

<div class="z-formrow">
    <label for="Content_usecaching">{gt text="Use caching in this block"}</label>
    <input id="Content_usecaching" type="checkbox" value="1" name="usecaching"{if $usecaching} checked="checked"{/if} />
    <em class="z-sub z-formnote">{gt text='Overrides global setting.'}</em>
</div>

<div class="z-formrow">
    <label for="Content_checkinmenu">{gt text="Use only pages activated for the menu"}</label>
    <input id="Content_checkinmenu" type="checkbox" value="1" name="checkinmenu"{if $checkinmenu} checked="checked"{/if} />
</div>