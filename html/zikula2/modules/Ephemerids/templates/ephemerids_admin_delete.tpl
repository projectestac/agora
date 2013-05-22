{include file="ephemerids_admin_menu.tpl"}
{gt text="Delete ephemerid" assign=templatetitle}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=editdelete.png set=icons/large}</div>
    <h2>{$templatetitle}</h2>
    <p class="z-warningmsg">{gt text="Do you really want to delete this ephemerid?"}</p>
    <form class="z-form" action="{modurl modname='Ephemerids' type='admin' func='delete'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="confirmation" value="1" />
            <input type="hidden" name="eid" value="{$eid|safetext}" />
            <fieldset>
                <legend>{$templatetitle}</legend>
                <div class="z-formbuttons">
                    {button src=button_ok.png set=icons/small __alt="Delete" __title="Delete"}
                    <a href="{modurl modname=Ephemerids type=admin func=view}">{img modname=core src=button_cancel.png set=icons/small __alt="Cancel" __title="Cancel"}</a>
                </div>
            </fieldset>
        </div>
    </form>
</div>
