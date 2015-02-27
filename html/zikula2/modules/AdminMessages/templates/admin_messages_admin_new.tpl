{*  $Id: admin_messages_admin_new.htm 27108 2009-10-22 18:31:07Z herr.vorragend $  *}
{gt text="Create new message" assign=templatetitle}
{include file="admin_messages_admin_menu.tpl"}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=filenew.png set=icons/large alt=$templatetitle}</div>
    <h2>{$templatetitle}</h2>
    <form id="adminmsgs_admin_newform" class="z-form z-linear" action="{modurl modname='AdminMessages' type='admin' func='create'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>{gt text="New message"}</legend>
                <div class="z-formrow">
                    <label for="admin_messages_title">{gt text="Title"}</label>
                    <input id="admin_messages_title" name="message[title]" type="text" size="50" maxlength="100" />
                </div>
                {if $multilingual}
                <div class="z-formrow">
                    <label for="admin_messages_language">{gt text="Language"}</label>
                    {html_select_languages id=admin_messages_language name=message[language] all=true installed=true selected=$language}
                </div>
                {/if}
                <div class="z-formrow">
                    <label for="admin_messages_content">{gt text="Content"}</label>
                    <textarea id="admin_messages_content" name="message[content]" cols="50" rows="10"></textarea>
                </div>
                <div class="z-formrow">
                    <label for="admin_messages_active">{gt text="Active"}</label>
                    <div id="admin_messages_active">
                        <input id="admin_messages_active_yes" name="message[active]" type="radio" value="1" checked="checked" />
                        <label for="admin_messages_active_yes">{gt text="Yes"}</label>
                        <input id="admin_messages_active_no" name="message[active]" type="radio" value="0" />
                        <label for="admin_messages_active_no">{gt text="No"}</label>
                    </div>
                </div>
                <div class="z-formrow">
                    <label for="admin_messages_expire">{gt text="Expiration"}</label>
                    <div>
                        <input id="admin_messages_expire" name="message[expire]" type="text" size="5" maxlength="5" value="0" />
                        <span class="z-sub">{gt text="days (0 = never)"}</span>
                    </div>
                </div>
                <div class="z-formrow">
                    <label for="admin_messages_view">{gt text="Visibility"}</label>
                    <div>
                        <select id="admin_messages_view" name="message[view]">
                            <option value="1">{gt text="All visitors"}</option>
                            <option value="2">{gt text="Registered users only"}</option>
                            <option value="3">{gt text="Anonymous guests only"}</option>
                            <option value="4">{gt text="Administrators only"}</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="z-formbuttons">
                {button src=button_ok.png set=icons/small __alt="Save" __title="Save"}
                <a href="{modurl modname='AdminMessages' type='admin' func='view'}">
                    {img modname=core src=button_cancel.png set=icons/small __alt="Cancel" __title="Cancel"}
                </a>
            </div>
        </div>
    </form>
</div>
{notifydisplayhooks eventname='adminmessages.ui_hooks.adminmessages.form_edit'}
