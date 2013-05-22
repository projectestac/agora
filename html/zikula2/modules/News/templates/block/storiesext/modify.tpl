{ajaxheader modname='News' filename='news_storiesextblock_modify.js' effects=true}

<fieldset>
    <legend>{gt text='General settings'}</legend>
    <div class="z-formrow">
        <label for="news_storiesextblock_show">{gt text='Articles to list'}</label>
        <select id="news_storiesextblock_show" name="show">
            <option value="1"{if $show eq 1} selected="selected"{/if}>{gt text='Show all news articles'}</option>
            <option value="2"{if $show eq 2} selected="selected"{/if}>{gt text='Show only articles set for index page listing'}</option>
            <option value="3"{if $show eq 3} selected="selected"{/if}>{gt text='Show only articles not set for index page listing'}</option>
        </select>
    </div>
    {if $enablecategorization}
    <div class="z-formrow">
        <label>{gt text='Choose categories'} (<a href="{modurl modname='Categories' type='admin' func='editregistry'}">{gt text='Category registry'}</a>)</label>
        {nocache}
        {foreach from=$catregistry key='prop' item='cat'}
        {array_field assign='selectedValue' array=$category field=$prop}
        <div class="z-formnote">
            {selector_category category=$cat name="category[$prop]" multipleSize=5 selectedValue=$selectedValue}
            <input type="button" value="{gt text='All'}" onclick="news_storiesextblock_selectAllOptions(this.form.category_{$prop}___, true);">
            <input type="button" value="{gt text='None'}" onclick="news_storiesextblock_selectAllOptions(this.form.category_{$prop}___, false);">
        </div>
        {/foreach}
        {/nocache}
    </div>
    {/if}
    <div class="z-formrow">
        <label for="news_storiesextblock_limit">{gt text='Maximum number of news articles to display'}</label>
        <input id="news_storiesextblock_limit" type="text" name="limit" size="5" value="{$limit|safetext}" />
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_status">{gt text='Status'}</label>
        <select id="news_storiesextblock_status" name="status">
            <option value="0"{if $status eq 0} selected="selected"{/if}>{gt text='Published'}</option>
            <option value="3"{if $status eq 3} selected="selected"{/if}>{gt text='Archived'}</option>
            {* work out permissions ... option value="4"{if $status eq 4} selected="selected"{/if}>{gt text='Draft'}</option> *}
        </select>
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_order">{gt text='Order articles by'}</label>
        <select id="news_storiesextblock_order" name="order">
            <option value="0"{if $order eq 0} selected="selected"{/if}>{gt text='News publisher setting'}</option>
            <option value="1"{if $order eq 1} selected="selected"{/if}>{gt text='Number of pageviews'}</option>
            <option value="2"{if $order eq 2} selected="selected"{/if}>{gt text='Article weight'}</option>
            <option value="3"{if $order eq 3} selected="selected"{/if}>{gt text='Random'}</option>
        </select>
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_dayslimit">{gt text='Maximum age of articles'}</label>
        <input id="news_storiesextblock_dayslimit" type="text" name="dayslimit" size="5" value="{$dayslimit|safetext}" />
        <em class="z-sub z-formnote">{gt text='(Number of days; 0 for no limit)'}</em>
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_maxtitlelength">{gt text='Maximum length of titles'}</label>
        <input id="news_storiesextblock_maxtitlelength" type="text" name="maxtitlelength" size="5" value="{$maxtitlelength|safetext}" />
        <em class="z-sub z-formnote">{gt text='(Number of characters; 0 for no limit)'}</em>
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_titlewraptxt">{gt text='Suffix appended to truncated title'}</label>
        <input id="news_storiesextblock_titlewraptxt" type="text" name="titlewraptxt" size="10" value="{$titlewraptxt|safetext}" />
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_showemptyresult">{gt text="Show 'No articles currently published' status message when no articles published"}</label>
        <input id="news_storiesextblock_showemptyresult" type="checkbox" value="1" name="showemptyresult"{if $showemptyresult} checked="checked"{/if} />
    </div>
</fieldset>

