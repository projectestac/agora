{ajaxheader modname='News' filename='news_contenttype_edit.js' effects=true}
<fieldset style='margin-top: 1.5em;'>
    <legend>{gt text='General settings'}</legend>
    <div class="z-formrow">
        {formlabel for='title' __text='Widget title'}
        {formtextinput id='title' group='data' maxLength='100'}
    </div>

    {modgetvar module='News' name='enablecategorization' assign='enablecategorization'}
    {if $enablecategorization}
    <div id="category" class="z-formrow">
        {formlabel for='category' __text='Choose categories'}
        {nocache}
        {foreach from=$catregistry key='prop' item='cat'}
        <div class="z-formnote">{formcategoryselector category=$cat id="category__$prop" group='data' selectedValue=$data.category__$prop selectionMode='multiple' size='5'}</div>
        {/foreach}
        {/nocache}
        {contentlabelhelp __text='(An empty category selection will show articles from all available categories)'}
    </div>
    {/if}

    <div class="z-formrow">
        {formlabel for='show' __text='Display'}
        {formdropdownlist id='show' group='data' items=$showoptions selectedValue=$data.show}
    </div>

    <div class="z-formrow">
        {formlabel for='limit' __text='Number of articles'}
        {formintinput id='limit' group='data'}
    </div>

    <div class="z-formrow">
        {formlabel for='status' __text='Status'}
        {formdropdownlist id='status' group='data' items=$statusoptions selectedValue=$data.status}
    </div>

    <div class="z-formrow">
        {formlabel for='dayslimit' __text='Limit of backward reach'}
        {formintinput id='dayslimit' group='data'}
        {contentlabelhelp __text='(Number of days; 0 for no limit)'}
    </div>

    <div class="z-formrow">
        {formlabel for='orderoptions' __text='Order articles by'}
        {formdropdownlist id='orderoptions' group='data' items=$orderoptions selectedValue=$data.orderoptions}
    </div>

    <div class="z-formrow">
        {formlabel for='maxtitlelength' __text='Maximum displayed length of title'}
        {formintinput id='maxtitlelength' group='data' size='4'}
        {contentlabelhelp __text='(Number of characters; 0 for no limit)'}
    </div>

    <div class="z-formrow">
        {formlabel for='titlewraptext' __text='Suffix appended to truncated title'}
        {formtextinput id='titlewraptext' group='data' size='20' maxLength='20'}
    </div>
</fieldset>
<fieldset>
    <legend>{gt text='Information settings'}</legend>
    <div class="z-formrow">
        {formlabel for='dispuname' __text='Display contributor\'s name'}
        {formcheckbox id='dispuname' group='data'}
    </div>

    <div class="z-formrow">
        {formlabel for='dispdate' __text='Display article creation date'}
        {formcheckbox id='dispdate' group='data'}
        {contentlabelhelp __text='(Only shown when contributor\'s name is also enabled)'}
    </div>

    <div class="z-formrow">
        {formlabel for='dateformat' __text='Date format'}
        {formtextinput id='dateformat' group='data' size='6' maxLength='20'}
        {contentlabelhelp __text='Refer to the <a href="http://www.php.net/manual/function.strftime.php">\'strftime\' description</a> in the PHP documentation.'}
    </div>

    <div class="z-formrow">
        {formlabel for='dispreads' __text='Display number of pageviews'}
        {formcheckbox id='dispreads' group='data'}
    </div>

    {modavailable modname='EZComments' assign='EZComments}
    {if $EZComments}
    <div class="z-formrow">
        {formlabel for='dispcomments' __text='Display number of comments'}
        {formcheckbox id='dispcomments' group='data'}
    </div>
    {/if}

    <div class="z-formrow">
        {formlabel for='dispsplitchar' __text='Separator character for article information'}
        {formtextinput id='dispsplitchar' group='data' size='5' maxLength='5'}
    </div>

    <div class="z-formrow">
        {formlabel for='linktosubmit' __text='Display \'Submit an article\' link'}
        {formcheckbox id='linktosubmit' group='data'}
    </div>
</fieldset>
<fieldset>
    <legend>{gt text='Article settings'}</legend>
    <div class="z-formrow">
        {formlabel for='dispnewimage' __text='Display an icon to highlight recent article titles'}
        {formcheckbox id='dispnewimage' group='data'}
    </div>

    <div id="news_contenttype_dispnewimage_container">
        <div class="z-formrow">
            {formlabel for='newimagelimit' __text='Number of days during which article is considered recent'}
            {formintinput id='newimagelimit' group='data' size='4'}
        </div>

        <div class="z-formrow">
            {formlabel for='newimageset' __text='Image set for \'New\' image'}
            {formtextinput id='newimageset' group='data' size='30' maxLength='60'}
            {contentlabelhelp __text='(Used by \'img\' plug-in)'}
        </div>

        <div class="z-formrow">
            {formlabel for='newimagesrc' __text='File name of \'New\' image from image set'}
            {formtextinput id='newimagesrc' group='data' size='30' maxLength='60'}
            {contentlabelhelp __text='(Used by \'img\' plug-in)'}
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>{gt text='Index page teaser settings'}</legend>
    <div class="z-formrow">
        {formlabel for='disphometext' __text='Display article\'s index page teaser text'}
        {formcheckbox id='disphometext' group='data'}
        {contentlabelhelp __text='Notice: When truncating the index page teaser text, incomplete HTML mark-up elements will be completed by the \'truncatehtml\' plug-in.'}
    </div>

    <div id="news_contenttype_disphometext_container">
        <div class="z-formrow">
            {formlabel for='maxhometextlength' __text='Maximum displayed length of index page teaser text'}
            {formintinput id='maxhometextlength' group='data' size='4'}
            {contentlabelhelp __text='(Number of characters; 0 for no limit)'}
        </div>

        <div class="z-formrow">
            {formlabel for='hometextwraptext' __text='Suffix appended to truncated index page teaser text'}
            {formtextinput id='hometextwraptext' group='data' size='20' maxLength='40'}
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>{gt text='Specify a custom template'}</legend>
    <div class="z-formrow">
        {formlabel for='customtemplate' __text='Custom output template'}
        {formtextinput id='customtemplate' group='data' size='30' maxLength='80'}
        {contentlabelhelp __text="(Default template 'newsarticles_view.html' is used if this box is left blank)"}
    </div>
</fieldset>