{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="cubes" size="small"}
    <h3>{gt text='Categories Administration'}</h3>
</div>

<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='addcategory'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text="Add a category"}</legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />

            <div class="z-formrow">
                <label for="addcat_title">{gt text="Name"}</label>
                <input id="addcat_title" type="text" name="newcategory[title]" size="30" maxlength="100" />
            </div>

            <div class="z-formrow">
                <label for="addcat_pid">{gt text="in category"}</label>
                <select id="addcat_pid" name="newcategory[parent_id]">
                    <option value="0">{gt text="None"}</option>
                    {catlist scat=0 sel=0}
                </select>
            </div>

            <div class="z-formrow">
                <label for="addcat_description">{gt text="Description"}</label>
                <textarea id="addcat_description" name="newcategory[cdescription]" cols="65" rows="10"></textarea>
            </div>

            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Add category" __title="Add category" __text="Add category"}
            </div>
        </fieldset>
    </div>
</form>

{if $catnum>0}
<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='modcategory'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text="Modify a category"}</legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />

            <div class="z-formrow">
                <label for="modcat_cat">{gt text="Category"}</label>
                <select id="modcat_cat" name="cid">{catlist scat=0 sel=0}</select>
            </div>
            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Modify category" __title="Modify category" __text="Modify category"}
            </div>
        </fieldset>
    </div>
</form>

<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='suredelcategory'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text="Delete category"}</legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />

            <div class="z-formrow">
                <label for="suredel_cat">{gt text="Category"}</label>
                <select id="suredel_cat" name="cid">{catlist scat=0 sel=0}</select>
            </div>
            <div class="z-buttons z-formbuttons">
                {button src="button_ok.png" set="icons/extrasmall" class='z-btred' __alt="Delete category" __title="Delete category" __text="Delete category"}
            </div>
        </fieldset>
    </div>
</form>
{/if}