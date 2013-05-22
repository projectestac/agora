<input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
<input type="hidden" name="story[sid]" id='news_sid' value="{$item.sid|safetext}" />
<input type="hidden" name="page" value="{$page|safetext}" />
<input type="hidden" name="story[approver]" value="{$item.approver|safetext}" />
<input type="hidden" name="story[published_status]" value="{$item.published_status|safetext}" />
<input type="hidden" name="story[pictures]" value="{$item.pictures|safetext}" />
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

    <div class="z-formrow">
        <label for="news_urltitle">{gt text='Permalink URL'}</label>
        <input id="news_urltitle" name="story[urltitle]" type="text" size="32" maxlength="255" value="{$item.urltitle|safetext}" />
        <em class="z-sub z-formnote">{gt text='(Generated automatically if left blank)'}</em>
    </div>

    {if $modvars.News.enablecategorization}
    <div class="z-formrow">
        <label>{gt text='Category'}</label>
        {gt text='Choose category' assign='lblDef'}
        {nocache}
        {foreach from=$catregistry key='property' item='category'}
        {array_field array=$item.__CATEGORIES__ field=$property assign='catExists'}
        {if $catExists}
        {array_field array=$item.__CATEGORIES__.$property field='id' assign='selectedValue'}
        {else}
        {assign var='selectedValue' value='0'}
        {/if}
        <div class="z-formnote">{selector_category category=$category name="story[__CATEGORIES__][$property]" field='id' selectedValue=$selectedValue defaultValue='0' defaultText=$lblDef}</div>
        {/foreach}
        {/nocache}
    </div>
    {/if}

    {if $modvars.ZConfig.multilingual}
    <div class="z-formrow">
        <label for="news_language">{gt text='Language for which article should be displayed'}</label>
        {html_select_languages id="news_language" name="story[language]" installed=1 all=1 selected=$item.language|default:''}
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
        {if $formattedcontent eq 0}<span id="news_bodytext_remaining" class="z-formnote z-sub">{gt text='(Limit: %s characters)' tag1='4,294,967,295'}</span>{/if}
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

    <div class="z-formrow">
        <label for="news_notes"><a id="news_notes_collapse" href="javascript:void(0);"><span id="news_notes_showhide">{gt text='Show'}</span> {gt text='Footnote'}</a></label>
        <p id="news_notes_details">
            <textarea id="news_notes" name="story[notes]" cols="40" rows="10">{$item.notes|safetext}</textarea>
            <span class="z-formnote z-sub">{gt text='(Limit: %s characters)' tag1='65,536'}</span>
        </p>
    </div>
</fieldset>

{if $modvars.News.picupload_enabled}
<fieldset>
    <legend>{gt text='Pictures'}</legend>
    <label id="label_for_news_files_element" for="news_files_element">{gt text='Select a picture (max. %s kB per picture)' tag1="`$modvars.News.picupload_maxfilesize/1000`"}</label>
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
        {section name=counter start=0 loop=$item.pictures step=1}
        <img src="{$modvars.News.picupload_uploaddir}/pic_sid{$item.sid}-{$smarty.section.counter.index}-thumb.jpg" width="80" alt="{gt text='news picture'} #{$smarty.section.counter.index}" /> <input type="checkbox" id="story_del_picture_{$smarty.section.counter.index}" name="story[del_pictures][]" value="pic_sid{$item.sid}-{$smarty.section.counter.index}"><label for="story_del_picture_{$smarty.section.counter.index}">{gt text='Delete this picture'}</label><br />
        {/section}
    </div>
    {/if}
</fieldset>
{/if}

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

<fieldset>
    <legend><a id="news_meta_collapse" href="javascript:void(0);">{gt text='Meta data'}</a></legend>
    <div id="news_meta_details">
        <ul>
            {usergetvar name='uname' uid=$item.cr_uid assign='username'}
            <li>
                {gt text='Contributed by'} <span id='news_contributor'>{$item.contributor}</span> {gt text='on'} {$item.cr_date|dateformat} <a id="news_cr_uid_edit" href="{modurl modname='News' type='admin' func='selectuser' id=$item.cr_uid}">{img modname='core' set='icons/extrasmall' src='xedit.png' __title='Edit' __alt='Edit'}</a>
                <input type="hidden" id="news_cr_uid" name="story[cr_uid]" value="{$item.cr_uid}" />
                <script type="text/javascript">
                    var options = {modal:true,draggable:false,resizable:false,initMaxHeight:220,title:Zikula.__('Article Author','module_News')};
                    var userselectwindow = new Zikula.UI.FormDialog($('news_cr_uid_edit'),executeuserselectform,options);
                </script>
            </li>
            {usergetvar name='uname' uid=$item.lu_uid assign='username'}
            <li>{gt text='Last edited'} {gt text='by %1$s on %2$s' tag1=$username tag2=$item.lu_date|dateformat}</li>
            {if $item.published_status eq 0}
            {usergetvar name='uname' uid=$item.approver|safetext assign='approvername'}
            <li>{gt text='Approved by %s' tag1=$approvername}</li>
            {/if}
            <li>{gt text='Status %s' tag1=$item.published_status|news_getstatustext}</li>
            <li>{gt text='Article ID: %s' tag1=$item.sid}</li>
        </ul>
    </div>
</fieldset>

{notifydisplayhooks eventname='news.ui_hooks.articles.form_edit' id=$item.sid}