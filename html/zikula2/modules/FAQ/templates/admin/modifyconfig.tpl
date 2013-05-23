{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Settings'}</h3>
</div>

<form class="z-form" action="{modurl modname="FAQ" type="admin" func="updateconfig"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text="General settings"}</legend>
            <div class="z-formrow">
                <label for="faq_enablecategorization">{gt text="Enable categorization"}</label>
                <input id="faq_enablecategorization" type="checkbox" name="enablecategorization"{if $modvars.FAQ.enablecategorization} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="faq_itemsperpage">{gt text="Items per page"}</label>
                <input id="faq_itemsperpage" type="text" name="itemsperpage" size="3" value="{$modvars.FAQ.itemsperpage|safetext}" />
            </div>
        </fieldset>
        <fieldset>
            <legend>{gt text="PermaLinks"}</legend>
            <div class="z-formrow">
                <label for="faq_addcategorytitletopermalink">{gt text="Add category title to PermaLink"}</label>
                <input id="faq_addcategorytitletopermalink" type="checkbox" name="addcategorytitletopermalink"{if $modvars.FAQ.addcategorytitletopermalink} checked="checked"{/if} />
            </div>
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Update" __title="Update" __text="Update"}
            <a href="{modurl modname="FAQ" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}