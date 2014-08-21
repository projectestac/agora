{usergetvar name="avatar" uid=$authoruid assign="avatar"}
{usergetvar name="extrainfo" uid=$authoruid assign="extrainfo"}
{usergetvar name="realname" uid=$authoruid assign="realname"}
<div class="content-author">
    <h3>{gt text="By"} {if $realname}{$realname}{else}{usergetvar name="uname" uid=$authoruid}{/if}</h3>

    <div class="z-clearfix">
        {if isset($avatar) AND !empty($avatar) AND $avatar neq 'blank.gif' AND $avatar neq 'gravatar.gif'}
        <img src="{$baseurl}images/avatar/{$avatar}" alt="{usergetvar name="realname" uid=$authoruid}" class="authoravatar" />
        {/if}
        {if $extrainfo}
        <p>{usergetvar name="extrainfo" uid=$authoruid}</p>
        {/if}
    </div>
</div>