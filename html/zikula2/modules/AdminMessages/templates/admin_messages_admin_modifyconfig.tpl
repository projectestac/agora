{*  $Id: admin_messages_admin_modifyconfig.htm 27108 2009-10-22 18:31:07Z herr.vorragend $  *}
{gt text="Settings" assign=templatetitle}
{include file="admin_messages_admin_menu.tpl"}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=configure.gif set=icons/large alt=$templatetitle}</div>
    <h2>{$templatetitle}</h2>
    <form class="z-form" action="{modurl modname='AdminMessages' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>{gt text="General settings"}</legend>
                <div class="z-formrow">
                    <label for="admin_messages_itemsperpage">{gt text="Items per page"}</label>
                    <input id="admin_messages_itemsperpage" name="itemsperpage" type="text" size="3" maxlength="3" value="{$itemsperpage|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="admin_messages_allowsearchinactive">{gt text="Allow searching of inactive messages"}</label>
                    <input id="admin_messages_allowsearchinactive" name="allowsearchinactive" type="checkbox"{if $allowsearchinactive} checked="checked"{/if} />
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
