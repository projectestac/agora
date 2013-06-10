{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete news article'}</h3>
</div>

<p class="z-warningmsg">{gt text='Do you really want to delete this news article?'}</p>

<form class="z-form" action="{modurl modname='News' type='admin' func='delete'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <input type="hidden" name="sid" value="{$sid|safetext}" />
        <fieldset>
            <legend>{gt text='Confirmation prompt'}</legend>
            <div class="z-formbuttons z-buttons">
                {button class="z-btgreen" src=button_ok.png set=icons/extrasmall __alt="Delete" __title="Delete" __text="Delete"}
                <a class="z-btred" href="{modurl modname='News' type='admin' func='view'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel'  __title='Cancel'} {gt text="Cancel"}</a>
            </div>
        </fieldset>
    </div>
{notifydisplayhooks eventname='news.ui_hooks.articles.form_delete' id=$sid}
</form>
{adminfooter}
