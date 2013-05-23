{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Settings'}</h3>
</div>

<form class="z-form" action="{modurl modname='Pages' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text='General settings'}</legend>
            <div class="z-formrow">
                <label for="pages_enablecategorization">{gt text='Enable categorization'}</label>
                <input id="pages_enablecategorization" type="checkbox" name="enablecategorization"{if $modvars.Pages.enablecategorization} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_itemsperpage">{gt text='Items per page'}</label>
                <input id="pages_itemsperpage" type="text" name="itemsperpage" size="3" value="{$modvars.Pages.itemsperpage|safetext}" />
            </div>
        </fieldset>
        <fieldset>
            <legend>{gt text='New page defaults'}</legend>
            <div class="z-formrow">
                <label for="pages_displaywrapper">{gt text='Display additional information'}</label>
                <input id="pages_displaywrapper" type="checkbox" name="def_displaywrapper"{if $modvars.Pages.def_displaywrapper} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_displaytitle">{gt text='Display page title'}</label>
                <input id="pages_displaytitle" type="checkbox" name="def_displaytitle"{if $modvars.Pages.def_displaytitle} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_displaycreated">{gt text='Display page creation date'}</label>
                <input id="pages_displaycreated" type="checkbox" name="def_displaycreated"{if $modvars.Pages.def_displaycreated} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_displayupdated">{gt text='Display page update date'}</label>
                <input id="pages_displayupdated" type="checkbox" name="def_displayupdated"{if $modvars.Pages.def_displayupdated} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_displaytextinfo">{gt text='Display page text statistics'}</label>
                <input id="pages_displaytextinfo" type="checkbox" name="def_displaytextinfo"{if $modvars.Pages.def_displaytextinfo} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_displayprint">{gt text='Display page print link'}</label>
                <input id="pages_displayprint" type="checkbox" name="def_displayprint"{if $modvars.Pages.def_displayprint} checked="checked"{/if} />
            </div>
        </fieldset>
        <fieldset>
            <legend>{gt text='Permalinks settings'}</legend>
            <div class="z-formrow">
                <label for="pages_addcategorytitletopermalink">{gt text='Add category title to permalink'}</label>
                <input id="pages_addcategorytitletopermalink" type="checkbox" name="addcategorytitletopermalink"{if $modvars.Pages.addcategorytitletopermalink} checked="checked"{/if} />
            </div>
            <div class="z-formrow">
                <label for="pages_showpermalinkinput">{gt text='Show permalink input field'}</label>
                <input id="pages_showpermalinkinput" type="checkbox" name="showpermalinkinput"{if $modvars.Pages.showpermalinkinput} checked="checked"{/if} />
            </div>
        </fieldset>

        <div class="z-formbuttons z-buttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Save' __title='Save' __text='Save'}
            <a href="{modurl modname='Pages' type='admin' func='view'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel'  __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}