{if isset($userinfo.__ATTRIBUTES__)}
    {array_field array=$userinfo.__ATTRIBUTES__ field='realname' returnValue=true assign='name'}
{else}
    {assign var='name' value=''}
{/if}
{if !$name}{assign var='name' value=$uname}{/if}
{gt text="Personal info for %s" tag1=$name|@ucwords|safetext assign='templatetitle'}

{include file='profile_user_menu.tpl'}

<div id="profile_wrapper">
    {if isset($dudarray.avatar)}
    {if $dudarray.avatar eq '' or $dudarray.avatar eq 'blank.gif' or $dudarray.avatar eq 'blank.png'}
    {img modname='core' src='personal.png' set='icons/large' class='profileavatar'}
    {else}
    {modgetvar module='Users_Constant::MODNAME'|constant name='Users_Constant::MODVAR_AVATAR_IMAGE_PATH'|constant assign='avatarpath'}
    <img src="{$avatarpath}/{$dudarray.avatar|safetext}" alt="" class="profileavatar" />
    {/if}
    {/if}

    <div class="z-form">
        <div class="z-formrow">
            <strong class="z-label">{gt text='User name:'}</strong>
            <span>{$uname|safetext}</span>
        </div>
        {foreach from=$fields item='field'}
        {if $field.prop_attribute_name neq 'avatar'}
        {duditemdisplay item=$field userinfo=$userinfo}
        {/if}
        {/foreach}
        {if $pncore.Profile.viewregdate|default:1 and $userinfo.user_regdate neq '1970-01-01 00:00:00'}
        <div class="z-formrow">
            <strong class="z-label">{gt text='Registration date:'}</strong>
            <span>{$userinfo.user_regdate|dateformat:'datebrief'}</span>
        </div>
        {/if}
    </div>
</div>
