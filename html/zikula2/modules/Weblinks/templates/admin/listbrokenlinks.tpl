{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="info" size="small"}
    <h3>{gt text='User-reported broken links'} ({$totalbrokenlinks|safetext})</h3>
</div>

<div class="z-informationmsg">
    {gt text="Instructions: confirm the validity of the link. Email the link submitter/owner by clicking their name. Choose an action to take:"}<br />
    <ul>
        <li>{gt text="Ignore: returns the link to normal, active status."}</li>
        <li>{gt text="Delete: removes link from database completely."}</li>
    </ul>
</div>

{if $totalbrokenlinks == 0}
<div class="z-warningmsg">
    {gt text="No broken links found"}
</div>
{else}

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text="Link (valid)"}</th>
            <th>{gt text="Submitter"}</th>
            <th>{gt text="Link owner"}</th>
            <th>{gt text="Actions"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$brokenlinks item='link'}
        <tr class="{cycle values="z-odd,z-even" name='abacs'}">

            <td>
                <a href="{$link.url|safetext}">{$link.title|safetext}</a>
                {if $link.valid}
                    {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt="validates" __title="validates"}
                {else}
                    {img modname='core' src='editdelete.png' set='icons/extrasmall' __alt="invalid!" __title="invalid!"}
                {/if}
            </td>
            {usergetidfromname uname=$link.modifysubmitter assign='modifysubmitterid'}
            {usergetvar id=$modifysubmitterid name='email' assign='submitteremail'}
            {if $submitteremail == ""}
            <td>{$link.modifysubmitter|safetext}</td>
            {else}
            <td><a href="mailto:{$submitteremail}">{$link.modifysubmitter|safetext}</a></td>
            {/if}

            {if $link.email == ""}
            <td>{$link.name|safetext}</td>
            {else}
            <td><a href="mailto:{$link.email}">{$link.name|safetext}</a></td>
            {/if}
            {insert name="csrftoken" assign='token'}

            <td>
                <a href="{modurl modname='Weblinks' type='admin' func='ignorebrokenlinks' lid=$link.lid csrftoken=$token}">
                    {img modname='core' src='edit_remove.png' set='icons/extrasmall' __alt="Ignore" __title="Ignore"}
                </a>&nbsp;
                <a href="{modurl modname='Weblinks' type='admin' func='modlink' lid=$link.lid csrftoken=$token}">
                    {img modname='core' src='xedit.png' set='icons/extrasmall' __alt="Edit" __title="Edit"}
                </a>&nbsp;
                <a href="{modurl modname='Weblinks' type='admin' func='dellink' lid=$link.lid csrftoken=$token}">
                    {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete" __title="Delete"}
                </a>
            </td>

        </tr>
        {/foreach}
    </tbody>
</table>

{/if}