{if $usersonline}
<ul>
    {foreach item='user' from=$usersonline}
    <li>
        {$user.uname|profilelinkbyuname:'':'':$maxLength}
        {if $msgmodule}{modurl modname=$msgmodule type='user' func='inbox' assign="messageslink"}
        {if $user.uid eq $uid}
        (<a href="{$messageslink|safehtml}" title="{gt text='unread'}">{$messages.unread}</a> | <a href="{$messageslink|safehtml}" title="{gt text='total'}">{$messages.totalin}</a>)
        {else}
        <a href="{modurl modname=$msgmodule type='user' func='newpm' uid=$user.uid}" title="{gt text='Send private message'}&nbsp;{$user.uname|safehtml}">{img modname='core' set='icons/extrasmall' src='mail_new.png' __alt='Send private message' style='vertical-align:middle; margin-left:2px;'}</a>
        {/if}
        {/if}
    </li>
    {/foreach}
</ul>
{/if}
<p>
    {if $anononline eq 0}
    {gt text='%s registered user' plural='%s registered users' count=$membonline tag1=$membonline assign='blockstring'}
    {gt text='%s on-line.' tag1=$blockstring}
    {elseif $membonline eq 0}
    {gt text='%s anonymous guest' plural='%s anonymous guests' count=$anononline tag1=$anononline assign='blockstring'}
    {gt text='%s on-line.' tag1=$blockstring}
    {else}
    {gt text='%s registered user' plural='%s registered users' count=$membonline tag1=$membonline assign='nummeb'}
    {gt text='%s anonymous guest' plural='%s anonymous guests' count=$anononline tag1=$anononline assign='numanon'}
    {gt text='%1$s and %2$s online.' tag1=$nummeb tag2=$numanon}
    {/if}
</p>
