{ajaxheader modname='News' filename='news.js'}
{pageaddvar name='javascript' value='modules/News/javascript/sizecheck.js'}
{pageaddvar name='javascript' value='modules/News/javascript/prototype-base-extensions.js'}
{pageaddvar name='javascript' value='modules/News/javascript/prototype-date-extensions.js'}
{pageaddvar name='javascript' value='modules/News/javascript/datepicker.js'}
{pageaddvar name='javascript' value='modules/News/javascript/datepicker-locale.js'}
{pageaddvar name='stylesheet' value='modules/News/style/datepicker.css'}
{if $modvars.News.picupload_enabled AND $modvars.News.picupload_maxpictures gt 1}
{pageaddvar name='javascript' value='modules/News/javascript/multifile.js'}
{/if}
<script type="text/javascript">
    // <![CDATA[
    var bytesused = Zikula.__f('%s characters out of 4,294,967,295','#{chars}','module_News');
    // ]]>
</script>

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Edit news article'}</h3>
</div>

{if $preview neq ''}
<div class="news_article news_preview" style="background-image: url({img modname='News' src='bg_preview.png' retval='src'})">{$preview}</div>
{/if}

<form id="news_user_newform" class="z-form" action="{modurl modname='News' type='admin' func='update'}" method="post" enctype="{if $accesspicupload AND $modvars.News.picupload_enabled}multipart/form-data{else}application/x-www-form-urlencoded{/if}">
    <div>
        {include file='admin/modify_subform.tpl'}

        <div class="z-buttonrow z-buttons z-center">
            {if $item.published_status eq 2}
            <button id="news_button_publish" class="z-btgreen" type="submit" name="story[action]" value="2" title="{gt text='Approve and publish this article'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Approve and publish this article'  __title='Approve and publish this article' }{gt text='Approve and'} <span id="news_button_text_publish"> {gt text='Publish'}</span></button>
            {elseif $item.published_status eq 0}
            <button id="news_button_publish" class="z-btgreen" type="submit" name="story[action]" value="2" title="{gt text='Update this article'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Update'  __title='Update this article' } {gt text='Update'}</button>
            {else}
            <button id="news_button_publish" class="z-btgreen" type="submit" name="story[action]" value="2" title="{gt text='Publish this article'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Publish'  __title='Publish this article' }<span id="news_button_text_publish"> {gt text='Publish'}</span></button>
            {/if}
            <button id="news_button_preview" type="submit" name="story[action]" value="0" title="{gt text='Preview this article'}">{img src='14_layer_visible.png' modname='core' set='icons/extrasmall' __alt='Preview' __title='Preview this article'} {gt text='Preview'}</button>
            {if $accessadd neq 1}
            <button id="news_button_submit" class="z-btgreen" type="submit" name="story[action]" value="1" title="{gt text='Submit this article'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Submit' __title='Submit this article'} {gt text='Submit'}</button>
            {else}
            {if $item.published_status eq 4}
            <button id="news_button_draft" type="submit" name="story[action]" value="6" title="{gt text='Update draft'}">{img src='edit.png' modname='core' set='icons/extrasmall' __alt='Update draft' __title='Update draft'} {gt text='Update draft'}</button>
            {else}
            <button id="news_button_draft" type="submit" name="story[action]" value="6" title="{gt text='Save this article as draft'}">{img src='edit.png' modname='core' set='icons/extrasmall' __alt='Save as draft' __title='Save this article as draft'} {gt text='Save as draft'}</button>
            {/if}
            {if $item.published_status neq 2}
            <button id="news_button_pending" type="submit" name="story[action]" value="4" title="{gt text='Mark this article as pending'}">{img src='clock.png' modname='core' set='icons/extrasmall' __alt='Pending' __title='Mark this article as pending'} {gt text='Pending'}</button>
            {/if}
            {if $item.published_status neq 3}
            <button id="news_button_archive" type="submit" name="story[action]" value="5" title="{gt text='Archive this article'}">{img src='folder_yellow.png' modname='core' set='icons/extrasmall' __alt='Archive'  __title='Archive this article' } {gt text='Archive'}</button>
            {/if}
            {if $item.published_status eq 2}
            <button id="news_button_reject" class="z-btred" type="submit" name="story[action]" value="3" title="{gt text='Reject this article'}">{img src='locked.png' modname='core' set='icons/extrasmall' __alt='Reject'  __title='Reject this article' } {gt text='Reject'}</button>
            {/if}
            {/if}
            {checkpermissionblock component='News::' instance="$item.cr_uid::$item.sid" level='ACCESS_DELETE'}
            <a id="news_button_delete" href="{modurl modname='News' type='admin' func='delete' sid=$item.sid}" class="z-btred">{img modname='core' src='editdelete.png' set='icons/extrasmall' __alt='Delete' __title='Delete this article'} {gt text='Delete'}</a>
            {/checkpermissionblock}
            <a id="news_button_cancel" href="{modurl modname='News' type='admin' func='view'}" class="z-btred">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}