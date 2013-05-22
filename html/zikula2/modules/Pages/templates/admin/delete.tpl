{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete page'}</h3>
</div>

<p class="z-warningmsg">{gt text='Do you really want to delete this page?'}</p>

<form class="z-form" action="{modurl modname='Pages' type='admin' func='delete'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" name="confirmation" value="1" />
        <input type="hidden" name="pageid" value="{$pageid|safetext}" />
        <div class="z-formbuttons z-buttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Confirm' __title='Confirm' __text='Confirm'}
            <a href="{modurl modname='Pages' type='admin' func='view'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel'  __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}