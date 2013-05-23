{formsetinitialfocus inputId='mfmodule'}
<p class="z-warningmsg">{gt text="Use this feature carefully! Some modules do not work when displayed together with other modules. DO NOT create circular module references, e.g., adding a Content page that displays itself ..."}</p>
<div class="z-formrow">
    {formlabel for='mfmodule' __text='Module name'}
    {contentmoduleselector id='mfmodule' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='mftype' __text='Function type'}
    {formtextinput id='mftype' maxLength='255' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='mffunc' __text='Function name'}
    {formtextinput id='mffunc' maxLength='255' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='mfquery' __text='Function parameters'}
    {formtextinput id='mfquery' maxLength='255' group='data'}
    {contentlabelhelp __text='Separate by commas, e.g., x=5,y=2'}
</div>
