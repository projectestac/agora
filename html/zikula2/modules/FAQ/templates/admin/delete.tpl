{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Delete FAQ'}</h3>
</div>

<form class="z-form" action="{modurl modname="FAQ" type="admin" func="delete"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" name="confirmation" value="1" />
        <input type="hidden" name="faqid" value="{$faqid|safetext}" />
        <fieldset>
            <legend>{gt text="Confirmation prompt"}</legend>
            <div class="z-buttons z-center">
                <h4 class="z-center">{gt text="Do you really want to delete this FAQ?"}</h4>
                {button src="button_ok.png" set="icons/extrasmall" __alt="Confirm deletion?" __title="Confirm deletion?" __text="Confirm deletion?"}
                <a href="{modurl modname="FAQ" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
            </div>
        </fieldset>
    </div>
</form>
{adminfooter}