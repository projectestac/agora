{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Update feed'}</h3>
</div>

<form class="z-form" action="{modurl modname='Feeds' type='admin' func='update'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" name="feed[fid]" value="{$fid|safetext}" />
        <fieldset>
            <legend>{gt text='Content'}</legend>
            <div class="z-formrow">
                <label for="feeds_feedname">{gt text='Name'}</label>
                <input id="feeds_feedname" name="feed[name]" type="text" size="100" maxlength="100" value="{$name|safetext}" />
            </div>
            {if $enablecategorization}
            <div class="z-formrow">
                <label>{gt text='Category'}</label>
                {gt text='Choose a category' assign='lblDef'}
                {nocache}
                {foreach from=$categories key='property' item='category'}
                {array_field array=$__CATEGORIES__ field=$property assign='catExists'}
                {if $catExists}
                {array_field array=$__CATEGORIES__.$property field='id' assign='selectedValue'}
                {else}
                {assign var='selectedValue' value='0'}
                {/if}
                <div class="z-formnote">{selector_category category=$category name="feed[__CATEGORIES__][$property]" field='id' selectedValue=$selectedValue defaultValue='0' defaultText=$lblDef}</div>
                {/foreach}
                {/nocache}
            </div>
            {/if}
            <div class="z-formrow">
                <label for="feeds_urltitle">{gt text='PermaLink URL title'}</label>
                <input id="feeds_urltitle" name="feed[urltitle]" type="text" size="32" maxlength="255" value="{$urltitle|safetext}" />
                <em class="z-formnote">{gt text='(Blank = auto-generate)'}</em>
            </div>
            <div class="z-formrow">
                <label for="feeds_url">{gt text='URL'}</label>
                <input id="feeds_url" name="feed[url]" type="text" size="50" maxlength="240" value="{$url|safetext}" />
            </div>
        </fieldset>
        <fieldset>
            <legend>{gt text='Meta data'}</legend>
            <ul>
                {usergetvar name='uname' uid=$cr_uid assign='username'}
                <li>{gt text='Created by %s' tag1=$username}</li>
                <li>{gt text='Created on %s' tag1=$cr_date|dateformat}</li>
                {usergetvar name='uname' uid=$lu_uid assign='username'}
                <li>{gt text='Last update by %s' tag1=$username}</li>
                <li>{gt text='Updated on %s' tag1=$lu_date|dateformat}</li>
            </ul>
        </fieldset>

        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Save" __title="Save" __text="Save"}
            <a href="{modurl modname="Feeds" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}
