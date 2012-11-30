{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="gears" size="small"}
    <h3>{gt text='Import comments from other modules'}</h3>
</div>

<form class="z-form" action="{modurl modname="EZComments" type="admin" func="migrate_go"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <fieldset>
            <legend>{gt text="Migration"}</legend>
            <div class="z-formrow">
                <label for="ezcomments_migrate">{gt text="Module"}</label>
                <select id="ezcomments_migrate" name="migrate">{html_options options=$selectitems}</select>
            </div>
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Start migration' __title='Start migration' __text='Start migration'}
            <a href="{modurl modname='EZComments' type='admin' func='main'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}