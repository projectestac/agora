{include file="ephemerids_admin_menu.tpl"}
{gt text="Edit ephemerid" assign=templatetitle}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=edit.png set=icons/large}</div>
    <h2>{$templatetitle}</h2>
    <form class="z-form" action="{modurl modname='Ephemerids' type='admin' func='update'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="ephemerid[eid]" value="{$item.eid|safetext}" />
            <fieldset>
                <legend>{$templatetitle}</legend>
                <div class="z-formrow">
                    <label for="ephemerids_date">{gt text="Date"}</label>
                    <div id="ephemerids_date">{html_select_date year_as_text=true time=$item.date field_array=ephemerid}</div>
                    <p class="z-formnote z-warningmsg">{gt text="The year can't be lower than the unix epoch one (1970) or will be reseted to 1970 for formatting purposes."}</p>
                </div>
                {if $multilingual}
                <div class="z-formrow">
                    <label for="ephemerids_language">{gt text="Language"}</label>
                    {html_select_locales id=ephemerids_language name=ephemerid[language] all=true installed=true selected=$item.language}
                </div>
                {/if}
                <div class="z-formrow">
                    <label for="ephemerids_content">{gt text="Content"}</label>
                    <textarea id="ephemerids_content" name="ephemerid[content]" cols="50" rows="8">{$item.content|safetext}</textarea>
                </div>
            </fieldset>
            <div class="z-formbuttons">
                {button src=button_ok.png set=icons/small __alt="Save" __title="Save"}
                <a href="{modurl modname='Ephemerids' type='admin' func='view'}">
                    {img modname=core src=button_cancel.png set=icons/small __alt="Cancel" __title="Cancel"}
                </a>
            </div>
        </div>
    </form>
</div>
