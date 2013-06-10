{include file="user/menu.tpl"}
<h2>{gt text="Submit a question"}</h2>
<p class="z-informationmsg">{gt text="Before submitting a question please check existing FAQ's as your question may have already been answered. If not then please submit your question via the form and below. Please use clear and precise language when submitting a question. After submission your question will be reviewed by the site editor(s)."}</p>
<form class="z-form z-linear" action="{modurl modname="FAQ" type='user' func="create"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text="Submit a question"}</legend>
            {if $loggedin neq true}
            <div class="z-formrow">
                <label for="faq_submittedby">{gt text="Your name"}</label>
                <input type="text" name="faq[submittedby]" size="30" maxlength="255" />
            </div>
            {/if}
            <div class="z-formrow">
                <label for="faq_question">{gt text="Content"}</label>
                <textarea id="faq_question" name="faq[question]" rows="10" cols="80"></textarea>
            </div>
        </fieldset>
        {notifydisplayhooks eventname='faq.ui_hooks.questions.form_edit' id=null}
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Submit" __title="Submit" __text="Submit"}
            <a href="{modurl modname="FAQ" type="user" func='main'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>