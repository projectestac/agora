{formsetinitialfocus inputId='videoPath'}
<div class="z-formrow">
    {formlabel for='videoPath' __text='Path of Flash video file'}
    {formtextinput id='videoPath' group='data' mandatory='1' maxLength='200'}
</div>

<div class="z-formrow">
    {formlabel for='width' __text="Video display width [in pixels]"}
    {formtextinput id='width' group='data' maxLength='10'}
</div>

<div class="z-formrow">
    {formlabel for='height' __text="Video display height [in pixels]"}
    {formtextinput id='height' group='data' maxLength='10'}
</div>

<div class="z-formrow">
    {formlabel for='text' __text='Video description'}
    {formtextinput id='text' textMode='multiline' cols='40' rows='6' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='author' __text="Optional author of the video"}
    {formtextinput id='author' group='data' maxLength='40'}
</div>

<div class="z-formrow">
    <div class="z-formnote">
        {formradiobutton id='displayModeInline' dataField='displayMode' value='inline' checked='1' group='data'}
        {formlabel for='displayModeInline' __text='Show video inline'}

        {formradiobutton id='displayModePopup' dataField='displayMode' value='popup' group='data'}
        {formlabel for='displayModePopup' __text='Show video in popup window'}
    </div>
</div>

