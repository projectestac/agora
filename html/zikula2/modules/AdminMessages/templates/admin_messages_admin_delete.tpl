{*  $Id: admin_messages_admin_delete.htm 27108 2009-10-22 18:31:07Z herr.vorragend $  *}
{gt text="Delete administrator message" assign=templatetitle}
{include file="admin_messages_admin_menu.tpl"}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=editdelete.png set=icons/large alt=$templatetitle}</div>
    <h2>{$templatetitle}</h2>
    <p class="z-warningmsg">{gt text="Do you really want to delete this administrator message?"}</p>
    <form class="z-form" action="{modurl modname='AdminMessages' type='admin' func='delete'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="confirmation" value="1" />
            <input type="hidden" name="mid" value="{$mid|safetext}" />
            <fieldset>
                <legend>{gt text="Confirmation prompt"}</legend>
                <div class="z-formbuttons">
                    {button src=button_ok.png set=icons/small __alt="Delete" __title="Delete"}
                    <a href="{modurl modname=AdminMessages type=admin func=view}">
                        {img modname=core src=button_cancel.png set=icons/small __alt="Cancel" __title="Cancel"}
                    </a>
                </div>
            </fieldset>
        </div>
    </form>
</div>
