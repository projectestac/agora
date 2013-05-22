{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="new" size="small"}
    <h3>{gt text='Create a feed'}</h3>
</div>

<form class="z-form" action="{modurl modname='Feeds' type='admin' func='create'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text='New Feed'}</legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
            <div class="z-formrow">
                <label for="feeds_feedname">{gt text='Name'}</label>
                <input id="feeds_feedname" name="feed[name]" type="text" size="100" maxlength="100" />
            </div>
            <div class="z-formrow">
                <label for="feeds_urltitle">{gt text='PermaLink URL title'}</label>
                <input id="feeds_urltitle" name="feed[urltitle]" type="text" size="32" maxlength="255" />
                <em class="z-formnote">{gt text='(Blank = auto-generate)'}</em>
            </div>
            {if $enablecategorization}
            <div class="z-formrow">
                <label>{gt text='Category'}</label>
                {gt text='Choose a category' assign='lblDef'}
                {nocache}
                {foreach from=$categories key='property' item='category'}
                <div class="z-formnote">{selector_category category=$category name="feed[__CATEGORIES__][$property]" field='id' selectedValue='0' defaultValue='0' defaultText=$lblDef}</div>
                {/foreach}
                {/nocache}
            </div>
            {/if}
            <div class="z-formrow">
                <label for="feeds_url">{gt text='URL'}</label>
                <input id="feeds_url" name="feed[url]" type="text" size="50" maxlength="240" />
            </div>
        </fieldset>

        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Save" __title="Save" __text="Save"}
            <a href="{modurl modname="Feeds" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}
