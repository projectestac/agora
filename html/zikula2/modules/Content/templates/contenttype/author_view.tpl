{usergetvar name="_YOURAVATAR" uid=$uid assign="avatar"}
{usergetvar name="_EXTRAINFO" uid=$uid assign="extrainfo"}
{usergetvar name="_UREALNAME" uid=$uid assign="realname"}
<div class="content-author">
    <h3>{gt text="By"} {if $realname}{$realname}{else}{usergetvar name="uname" uid=$uid}{/if}</h3>

    <div class="z-clearfix">
        {if isset($avatar) AND !empty($avatar) AND $avatar neq 'blank.gif' AND $avatar neq 'gravatar.gif'}
        <img src="{$baseurl}images/avatar/{$avatar}" alt="{usergetvar name="_UREALNAME" uid=$uid}" class="authoravatar" />
        {/if}
        {if $extrainfo}
        <p>{usergetvar name="_EXTRAINFO" uid=$uid}</p>
        {/if}
    </div>
</div>