{include file="user/header.tpl"}
<div class="wl-borderbox">
    {if $addlink == 1}
    <dl>
        <dt>{gt text="Instructions"}:</dt>
        <dd>{gt text="Please submit each link only once."}</dd>
        <dd>{gt text="All links are reviewed before being posted online."}</dd>
        <dd>{gt text="Your user name and IP are recorded, so please don't abuse the system."}</dd>
    </dl>

    <form class="z-form" action="{modurl modname="Weblinks" type="user" func="add"}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
            <fieldset>
                <legend>{gt text="Add a new link"}</legend>

                <div class="z-formrow">
                    <label for="add_title">{gt text="Site title"}:</label>
                    <input id="add_title" type="text" name="newlink[title]" size="50" maxlength="100" />
                </div>
                <div class="z-formrow">
                    <label for="add_url">{gt text="Page URL"}:</label>
                    <input id="add_url" type="text" name="newlink[url]" size="75" maxlength="254" value="http://" />
                </div>
                <div class="z-formrow">
                    <label for="add_cat">{gt text="Category"}:</label>
                    <select id="add_cat" name="newlink[cat_id]">{catlist scat=0 sel=0}</select>
                </div>
                <div class="z-formrow">
                    <label for="add_description">{gt text="Description (255 characters max)"}:</label>
                    <textarea id="add_description" name="newlink[description]" cols="65" rows="10"></textarea>
                </div>
                <div class="z-formrow">
                    <label for="add_nname">{gt text="Your name"}:</label>
                    <input id="add_nname" type="text" name="newlink[name]" size="30" maxlength="60" value="{$submitter}" />
                </div>
                <div class="z-formrow">
                    <label for="add_email">{gt text="Your e-mail address"}:</label>
                    <input id="add_email" type="text" name="newlink[email]" size="30" maxlength="60" value="{$submitteremail}" />
                </div>
            </fieldset>
                {notifydisplayhooks eventname='weblinks.ui_hooks.link.ui_edit' id=null}
            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Add this URL" __title="Add this URL" __text="Add this URL"}
                <a class='z-btred' href="{modurl modname='Weblinks' type='user' func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
            </div>
        </div>
    </form>

    {else}
    <div class="z-informationmsg">
        {gt text="Sorry! You are not a registered user or you have not logged-in."}<br />
        {gt text="If you were registered, you could contribute links to this web site."}<br />
        {gt text="Becoming a registered user is a quick and easy process."}<br />
        {gt text="Why is registration required for access to certain features?"}<br />
        {gt text="So that you are offered only the highest-quality content,"}<br />
        {gt text="each item is individually reviewed and approved."}<br />
        {gt text="The site editor aims to offer useful information only."}<br />
        <a href="index.php?module=Users&func=register">{gt text="Register for a new user account"}</a>
    </div>
    {/if}
</div>
{include file="user/footer.tpl"}