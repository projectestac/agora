<div class="z-formrow">
    {formlabel for='pid' __text='Page'}
    {formdropdownlist id="pid" items=$pidItems group="data"}
</div>

<div class="z-formrow" id="selectIncludeSelf">
    {formlabel for='includeSelf' __text='Include self into the table of contents'}
    {formcheckbox id="includeSelf" group="data"}
    {contentlabelhelp __text="(if page isn't 'All pages')"}
</div>

<div class="z-formrow">
    {formlabel for='includeNotInMenu' __text='Include subpages that are not in the menus'}
    {formcheckbox id="includeNotInMenu" group="data"}
</div>

<div class="z-formrow">
    {formlabel for='includeHeading' __text='Include headings'}
    {formdropdownlist id="includeHeading" items=$includeHeadingItems group="data"}
</div>

<div class="z-formrow" id="selectHeadingLevel">
    {formlabel for='includeHeadingLevel' __text='Include headings up to level'}
    {formtextinput id="includeHeadingLevel" maxLength='10' group="data"}
    {contentlabelhelp __text='if headings are included and not unlimited; select 0 to include menu only for the selected page'}
</div>

<div class="z-formrow">
    {formlabel for='includeSubpage' __text='Include subpages'}
    {formdropdownlist id="includeSubpage" items=$includeSubpageItems group="data"}
</div>

<div class="z-formrow" id="selectSubpageLevel">
    {formlabel for='includeSubpageLevel' __text='Include subpages into table up to level'}
    {formtextinput id="includeSubpageLevel" maxLength='10' group="data"}
    {contentlabelhelp __text='if subpages are included and not unlimited'}
</div>

<script type="text/javascript">
Event.observe(window,'load', function() {
    Event.observe('includeHeading', 'change', content_toc_changedselection);
    Event.observe('includeSubpage', 'change', content_toc_changedselection);
    Event.observe('pid', 'change', content_toc_changedselection);
    content_toc_changedselection();
});

content_toc_changedselection = function() {
    content_toc_setDisplayState($('selectHeadingLevel'), $('includeHeading').value > 1);
    content_toc_setDisplayState($('selectSubpageLevel'), $('includeSubpage').value > 1);
    content_toc_setDisplayState($('selectIncludeSelf'), $('pid').value != 0);
}

function content_toc_setDisplayState(objcont, show) {
    if (!show) {
        if (objcont.getStyle('display') != 'none') {
            if (typeof(Effect) != "undefined") {
                Effect.BlindUp(objcont);
            } else {
                objcont.hide();
            }
        }
    } else {
        if (objcont.getStyle('display') == 'none') {
            if (typeof(Effect) != "undefined") {
                Effect.BlindDown(objcont);
            } else {
                objcont.show();
            }
        }
    }
}
</script>
