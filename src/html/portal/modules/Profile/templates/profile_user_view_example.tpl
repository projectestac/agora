{array_field array=$userinfo.__ATTRIBUTES__ field='realname' returnValue=true assign='name'}
{if !$name}{assign var='name' value=$uname}{/if}
{gt text="Latest submissions of %s" tag1=$name|@ucwords|safetext assign='templatetitle'}

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
            {profilesection name='News'}
        </div>
        <div class="z-formrow">
            {profilesection name='EZComments'}
        </div>
    </div>
</div>
