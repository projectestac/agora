{adminheader}
<div class="z-admin-content-pagetitle">
    <img src="{$baseurl}modules/Scribite/plugins/MarkItUp/images/logo.jpg" height='22'>
    <h3>{gt text='markItUp configuration'}</h3>
</div>

{form cssClass="z-form"}
    {formvalidationsummary}
    <fieldset>
        <legend>{gt text='Settings'}</legend>
        <div class="z-formrow">
            {formlabel for="" __text="Editor width and height"}
            <div>
                {formtextinput id="width" size="5" maxLength="6" text="auto"}
                {formlabel for="width" __text="%/px/auto"}
                {formtextinput id="height" size="5" maxLength="6"}
                {formlabel for="height" __text="%/px/auto" text="auto"}
                <span class="z-informationmsg">{gt text="e.g. 99% or 400px or auto"}</span>
            </div>
        </div>
    </fieldset>

    <div class="z-buttons z-formbuttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
{/form}
{adminfooter}
