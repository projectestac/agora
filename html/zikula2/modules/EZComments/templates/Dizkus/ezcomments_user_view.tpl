<div id="ezcomments" class="ezcomments ezcomments_{$ezc_info.mod}">
    {if $comments eq true}

    <h3 id="comments_{$ezc_info.mod}_{$ezc_info.objectid}">{gt text="Comments" domain="module_ezcomments"}</h3>

    {if $mainscreen AND $allowadd}
    <a href="#commentform_{$ezc_info.mod}_{$ezc_info.objectid}">{gt text="Add a new comment" domain="module_ezcomments"}</a>
    {/if}

    {foreach from=$comments item="comment"}
    <div id="comment{$comment.id|safetext}" class="ezc_comment z-clearfix {cycle values='ezc_bg1,ezc_bg2'}" >
        <div class="ezc_author">
            <div class="ezc_avatar">
                {if $comment.anonname neq '' && $comment.anonwebsite neq ''}
                <strong><a rel="nofollow" href="{$comment.anonwebsite}">{$comment.anonname}</a></strong>
                {elseif $comment.anonname neq '' && $comment.anonwebsite eq ''}
                <strong>{$comment.anonname}</strong>
                {else}
                <strong>{$comment.uid|profilelinkbyuid}</strong>
                {/if}
                <br />
                {useravatar uid=$comment.uid}
            </div>
            <ul class="ezc_options">
                <li><strong>{gt text="Posted on" domain="module_ezcomments"} </strong></li>
                <li>{$comment.date|dateformat:'datetimebrief'}</li>
                {userloggedin assign='logged_in'}
                {if $logged_in eq true}
                <li>
                    {if $prfmodule}
                    {$comment.uid|profilelinkbyuid:'':"`$baseurl`images/icons/extrasmall/personal.png"}
                    {/if}
                    {if $msgmodule}
                    <a href="{modurl modname=$msgmodule type='user' func="newpm" uid=$comment.uid}">{img modname='core' src='mail_generic.png' set='icons/extrasmall' __title="Send mail to user" __alt="Send mail to user"}</a>
                    {/if}
                    {if $comment.del}
                    <a href="{modurl fqurl=true modname='EZComments' type='user' func='modify' id=$comment.id redirect=$redirect}">{img modname='core' src='xedit.png' set='icons/extrasmall' __title="Modify comment" __alt="Modify comment"}</a>
                    {/if}
                </li>
                {/if}
            </ul>
        </div>

        <div class="ezc_body">
            <div class="ezc_info">
                <strong class="ezc_title">{$comment.subject|default:''|safetext}</strong>
            </div>
            <div class="ezc_content">
                {$comment.comment|paragraph|notifyfilters:'subscriber.ezcomments.filter_hooks.comments'|safetext}
            </div>
        </div>
    </div>
    {foreachelse}
    <p class="z-informationmsg">{gt text="No comments posted yet." domain="module_ezcomments"}</p>
    {/foreach}

    {if $modvars.EZComments.enablepager}
    <div class="z-center">{pager show="page" rowcount=$ezc_pager.numitems limit=$ezc_pager.itemsperpage posvar=comments_startnum shift=1}</div>
    {/if}

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
                <legend>{gt text="Add a new comment" domain="module_ezcomments"}</legend>
                <div class="z-formrow">
                    <label for="subject">{gt text="Subject" domain="module_ezcomments"}</label>
                    <input type="text" name="subject" id="subject" size="50" maxlength="255" />
                </div>
                {if $logged_in neq true and $coredata.EZComments.anonusersinfo eq true}
                <div class="z-formrow">
                    <label for="anonname">{gt text="Name" domain="module_ezcomments"}{if $anonusersrequirename eq true} <span>{gt text="(required for unregistered users)" domain="module_ezcomments"}</span>{/if}</label>
                    <input type="text" name="anonname" id="anonname" size="50" maxlength="255" />
                </div>
                <div class="z-formrow">
                    <label for="anonmail">{gt text="E-mail address (will not be published)" domain="module_ezcomments"}</label>
                    <input type="text" name="anonmail" id="anonmail" size="50" maxlength="255" />
                </div>
                <div class="z-formrow">
                    <label for="anonwebsite">{gt text="Website" domain="module_ezcomments"}</label>
                    <input type="text" name="anonwebsite" id="anonwebsite" size="50" maxlength="255" />
                </div>
                {/if}
                <div class="z-formrow">
                    <label for="message">{gt text="Comment" domain="module_ezcomments"}</label>
                    <textarea name="comment" id="message" cols="60" rows="10"></textarea>
                </div>
                <div class="z-buttons z-formbuttons">
                    <input class="z-bt-icon ezc-bt-clone" type="submit" value="{gt text="Submit}" />
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
