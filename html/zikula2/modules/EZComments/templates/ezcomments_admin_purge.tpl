{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="gears" size="small"}
    <h3>{gt text='Purge comments'}</h3>
</div>

<form class="z-form" action="{modurl modname="EZComments" type="admin" func="purge"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <fieldset>
            <legend>{gt text="Options"}</legend>
            <div class="z-formrow">
                <label for="ezcomments_purgepending">{gt text="Purge all pending comments"}</label>
                <input id="ezcomments_purgepending" name="purgepending" type="checkbox" />
            </div>
            <div class="z-formrow">
                <label for="ezcomments_purgerejected">{gt text="Purge all rejected comments"}</label>
                <input id="ezcomments_purgerejected" name="purgerejected" type="checkbox" />
            </div>
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Delete' __title='Delete' __text='Delete'}
            <a href="{modurl modname='EZComments' type='admin' func='main'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}
