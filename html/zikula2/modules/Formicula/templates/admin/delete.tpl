{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text="Delete contact"}</h3>
</div>

<p class="z-warningmsg">{gt text="Do you really want to delete this contact?"}</p>

<form class="z-form" action="{modurl modname=Formicula type=admin func=delete}" method="post">
    <fieldset>
        <legend>{gt text='Confirmation prompt'}</legend>
        <input type="hidden" name="cid" value="{$contact.cid}" />
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <div class="z-formrow">
            <span class="z-label">{gt text="Contact name"}</span>
            <span>{$contact.name|safetext}</span>
        </div>
        <div class="z-formrow">
            <span class="z-label">{gt text="Email"}</span>
            <span>{$contact.email|safetext}</span>
        </div>

    </fieldset>

    <div class="z-formbuttons z-buttons">
        {button class="z-btgreen" src='button_ok.png' name='confirmation' value='confirmation' set='icons/extrasmall' __alt='Delete' __title='Delete' __text='Delete'}
        <a class="z-btred" href="{modurl modname='Formicula' type='admin' func='view'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel'  __title='Cancel'} {gt text="Cancel"}</a>
    </div>
</form>

{adminfooter}