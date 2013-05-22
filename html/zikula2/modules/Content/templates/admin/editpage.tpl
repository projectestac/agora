{ajaxheader modname='Content' filename='ajax.js'}
{contentpagepath pageId=$page.id language=$page.language assign='subheader'}

{pageaddvar name="javascript" value="modules/Content/javascript/portal.js"}
{pageaddvar name="javascript" value="modules/Content/javascript/pagelayout.js"}
<script type="text/javascript" >
    //<![CDATA[
    content.pageId = {{$page.id}};
    Event.observe(window, 'load', content.editPageOnLoad);
    // store the image location and description in a JS array
    var images = [];
    var descs = [];
    {{foreach from=$layouts item=layout}}
    images.push('{{$layout.image}}');
    descs.push('{{$layout.description|safetext}}');
    {{/foreach}}
    //]]>
</script>

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text="Edit Page"}</h3>
</div>

<h4>{$subheader}</h4>

{modurl modname='Content' type='admin' func='editcontent' cid=$smarty.ldelim|cat:"commandArgument"|cat:$smarty.rdelim assign='editUrl'}
{modurl modname='Content' type='admin' func='newcontent' above=1 cid=$smarty.ldelim|cat:"commandArgument"|cat:$smarty.rdelim assign='aboveUrl'}
{modurl modname='Content' type='admin' func='newcontent' above=0 cid=$smarty.ldelim|cat:"commandArgument"|cat:$smarty.rdelim assign='belowUrl'}
{modurl modname='Content' type='admin' func='translatecontent' cid=$smarty.ldelim|cat:"commandArgument"|cat:$smarty.rdelim assign='translateUrl'}

{insert name="getstatusmsg"}

{form cssClass='z-form'}

{formcontextmenu id="contentEditMenu" width="auto"}
{formcontextmenuitem __title='Edit' imageURL="images/icons/extrasmall/edit.png" commandRedirect=$editUrl}
{if $access.pageCreateAllowed}
{formcontextmenuitem __title='Clone content' imageURL="images/icons/extrasmall/editcopy.png" commandName="cloneContent"}
{formcontextmenuitem __title='Add new content above' imageURL="modules/Content/images/insert_table_row_above.gif" commandRedirect=$aboveUrl}
{formcontextmenuitem __title='Add new content below' imageURL="images/icons/extrasmall/insert_table_row.png" commandRedirect=$belowUrl}
{/if}
{if $access.pageDeleteAllowed}{formcontextmenuitem __title='Delete' imageURL="images/icons/extrasmall/delete_table_row.png" commandName='deleteContent' __confirmMessage='Delete'}{/if}
{if $multilingual==1}{formcontextmenuitem __title='Translate' imageURL="images/icons/extrasmall/voice-support.png" commandRedirect=$translateUrl}{/if}
{/formcontextmenu}

{modurl modname='Content' type='admin' func='editcontent' cid="commandArgument" assign='editUrl'}

{formerrormessage id='error'}

{contentformframe}

{formtabbedpanelset}

{if $enableVersioning}
<ul class="content-subtabs">
    <li><a href="{modurl modname='Content' type='admin' func='history' pid=$page.id}">{gt text="History"}</a></li>
</ul>
{/if}

{formtabbedpanel __title='Content'}
<p>{gt text="Here you manage the content of this page. You can add/edit/delete content as well as drag the content boxes around to get the layout right. Click on the icon next to the title for the options of that content item."}</p>
{include file=$layoutTemplate}
{/formtabbedpanel}

{formtabbedpanel __title='Options'}
<fieldset>
    <legend>{gt text="Page settings"}</legend>
    <div class="z-formrow">
        {formlabel for='title' __text='Page title'}
        {formtextinput id='title' mandatory='1' maxLength='255' group='page'}
    </div>
    <div class="z-formrow">
        {formlabel for='showTitle' __text='Display title on page'}
        {formcheckbox id='showTitle' group='page'}
    </div>
    <div class="z-formrow">
        {formlabel for='urlname' __text='Permalink URL name'}
        {formtextinput id='urlname' maxLength='255' group='page'}
        {contentlabelhelp __text='(Used in shorturl mode and generated automatically if left blank)'}
    </div>
    <div class="z-formrow">
        {formlabel for='language' __text='Page language'}
        {formlanguageselector id='language' group='page' addAllOption='0'}
    </div>
    <div class="z-formrow">
        {formlabel for='inMenu' __text='Include page in menu'}
        {formcheckbox id='inMenu' group='page'}
        {contentlabelhelp __text='You can include/exclude the page in the menu. The page is only shown when it is also Online.'}
    </div>
    <div class="z-formrow">
        {formlabel for='nohooks' __text='Do not display hooks on this page'}
        {formcheckbox id='nohooks' group='page'}
        {contentlabelhelp __text='Checking this option will just ignore all the hooks for this page, it does not replace permissions.'}
    </div>
