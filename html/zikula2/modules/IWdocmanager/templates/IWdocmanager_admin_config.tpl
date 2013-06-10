{include file="IWdocmanager_admin_menu.htm"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large' __alt=''}</div>
    <h2>{gt text="Configure the module"}</h2>
    <h3>{gt text="Settings"}</h3>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" name="conf" id="conf" action="{modurl modname='IWdocmanager' type='admin' func='updateconfig'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        {if not $multizk}
        <div class="z-formrow">
            <label for="directoriroot">{gt text="Home directory of files"}</label>
            <input id="directoriroot" type="text" name="directoriroot" size="50" value="{$directoriroot}" onFocus='blur()' />
        </div>
        {/if}
        <div class="z-formrow">
            <label for="documentsFolder">{gt text="Documents folder"}</label>
            <input id="documentsFolder" type="text" name="documentsFolder" size="30" maxlength="30" value="{$documentsFolder}" />
        </div>
        {if $noFolder}
        <div class="z-formnote z-errormsg">
            {gt text="Can not find the directory for documents"}
        </div>
        {/if}
        {if $noWriteable}
        <div class="z-formnote z-errormsg">
            {gt text="You should give write permissions in this folder"}
        </div>
        {/if}
        <div class="z-formrow">
            <label for="notifyMail">{gt text="E-mail new entries notification"}</label>
            <input id="notifyMail" type="text" name="notifyMail" size="30" maxlength="30" value="{$notifyMail}" />
        </div>
        <div class="z-formrow">
            <label for="editTime">{gt text="Minutes while the user who has sended a document can edit it"}</label>
            <input id="editTime" type="text" name="editTime" value="{$editTime}" />
        </div>
        <div class="z-formrow">
            <label for="deleteTime">{gt text="Minutes while the user who has sended a document can delete it"}</label>
            <input id="deleteTime" type="text" name="deleteTime" value="{$deleteTime}" />
        </div>
        <div class="z-buttons z-center">
            <a title="Change the state" onClick="javascript: document.forms['conf'].submit();">
                {img modname='core' src='button_ok.png' set='icons/small'}
                {gt text="Change the configuration"}
            </a>
        </div>
    </form>
</div>