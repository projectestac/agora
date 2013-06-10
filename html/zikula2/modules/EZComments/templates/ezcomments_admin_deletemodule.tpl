{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete module'}</h3>
</div>

<p class="z-warningmsg">{gt text="Confirm deletion of all comments attached to module '%s'" tag1=$name}</p>
<form class="z-form" action="{modurl modname='EZComments' type='admin' func='deletemodule'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <input type="hidden" name="modid" value="{$modid|safetext}" />
        <fieldset>
            <legend>{gt text="Confirmation prompt"}</legend>
            <div class="z-buttons z-formbuttons">
                {button src='button_ok.png' set='icons/extrasmall' __alt='Delete' __title='Delete' __text='Delete'}
                <a href="{modurl modname='EZComments' type='admin' func='main'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
            </div>
        </fieldset>
    </div>
</form>
{adminfooter}
