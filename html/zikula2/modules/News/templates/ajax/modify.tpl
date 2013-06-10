<h2>{gt text='Edit news article'}: {$item.title|safetext}</h2>

<form id="news_ajax_modifyform" class="z-form" action="{modurl modname='News' type='admin' func='update'}" method="post" enctype="{if $accesspicupload AND $modvars.News.picupload_enabled}multipart/form-data{else}application/x-www-form-urlencoded{/if}">
    <div>
        {include file='admin/modify_subform.tpl'}
        
        <div class="z-buttonrow z-buttons z-center">
            <a href="javascript:void(0);" onclick="editnews_save('update');" class="z-btgreen">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Save quick edit' __title='Save your quick changes' } {gt text='Save quick edit' domain='module_news'}</a>
            <button type='submit' name="story[action]" value='2' class="z-btgreen" title="{gt text='Save full edit'}">{img src='button_ok.png' modname='core' set='icons/extrasmall' __alt='Save full edit' __title='Save all changes' } {gt text='Save full edit' domain='module_news'}</button>
            <a href="javascript:void(0);" onclick="editnews_save('pending');">{img modname='core' src='clock.png' set='icons/extrasmall' __alt='Mark as pending' __title='Mark this article as pending'} {gt text='Mark as pending' domain='module_news'}</a>
            {checkpermissionblock component='News::' instance="$item.cr_uid::$item.sid" level='ACCESS_DELETE'}
            <a href="javascript:void(0);" onclick="editnews_save('delete');" class="z-btred">{img modname='core' src='editdelete.png' set='icons/extrasmall' __alt='Delete' __title='Delete this article'} {gt text='Delete' domain='module_news'}</a>
            {/checkpermissionblock}
            <a href="javascript:void(0);" onclick="editnews_cancel();" class="z-btred">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel' domain='module_news'}</a>
            &nbsp;<img id="news_savenews" src="{$baseurl}images/ajax/circle-ball-dark-antialiased.gif" alt="" />
        </div>
    </div>
</form>