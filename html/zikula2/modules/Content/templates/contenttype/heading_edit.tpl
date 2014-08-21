{formsetinitialfocus inputId='text'}

<div class="z-formrow">
    {formlabel for='text' __text='Heading'}
    {formtextinput id='text' maxLength='255' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='displayPageTitle' __text='Display the Page Title'}
    {formcheckbox id='displayPageTitle' group='data'}
    {contentlabelhelp __text='If this setting is enabled the text field above will be ignored and the page title will be displayed instead.'}
</div>

<div class="z-formrow">
    {formlabel for='text' __text='Header size'}
    <div>
        {formradiobutton id='con_header2' dataField='headerSize' value='h2' group='data'}
        {formlabel for='con_header2' text='<h2>'}

        {formradiobutton id='con_header3' dataField='headerSize' value='h3' group='data' checked='1'}
        {formlabel for='con_header3' text='<h3>'}

        {formradiobutton id='con_header4' dataField='headerSize' value='h4' group='data'}
        {formlabel for='con_header4' text='<h4>'}
    </div>
</div>

<div class="z-formrow">
    {formlabel for='anchorName' __text='Internal anchor link name (leave empty for no internal anchor link)'}
    {formtextinput id='anchorName' maxLength='255' group='data'}
</div>
