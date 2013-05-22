{insert name="getstatusmsg"}
<h1>{gt text="Intraweb main module"}</h1>
<h2>{gt text="User configurable values"}</h2>
<form  class="z-form" enctype="multipart/form-data" method="post" name="conf" id="conf" action="{modurl modname='IWmain' type='user' func='updateconfig'}">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <fieldset>
        <legend>{gt text="News and marked blocks"}</legend>
        <div>
            {gt text="I want that block will show details"}
            {if $blockFlaggedDetails}
            <input type="checkbox" checked="checked" name="details" />
            {else}
            <input type="checkbox" name="details" />
            {/if}
        </div>
        {if isset($cronNotWorks) && $cronNotWorks eq 1}
        {checkpermission component='IWusers::' instance='::' level='ACCESS_ADMIN' assign='authadmin'}
        {if $authadmin}
        <div class="z-errormsg">
            {gt text="It has not worked (only visible for administrators)."}
        </div>
        {/if}
        {elseif $userMail == ''}
        <div class="z-errormsg">
            {gt text="If you want the system would be able to send you emails with a dayly resume of things to see, but it is not possible because your email has not been found. You can define your email address form"}
            <a href="{modurl type='user' modname='profile' func='modify'}">
                {gt text="this link."}
            </a>
        </div>
        {else}
        <div>
            {gt text="I want to be subscribed to thinks to see"}
            {if $subscribeNews}
            <input type="checkbox" checked="checked" name="cron" />
            {else}
            <input type="checkbox" name="cron" />
            {/if}
            ({gt text="The subscrition mail is:"} {$userMail})
        </div>
        <input type="hidden" name="cronWorks" value="1" />
        {/if}
    </fieldset>
    <div style="clear:both; height: 20px">&nbsp;</div>
    {* Working on it *}
    {if $zendFuncAvailable == 1}
    <fieldset>
        <legend>{gt text="Google account"}</legend>
        <div>
            {gt text="Sincronize agenda with Google calendar"}
            {if $gCalendarUse}
            <input type="checkbox" checked="checked" name="gCalendarUse" onchange="javascript:activeGoogleUserAcoountData()" />
            {else}
            <input type="checkbox" name="gCalendarUse" onchange="javascript:activeGoogleUserAcoountData()" />
            {/if}
        </div>
        <div id="googleUser" {if not $gCalendarUse} style="display: none;" {/if}>
             <div>
                {gt text="Google e-mail"}
                <input type="text" name="gUserName" value="{$gUserName}" />
            </div>
            <div>
                {gt text="Google password"}
                <input type="password" name="gUserPass" value="" autocomplete="off" />
            </div>
            <div>
                {gt text="Refresh time for gCalendar sincronitation"}
                <select name="gRefreshTime">
                    <option {if $gRefreshTime eq 15}selected{/if}>15</option>
                    <option {if $gRefreshTime eq 30}selected{/if}>30</option>
                    <option {if $gRefreshTime eq 45}selected{/if}>45</option>
                    <option {if $gRefreshTime eq 60}selected{/if}>60</option>
                </select>
            </div>
            <div style="margin-top: 20px;" class="z-informationmsg">
                {gt text="As many small this value the navigation into agendas will be slower. In any moment the automatical sincronization is possible"}
            </div>
        </div>
    </fieldset>
    <div style="clear:both; height: 20px"></div>
    {/if}
    {* soon available *}
    <div class="z-center z-buttons">
        <a onclick="javascript: forms['conf'].submit();">
            {img modname='core' src='button_ok.png' set='icons/small' __alt="OK" __title="OK"} {gt text="OK"}
        </a>
    </div>
</form>