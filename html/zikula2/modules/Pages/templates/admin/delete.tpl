{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="delete" size="small"}
    <h3>{gt text='Delete page'}</h3>
</div>

<p class="z-warningmsg">{gt text='Do you really want to delete this page?'}</p>

{form cssClass="z-form"}
    {formvalidationsummary}

    <div class="z-formbuttons z-buttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Delete"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
{/form}
{adminfooter}