<fieldset>
    <legend>{gt text='Custom templates'}</legend>
    <p class="z-formnote z-informationmsg">{gt text="Notice: You can use your own custom templates instead of the default templates. You must specify them here.The default template for block rows is 'block/storiesext/row.tpl'. The default block template depends on the scroll setting. The default static template is 'block/storiesext/main.tpl'. For scrolling content, 'block/storiesext/scrollNAME.tpl' is used."}</p>
    <div class="z-formrow">
        <label for="news_storiesextblock_blocktemplate">{gt text='Custom block template'}</label>
        <input id="news_storiesextblock_blocktemplate" type="text" name="blocktemplate" size="30" value="{$blocktemplate|safetext}" />
        <em class="z-sub z-formnote">{gt text='(Default template is used if this box is left blank)'}</em>
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_rowtemplate">{gt text='Custom row template'}</label>
        <input id="news_storiesextblock_rowtemplate" type="text" name="rowtemplate" size="30" value="{$rowtemplate|safetext}" />
        <em class="z-sub z-formnote">{gt text='(Default template is used if this box is left blank)'}</em>
    </div>
</fieldset>

<fieldset>
    <legend>{gt text='Advanced block settings'}</legend>
    <div class="z-formrow">
        <label for="news_storiesextblock_dispuname">{gt text='Show contributor\'s name'}</label>
        <input id="news_storiesextblock_dispuname" type="checkbox" value="1" name="dispuname"{if $dispuname} checked="checked"{/if} />
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_dispdate">{gt text='Show article creation date'}</label>
        <input id="news_storiesextblock_dispdate" type="checkbox" value="1" name="dispdate"{if $dispdate} checked="checked"{/if} />
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_dateformat">{gt text='Date format'}</label>
        <input id="news_storiesextblock_dateformat" type="text" name="dateformat" size="10" value="{$dateformat|safetext}" />
        <em class="z-sub z-formnote">(<a href="http://www.php.net/manual/en/function.strftime.php" target="_new">{gt text='Click here to read \'strftime\' description in PHP documentation'}</a>)</em>
    </div>
    <div class="z-formrow">
        <label for="news_storiesextblock_dispreads">{gt text='Show number of pageviews'}</label>
        <input id="news_storiesextblock_dispreads" type="checkbox" value="1" name="dispreads"{if $dispreads} checked="checked"{/if} />
    </div>
    {modavailable modname='EZComments' assign='EZComments'}
    {if $EZComments}
    <div class="z-formrow">
        <label for="news_storiesextblock_dispcomments">{gt text='Show number of comments'}</label>
        <input id="news_storiesextblock_dispcomments" type="checkbox"value="1"  name="dispcomments"{if $dispcomments} checked="checked"{/if} />
    </div>
    {/if}
    <div class="z-formrow">
        <label for="news_storiesextblock_splitchar">{gt text='Separator character for additional information'}</label>
        <input id="news_storiesextblock_splitchar" type="text" name="dispsplitchar" size="10" value="{$dispsplitchar|safetext}" />
    </div>
</fieldset>

