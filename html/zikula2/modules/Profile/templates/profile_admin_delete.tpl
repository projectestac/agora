{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete personal info item'}</h3>
</div>

<p class="z-warningmsg">{gt text='Do you really want to delete this personal info item?'}</p>
<form class="z-form" action="{modurl modname='Profile' type='admin' func='delete'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" id="csrftoken" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" name="confirmation" value="1" />
        <input type="hidden" name="dudid" value="{$dudid}" />
        <fieldset>
            <legend>{gt text='Confirmation prompt'}</legend>
            <div class="z-formbuttons z-buttons">
                {button class="z-btgreen" src='button_ok.png' set='icons/small' __alt='Delete' __title='Delete' __text='Delete'}
                <a class="z-btred" href="{modurl modname='Profile' type='admin' func='view'}" title="{gt text="Cancel"}">{img modname='core' src='button_cancel.png' set='icons/small' __alt='Cancel' __title='Cancel'} {gt text="Cancel"}</a>
            </div>
        </fieldset>
    </div>
</form>
{adminfooter}
