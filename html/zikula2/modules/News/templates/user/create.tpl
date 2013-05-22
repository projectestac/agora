{nocache}{include file='user/menu.tpl'}{/nocache}
{insert name='getstatusmsg'}

{ajaxheader modname='News' filename='news.js'}
{pageaddvar name='javascript' value='modules/News/javascript/sizecheck.js'}
{pageaddvar name='javascript' value='modules/News/javascript/prototype-base-extensions.js'}
{pageaddvar name='javascript' value='modules/News/javascript/prototype-date-extensions.js'}
{pageaddvar name='javascript' value='modules/News/javascript/datepicker.js'}
{pageaddvar name='javascript' value='modules/News/javascript/datepicker-locale.js'}
{pageaddvar name='stylesheet' value='modules/News/style/datepicker.css'}
{if $modvars.News.picupload_enabled AND $accesspicupload AND $modvars.News.picupload_maxpictures gt 1}
{pageaddvar name='javascript' value='modules/News/javascript/multifile.js'}
{/if}

<script type="text/javascript">
    // <![CDATA[
    var bytesused = Zikula.__f('%s characters out of 4,294,967,295','#{chars}','module_News');
    // ]]>
</script>

{if $preview neq ''}
<div class="news_article news_preview" style="background-image: url({img modname='News' src='bg_preview.png' retval='src'})">{$preview}</div>
{/if}

<h3>{gt text='Create an article'}</h3>


