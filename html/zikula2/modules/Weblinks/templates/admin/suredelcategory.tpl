{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="cubes" size="small"}
    <h3>{gt text='Delete Category'}</h3>
</div>

<form class="z-form" action="{modurl modname='Weblinks' type='admin' func='delcategory'}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <fieldset>
            <legend>{gt text="Delete Category"}</legend>
            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
            <input type="hidden" name="cid" value="{$category->getCat_id()}" />

            <div class="z-formrow">
                <p class='z-warningmsg'>{gt text="Are you sure you want to delete the <strong>%s</strong> category?<br />ALL subcategories and ALL links in this category and these subcategories WILL BE DELETED!" tag1=$category->getTitle()}</p>
                <p>{gt text='The following categories <strong>and the links within</strong> them will be deleted.'}</p>
                <ul>
                {foreach from=$affectedcategories key='key' item='aCat'}
                    <li>{$aCat.title} (#{$key}): {$aCat.count} {gt text='link' plural='links' count=$aCat.count}</li>
                {/foreach}
                </ul>
            </div>
        </fieldset>

        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" class='z-btred' __alt="Delete Category" __title="Delete Category" __text="Delete Category"}
            <a class='z-btred' href="{modurl modname='Weblinks' type='admin' func='catview'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>

    </div>
</form>