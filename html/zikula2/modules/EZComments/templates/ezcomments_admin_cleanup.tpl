{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete all comments for this module'}</h3>
</div>

<p class="z-warningmsg">{gt text="This functionality allows you to delete comments that are in the database for removed modules."}</p>
<form class="z-form" action="{modurl modname="EZComments" type="admin" func="cleanup_go"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <fieldset>
            <legend>{gt text="Confirmation prompt"}</legend>
            <div class="z-formrow">
                <label for="ezcomments_module">{gt text="Select module"}</label>
                <select id="ezcomments_module" name="ezcomments_module">{html_options options=$selectitems}</select>
            </div>
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Delete' __title='Delete' __text='Delete'}
            <a href="{modurl modname='EZComments' type='admin' func='main'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}