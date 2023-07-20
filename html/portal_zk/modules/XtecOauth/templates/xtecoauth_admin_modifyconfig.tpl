{include file="xtecoauth_admin_menu.tpl"}

<div class="z-admincontainer">

    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large' __alt='Settings' }</div>
    <h2>{gt text="Settings"}</h2>

    <form id="config" class="z-form" action="{modurl modname='XtecOauth' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />

            <fieldset>
                <div class="z-formrow">
                    <label for="xtecoauth_clientid">{gt text="Client ID"}</label>
                    <input id="xtecoauth_clientid" type="text" name="xtecoauth_clientid" size="40" value="{$XtecOauth.xtecoauth_clientid}" />
                </div>
                <div class="z-formrow">
                    <label for="xtecoauth_clientsecret">{gt text="Client Secret"}</label>
                    <input id="xtecoauth_clientsecret" type="text" name="xtecoauth_clientsecret" size="40" value="{$XtecOauth.xtecoauth_clientsecret}" />
                </div>
                <div class="z-formrow">
                    <label for="xtecoauth_apiurlbase">{gt text="API URL Base"}</label>
                    <input id="xtecoauth_apiurlbase" type="text" name="xtecoauth_apiurlbase" size="40" value="{$XtecOauth.xtecoauth_apiurlbase}" />
                </div>
                <div class="z-formrow">
                    <label for="xtecoauth_authorizedomain">{gt text="Authorize Domain"}</label>
                    <input id="xtecoauth_authorizedomain" type="text" name="xtecoauth_authorizedomain" size="40" value="{$XtecOauth.xtecoauth_authorizedomain}" />
                </div>
            </fieldset>

            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:document.forms['config'].submit();">
                        {img modname='core' src='button_ok.png' set='icons/small' __alt="Update Configuration" __title="Update Configuration"}
                        {gt text="Update Configuration"}
                    </a>
                </span>
                <span class="z-buttons">
                    <a href="{modurl modname='XtecOauth' type='admin' func='main'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"}
                        {gt text="Cancel"}
                    </a>
                </span>
            </div>
        </div>
    </form>
</div>