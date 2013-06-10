<div id="content_unfiltered_textdetails">
    <div class="z-formrow">
        {formlabel for='text' __text='Unfiltered text'}
        {formtextinput id='text' textMode='multiline' group='data' cols='60' rows='15'}
    </div>
</div>

<div class="z-formrow">
    {formlabel for='useiframe' __text='Use an iframe instead of the textfield'}
    {formcheckbox id='useiframe' group='data'}
    {contentlabelhelp __text='If this setting is enabled the text field above will be ignored and iframe parameters will be used.'}
</div>

<div id="content_unfiltered_iframedetails">
    <div class="z-formrow">
        {formlabel for='iframesrc' __text='iframe src'}
        {formtextinput id='iframesrc' group='data' maxLength='150'}
        {contentlabelhelp __text='the src parameter of the iframe'}
    </div>
    
    <div class="z-formrow">
        {formlabel for='iframename' __text='iframe name parameter'}
        {formtextinput id='iframename' group='data' maxLength='150'}
    </div>

    <div class="z-formrow">
        {formlabel for='iframetitle' __text='iframe title parameter'}
        {formtextinput id='iframetitle' group='data' maxLength='150'}
    </div>

    <div class="z-formrow">
        {formlabel for='iframestyle' __text='iframe Style'}
        {formtextinput id='iframestyle' group='data' maxLength='150'}
        {contentlabelhelp __text='the style parameter of the iframe, e.g. "border:0"'}
    </div>
    
    <div class="z-formrow">
        {formlabel for='iframewidth' __text='iframe Width [in pixels]'}
        {formtextinput id='iframewidth' group='data' maxLength='20'}
        {contentlabelhelp __text='the width parameter of the iframe, e.g. "800"'}
    </div>
    
    <div class="z-formrow">
        {formlabel for='iframeheight' __text='iframe Height [in pixels]'}
        {formtextinput id='iframeheight' group='data' maxLength='20'}
        {contentlabelhelp __text='the height parameter of the iframe, e.g. "600"'}
    </div>
    
    <div class="z-formrow">
        {formlabel for='iframeborder' __text='iframe frameborder'}
        {formtextinput id='iframeborder' group='data' maxLength='20'}
        {contentlabelhelp __text='the frameborder parameter of the iframe, e.g. "0"'}
    </div>
    
    <div class="z-formrow">
        {formlabel for='iframescrolling' __text='iframe scrolling'}
        {formtextinput id='iframescrolling' group='data' maxLength='20'}
        {contentlabelhelp __text='the scrolling parameter of the iframe, e.g. "no"'}
    </div>

    <div class="z-formrow">
        {formlabel for='iframeallowtransparancy' __text='Allow transparancy on the iframe'}
        {formcheckbox id='iframeallowtransparancy' group='data'}
    </div>
</div>

<script type="text/javascript">
Event.observe(window,'load', content_unfiltered_init_check);

function content_unfiltered_init_check()
{
    if ($('useiframe').checked == false) {
        $('content_unfiltered_iframedetails').hide();
    }
    $('useiframe').observe('change', content_unfiltered_useiframe_onchange);
}
function content_unfiltered_useiframe_onchange()
{
    switchdisplaystate('content_unfiltered_iframedetails');
    switchdisplaystate('content_unfiltered_textdetails');
}
</script>
