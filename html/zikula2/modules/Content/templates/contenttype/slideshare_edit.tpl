{formsetinitialfocus inputId='url'}
<div class="z-formrow">
    {formlabel for='url' __text="Slideshare's Wordpress code"}
    {formtextinput id='url' group='data' maxLength='200'}
    {contentlabelhelp __text="Copy Slideshare's Wordpress embed code here (including square brackets and all). Click on Embed and Customize to show the wordpress embed code. It should look something like [slideshare id=145849&doc=prototype-jquery-going-from-one-to-the-other-1193346036472971-5]"}
</div>
    
<div class="z-formrow">
    {formlabel for='text' __text='Slide description'}
    {formtextinput id='text' textMode='multiline' cols='40' rows='6' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='width' __text="Slideshare's embedded player width"}
    {formtextinput id='width' group='data' maxLength='10'}
</div>
    
<div class="z-formrow">
    {formlabel for='height' __text="Slideshare's embedded player height"}
    {formtextinput id='height' group='data' maxLength='10'}
</div>