</fieldset>

<fieldset>
    <legend>{gt text='Meta tags'}</legend>
    <div class="z-formrow">
        {formlabel for='metadescription' __text='Description'}
        {formtextinput id='metadescription' mandatory=false textMode='multiline' rows='6' cols='50' group='page'}
    </div>
    <div class="z-formrow">
        {formlabel for='metakeywords' __text='Keywords'}
        {formtextinput id='metakeywords' mandatory=false textMode='multiline' rows='4' cols='50' group='page'}
    </div>
</fieldset>

{notifydisplayhooks eventname='content.ui_hooks.pages.form_edit' id=$page.id}

<fieldset>
    <legend>{gt text="Page state"}</legend>
    <div class="z-formrow">
        {formlabel for='active' __text='Active'}
        {formcheckbox id='active' group='page'}
        {contentlabelhelp __text='You can set the page active/inactive as well as supply a publication date interval. A page is only online if it is active and within the publication interval.'}
    </div>
    <div class="z-formrow">
        {formlabel for='activeFrom' __text='Start date'}
        {formdateinput id='activeFrom' group='page'}
    </div>
    <div class="z-formrow">
        {formlabel for='activeTo' __text='End date'}
        {formdateinput id='activeTo' group='page'}
    </div>
    <div class="z-formrow">
        {formlabel for='createdBy' __text='Created'}
        <span id="createdBy" class="z-formnote">{gt text='on %1$s by %2$s' tag1=$page.cr_date|dateformat:'datetimebrief' tag2=$page.uname|profilelinkbyuname}</span>
    </div>
    <div class="z-formrow">
        {formlabel for='updatedBy' __text='Updated'}
        <span id="updatedBy" class="z-formnote">{gt text='on %1$s by %2$s' tag1=$page.lu_date|dateformat:'datetimebrief' tag2=$page.lu_uid|profilelinkbyuid}
            {if $enableVersioning}
            {modapifunc modname=Content type=history func=getPageVersionNo pageId=$page.id assign=versionNo}
            (#{$versionNo})
            {/if}
        </span>
    </div>
</fieldset>

{if $categoryUsage lt 4}
<fieldset>
    {if $categoryUsage eq 3}
    <legend>{gt text="Category"}</legend>
    <div class="z-formrow">
        {formlabel for='categoryId' __text='Category'}
        <div>
            {formcategoryselector id='categoryId' group='page' category=$mainCategory includeEmptyElement='1'}
        </div>
    </div>
    {else}
    <legend>{gt text="Categories"}</legend>
    <div class="z-formrow">
        {formlabel for='categoryId' __text='Primary category'}
        <div>
            {formcategoryselector id='categoryId' group='page' category=$mainCategory includeEmptyElement='1'}
        </div>
    </div>
    <div class="z-formrow">
        {if $categoryUsage eq 2}
        <label>{gt text="Secondary category"}</label>
        <div>
            {formcategoryselector id='categories' group='page' category=$secondCategory selectedValue=$page.categories.0 includeEmptyElement='1'}
        </div>
        {else}
        <label>{gt text="Secondary categories"}</label>
        {formcategorycheckboxlist id='categories' group='page' category=$secondCategory repeatColumns='0'}
        {/if}
    </div>
    {/if}
</fieldset>
{/if}

{/formtabbedpanel}

{formtabbedpanel __title='Layout'}
<fieldset>
    <legend>{gt text="Page layout"}</legend>
    <div class="z-formrow">
        {formlabel for='layout' __text='Page layout'}
        {contentlayoutselector id='layout' group='page'}
    </div>
    <div class="z-formrow">
        {formlabel for='layout_preview' __text='Layout preview and description'}
        <div id="layout_preview">
            <img id="layout_preview_img" src="{$pagelayout.image}" alt="" />
        </div>
    </div>
    <p id="layout_preview_desc" class="z-formnote">{$pagelayout.description}</p>
</fieldset>

{/formtabbedpanel}

{/formtabbedpanelset}

<div class="z-buttons">
    <input type="submit" class="z-bt-icon con-bt-view" value="{gt text="Preview"}" onclick="window.open('{modurl modname='Content' type='user' func='view' preview=1 pid=$page.id}')" />
    {formbutton class="z-bt-save z-btgreen" commandName="save" __text="Save"}
    {if $page.isOnline}
    {formbutton class="z-bt-save z-btgreen" commandName="saveAndView" __text="Save & View"}
    {/if}
    {if $access.pageDeleteAllowed}
    {formbutton class="z-bt-delete z-btred" commandName="deletePage" __text="Delete" __confirmMessage='Delete'}
    {/if}
    {if $multilingual==1}
    {formbutton class="z-bt-icon con-bt-translate" commandName="translate" __text="Translate"}
    {/if}
    {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
</div>

{/contentformframe}

{/form}
{adminfooter}