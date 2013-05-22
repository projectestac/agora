{ajaxheader modname='Pages' filename='pages.js'}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Update page'}</h3>
</div>

<form id="pages_admin_modifyform" class="z-form" action="{modurl modname='Pages' type='admin' func='update'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="url" value="{$item.returnurl|safetext}" />
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" name="page[pageid]" value="{$item.pageid|safetext}" />
        <fieldset>
            <legend>{gt text='Content'}</legend>
            <div class="z-formrow">
                <label for="pages_title">{gt text='Title'}</label>
                <input id="pages_title" class="z-form-text" name="page[title]" type="text" size="32" maxlength="255" value="{$item.title|safehtml}" />
            </div>
            {if $modvars.Pages.showpermalinkinput}
            <div class="z-formrow">
                <label for="pages_urltitle">{gt text='PermaLink URL title'}</label>
                <input id="pages_urltitle" class="z-form-text" name="page[urltitle]" type="text" size="32" maxlength="255" value="{$item.urltitle|safetext}" />
                <em class="z-sub z-formnote">{gt text='(Blank = auto-generate)'}</em>
            </div>
            {/if}
            {if $modvars.Pages.enablecategorization}
            <div class="z-formrow">
                <label>{gt text='Category'}</label>
                {gt text='Choose a category' assign='lblDef'}
                {nocache}
                {foreach from=$catregistry key='property' item='category'}
                {array_field array=$item.__CATEGORIES__ field=$property assign='catExists'}
                {if $catExists}
                {array_field array=$item.__CATEGORIES__.$property field='id' assign='selectedValue'}
                {else}
                {assign var='selectedValue' value=0}
                {/if}
                <div class="z-formnote">{selector_category category=$category name="page[__CATEGORIES__][$property]" field='id' selectedValue=$selectedValue defaultValue=0 defaultText=$lblDef}</div>
                {/foreach}
                {/nocache}
            </div>
            {/if}
            {if $modvars.ZConfig.multilingual}
            <div class="z-formrow">
                <label for="pages_language">{gt text='Language'}</label>
                {html_select_languages id='pages_language' name='page[language]' all=true installed=true selected=$item.language}
            </div>
            {/if}
            <div class="z-formrow">
                <label for="pages_content">{gt text='Content'}</label>
                <textarea id="pages_content" class="z-form-text" name="page[content]" rows="10" cols="50">{$item.content|safetext}</textarea>
                <em class="z-sub z-formnote">{gt text='If you want multiple pages you can write &lt;!--pagebreak--&gt; where you want to cut.'}</em>
            </div>
        </fieldset>
        <fieldset>
            <legend>{gt text='Meta tags'}</legend>
            <div class="z-formrow">
                <label for="pages_metadescription">{gt text='Description'}</label>
                <input id="pages_metadescription" class="z-form-text" name="page[metadescription]" type="text" size="32" maxlength="255" value="{$item.metadescription|safehtml}" />
            </div>
            <div class="z-formrow">
                <label for="pages_metakeywords">{gt text='Keywords'}</label>
                <textarea id="pages_metakeywords" class="z-form-text" name="page[metakeywords]" rows="4" cols="50">{$item.metakeywords|safehtml}</textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend><a id="pages_settings_collapse" href="javascript:void(0);">{gt text='Specific page settings'}</a></legend>
            <div id="pages_settings_details">
                <div class="z-formrow">
                    <label for="pages_displaywrapper">{gt text='Display additional information'}</label>
                    <input id="pages_displaywrapper" type="checkbox" name="page[displaywrapper]" value="1" {if $item.displaywrapper} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    <label for="pages_displaytitle">{gt text='Display page title'}</label>
                    <input id="pages_displaytitle" type="checkbox" name="page[displaytitle]" value="1"{if $item.displaytitle} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    <label for="pages_displaycreated">{gt text='Display page creation date'}</label>
                    <input id="pages_displaycreated" type="checkbox" name="page[displaycreated]" value="1"{if $item.displaycreated} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    <label for="pages_displayupdated">{gt text='Display page update date'}</label>
                    <input id="pages_displayupdated" type="checkbox" name="page[displayupdated]" value="1"{if $item.displayupdated} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    <label for="pages_displaytextinfo">{gt text='Display page text statistics'}</label>
                    <input id="pages_displaytextinfo" type="checkbox" name="page[displaytextinfo]" value="1"{if $item.displaytextinfo} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    <label for="pages_displayprint">{gt text='Display page print link'}</label>
                    <input id="pages_displayprint" type="checkbox" name="page[displayprint]" value="1"{if $item.displayprint} checked="checked"{/if} />
                </div>
            </div>
        </fieldset>
        <fieldset class="z-formrow">
            <legend><a id="pages_meta_collapse" href="javascript:void(0);">{gt text='Meta data'}</a></legend>
            <div id="pages_meta_details">
                <ul>
                    {usergetvar name='uname' uid=$item.cr_uid assign='username'}
                    <li>{gt text='Created by %s' tag1=$username}</li>
                    <li>{gt text='Created on %s' tag1=$item.cr_date|dateformat}</li>
                    {usergetvar name='uname' uid=$item.lu_uid assign='username'}
                    <li>{gt text='Last update by %s' tag1=$username}</li>
                    <li>{gt text='Updated on %s' tag1=$item.lu_date|dateformat}</li>
                </ul>
            </div>
        </fieldset>

        {notifydisplayhooks eventname='pages.ui_hooks.pages.form_edit' id=$item.pageid}

        <div class="z-formbuttons z-buttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Update' __title='Update' __text='Update'}
            <a href="{modurl modname='Pages' type='admin' func='view'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel'  __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}