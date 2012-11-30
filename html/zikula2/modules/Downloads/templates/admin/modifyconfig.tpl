{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Downloads settings'}</h3>
</div>

<form class="z-form" action="{modurl modname="Downloads" type="admin" func="updateconfig"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text='General settings'}</legend>

            <div class="z-formrow">
                <label for="fulltext">{gt text='Use full text search'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="fulltext" name="fulltext"{if $modvars.Downloads.fulltext eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="sortby">{gt text='Sort downloads by'}</label>
                <span>
                <select disabled="disabled" id="sortby" name="sortby" size="1">
                    <option value="title"{if $modvars.Downloads.sortby eq 'title'} selected="selected"{/if}>{gt text='Title'}</option>
                    <option value="hits"{if $modvars.Downloads.sortby eq 'hits'} selected="selected"{/if}>{gt text='Hits'}</option>
                    <option value="date"{if $modvars.Downloads.sortby eq 'date'} selected="selected"{/if}>{gt text='Date'}</option>
                </select>
                <select disabled="disabled" id="cclause" name="cclause" size="1">
                    <option value="ASC"{if $modvars.Downloads.cclause eq 'ASC'} selected="selected"{/if}>{gt text='Ascending'}</option>
                    <option value="DESC"{if $modvars.Downloads.cclause eq 'DESC'} selected="selected"{/if}>{gt text='Descending'}</option>
                </select>
                </span>
            </div>

            <div class="z-formrow">
                <label for="perpage">{gt text='Downloads per page'}</label>
                <input id="perpage" type="text" name="perpage" value="{$modvars.Downloads.perpage|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="newdownloads">{gt text='Number of latest downloads'}</label>
                <input disabled="disabled" id="newdownloads" type="text" name="newdownloads" value="{$modvars.Downloads.newdownloads|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="topdownloads">{gt text='Number of top rated downloads'}</label>
                <input disabled="disabled" id="topdownloads" type="text" name="topdownloads" value="{$modvars.Downloads.topdownloads|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="popular">{gt text='Number of popular download'}</label>
                <input disabled="disabled" id="popular" type="text" name="popular" value="{$modvars.Downloads.popular|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="showscreenshot">{gt text='Activate screenshots for downloads'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="showscreenshot" name="showscreenshot"{if $modvars.Downloads.showscreenshot eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="screenshotmaxsize">{gt text='Maximum filesize for screenshots'}</label>
                <input disabled="disabled" id="screenshotmaxsize" type="text" name="screenshotmaxsize" value="{$modvars.Downloads.screenshotmaxsize|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="thumbnailmaxsize">{gt text='Maximum filesize for thumbnails'}</label>
                <input disabled="disabled" id="thumbnailmaxsize" type="text" name="thumbnailmaxsize" value="{$modvars.Downloads.thumbnailmaxsize|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="thumbnailwidth">{gt text='Maximum thumbnail width (pixels)'}</label>
                <input disabled="disabled" id="thumbnailwidth" type="text" name="thumbnailwidth" value="{$modvars.Downloads.thumbnailwidth|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="thumbnailheight">{gt text='Maximum thumbnail height (pixels)'}</label>
                <input disabled="disabled" id="thumbnailheight" type="text" name="thumbnailheight" value="{$modvars.Downloads.thumbnailheight|safetext}" size="40" maxlength="80" />
            </div>

        </fieldset>

        <fieldset>
            <legend>{gt text='Upload/Download settings'}</legend>

            <div class="z-formrow">
                <label for="torrent">{gt text='Activate torrent for downloads'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="torrent" name="torrent"{if $modvars.Downloads.torrent eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="sessionlimit">{gt text='Limit downloads per session'}</label>
                <input type="checkbox" value="1" id="sessionlimit" name="sessionlimit"{if $modvars.Downloads.sessionlimit eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="sessiondownloadlimit">{gt text='Number of downloads per session'}</label>
                <input id="sessiondownloadlimit" type="text" name="sessiondownloadlimit" value="{$modvars.Downloads.sessiondownloadlimit|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="securedownload">{gt text='Use captcha to secure downloads'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="securedownload" name="securedownload"{if $modvars.Downloads.securedownload eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="captchacharacters">{gt text='Number of characters for captcha'}</label>
                <input disabled="disabled" id="captchacharacters" type="text" name="captchacharacters" value="{$modvars.Downloads.captchacharacters|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="allowupload">{gt text='Allow file upload'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="allowupload" name="allowupload"{if $modvars.Downloads.allowupload eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="allowscreenshotupload">{gt text='Allow screenshot upload'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="allowscreenshotupload" name="allowscreenshotupload"{if $modvars.Downloads.allowscreenshotupload eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="sizelimit">{gt text='Limit file size'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="sizelimit" name="sizelimit"{if $modvars.Downloads.sizelimit eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="limitsize">{gt text='Maximum file size'}</label>
                <input disabled="disabled" id="limitsize" type="text" name="limitsize" value="{$modvars.Downloads.limitsize|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="upload_folder">{gt text='Upload folder path'}</label>
                <input id="upload_folder" type="text" name="upload_folder" value="{$modvars.Downloads.upload_folder|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="screenshot_folder">{gt text='Screenshot folder path'}</label>
                <input disabled="disabled" id="screenshot_folder" type="text" name="screenshot_folder" value="{$modvars.Downloads.screenshot_folder|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="cache_folder">{gt text='Download cache folder path'}</label>
                <input disabled="disabled" id="cache_folder" type="text" name="cache_folder" value="{$modvars.Downloads.cache_folder|safetext}" size="40" maxlength="80" />
            </div>

        </fieldset>
        <fieldset>
            <legend>{gt text='Main page settings'}</legend>

            <div class="z-formrow">
                <label for="treeview">{gt text='Use treeview on start page'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="treeview" name="treeview"{if $modvars.Downloads.treeview eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="lastxdlsactive">{gt text='Show latest downloads'}</label>
                <input disabled="disabled" type="text" value="1" id="lastxdlsactive" name="lastxdlsactive"{if $modvars.Downloads.lastxdlsactive eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="lastxdlsamount">{gt text='Number of latest downloads on start page'}</label>
                <input disabled="disabled" id="lastxdlsamount" type="text" name="lastxdlsamount" value="{$modvars.Downloads.lastxdlsamount|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="topxdlsactive">{gt text='Show popular downloads'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="topxdlsactive" name="topxdlsactive"{if $modvars.Downloads.topxdlsactive eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="topxdlsamount">{gt text='Number of popular downloads on start page'}</label>
                <input disabled="disabled" id="topxdlsamount" type="text" name="topxdlsamount" value="{$modvars.Downloads.topxdlsamount|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="ratexdlsactive">{gt text='Show top-rated downloads'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="ratexdlsactive" name="ratexdlsactive"{if $modvars.Downloads.ratexdlsactive eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="ratexdlsamount">{gt text='Number of top-rated downloads on start page'}</label>
                <input disabled="disabled" id="ratexdlsamount" type="text" name="ratexdlsamount" value="{$modvars.Downloads.ratexdlsamount|safetext}" size="40" maxlength="80" />
            </div>

        </fieldset>
        <fieldset>
            <legend>{gt text='Notification settings'}</legend>

            <div class="z-formrow">
                <label for="notifymail">{gt text='Send email to this address (blank for admin)'}</label>
                <input disabled="disabled" id="notifymail" type="text" name="notifymail" value="{$modvars.Downloads.notifymail|safetext}" size="40" maxlength="80" />
            </div>

            <div class="z-formrow">
                <label for="inform_user">{gt text='Send email to submittor'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="inform_user" name="inform_user"{if $modvars.Downloads.inform_user eq true} checked="checked"{/if}/>
            </div>

        </fieldset>
        <!--
        <fieldset>
            <legend>{gt text='Allowed Extension settings'}</legend>

            <div class="z-formrow">
                <label for="limit_extension">{gt text='limit_extension'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="limit_extension" name="limit_extension"{if $modvars.Downloads.limit_extension eq true} checked="checked"{/if}/>
            </div>

            <div class="z-formrow">
                <label for="importfrommod">{gt text='importfrommod'}</label>
                <input disabled="disabled" type="checkbox" value="1" id="importfrommod" name="importfrommod"{if $modvars.Downloads.importfrommod eq true} checked="checked"{/if}/>
            </div>

        </fieldset>
        -->
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" __alt="Save" __title="Save" __text="Save"}
            <a href="{modurl modname="Downloads" type="admin" func='modifyconfig'}" title="{gt text="Cancel"}">{img modname=core src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
{adminfooter}