<form id="news_user_newform" class="z-form" action="{modurl modname='News' type='user' func='create'}" method="post" enctype="{if $accesspicupload AND $modvars.News.picupload_enabled}multipart/form-data{else}application/x-www-form-urlencoded{/if}">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        {if $accessadd neq 1}
        <input type="hidden" name="story[notes]" value="" />
        <input type="hidden" name="story[urltitle]" value="" />
        <input type="hidden" name="story[weight]" value="0" />
        {if $accesspubdetails neq 1}
        <input type="hidden" name="story[displayonindex]" value="1" />
        <input type="hidden" name="story[allowcomments]" value="1" />
        {/if}
        {/if}
        {if $formattedcontent eq 1}
        <input type="hidden" name="story[hometextcontenttype]" value="1" />
        <input type="hidden" name="story[bodytextcontenttype]" value="1" />
        {/if}

        <fieldset>
            <legend>{gt text='Title'}</legend>

            <div class="z-formrow">
                <label for="news_title">{gt text='Title text'}<span class="z-mandatorysym">*</span></label>
                <input id="news_title" name="story[title]" type="text" size="32" maxlength="255" value="{$item.title|safetext}" />
            </div>

            {if $accessadd eq 1}
            <div class="z-formrow">
                <label for="news_urltitle">{gt text='Permalink URL'}</label>
                <input id="news_urltitle" name="story[urltitle]" type="text" size="32" maxlength="255" value="{$item.urltitle|safetext}" />
                <em class="z-sub z-formnote">{gt text='(Generated automatically if left blank)'}</em>
            </div>
            {/if}

            {if $modvars.News.enablecategorization}
            <div class="z-formrow">
                <label>{gt text='Category'}</label>
                {gt text='Choose category' assign='lblDef'}
                {nocache}
                {foreach from=$catregistry key='property' item='category'}
                {array_field assign='selectedValue' array=$item.__CATEGORIES__ field=$property}
                <div class="z-formnote">{selector_category category=$category name="story[__CATEGORIES__][$property]" field='id' selectedValue=$selectedValue defaultValue='0' defaultText=$lblDef}</div>
                {/foreach}
                {/nocache}
            </div>
            {/if}

            {if $modvars.ZConfig.multilingual}
            <div class="z-formrow">
                <label for="news_language">{gt text='Language for which article should be displayed'}</label>
                {html_select_languages id="news_language" name="story[language]" installed=1 all=1 selected=$item.language|default:$modvars.ZConfig.language_i18n}
            </div>
            {/if}
        </fieldset>

        <fieldset class="z-linear">
            <legend>{gt text='Article'}</legend>
            <div class="z-formrow">
                {if $formattedcontent eq 0}
                <div class="z-warningmsg">{gt text='Permitted HTML tags'}: {news_allowedhtml}</div>
                {/if}
                <div class="z-informationmsg" style='margin-bottom:0 !important;'><span class="z-mandatorysym">*</span> {gt text='You must enter either <strong>teaser text</strong> or <strong>body text</strong>.'}</div>
            </div>
            <div class="z-formrow">
                <label for="news_hometext"><strong>{gt text='Index page teaser text'}</strong></label>
                <textarea id="news_hometext" name="story[hometext]" cols="40" rows="10">{$item.hometext|safetext}</textarea>
                {if $formattedcontent eq 0}<span id="news_hometext_remaining" class="z-formnote z-sub">{gt text='(Limit: %s characters)' tag1='4,294,967,295'}</span>{/if}
            </div>

            {if $formattedcontent eq 0}
            <div class="z-formrow">
                <label for="news_hometextcontenttype">{gt text='Index page teaser format'}</label>
                <select id="news_hometextcontenttype" name="story[hometextcontenttype]">
                    <option value="0"{if $item.hometextcontenttype eq 0} selected="selected"{/if}>{gt text='Plain text'}</option>
                    <option value="1"{if $item.hometextcontenttype eq 1} selected="selected"{/if}>{gt text='Text formatted with mark-up language'}</option>
                </select>
            </div>
            {/if}

            <div class="z-formrow">
                <label for="news_bodytext"><strong>{gt text='Article body text'}</strong></label>
                <textarea id="news_bodytext" name="story[bodytext]" cols="40" rows="10">{$item.bodytext|safetext}</textarea>
                {if $formattedcontent eq 0}<span id="news_bodytext_remaining" class="z-formnote z-sub">{gt text='#{chars} characters out of 4,294,967,295'}</span>{/if}
            </div>

            {if $formattedcontent eq 0}
            <div class="z-formrow">
                <label for="news_bodytextcontenttype">{gt text='Article body format'}</label>
                <select id="news_bodytextcontenttype" name="story[bodytextcontenttype]">
                    <option value="0"{if $item.bodytextcontenttype eq 0} selected="selected"{/if}>{gt text='Plain text'}</option>
                    <option value="1"{if $item.bodytextcontenttype eq 1} selected="selected"{/if}>{gt text='Text formatted with mark-up language'}</option>
                </select>
            </div>
            {/if}

            {if $accessadd eq 1}
            <div class="z-formrow">
                <label for="news_notes"><a id="news_notes_collapse" href="javascript:void(0);"><span id="news_notes_showhide">{gt text='Show'}</span> {gt text='Footnote'}</a></label>
                <p id="news_notes_details">
                    <textarea id="news_notes" name="story[notes]" cols="40" rows="10">{$item.notes|safetext}</textarea>
                    <span class="z-formnote z-sub">{gt text='(Limit: %s characters)' tag1='65,536'}</span>
                </p>
            </div>
            {/if}
        </fieldset>

        {if $modvars.News.picupload_enabled AND $accesspicupload}
        <fieldset>
            <legend>{gt text='Pictures'}</legend>
            <label for="news_files_element">{gt text='Select a picture (max. %s kB per picture)' tag1="`$modvars.News.picupload_maxfilesize/1000`"}</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="{$modvars.News.picupload_maxfilesize|safetext}" />
            {if $modvars.News.picupload_maxpictures eq 1}
            <input id="news_files_element" name="news_files[0]" type="file">
            {else}
            <input id="news_files_element" name="news_files" type="file"><br>
            <span class="z-sub">{gt text='(max files %s, first picture is used as thumbnail in the index teaser page for this article.)' tag1=$modvars.News.picupload_maxpictures}</span>
            <div id="news_files_list"></div>
            <script type="text/javascript">
                // <![CDATA[
                var multi_selector = new MultiSelector(document.getElementById('news_files_list'), {{$modvars.News.picupload_maxpictures}}, {{$item.pictures}});
                multi_selector.addElement(document.getElementById('news_files_element'));
                // ]]>
            </script>
            {/if}
            {if $item.pictures gt 0}
            <div><br />
                {foreach from=$item.temp_pictures item='file' name='temp_pics'}
                <img src='{$file.tmp_name}' width="80" />&nbsp;
                <input type="checkbox" id="story_del_picture_{$smarty.foreach.temp_pics.index}" name="story[del_pictures][]" value="{$file.name}">
                <label for="story_del_picture_{$smarty.foreach.temp_pics.index}">{gt text='Delete this picture'}</label><br />
                {/foreach}
                <input type='hidden' name='story[tempfiles]' value='{$item.tempfiles}' />
            </div>
            {/if}
            {if $item.pictures gt 0}
            <div><br />
                {section name=counter start=0 loop=$item.pictures step=1}
                <img src="{$modvars.News.picupload_uploaddir}/pic_sid{$item.sid}-{$smarty.section.counter.index}-thumb.jpg" width="80" alt="{gt text='news picture'} #{$smarty.section.counter.index}" />&nbsp;
                <input type="checkbox" id="story_del_picture_{$smarty.section.counter.index}" name="story[del_pictures][]" value="pic_sid{$item.sid}-{$smarty.section.counter.index}">
                <label for="story_del_picture_{$smarty.section.counter.index}">{gt text='Delete this picture'}</label><br />
                {/section}
            </div>
            {/if}
        </fieldset>
        {/if}

        {if $accesspubdetails}
        <fieldset>
            <legend><a id="news_publication_collapse" href="javascript:void(0);"><span id="news_publication_showhide">{gt text='Show'}</span> {gt text='Publishing options'}</a></legend>
            <div id="news_publication_details">
                <div class="z-formrow">
                    <label for="news_displayonindex">{gt text='Display on news index page'}</label>
                    <input id="news_displayonindex" name="story[displayonindex]" type="checkbox" value="1" {if $item.displayonindex eq 1}checked="checked" {/if}/>
                </div>
                <div class="z-formrow">
                    <label for="news_weight">{gt text='Article weight'}</label>
                    <div>
                        <input id="news_weight" name="story[weight]" type="text" size="10" maxlength="10" value="{$item.weight|safetext}" />
                    </div>
                </div>
                <div class="z-formrow">
                    <label for="news_unlimited">{gt text='No time limit'}</label>
                    <input id="news_unlimited" name="story[unlimited]" type="checkbox" value="1" {if $item.unlimited eq 1}checked="checked" {/if}/>
                </div>
                <div id="news_expiration_details">
                    <div class="z-formrow">
                        <label>{gt text='Start date'}</label>
                        <div>
                            <input id="news_from" class="datepicker" name="story[from]" type="text" size="18" value="{$item.from}" />
                        </div>
                    </div>
                    <div class="z-formrow">
                        <label for="news_tonolimit">{gt text='No end date'}</label>
                        <input id="news_tonolimit" name="story[tonolimit]" type="checkbox" value="1" {if $item.tonolimit eq 1}checked="checked" {/if}/>
                    </div>
                    <div id="news_expiration_date">
                        <div class="z-formrow">
                            <label>{gt text='End date'}</label>
                            <div>
                                <input id="news_to" class="datepicker" name="story[to]" type="text" size="18" value="{$item.to}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="z-formrow">
                    <label for="news_allowcomments">{gt text='Allow comments on this article'}</label>
                    <input id="news_allowcomments" name="story[allowcomments]" type="checkbox" value="1" {if $item.allowcomments eq 1}checked="checked" {/if}/>
                    <em class="z-sub z-formnote">{gt text='(EZComments must be hooked to News to enable commenting.)'}</em>
                </div>
                <div class="z-formrow">
                    <label for="news_sid">{gt text='Article ID'}</label>
                    <input id="news_sid" readonly="readonly" name="story[sid]" size="5" value="{$item.sid}" />
                </div>
            </div>
        </fieldset>
        <script type="text/javascript">
            // <![CDATA[
            var thisbaseurl='{{$baseurl}}';
            var dpPars = {
                use24hrs:true,
                icon:thisbaseurl+'modules/News/images/calendar.png',
                timePicker:true,
                timePickerAdjacent:true
            }
            var lang = '{{$lang}}';
            if (Control.DatePicker.Language[lang]) {
                if (!Control.DatePicker.Locale[lang+'_iso8601']) {
                    with (Control.DatePicker) Locale[lang+'_iso8601'] = i18n.createLocale('iso8601', lang);
                }
                dpPars.locale=lang+'_iso8601';
            } else {
                dpPars.locale='en_iso8601';
            }
            new Control.DatePicker('news_from', dpPars);
            new Control.DatePicker('news_to', dpPars);
            // ]]>
        </script>
        {if $modvars.News.enableattribution}
        <fieldset>
            <legend><a id="news_attributes_collapse" href="javascript:void(0);"><span id="news_attributes_showhide">{gt text='Show'}</span> {gt text='Article attributes'}</a></legend>
            <div id="news_attributes_details">
                {include file='user/attribute_subform.tpl'}
            </div>
        </fieldset>
        {/if}
        {/if}{* /if $accesspubdetails *}

        {notifydisplayhooks eventname='news.ui_hooks.articles.form_edit' id=null}

        <div id='news_picture_warning' class='z-center' style='padding: .5em;'>
            <span class='z-warningmsg' id="news_picture_warning_text">text</span>
        </div>

        <div class="z-buttonrow z-buttons z-center">
            {if $accessadd neq 1}
            <button id="news_button_submit" class="z-btgreen" type="submit" name="story[action]" value="1" title="{gt text='Submit this article'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Submit' __title='Submit this article' } {gt text='Submit'}</button>
            {else}
            <button id="news_button_publish" class="z-btgreen" type="submit" name="story[action]" value="2" title="{gt text='Publish this article'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Publish' __title='Publish this article' }<span id="news_button_text_publish"> {gt text='Publish'}</span></button>
            <span id="news_button_savedraft_nonajax">
                <button id="news_button_draft_nonajax" type="submit" name="story[action]" value="6" title="{gt text='Save this article as draft'}">{img src='edit.png' modname='core' set='icons/extrasmall' __alt='Save as draft' __title='Save this article as draft'} {gt text='Save as draft'}</button>
            </span>
            <span id="news_button_savedraft_ajax" class="hidelink">
                <a id="news_button_draft" href="javascript:void(0);" onclick="savedraft();">{img src='edit.png' modname='core' set='icons/extrasmall' __alt='Save quick draft'  __title='Quick save as draft'}
                    <span id="news_button_text_draft"> {gt text='Save quick draft'}</span>
                </a>
            </span>
            <button id="news_button_fulldraft" type="submit" name="story[action]" value="8" title="{gt text='Save full draft'}">{img src='edit.png' modname='core' set='icons/extrasmall' __alt='Save full draft' __title='Save full draft'} {gt text='Save full draft'}</button>
            <button id="news_button_pending" type="submit" name="story[action]" value="4" title="{gt text='Mark this article as pending'}">{img src='clock.png' modname='core' set='icons/extrasmall' __alt='Pending' __title='Mark this article as pending'} {gt text='Pending'}</button>
            {/if}
            <button id="news_button_preview" type="submit" name="story[action]" value="0" title="{gt text='Preview this article'}">{img src='14_layer_visible.png' modname='core' set='icons/extrasmall' __alt='Preview' __title='Preview this article'} {gt text='Preview'}</button>
            <a id="news_button_cancel" href="{modurl modname='News' type='user' func='view'}" class="z-btred">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
            <div id="news_status_info" style='padding-top: 1em;'>
                <span id="news_saving_draft">{img modname='core' src='circle-ball-dark-antialiased.gif' set='ajax'}</span>
                <span class='z-informationmsg' id="news_status_text">statustext</span>
            </div>
        </div>
    </div>
</form>