{gt text='Users currently on-line' assign='templatetitle'}
{include file='profile_user_menu.tpl'}

<table class="z-datatable">
    <thead>
        <tr>
            <th>{gt text='User name'}</th>
            <th>{gt text='Real name'}</th>
            {if $msgmodule}
            <th>{gt text='PM'}</th>
            {/if}
            <th>{gt text='Site'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$users item='user'}
        <tr class="{cycle values='z-odd,z-even'}">
            <td><strong>{$user.uname|profilelinkbyuname}</strong></td>
            <td>{$user.__ATTRIBUTES__.realname|default:'&nbsp;'}</td>
            {if $msgmodule}
            <td><a href="{modurl modname=$msgmodule type='user' func='newpm' uid=$user.uid}">{img modname='core' set='icons/extrasmall' src='mail_new.png' __alt='Send private message'}</a></td>
            {/if}
            <td>
                {if @isset($user.__ATTRIBUTES__.url) and $user.__ATTRIBUTES__.url neq '' and $user.__ATTRIBUTES__.url neq 'http://'}
                <a href="{$user.__ATTRIBUTES__.url|safetext}">{img modname='core' set='icons/extrasmall' src='agt_internet.png' title=$user.__ATTRIBUTES__.url alt=$user.__ATTRIBUTES__.url}</a>
                {else}
                &nbsp;
                {/if}
            </td>
        </tr>
        {foreachelse}
        <tr class="z-datatableempty"><td colspan="4">{gt text='No registered users are currently on-line.'}</td></tr>
        {/foreach}
    </tbody>
</table>
