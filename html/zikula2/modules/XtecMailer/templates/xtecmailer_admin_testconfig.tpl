{include file="xtecmailer_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=inbox.png set=icons/large __alt="Test current settings"}</div>
    <h2>{gt text="Test current settings"}</h2>
    <form id="test" class="z-form" action="{modurl modname='XtecMailer' type='admin' func='sendmessage'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>{gt text="Settings test"}</legend>
                <div class="z-formrow">
                    <label for="mailer_toaddress">{gt text="Recipient's e-mail address"}</label>
                    <input id="mailer_toaddress" name="toaddress" type="text" size="30" maxlength="50" />
                </div>
                <div class="z-formrow">
                    <label for="mailer_subject">{gt text="Subject"}</label>
                    <input id="mailer_subject" name="subject" type="text" size="30" maxlength="50" />
                </div>
                <div class="z-formrow">
                    <label for="mailer_html">{gt text="HTML-formatted message"}</label>
                    <input id="mailer_html" type="checkbox" name="html" value="1" />
                </div>
                <div class="z-formrow">
                    <label for="mailer_body">{gt text="Message"}</label>
                    <textarea id="mailer_body" name="body" cols="50" rows="10"></textarea>
                </div>
            </fieldset>
            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:document.forms['test'].submit();">
                        {img modname=core src=button_ok.png set=icons/small __alt="Test settings now" __title="Test settings now"}
                        {gt text="Test settings now"}
                    </a>
                </span>
                <span class="z-buttons">
                    <a href="{modurl modname='XtecMailer' type='admin' func='main'}">
                        {img modname=core src=button_cancel.png set=icons/small __alt="Cancel" __title="Cancel"}
                        {gt text="Cancel"}
                    </a>
                </span>
            </div>
        </div>
    </form>
</div>
