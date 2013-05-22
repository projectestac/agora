{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="new" size="small"}
    <h3>{gt text='Create FAQ'}</h3>
</div>

<form id="faq_admin_newform" class="z-form z-linear" action="{modurl modname="FAQ" type="admin" func="create"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text="Create FAQ"}</legend>
            <div class="z-formrow">
                <label for="faq_question">{gt text="Question"}</label>
                <textarea id="faq_question" name="faq[question]" rows="10" cols="50"></textarea>
            </div>
            <div class="z-formrow">
                <label for="faq_urltitle">{gt text="PermaLink URL title"}</label>
                <input id="faq_urltitle" name="faq[urltitle]" type="text" size="32" maxlength="255" />
                <span class="z-sub">{gt text="(Blank = auto-generate)"}</span>
            </div>
            <div class="z-formrow">
                <label for="faqanswer">{gt text="Answer"}</label>
                <textarea id="faqanswer" name="faq[answer]" rows="10" cols="50"></textarea>
            </div>
            {if $modvars.FAQ.enablecategorization}
            <div class="z-formrow">
                <label>{gt text="Category"}</label>
                {gt text='Choose a category' assign='lblDef'}
                {nocache}
                {foreach from=$catregistry key=property item=category}
                <div class="z-formnote">{selector_category category=$category name="faq[__CATEGORIES__][$property]" field="id" selectedValue="0" defaultValue="0" defaultText=$lblDef}</div>
                {/foreach}
                {/nocache}
            </div>
            {/if}
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Create" __title="Create" __text="Create"}
            <a href="{modurl modname="FAQ" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}