<fieldset>
    <legend>{gt text='Index page teaser settings'}</legend>
    <div class="z-formrow">
        <label>{gt text='Display article\'s index page teaser'}</label>
        <div id="news_storiesextblock_disphometext">
            <input id="news_storiesextblock_disphometext_yes" type="radio" name="disphometext" value="1" {if $disphometext eq 1}checked="checked"{/if} /> <label for="news_storiesextblock_disphometext_yes">{gt text='Yes'}</label>
            <input id="news_storiesextblock_disphometext_no" type="radio" name="disphometext" value="0" {if $disphometext eq 0}checked="checked"{/if} /> <label for="news_storiesextblock_disphometext_no">{gt text='No'}</label>
        </div>
    </div>
    <div id="news_storiesextblock_disphometext_container">
        <p class="z-formnote z-informationmsg">{gt text='Notice: When truncating the index page teaser text, incomplete HTML mark-up elements will be completed by the \'truncatehtml\' plug-in.'}</p>
        <div class="z-formrow">
            <label for="news_storiesextblock_maxhometextlength">{gt text='Maximum displayed length of index page teaser'}</label>
            <input id="news_storiesextblock_maxhometextlength" type="text" name="maxhometextlength" size="5" value="{$maxhometextlength|safetext}" />
            <em class="z-sub z-formnote">{gt text='(Number of characters; 0 for no limit)'}</em>
        </div>
        <div class="z-formrow">
            <label for="news_storiesextblock_hometextwraptxt">{gt text='Suffix appended to truncated index page teaser'}</label>
            <input id="news_storiesextblock_hometextwraptxt" type="text" name="hometextwraptxt" size="10" value="{$hometextwraptxt|safetext}" />
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>{gt text='Article recency settings'}</legend>
    <div class="z-formrow">
        <label>{gt text='Display image for recent article titles'}</label>
        <div id="news_storiesextblock_dispnewimage">
            <input id="news_storiesextblock_dispnewimage_yes" type="radio" name="dispnewimage" value="1" {if $dispnewimage eq 1}checked="checked"{/if} /> <label for="news_storiesextblock_dispnewimage_yes">{gt text='Yes'}</label>
            <input id="news_storiesextblock_dispnewimage_no" type="radio" name="dispnewimage" value="0" {if $dispnewimage eq 0}checked="checked"{/if} /> <label for="news_storiesextblock_dispnewimage_no">{gt text='No'}</label>
        </div>
    </div>
    <div id="news_storiesextblock_dispnewimage_container">
        <div class="z-formrow">
            <label for="news_storiesextblock_newimagelimit">{gt text='Number of days during which article is considered recent'}</label>
            <input id="news_storiesextblock_newimagelimit" type="text" name="newimagelimit" size="5" value="{$newimagelimit|safetext}" />
        </div>
        <div class="z-formrow">
            <label for="news_storiesextblock_newimageset">{gt text='Image set for \'New\' image'}</label>
            <input id="news_storiesextblock_newimageset" type="text" name="newimageset" size="40" value="{$newimageset|safetext}" />
            <em class="z-sub z-formnote">{gt text='(Used by \'pnimg\' plug-in)'}</em>
        </div>
        <div class="z-formrow">
            <label for="news_storiesextblock_newimagesrc">{gt text='File name of \'New\' image from image set'}</label>
            <input id="news_storiesextblock_newimagesrc" type="text" name="newimagesrc" size="40" value="{$newimagesrc|safetext}" />
            <em class="z-sub z-formnote">{gt text='(Used by \'pnimg\' plug-in)'}</em>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>{gt text='News item scroll settings'}</legend>
    <p class="z-formnote z-informationmsg">{gt text='Notice: News articles can shown in a scrolling box. The provided scrollers are based upon code from the <a href="http://www.dynamicdrive.com/dynamicindex2/crosstick.htm">dynamicdrive.com \'crosstick\'</a> upward and downward pauseable vertical scroller, the <a href="http://www.dynamicdrive.com/dynamicindex2/memoryticker.htm">dynamicdrive.com \'memoryticker\'</a> fading scroller (gradient wipe effect only works in IE), and the <a href="http://www.dynamicdrive.com/dynamicindex2/cmarquee2.htm" target="_new">dynamicdrive.com \'marquee II\'</a> marquee scroller.'}</p>
    <div class="z-formrow">
        <label for="news_storiesextblock_scrolling">{gt text='Choose scroller'}</label>
        <select id="news_storiesextblock_scrolling" name="scrolling">
            <option value="1"{if $scrolling eq 1} selected="selected"{/if}>{gt text='No scrolling'}</option>
            <option value="2"{if $scrolling eq 2} selected="selected"{/if}>{gt text='Pauseable vertical scroller'}</option>
            <option value="3"{if $scrolling eq 3} selected="selected"{/if}>{gt text='Fading scroller'}</option>
            <option value="4"{if $scrolling eq 4} selected="selected"{/if}>{gt text='Marquee scroller'}</option>
        </select>
    </div>
    <div id="news_storiesextblock_scrolling_container">
        <div class="z-formrow">
            <label for="news_storiesextblock_scrollstyle">{gt text='Scroller CSS styles definition'}</label>
            <textarea id="news_storiesextblock_scrollstyle" name="scrollstyle" rows="8" cols="40">{$scrollstyle|safetext}</textarea>
        </div>
        <div class="z-formrow">
            <label for="news_storiesextblock_scrolldelay">{gt text='Delay between scrolls and starting delay for marquee'}</label>
            <input id="news_storiesextblock_scrolldelay" type="text" name="scrolldelay" size="10" value="{$scrolldelay|safetext}" />
            <em class="z-sub z-formnote">{gt text='(Number of milliseconds)'}</em>
        </div>
        <div class="z-formrow">
            <label for="news_storiesextblock_scrollmspeed">{gt text='Marquee scroller speed'}</label>
            <input id="news_storiesextblock_scrollmspeed" type="text" name="scrollmspeed" size="10" value="{$scrollmspeed|safetext}" />
            <em class="z-sub z-formnote">{gt text='(Number from 1 to 10)'}</em>
        </div>
    </div>
</fieldset>
