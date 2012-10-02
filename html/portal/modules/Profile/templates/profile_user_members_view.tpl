{gt text='Registered users list' assign='templatetitle'}

{include file='profile_user_menu.tpl'}

<form id="profile-search" class="z-form" action="{modurl modname='Profile' type='user' func='viewmembers'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" id="csrftoken" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <div class="z-formrow">
                <label for="profile_letter" class="profile_letter">{gt text='Search'}</label>
                <div>
                    <input id="profile_letter" type="text" name="letter" value="" maxlength="50" />
                    <input type="submit" value="{gt text="Go search"}" />
                </div>
            </div>
            <div class="z-formrow">
                <div class="z-formnote">
                    <input id="profile_nickname" type="radio" name="searchby" value="uname" checked="checked" />
                    <label for="profile_nickname">{gt text='Search in user names'}</label>
                </div>
                { if isset($dudarray.realname) }
                <div class="z-formnote">
                    <input id="profile_realname" type="radio" name="searchby" value="{$dudarray.realname}" />
                    <label for="profile_realname">{gt text='Search in real names'}</label>
                </div>
                {/if}
                { if isset($dudarray.url) }
                <div class="z-formnote">
                    <input id="profile_url" type="radio" name="searchby" value="{$dudarray.url}" />
                    <label for="profile_url">{gt text='Search in site'}</label>
                </div>
                {/if}
            </div>
        </fieldset>
    </div>
    <div id="profile-alphafilter" class="z-center">
        <strong>[ &nbsp;<a href="{modurl modname='Profile' type='user' func='viewmembers'}">{gt text='All'}</a>&nbsp; | {pagerabc posvar='letter' forwardvars='sortby'}]</strong>
    </div>
</form>

<table class="z-datatable">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>{gt text='User name'}</th>
            { if isset($dudarray.realname) }
            <th>{gt text='Real name'}</th>
            {/if}
            {if $msgmodule}
            <th>{gt text='PM'}</th>
            {/if}
            { if isset($dudarray.url) }
            <th>{gt text='Site'}</th>
            {/if}
            {if $adminedit}
            <th>{gt text='Actions'}</th>
            {/if}
        </tr>
    </thead>

    <tbody>
        {foreach from=$users item='user'}
        <tr class="{cycle values='z-odd,z-even'}">
            <td>
                {if $user.onlinestatus eq 1}
                <a href="{modurl modname='Profile' type='user' func='onlinemembers'}">{img modname='core' src='greenled.png' set='icons/extrasmall' __title='On-line' __alt='On-line'}</a>
                {else}
                {img modname='core' src='redled.png' set='icons/extrasmall' __title='Off-line' __alt='Off-line'}
                {/if}
            </td>
            <td><strong>{$user.uname|profilelinkbyuname}</strong></td>
            {if isset($dudarray.realname) }
            <td>{if isset($user.__ATTRIBUTES__)}{$user.__ATTRIBUTES__.realname|safetext|default:"&nbsp;"}{else}&nbsp;{/if}</td>
            {/if}
            {if $msgmodule}
            <td><a href="{modurl modname=$msgmodule type='user' func='newpm' uid=$user.uid}">{img modname='core' set='icons/extrasmall' src="mail_new.png" __alt='Send private message'}</a></td>
            {/if}
            { if isset($dudarray.url) }
            <td>
                {if !isset($user.__ATTRIBUTES__) || ($user.__ATTRIBUTES__.url == '')}
                &nbsp;
                {else}
                <a href="{$user.__ATTRIBUTES__.url|safetext}" rel="nofollow">{img modname=core set=icons/extrasmall src="agt_internet.png" title=$user.__ATTRIBUTES__.url alt=$user.__ATTRIBUTES__.url}</a>
                {/if}
            </td>
            {/if}
            {if $adminedit}
            <td>
                <a href="{modurl modname=Users type=admin func=modify userid=$user.uid}">{img modname='core' set='icons/extrasmall' src="xedit.png" __alt='Edit'}</a>
                {if $admindelete}
                <a href="{modurl modname=Users type=admin func=deleteusers userid=$user.uid}">{img modname='core' set='icons/extrasmall' src="14_layer_deletelayer.png" __alt='Delete'}</a>
                {/if}
            </td>
            {/if}
        </tr>
        {foreachelse}
        <tr class="z-datatableempty"><td colspan="6">{gt text='No users found.'}</td></tr>
        {/foreach}
    </tbody>
</table>

{pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum' shift=1}

<h3>{gt text='Membership statistics'}</h3>
<ul id="profile_status">
    <li><strong>{gt text='Registered:'} </strong>{$memberslistreg|safetext}</li>
    <li><strong>{gt text='On-line:'} </strong><a href="{modurl modname='Profile' type='user' func='onlinemembers'}">{$memberslistonline}</a></li>
    <li><strong>{gt text='Newest user:'} </strong><a href="{modurl modname='Profile' type='user' func='view' uname=$memberslistnewest}">{$memberslistnewest}</a></li>
</ul>
