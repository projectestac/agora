<div id="ezc_comments" class="ezcomments ezcomments_{$ezc_info.mod}">
    {if $comments}

    <h3 id="comments_{$ezc_info.mod}_{$ezc_info.objectid}" class="ezcomments_title">{gt text='Comments' domain='module_ezcomments'}</h3>

    {if $mainscreen AND $allowadd}
    <a href="#commentform_{$ezc_info.mod}_{$ezc_info.objectid}">{gt text='Add a new comment' domain='module_ezcomments'}</a>
    {/if}

    <ol class="ezcomments_wrapper">
        {foreach from=$comments item='comment'}
        <li id="comment{$comment.id|safetext}" class="ezc_comment z-clearfix {cycle values='ezc_odd,ezc_even'}" >
            <ul class="ezc_metadata">
                <li class="ezc_author">
                    {if $comment.uname neq ''}
                    <strong>{$comment.uid|profilelinkbyuid}</strong>
                    {elseif $comment.anonname neq ''}
                    {if $comment.anonwebsite neq ''}
                    <strong><a rel="nofollow" href="{$comment.anonwebsite}">{$comment.anonname}</a></strong>
                    {elseif $comment.anonname neq '' && $comment.anonwebsite eq ''}
                    <strong>{$comment.anonname}</strong>
                    {/if}
                    {/if}
                </li>
                <li class="ezc_avatar">
                    {useravatar uid=$comment.uid}
                </li>
                <li class="ezc_date">
                    <span>{gt text='Posted on %s' tag1=$comment.date|dateformat:'datetimebrief' domain='module_ezcomments'} </span>
                </li>
                {userloggedin assign='logged_in'}
                {if $logged_in eq true}
                <li class="ezc_options">
                    {if $msgmodule}
                    <a href="{modurl modname=$msgmodule type='user' func='newpm' uid=$comment.uid}">{img modname='core' src='mail_generic.png' set='icons/extrasmall' __title='Send mail to user' __alt='Send mail to user'}</a>
                    {/if}
                    {if $comment.del}
                    <a href="{modurl fqurl=true modname='EZComments' type='user' func='modify' id=$comment.id redirect=$redirect}">{img modname='core' src='xedit.png' set='icons/extrasmall' __title='Modify comment' __alt='Modify comment'}</a>
                    {/if}
                </li>
                {/if}
            </ul>

            <div class="ezc_tr">
                <div class="ezc_tl">
                    <div class="ezc_br">
                        <div class="ezc_bl">
                            <div class="ezc_body">
                                <div class="ezc_subject">
                                    <strong>{$comment.subject|default:''|safetext}</strong>
                                </div>
                                <div class="ezc_content">
                                    {$comment.comment|safetext|paragraph|notifyfilters:'ezcomments.hook.commentsfilter'}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        {/foreach}
    </ol>

    {if $modvars.EZComments.enablepager}
    <div class="z-center">{pager show='page' rowcount=$ezc_pager.numitems limit=$ezc_pager.itemsperpage posvar='comments_startnum' shift=1}</div>
    {/if}

    {else}
    <p class="z-informationmsg">{gt text='No comments posted yet.' domain='module_ezcomments'}</p>
    {/if}

    {if $mainscreen AND $allowadd}
    <form class="z-form z-linear" id="commentform_{$ezc_info.mod}_{$ezc_info.objectid}" action="{modurl modname='EZComments' type='user' func='create'}" method="post">
        <div>
            <input type="hidden" name="csrftoken" id="authid" value="{insert name='csrftoken'}" />
            <input type="hidden" name="redirect" id="EZComments_redirect" value="{$redirect|safetext}" />
            <input type="hidden" name="mod" id="EZComments_modname" value="{modgetname}" />
            <input type="hidden" name="owneruid" id="EZComments_owneruid" value="{$owneruid|safetext}" />
            <input type="hidden" name="useurl" id="EZComments_useurl" value="{$useurl|safetext}" />
            <input type="hidden" name="objectid" id="EZComments_objectid" value="{$objectid|safetext}" />
            <input type="hidden" name="areaid" id="EZComments_areaid" value="{$areaid|safetext}" />
            <fieldset>
                <legend>{gt text='Add a new comment' domain='module_ezcomments'}</legend>
                <div class="z-formrow">
                    <label for="subject">{gt text='Subject' domain='module_ezcomments'}</label>
                    <input type="text" name="subject" id="subject" size="50" maxlength="255" value="{$ezcomment.subject|default:''}" />
                </div>
                {if $loggedin neq true and $coredata.EZComments.anonusersinfo eq true}
                <div class="z-formrow">
                    <label for="anonname">{gt text='Name' domain='module_ezcomments'}{if $anonusersrequirename eq true} <span>{gt text='(required for unregistered users)' domain='module_ezcomments'}</span>{/if}</label>
                    <input type="text" name="anonname" id="anonname" size="50" maxlength="255" value="{$ezcomment.anonname|default:''}" />
                </div>
                <div class="z-formrow">
                    <label for="anonmail">{gt text='E-mail address (will not be published)' domain='module_ezcomments'}</label>
                    <input type="text" name="anonmail" id="anonmail" size="50" maxlength="255" value="{$ezcomment.anonmail|default:''}" />
                </div>
                <div class="z-formrow">
                    <label for="anonwebsite">{gt text='Website' domain='module_ezcomments'}</label>
                    <input type="text" name="anonwebsite" id="anonwebsite" size="50" maxlength="255" value="{$ezcomment.anonwebsite|default:''}" />
                </div>
                {/if}
                <div class="z-formrow">
                    <label for="message">{gt text='Comment' domain='module_ezcomments'}</label>
                    <textarea name="comment" id="message" cols="60" rows="10">{$ezcomment.comment|default:''}</textarea>
                </div>
                <div class="z-buttons z-formbuttons">
                    <input class="z-bt-icon ezc-bt-clone" type="submit" value="{gt text='Submit'}" />
                </div>
            </fieldset>
            {notifydisplayhooks eventname="ezcomments.ui_hooks.comments.form_edit" id=null}
        </div>
    </form>
    {elseif !$allowadd}
    <p class="z-warningmsg">
        {capture assign='registerlink'}<a href="{modurl modname='Users' type='user' func='register'}">{gt text='Register' domain='module_ezcomments'}</a>{/capture}
        {capture assign='loginlink'}<a href="{modurl modname='Users' type='user' func='loginscreen' returnpage=$returnurl|rawurlencode|rawurlencode}">{gt text='log in' domain='module_ezcomments'}</a>{/capture}
        {gt text='Only logged in users are allowed to comment. %1$s or %2$s.' tag1=$registerlink tag2=$loginlink domain='module_ezcomments'}
    </p>
    {/if}
</div>

