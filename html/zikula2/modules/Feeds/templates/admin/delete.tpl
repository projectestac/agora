{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete feed'}</h3>
</div>

<form class="z-form" action="{modurl modname='Feeds' type='admin' func='delete'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
            <input type="hidden" name="confirmation" value="1" />
            <input type="hidden" name="fid" value="{$fid|safetext}" />
            <div class="z-buttons z-center">
                <h4 class="z-center">{gt text='Do you really want to delete this Feed?'}</h4>
                {button src="button_ok.png" set="icons/extrasmall" __alt="Confirm deletion?" __title="Confirm deletion?" __text="Confirm deletion?"}
                <a href="{modurl modname="Feeds" type="admin" func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
            </div>
        </fieldset>
    </div>
</form>
{adminfooter}
