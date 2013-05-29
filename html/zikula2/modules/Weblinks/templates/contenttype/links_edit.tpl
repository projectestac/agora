<div class="z-formrow">
    {formlabel for='headline' __text='Headline (optional)'}
    {formtextinput id='headline' group='data' maxLength=64}
</div>
<div class="z-formrow">
    {formlabel for='categories' __text='Categories'}
    {formdropdownlist id='categories' group='data' selectionMode='multiple' items=$categories}
</div>
<div class="z-formrow">
    {formlabel for='limit' __text='Number of links to display'}
    {formtextinput id='limit' group='data' maxLength=64}
</div>
<div class="z-formrow">
    {formlabel for='template' __text='template (leave blank for default)'}
    {formtextinput id='template' group='data' maxLength=64}
</div>