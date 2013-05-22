{ajaxheader modname='News' filename='news_admin_modifyconfig.js' effects=true}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Module settings'}</h3>
</div>

<p class="z-warningmsg">{gt text='Notice: Your theme could be using template overrides for the News publisher module (in themes/YourThemeName/templates/modules/News/...). They might lack behind in functionality to the current default News publisher templates, please remove them or check them carefully against the default News publisher templates (in modules/News/templates/...).'}</p>

<form class="z-form" action="{modurl modname='News' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlenpred">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <fieldset>
            <legend>{gt text='General settings'}</legend>
            <div class="z-formrow">
                <label for="news_enableattribution">{gt text='Enable article attributes'}</label>
                <input id="news_enableattribution" type="checkbox" name="enableattribution"{if $modvars.News.enableattribution} checked="checked"{/if} />
            </div>
        </fieldset>

        <fieldset>
            <legend>{gt text='Category settings'}</legend>
            <div class="z-formrow">
                <label for="news_enablecategorization">{gt text='Enable categorisation'}</label>
                <input id="news_enablecategorization" type="checkbox" name="enablecategorization"{if $modvars.News.enablecategorization} checked="checked"{/if} />
            </div>
            <div id="news_category_details">
                <div class="z-formrow">
                    <label for="topicproperty">{gt text='Category to use for legacy \'Topics\' module template variables'}</label>
                    {html_options id='topicproperty' name='topicproperty' options=$properties selected=$property}
                </div>
                <div class="z-formrow">
                    <label for="settings_catimagepath">{gt text='Category image path (with trailing /)'}</label>
                    <input id="settings_catimagepath" type="text" name="catimagepath" value="{$modvars.News.catimagepath|safetext}" size="40" maxlength="80" />
                    <div class="z-informationmsg z-formnote">{gt text='Notice: You can associate an image with each article category. The image must be located in the category image path entered in \'Category image path\'. You must also go to the Categories manager in the site admin panel and then define the associated image. To do this, add a category attribute named \'topic_image\' to each article category, and then enter the associated image path and name.'}</div>
                </div>
                <div class="z-formrow">
                    <label for="news_enablecategorybasedpermissions">{gt text='Enable category based permission checks'}</label>
                    <input id="news_enablecategorybasedpermissions" type="checkbox" name="enablecategorybasedpermissions"{if $modvars.News.enablecategorybasedpermissions} checked="checked"{/if} />
                    <div class="z-informationmsg z-formnote">{gt text="Notice: You can use category based permission checks (Categories::Category | Category ID:Category Path:Category IPath) for the display of each and every article. If you don't need to select access based on the articles categories, you can uncheck this setting for a gain in speed (e.g. less database queries)."}</div>                    
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>{gt text='Display settings'}</legend>
            <div class="z-formrow">
                <label for="settings_storyorder">{gt text='Order article listings by'}</label>
                <select id="settings_storyorder" name="storyorder" size="1">
                    <option value="0"{if $modvars.News.storyorder eq 0} selected="selected"{/if}>{gt text='Article ID'}</option>
                    <option value="1"{if $modvars.News.storyorder eq 1} selected="selected"{/if}>{gt text='Article date/time'}</option>
                    <option value="2"{if $modvars.News.storyorder eq 2} selected="selected"{/if}>{gt text='Article weight'}</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="settings_storyhome">{gt text='Number of articles in news index page'}</label>
                <input id="settings_storyhome" type="text" name="storyhome" value="{$modvars.News.storyhome|safetext}" size="5" maxlength="5" />
            </div>
            <div class="z-formrow">
                <label for="news_itemsperpage">{gt text='Number of articles in archive page'}</label>
                <input id="news_itemsperpage" type="text" name="itemsperpage" size="3" value="{$modvars.News.itemsperpage|safetext}" />
            </div>
            <div class="z-formrow">
                <label for="news_itemsperadminpage">{gt text='Number of articles in admin list view'}</label>
                <input id="news_itemsperadminpage" type="text" name="itemsperadminpage" size="3" value="{$modvars.News.itemsperadminpage|safetext}" />
            </div>
            <div class="z-formrow">
                <label for="news_refereronprint">{gt text='Check referer on printer-friendly pages'}</label>
                <div id="news_refereronprint">
                    <input type="radio" id="refereronprintyes" name="refereronprint" value="1"{if $modvars.News.refereronprint eq 1} checked="checked"{/if} /> <label for="refereronprintyes">{gt text='Yes'}</label>
                    <input type="radio" id="refereronprintno" name="refereronprint" value="0"{if $modvars.News.refereronprint eq 0} checked="checked"{/if} /> <label for="refereronprintno">{gt text='No'}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="news_enableajaxedit">{gt text="Enable 'quick edit' of articles via Ajax"}</label>
                <input id="news_enableajaxedit" type="checkbox" name="enableajaxedit"{if $modvars.News.enableajaxedit} checked="checked"{/if} />
            </div>
            <div id="news_ajaxedit_details">
                <div class="z-informationmsg z-formnote">{gt text="Picture/file operations not supported in 'Quick edit' mode due to Ajax limitations."}</div>
                <div class="z-informationmsg z-formnote">{gt text='When Scribite! is being used for editing, the <strong>display</strong> function needs to be added to the list of module functions that Scribite! uses for the News Publisher module.'}</div>
            </div>
            <div class="z-formrow">
                <label for="news_enablemorearticlesincat">{gt text='Enable \'More articles in category\' when displaying an article'}</label>
                <input id="news_enablemorearticlesincat" type="checkbox" name="enablemorearticlesincat"{if $modvars.News.enablemorearticlesincat} checked="checked"{/if} />
            </div>
            <div id="news_morearticles_details">
                <div class="z-formrow">
                    <label for="news_morearticlesincat">{gt text='Number of \'More articles in category\' for every article'}</label>
                    <input id="news_morearticlesincat" type="text" name="morearticlesincat" size="3" value="{$modvars.News.morearticlesincat|safetext}" />
                    <div class="z-informationmsg z-formnote">{gt text='When displaying an article, a number of additional articletitles in the same category can be shown.<br />To show the additional articletitles for every article set the value above to a number larger than 0. When the value is set to 0, the number of additional articletitles can be set per article by means of the article attribute \'morearticlesincat\'. You need to enable \'article attributes\' yourself. <br />When the setting above or the article attribute is set to 0, no titles will be extracted from the database.'}</div>
                </div>
            </div>
            <div class="z-formrow">
                <label for="news_enabledescriptionvar">{gt text='Enable the description page variable in the article display for SEO.'}</label>
                <input id="news_enabledescriptionvar" type="checkbox" name="enabledescriptionvar"{if $modvars.News.enabledescriptionvar} checked="checked"{/if} />
            </div>
            <div id="news_descriptionvar_details">
                <div class="z-formrow">
                    <label for="news_descriptionvarchars">{gt text='How many characters of the index page teaser text should be shown in the description'}</label>
                    <input id="news_descriptionvarchars" type="text" name="descriptionvarchars" value="{$modvars.News.descriptionvarchars|safetext}" />
                    {assign var=meta_sample value='<code>&lt;meta name="description" content="'|cat:$smarty.ldelim|cat:"\$metatags.description"|cat:$smarty.rdelim|cat:'" /&gt;</code>'}
                    <div class="z-informationmsg z-formnote">{gt text="Notice: Check your theme templates and you may have to adapt %s to get the correct meta text in the header." tag1=$meta_sample}</div>
                </div>
            </div>
            <div class="z-formrow">
                <label for="news_notifyonpending">{gt text='Notify moderators when a new pending article is submitted for review'}</label>
                <input id="news_notifyonpending" type="checkbox" name="notifyonpending"{if $modvars.News.notifyonpending} checked="checked"{/if} />
            </div>
            <div id="news_notifyonpending_details">
                <div class="z-formrow">
                    <div class="z-informationmsg z-formnote">{gt text='Whenever a new article is submitted as Pending Review, the admin or a list of E-mail addresses can be informed of this event with a notification E-mail.'}</div>
                    <label for="news_notifyonpending_fromname">{gt text='From name (leave empty for sitename)'}</label>
                    <input id="news_notifyonpending_fromname" type="text" name="notifyonpending_fromname" value="{$modvars.News.notifyonpending_fromname|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_notifyonpending_fromaddress">{gt text='From address (leave empty for admin E-mail address)'}</label>
                    <input id="news_notifyonpending_fromaddress" type="text" name="notifyonpending_fromaddress" value="{$modvars.News.notifyonpending_fromaddress|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_notifyonpending_toname">{gt text='To name (leave empty for sitename)'}</label>
                    <input id="news_notifyonpending_toname" type="text" name="notifyonpending_toname" value="{$modvars.News.notifyonpending_toname|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_notifyonpending_toaddress">{gt text='To address (comma seperated list of E-Mail addresses, leave empty for admin E-mail address)'}</label>
                    <input id="news_notifyonpending_toaddress" type="text" name="notifyonpending_toaddress" value="{$modvars.News.notifyonpending_toaddress|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_notifyonpending_subject">{gt text='E-mail subject'}</label>
                    <input id="news_notifyonpending_subject" type="text" name="notifyonpending_subject" value="{$modvars.News.notifyonpending_subject|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_notifyonpending_html">{gt text='Send E-mail as HTML '}</label>
                    <input id="news_notifyonpending_html" type="checkbox" name="notifyonpending_html"{if $modvars.News.notifyonpending_html} checked="checked"{/if} />
                </div>
            </div>
            <div class="z-formrow">
                <label for="news_pdflink">{gt text='Display a PDF link for the articles in the index page'}</label>
                <input id="news_pdflink" type="checkbox" name="pdflink"{if $modvars.News.pdflink} checked="checked"{/if} />
            </div>
            <div id="news_pdflink_details">
                <div class="z-formrow">
                    <div class="z-informationmsg z-formnote">{gt text='The PDF link is based on <a href="http://www.tcpdf.org">TCPDF</a>. The News module ships with a subset of available fonts. If you wish to expand the font options, you will need to download the package and transfer fonts to the appropriate folder within the News module. Additionally, you would need to override the News_Controller_User::displaypdf() method to change the fonts used.'}</div>
                </div>
                <div class="z-formrow">
                    <label for="news_pdflink_headerlogo">{gt text='TCPDF Header logo image (absolute path or relative to tcpdf/images)'}</label>
                    <input id="news_pdflink_headerlogo" type="text" name="pdflink_headerlogo" value="{$modvars.News.pdflink_headerlogo|safetext}" />
                    <div class="z-informationmsg z-formnote">{gt text='Default Header logo is defined by TCPDF and in PathToTCPDF/images folder. tcpdf_logo.jpg has a width of 30'}</div>
                </div>
                <div class="z-formrow">
                    <label for="news_pdflink_headerlogo_width">{gt text='TCPDF header logo width in mm'}</label>
                    <input id="news_pdflink_headerlogo_width" type="text" name="pdflink_headerlogo_width" value="{$modvars.News.pdflink_headerlogo_width|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_pdflink_enablecache">{gt text='Enable caching for pdfs'}</label>
                    <input id="news_pdflink_enablecache" type="checkbox" name="pdflink_enablecache"{if $modvars.News.pdflink_enablecache} checked="checked"{/if} />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>{gt text='Picture uploading'}</legend>
            <div class="z-formrow">
                <label for="news_picupload_enabled">{gt text='Allow article picture(s) uploading'}</label>
                <input id="news_picupload_enabled" type="checkbox" name="picupload_enabled"{if $modvars.News.picupload_enabled} checked="checked"{/if} />
                <div class="z-warningmsg z-formnote">{gt text='Notice: Enabling picture uploading has a small security risk, since the upload folder needs to have write permission for the webserver. Make sure that you trust the users that have picture uploading permissions and when you create the picture upload directory yourself make sure that you copy the <strong>htaccess</strong> file in /docs to <strong>.htaccess</strong> in the picture upload folder. This restricts access to images only.'}</div>
            </div>
            <div id="news_picupload_details">
                <div class="z-formrow">
                    <label for="news_picupload_allowext">{gt text='Allowed picture extension'}</label>
                    <input id="news_picupload_allowext" type="text" name="picupload_allowext" value="{$modvars.News.picupload_allowext|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_index_float">{gt text='Image float on the index page'}</label>
                    <select id="news_picupload_index_float" name="picupload_index_float" size="1">
                        <option value="left"{if $modvars.News.picupload_index_float eq 'left'} selected="selected"{/if}>{gt text='Left - image floats to the left and text wraps around it'}</option>
                        <option value="right"{if $modvars.News.picupload_index_float eq 'right'} selected="selected"{/if}>{gt text='Right - image floats to the right and text wraps around it'}</option>
                        <option value="none"{if $modvars.News.picupload_index_float eq 'none'} selected="selected"{/if}>{gt text='None - text is not wrapped around the image'}</option>
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_article_float">{gt text='Image float on the article display page'}</label>
                    <select id="news_picupload_article_float" name="picupload_article_float" size="1">
                        <option value="left"{if $modvars.News.picupload_article_float eq 'left'} selected="selected"{/if}>{gt text='Left - image floats to the left and text wraps around it'}</option>
                        <option value="right"{if $modvars.News.picupload_article_float eq 'right'} selected="selected"{/if}>{gt text='Right - image floats to the right and text wraps around it'}</option>
                        <option value="none"{if $modvars.News.picupload_article_float eq 'none'} selected="selected"{/if}>{gt text='None - text is not wrapped around the image'}</option>
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_maxpictures">{gt text='How many pictures are allowed'}</label>
                    <input id="news_picupload_maxpictures" type="text" name="picupload_maxpictures" value="{$modvars.News.picupload_maxpictures|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_maxfilesize">{gt text='Maximum file size of the pictures (in Bytes)'}</label>
                    <input id="news_picupload_maxfilesize" type="text" name="picupload_maxfilesize" value="{$modvars.News.picupload_maxfilesize|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_sizing">{gt text='What thumbnail sizing to use'}</label>
                    <select id="news_picupload_sizing" name="picupload_sizing" size="1">
                        <option value="0"{if $modvars.News.picupload_sizing eq 0} selected="selected"{/if}>{gt text='Best fit (keeps aspect ratio)'}</option>
                        <option value="1"{if $modvars.News.picupload_sizing eq 1} selected="selected"{/if}>{gt text='Fixed size (scale and crop)'}</option>
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_picmaxwidth">{gt text='Maximum width of the full size pictures (in pixels)'}</label>
                    <input id="news_picupload_picmaxwidth" type="text" name="picupload_picmaxwidth" value="{$modvars.News.picupload_picmaxwidth|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_picmaxheight">{gt text='Maximum height of the full size pictures (in pixels)'}</label>
                    <input id="news_picupload_picmaxheight" type="text" name="picupload_picmaxheight" value="{$modvars.News.picupload_picmaxheight|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_thumbmaxwidth">{gt text='Maximum width of the thumbnails (in pixels)'}</label>
                    <input id="news_picupload_thumbmaxwidth" type="text" name="picupload_thumbmaxwidth" value="{$modvars.News.picupload_thumbmaxwidth|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_thumbmaxheight">{gt text='Maximum height of the thumbnails (in pixels)'}</label>
                    <input id="news_picupload_thumbmaxheight" type="text" name="picupload_thumbmaxheight" value="{$modvars.News.picupload_thumbmaxheight|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_thumb2maxwidth">{gt text='Maximum width of the thumbnail in the article display intro text (in pixels)'}</label>
                    <input id="news_picupload_thumb2maxwidth" type="text" name="picupload_thumb2maxwidth" value="{$modvars.News.picupload_thumb2maxwidth|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_thumb2maxheight">{gt text='Maximum height of the thumbnail in the article display intro text (in pixels)'}</label>
                    <input id="news_picupload_thumb2maxheight" type="text" name="picupload_thumb2maxheight" value="{$modvars.News.picupload_thumb2maxheight|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_uploaddir">{gt text='Directory where the images are uploaded'}</label>
                    <input id="news_picupload_uploaddir" type="text" name="picupload_uploaddir" value="{$modvars.News.picupload_uploaddir|safetext}" />
                    <div id="news_picupload_writable" class="z-formnote">&nbsp;</div>
                </div>
                <div class="z-formrow">
                    <label for="news_picupload_createfolder">{gt text='Create the specified upload directory'}</label>
                    <input id="news_picupload_createfolder" type="checkbox" name="picupload_createfolder" />
                </div>
            </div>
        </fieldset>

        {if $modvars.ZConfig.shorturls eq true}
        <fieldset>
            <legend>{gt text='Permalinks'}</legend>
            <p class="z-informationmsg">{gt text='You can select a pre-defined permalink format, or define your custom format.'}</p>
            <input id="news_permalink_customformat" name="customformat" type="hidden"  value="{$modvars.News.permalinkformat|default:'%year%/%monthnum%/%day%/%articletitle%/'}" size="50" />
            <div class="z-formrow">
                <label for="news_permalink_datename">{gt text='Format based on date and name'}</label>
                <div>
                    <input id="news_permalink_datename" onclick="news_permalink_onclick()" name="permalinkformat" type="radio" value="%year%/%monthnum%/%day%/%articletitle%"{if $modvars.News.permalinkformat eq '%year%/%monthnum%/%day%/%articletitle%'}checked="checked"{/if} />
                    <span>{$baseurl}{modgetinfo modname=News info=displayname}/{datetime format="%Y/%m/%d"}/{gt text='your-article-title'}/</span>
                </div>
            </div>
            <div class="z-formrow">
                <label for="news_permalink_numeric">{gt text='Numeric format'}</label>
                <div>
                    <input id="news_permalink_numeric" onclick="news_permalink_onclick()" name="permalinkformat" type="radio" value="%articleid%" {if $modvars.News.permalinkformat eq '%articleid%'}checked="checked"{/if} />
                    <span>{$baseurl}{modgetinfo modname='News' info='displayname'}/123</span>
                </div>
            </div>
            <div class="z-formrow">
                <label for="news_permalink_custom">{gt text='Custom format'}</label>
                <div>
                    <input id="news_permalink_custom" onclick="news_permalink_onclick()" name="permalinkformat" type="radio" value="custom" {if $modvars.News.permalinkformat neq '%articleid%' and $modvars.News.permalinkformat neq '%year%/%monthnum%/%day%/%articletitle%'}checked="checked"{/if} />
                </div>
            </div>
            <div id="news_permalink_custom_details">
                <div class="z-formrow">
                    <label for="news_permalink_format">{gt text='Custom format definition'}</label>
                    <input id="news_permalink_format" onclick="news_permalink_onclick()" name="permalinkstructure" type="text"  value="{$modvars.News.permalinkformat|default:'%year%/%monthnum%/%day%/%articletitle%/'}" size="50" />
                    <em class="z-sub z-formnote">{gt text='Notice: A custom format definition must contain at least either \'%articleid%\' or \'%articletitle%\', in order to be able to identify the article.'}</em>
                </div>
                <h4>{gt text='Acceptable values for use in custom format definition:'}</h4>
                <ul>
                    <li>%year% - {gt text='Year of publication (including century numerals)'}</li>
                    <li>%monthnum% - {gt text='Month of publication, as a number (ergo 1 to 12)'}</li>
                    <li>%monthname% - {gt text='Month of publication as a name (ergo January to December)'}</li>
                    <li>%day% - {gt text='Day'}</li>
                    <li>%articletitle% - {gt text='Article title'}</li>
                    <li>%articleid% - {gt text='Article ID'} </li>
                    <li>%category% - {gt text='Article category'} </li>
                </ul>
            </div>
        </fieldset>
        {/if}

        <div class="z-formbuttons z-buttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Save' __title='Save' __text='Save'}
            <a href="{modurl modname='News' type='admin' func='view'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel'  __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}