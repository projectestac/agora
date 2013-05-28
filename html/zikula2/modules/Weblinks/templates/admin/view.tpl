{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="info" size="small"}
    <h3>{gt text='Overview'}</h3>
</div>

<h3>{gt text="Status"}</h3>
<p>{gt text="There are"} <strong>{$numrows}</strong> {gt text="link" plural="links" count=$numrows} {gt text="and"} <strong>{$catnum}</strong> {gt text="category" plural="categories" count=$catnum} {gt text="in the database"}</p>

{if $totalbrokenlinks gt 0 || $totalmodrequests gt 0}
<div class="z-warningmsg">
    <ul>
        <li><a href="{modurl modname='Weblinks' type='admin' func='listbrokenlinks'}">{gt text="Broken link reports"} ({$totalbrokenlinks|safetext})</a></li>
        <li><a href="{modurl modname='Weblinks' type='admin' func='listmodrequests'}">{gt text="Link modification requests"} ({$totalmodrequests|safetext})</a></li>
    </ul>
</div>
{/if}

<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='validate'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text="Link validation"}</legend>
            <div class="z-formrow">
                <label for="vat_cid">{gt text="Check category"}</label>
                <select id="vat_cid" name="cid"><option value="0">{gt text="Check ALL categories"}</option>{catlist scat=0 sel=0}</select>
            </div>
            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Validate Categories" __title="Validate Categories" __text="Validate Categories"}
            </div>
        </fieldset>
    </div>
</form>

{if $newlinks}

    <h3>{gt text="Links awaiting validation"}</h3>

    {foreach from=$newlinks item='link'}
    <form class="z-form" action="{modurl modname='Weblinks' type='admin' func='addlink'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <fieldset>
                <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
                <input type="hidden" name="link[new]" value="1" />
                <input type="hidden" name="link[lid]" value="{$link.lid|safetext}" />
                <input type="hidden" name="link[submitter]" value="{$link.submitter|safetext}" />
                <legend>{gt text="Link ID"}: <strong>{$link.lid}</strong></legend>
                <div class="z-formrow">
                    <label>{gt text="Submitter"}</label>
                    <span>{$link.submitter|safetext}</span>
                </div>
                <div class="z-formrow">
                    <label for="addlink_title">{gt text="Page title"}</label>
                    <input id="addlink_title" type="text" name="link[title]" value="{$link.title|safetext}" size="50" maxlength="100" />
                </div>
                <div class="z-formrow">
                    <label for="addlink_url">{gt text="URL"} [ <a target="_blank" href="{$link.url|safetext}">{gt text="Visit"}</a> ]
                        {if $link.valid}
                            {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt="validates" __title="validates"}
                        {else}
                            {img modname='core' src='editdelete.png' set='icons/extrasmall' __alt="invalid!" __title="invalid!"}
                        {/if}
                    </label>
                    <input id="addlink_url" type="text" name="link[url]" value="{$link.url|safetext}" size="65" maxlength="254" />
                </div>
                <div class="z-formrow">
                    <label for="addlink_cat">{gt text="Category"}</label>
                    <select id="addlink_cat" name="link[cat_id]">{catlist scat=0 sel=$link.category.cat_id}</select>
                </div>
                <div class="z-formrow">
                    <label for="addlink_description">{gt text="Description"}</label>
                    <textarea id="addlink_description" name="link[description]" cols="65" rows="10">{$link.description|safehtml}</textarea>
                </div>
                <div class="z-formrow">
                    <label for="addlink_name">{gt text="Name"}</label>
                    <input id="addlink_name" type="text" name="link[name]" size="20" maxlength="100" value="{$link.name|safetext}" />
                </div>
                <div class="z-formrow">
                    <label for="addlink_email">{gt text="E-mail address"}</label>
                    <input id="addlink_email" type="text" name="link[email]" size="20" maxlength="100" value="{$link.email|safetext}" />
                </div>
                {notifydisplayhooks eventname='weblinks.ui_hooks.link.ui_edit' id=$link.lid"}
                <div class="z-buttons z-formbuttons">
                    {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Add link" __title="Add link" __text="Add link"}
                    <a class='z-btred' href="{modurl modname='Weblinks' type='admin' func='dellink' lid=$link.lid}" title="{gt text="Delete link"}">{img modname='core' src="editdelete.png" set="icons/extrasmall" __alt="Delete link" __title="Delete link"} {gt text="Delete link"}</a>
                </div>
            </fieldset>
        </div>
    </form>
    {/foreach}

{/if}