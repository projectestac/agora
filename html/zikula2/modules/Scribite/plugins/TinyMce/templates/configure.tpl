{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='TinyMCE configuration'}</h3>
</div>

{form cssClass="z-form"}
    {formvalidationsummary}
        <fieldset>
        <legend>{gt text='Settings'}</legend>
        <div class="z-formrow">
            {formlabel for="language" __text="Editor language"}
            {formdropdownlist id="language" items=$langlist selectedValue=$tinymce_language}
        </div>
        <div class="z-formrow">
            {formlabel for="theme" __text="Theme"}
            {formdropdownlist id="theme" items=$themelist}
        </div>
        <div class="z-formrow">
            {formlabel for="dateformat" __text="Date format"}
            {formtextinput id="dateformat" size="40" maxLength="50" text="%Y-%m-%d"}
        </div>
        <div class="z-formrow">
            {formlabel for="timeformat" __text="Time format"}
            {formtextinput id="timeformat" size="40" maxLength="50" text="%H:%M:%S"}
        </div>
        <div class="z-formrow">
            {formlabel __text="Editor width and height"}
            <div>
                {formtextinput id="width" size="5" maxLength="6" text="75%"}
                {formlabel for="width" __text="px/(%)"}
                {formtextinput id="height" size="5" maxLength="6" text="400"}
                {formlabel for="height" __text="px/(%)"}
            </div>
        </div>
        <div class="z-formrow">
            {formlabel for="style" __text="Editor stylesheet"}
            {formtextinput id="style" size="40" maxLength="50" text="modules/Scribite/plugins/TinyMce/style/style.css"}
        </div>
    </fieldset>

    <fieldset>
        <legend>{gt text='TinyMCE Plugins (<a href="http://wiki.moxiecode.com/index.php/TinyMCE:Plugins">documentation</a>)'}</legend>
        <div class="z-formrow">
            {formcheckboxlist id="activeplugins" items=$allplugins}
        </div>
    </fieldset>

    <div class="z-buttons z-formbuttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-archive" commandName="restore" __text="Restore defaults"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
{/form}
{adminfooter}
