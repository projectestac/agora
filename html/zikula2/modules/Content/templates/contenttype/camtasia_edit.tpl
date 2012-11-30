{formsetinitialfocus inputId='videoPath'}
<div class="z-formrow">
    {formlabel for='videoPath' __text='Name of the Camtasia-Flash video'}
    {formtextinput id='videoPath' group='data' mandatory='1' maxLength='120'}
    {contentlabelhelp __text='You have to upload your camtasia project in the folder defined below <folder>/project/project.mp4 first. Here you have to give only the name of your project without path and file extension.'}
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
    {formlabel for='thumbwidth' __text="Thumbnail display width in popup mode [in pixels]"}
    {formtextinput id='thumbwidth' group='data' maxLength='10'}
</div>

<div class="z-formrow">
    {formlabel for='thumbheight' __text="Thumbnail display height in popup mode [in pixels]"}
    {formtextinput id='thumbheight' group='data' maxLength='10'}
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
    {formlabel for='folder' __text='Folder where the files are uploaded'}
    {formtextinput id='folder' group='data' maxLength='50'}
</div>

<div class="z-formrow">
    <div class="z-formnote">
        {formradiobutton id='displayModeInline' dataField='displayMode' value='inline' checked='1' group='data'}
        {formlabel for='displayModeInline' __text='Show video inline'}

        {formradiobutton id='displayModePopup' dataField='displayMode' value='popup' group='data'}
        {formlabel for='displayModePopup' __text='Show video in popup window'}
    </div>
</div>
