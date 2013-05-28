{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="info" size="small"}
    <h3>{gt text='User link modification requests'} ({$totalmodrequests|safetext})</h3>
</div>

{foreach from=$modrequests item=modrequest}
<table class="z-admintable">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>{gt text="Original"}</th>
            <th>{gt text="Proposed"}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="{cycle values="z-odd,z-even" name=abacs}">
            <td>{gt text="Link title"}</td>
            <td>{$modrequest.origtitle|safetext}</td>
            <td{if $modrequest.origtitle <> $modrequest.title} class='wl-red'{/if}>{$modrequest.title|safetext}</td>
        </tr>
        <tr class="{cycle values="z-odd,z-even" name=abacs}">
            <td>{gt text="URL"}</td>
            <td><a href="{$modrequest.origurl|safetext}">{$modrequest.origurl|safetext}</a>
                {if $modrequest.origurlvalid}
                    {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt="validates" __title="validates"}
                {else}
                    {img modname='core' src='editdelete.png' set='icons/extrasmall' __alt="invalid!" __title="invalid!"}
                {/if}
            </td>
            <td{if $modrequest.origurl <> $modrequest.url} class='wl-red'{/if}><a href="{$modrequest.url|safetext}">{$modrequest.url|safetext}</a>
                {if $modrequest.urlvalid}
                    {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt="validates" __title="validates"}
                {else}
                    {img modname='core' src='editdelete.png' set='icons/extrasmall' __alt="invalid!" __title="invalid!"}
                {/if}
            </td>
        </tr>
        <tr class="{cycle values="z-odd,z-even" name=abacs}">
            <td>{gt text="Category"}</td>
            <td>{$modrequest.origcidtitle|safetext}</td>
            <td{if $modrequest.origcidtitle <> $modrequest.cidtitle} class='wl-red'{/if}>{$modrequest.cidtitle|safetext}</td>
        </tr>
        <tr class="{cycle values="z-odd,z-even" name=abacs}">
            <td>{gt text="Description"}:</td>
            <td>{$modrequest.origdescription|safetext}</td>
            <td{if $modrequest.origdescription <> $modrequest.description} class='wl-red'{/if}>{$modrequest.description|safetext}</td>
        </tr>

        <tr style="border-top: 1px solid #999;">
            <td colspan="3">
                {if $modrequest.submitteremail == ""}
                {gt text="Submitter"}: {$modrequest.submitter|safetext}
                {else}
                {gt text="Submitter"}: <a href="mailto:{$modrequest.submitteremail|safetext}">{$modrequest.submitter|safetext}</a>
                {/if}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                {if $modrequest.owneremail == ""}
                {gt text="Owner"}: {$modrequest.owner|safetext}
                {else}
                {gt text="Owner"}: <a href="mailto:{$modrequest.owneremail|safetext}">{$modrequest.owner|safetext}</a>
                {/if}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="z-buttons z-formbuttons">
                    {insert name="csrftoken" assign='token'}
                    <a class='z-btgreen' href="{modurl modname='Weblinks' type='admin' func='changemodrequests' lid=$modrequest.lid csrftoken=$token}}" title="{gt text="Accept"}">{img modname='core' src="button_ok.png" set="icons/extrasmall" __alt="Accept" __title="Accept"} {gt text="Accept"}</a>
                    <a class='z-btred' href="{modurl modname='Weblinks' type='admin' func='delmodrequests' lid=$modrequest.lid csrftoken=$token}}" title="{gt text="Ignore"}">{img modname='core' src="editdelete.png" set="icons/extrasmall" __alt="Ignore" __title="Ignore"} {gt text="Ignore"}</a>
                    <a class='z-btblue' href="{modurl modname='Weblinks' type='admin' func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>

{/foreach}

{if $totalmodrequests == 0}
<p class="wl-center">{gt text="No link modification requests"}</p>
{/if}
