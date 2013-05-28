{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Modify Link'}</h3>
</div>

<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='modlinks'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text="Modify/Delete a link"} - {gt text="Link ID"}: <strong>{$link.lid|safetext}</strong></legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
            <input type="hidden" name="link[lid]" value="{$link.lid|safetext}" />
            <div class="z-formrow">
                <label for="modlinks_title">{gt text="Page title"}</label>
                <input id="modlinks_title" type="text" name="link[title]" value="{$link.title|safetext}" size="50" maxlength="100" />
            </div>
            <div class="z-formrow">
                <label for="modlinks_url">{gt text="URL"} [ <a href="{$link.url}">{gt text="Visit"}</a> ]</label>
                <input id="modlinks_url" type="text" name="link[url]" value="{$link.url|safetext}" size="65" maxlength="254" />
            </div>
            <div class="z-formrow">
                <label for="modlinks_description">{gt text="Description:"}</label>
                <textarea id="modlinks_description" name="link[description]" cols="65" rows="10">{$link.description|safehtml}</textarea>
            </div>
            <div class="z-formrow">
                <label for="modlinks_name">{gt text="Name"}</label>
                <input id="modlinks_name" type="text" name="link[name]" size="50" maxlength="100" value="{$link.name|safetext}" />
            </div>
            <div class="z-formrow">
                <label for="modlinks_email">{gt text="E-mail adress"}</label>
                <input id="modlinks_email" type="text" name="link[email]" size="50" maxlength="100" value="{$link.email|safetext}" />
            </div>
            <div class="z-formrow">
                <label for="modlinks_hits">{gt text="Hits"}</label>
                <input id="modlinks_hits" type="text" name="link[hits]" value="{$link.hits|safetext}" size="12" maxlength="11" />
            </div>
            <div class="z-formrow">
                <label for="modlinks_cat">{gt text="Category"}</label>
                <select id="modlinks_cat" name="link[cat_id]">{catlist scat=0 sel=$link.category.cat_id}</select>
            </div>
        </fieldset>
        {notifydisplayhooks eventname='weblinks.ui_hooks.link.ui_edit' id=$link.lid}
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Modify link" __title="Modify link" __text="Modify link"}
            <a class='z-btred' href="{modurl modname='Weblinks' type='admin' func='dellink' lid=$link.lid}" title="{gt text="Delete link"}">{img modname='core' src="editdelete.png" set="icons/extrasmall" __alt="Delete link" __title="Delete link"} {gt text="Delete link"}</a>
        </div>
    </div>
</form>