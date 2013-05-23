{formsetinitialfocus inputId='url'}
<div class="z-formrow">
    {formlabel for='url' __text='URL to the video clip'}
    {formurlinput id='url' group='data'}
    {contentlabelhelp __text='Something like "http://www.youtube.com/watch?v=ABcDEFgHij&feature=dir".'}
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
    {formtextinput id='text' textMode='multiline' cols='40' rows='10' group='data'}
</div>

<div class="z-formrow">
    <div class="z-formnote">
        {formradiobutton id='displayModeInline' dataField='displayMode' value='inline' checked='1' group='data'}
        {formlabel for='displayModeInline' __text='Show video inline'}

        {formradiobutton id='displayModePopup' dataField='displayMode' value='popup' group='data'}
        {formlabel for='displayModePopup' __text='Show video in popup window'}
    </div>
</div>

