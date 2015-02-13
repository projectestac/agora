{adminheader}
<div class="z-admin-content-pagetitle">
    <img src="{$baseurl}modules/Scribite/plugins/CKEditor/images/logo.gif" height='22'>
    <h3>{gt text='CKEditor configuration'}</h3>
</div>

{form cssClass="z-form"}
{formvalidationsummary}
    <fieldset>
        <legend>{gt text='Settings'}</legend>
        <div class="z-formrow">
            {formlabel for="skin" __text="Skin"}
            {formdropdownlist id="skin" items=$skinlist}
        </div>
        <div class="z-formrow">
            {formlabel for="uicolor" __text="Editor UI color"}
            {formtextinput id="uicolor" size="40" maxLength="150" text="#D3D3D3"}
            <em class="z-formnote z-sub">{gt text="Any hexadecimal color can be used. Default: #D3D3D3"}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="langmode" __text="Editor UI language"}
            {formdropdownlist id="langmode" items=$langmodelist}
            <em class="z-formnote z-sub">{gt text="Determines the editor user interface language"}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="barmode" __text="Toolbar"}
            {formdropdownlist id="barmode" items=$barmodelist}
            <em class="z-formnote z-sub">{gt text="Special1 and Special2 must be manually configured in custconfig.js."}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="height" __text="Editor default height in px"}
            {formtextinput id="height" size="4" maxLength="6" text="200"}
        </div>
        <div class="z-formrow">
            {formlabel for="resizemode" __text="Editor resizing mode to use"}
            {formdropdownlist id="resizemode" items=$resizemodelist}
        </div>
        <div id="sm_resize_details">
            <div class="z-formrow">
                {formlabel for="resizeminheight" __text="Editor minimum height in px for 'resize' plugin"}
                {formtextinput id="resizeminheight" size="4" maxLength="6" text="250"}
            </div>
            <div class="z-formrow">
                {formlabel for="resizemaxheight" __text="Editor maximum height in px for 'resize' plugin"}
                {formtextinput id="resizemaxheight" size="4" maxLength="6" text="3000"}
            </div>
        </div>
        <div id="sm_autogrow_details">
            <div class="z-formrow">
                {formlabel for="growminheight" __text="Editor minimum height in px for 'autogrow' plugin"}
                {formtextinput id="growminheight" size="4" maxLength="6" text="200"}
            </div>
            <div class="z-formrow">
                {formlabel for="growmaxheight" __text="Editor maximum height in px for 'autogrow' plugin"}
                {formtextinput id="growmaxheight" size="4" maxLength="6" text="400"}
            </div>
        </div>
        <div class="z-formrow">
            {formlabel for="entermode" __text="Editor Enter mode"}
            {formdropdownlist id="entermode" items=$entermodelist}
            <em class="z-formnote z-sub">{gt text="Note: It is recommended to use the [p] setting because of its semantic value and correctness. The editor is optimized for this setting."}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="shiftentermode" __text="Editor Shift-Enter mode"}
            {formdropdownlist id="shiftentermode" items=$shiftentermodelist}
            <em class="z-formnote z-sub">{gt text="Note: It is recommended to use the [br] setting because of its semantic value and correctness. The editor is optimized for this setting."}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="extraplugins" __text="Editor extra plugins"}
            {formtextinput id="extraplugins" size="40" maxLength="150" text="autogrow,stylesheetparser,zikulapagebreak"}
            <em class="z-formnote z-sub">{gt text="Example: stylesheetparser,zikulapagebreak,simplemedia"}</em>
            <em class="z-formnote z-sub">{gt text="(Note: don't use spaces)"}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="style_editor" __text="Editor stylesheet"}
            {formtextinput id="style_editor" size="40" maxLength="150" text="modules/Scribite/plugins/CKEditor/style/content.css"}
            <em class="z-formnote z-sub">{gt text="You can try to enter your theme stylesheet here if you want. In most cases, the editor fits to the theme then."}</em>
            <em class="z-formnote z-sub">{gt text="Example: themes/SeaBreeze/style/style.css"}</em>
        </div>
        <div class="z-formrow">
            {formlabel for="filemanagerpath" __text="Path to filemanager"}
            {formtextinput id="filemanagerpath" size="40" maxLength="150"}
            <em class="z-formnote z-sub">{gt text="Used to upload and select images or other files. Supported: CKFinder and KCFinder."}</em>
            <em class="z-formnote z-sub">{gt text="Example paths: utils/ckfinder or utils/kcfinder (rights to execute php)"}</em>
        </div>
    </fieldset>
    <div class="z-buttons z-formbuttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
{/form}
{adminfooter}

<script type="text/javascript">
// <![CDATA[
    Event.observe(window, 'load', sm_sizing_init);
    function sm_sizing_init() 
    {       
        switch ($F('resizemode')) 
        {
            case 'resize':
                $('sm_autogrow_details').hide();
                break;
            case 'autogrow':
                $('sm_resize_details').hide();
                break;
            case 'noresize':
                $('sm_resize_details').hide();
                $('sm_autogrow_details').hide();
                break;
        }

        // observe resizemode
        $('resizemode').observe('change', sm_sizing_onchange);
    }
    function sm_sizing_onchange()
    {
        switch ($F('resizemode')) 
        {
            case 'resize':
                $('sm_resize_details').show();
                $('sm_autogrow_details').hide();
                break;
            case 'autogrow':
                $('sm_resize_details').hide();
                $('sm_autogrow_details').show();
                break;
            case 'noresize':
                $('sm_resize_details').hide();
                $('sm_autogrow_details').hide();
                break;
        }
    }
// ]]>
</script>