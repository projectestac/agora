{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Update FAQ'}</h3>
</div>

<form id="faq_admin_modifyform" class="z-form z-linear" action="{modurl modname="FAQ" type="admin" func="update"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" name="faq[faqid]" value="{$faqid|safetext}" />
        <input type="hidden" name="faq[submittedbyid]" value="{$submittedbyid|safetext}" />
        <fieldset>
            <legend>{gt text="Update FAQ"}</legend>
            <div class="z-formrow">
                <label for="faq_question">{gt text="Question"}</label>
                <textarea id="faq_question" name="faq[question]" rows="10" cols="50">{$question|safetext}</textarea>
            </div>
            <div class="z-formrow">
                <label for="faq_urltitle">{gt text="PermaLink URL title"}</label>
                <input id="faq_urltitle" name="faq[urltitle]" type="text" size="32" maxlength="255" value="{$urltitle|safetext}" />
                <span class="z-sub">{gt text="(Blank = auto-generate)"}</span>
            </div>
            <div class="z-formrow">
                <label for="faqanswer">{gt text="Answer"}</label>
                <textarea id="faqanswer" name="faq[answer]" rows="10" cols="50">{$answer|safetext}</textarea>
            </div>
            {if $modvars.FAQ.enablecategorization}
            <div class="z-formrow">
                <label>{gt text="Category"}</label>
                {gt text='Choose a category' assign='lblDef'}
                {nocache}
                {foreach from=$categories key=property item=category}
                {array_field array=$__CATEGORIES__ field=$property assign="catExists"}
                {if $catExists}
                {array_field array=$__CATEGORIES__.$property field="id" assign="selectedValue"}
                {else}
                {assign var="selectedValue" value="0"}
                {/if}
                <div class="z-formnote">{selector_category category=$category name="faq[__CATEGORIES__][$property]" field="id" selectedValue=$selectedValue defaultValue="0" defaultText=$lblDef}</div>
                {/foreach}
                {/nocache}
            </div>
            {/if}
        </fieldset>
        <fieldset>
            <legend>{gt text="Meta data"}</legend>
            <ul>
                <li>{gt text="Submitted by %s" tag1=$submittedbyid|profilelinkbyuid}</li>
                <li>{gt text="Answered by %s" tag1=$answeredbyid|profilelinkbyuid}</li>
                <li>{gt text='Created by %1$s on %2$s' tag1=$cr_uid|profilelinkbyuid tag2=$cr_date|dateformat:'datetimelong'}</li>
                <li>{gt text='Updated by %1$s on %2$s' tag1=$lu_uid|profilelinkbyuid tag2=$lu_date|dateformat:'datetimelong'}</li>
            </ul>
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Update" __title="Update" __text="Update"}
            <a href="{modurl modname="FAQ" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}