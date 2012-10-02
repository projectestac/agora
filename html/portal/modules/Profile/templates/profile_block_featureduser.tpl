{modgetvar module='Users_Constant::MODNAME'|constant name='Users_Constant::MODVAR_AVATAR_IMAGE_PATH'|constant assign='avatarpath'}

<div class="profile-block-featureduser">
    <h5>{$userinfo.uname|profilelinkbyuname}</h5>
    <p>
        {if @isset($userinfo.__ATTRIBUTES__.avatar) and $userinfo.__ATTRIBUTES__.avatar neq '' and $userinfo.__ATTRIBUTES__.avatar neq 'blank.gif' and $userinfo.__ATTRIBUTES__.avatar neq 'blank.png'}
        {$userinfo.uname|profilelinkbyuname:'':"`$avatarpath`/`$userinfo.__ATTRIBUTES__.avatar`"}
        {else}
        {img modname='core' src='personal.png' set='icons/large' assign='profileicon'}
        {$userinfo.uname|profilelinkbyuname:'profileicon':$profileicon}
        {/if}
    </p>
    {foreach from=$dudarray key='dudlabel' item='dudvalue'}
        <p><strong>{gt text=$dudlabel}</strong><br />{$dudvalue|safehtml}</p>
    {/foreach}
    {if $showregdate}
        <span>{gt text='Registered on %s' tag1=$userinfo.user_regdate|dateformat:'datebrief'}</span>
    {/if}
</div>
