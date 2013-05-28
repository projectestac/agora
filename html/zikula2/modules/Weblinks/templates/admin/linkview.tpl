{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Links Administration'}</h3>
</div>

{if $catnum>0}
<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='addlink'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text="Add link"}</legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
            <input type="hidden" name="link[submitter]" value="{$submitter}" />

            <div class="z-formrow">
                <label for="addlink_title">{gt text="Page title"}</label>
                <input id="addlink_title" type="text" name="link[title]" size="50" maxlength="100" />
            </div>
            <div class="z-formrow">
                <label for="addlink_url">{gt text="URL"}</label>
                <input id="addlink_url" type="text" name="link[url]" size="65" maxlength="254" value="http://" />
            </div>
            <div class="z-formrow">
                <label for="addlink_cat">{gt text="Category"}</label>
                <select id="addlink_cat" name="link[cat_id]">{catlist scat=0 sel=0}</select>
            </div>
            <div class="z-formrow">
                <label for="addlink_description">{gt text="Description (255 characters max)"}</label>
                <textarea id="addlink_description" name="link[description]" cols="65" rows="10"></textarea>
            </div>
            <div class="z-formrow">
                <label for="addlink_name">{gt text="Name"}</label>
                <input id="addlink_name" type="text" name="link[name]" size="30" maxlength="60" value="{$submitter}" />
            </div>
            <div class="z-formrow">
                <label for="addlink_email">{gt text="E-mail address"}</label>
                <input id="addlink_email" type="text" name="link[email]" size="30" maxlength="60" value="{$submitteremail}" />
            </div>
            {notifydisplayhooks eventname='weblinks.ui_hooks.link.ui_edit' id=null}
            
            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Add link" __title="Add link" __text="Add link"}
            </div>
        </fieldset>
    </div>
</form>

    {if $numrows>0}
    <form class="z-form" action="{modurl modname='Weblinks' type='admin' func='modlink'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <fieldset>
                <legend>{gt text="Modify/Delete a link"}</legend>
                <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
                <div class="z-formrow">
                    <label for="modlink_lid">{gt text="Link ID"}</label>
                    <input id="modlink_lid" type="text" name="lid" size="12" maxlength="11" />
                </div>
            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Modify link" __title="Modify link" __text="Modify link"}
            </div>
            </fieldset>
        </div>
    </form>
    {/if}
{else}
    {gt text="No link found"}
{/if}