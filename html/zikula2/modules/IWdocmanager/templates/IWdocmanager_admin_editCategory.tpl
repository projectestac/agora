<div class="z-adminpageicon">
    {img modname='core' src='xedit.png' set='icons/large' __alt=''}
</div>
<h2>
    {gt text="Edit the category"}: {$category.categoryName}
</h2>
<form class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="edit_{$category.categoryId}">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="categoryId" value="{$category.categoryId}" />
    <div class="z-formrow">
        <label for="categoryName">{gt text="Name of the category"}</label>
        <input type="text" id="categoryName" name="categoryName" value="{$category.categoryName}" />
    </div>
    <div class="z-formrow">
        <label for="description">{gt text="Description of the category"}</label>
        <textarea id="description" name="description">{$category.description}</textarea>
    </div>
    <div class="z-formrow">
        <label>{gt text="Choose the groups with acces to this category"}</label>
        <div class="z-formnote">
            {foreach item=group from=$groups}
            <input type="checkbox" {if in_array($group.id, $category.groupsArray)}checked="checked"{/if} name="groups[]" value="{$group.id}" /> {$group.name}
                   <br />
            {/foreach}
        </div>
    </div>
    <div class="z-formrow">
        <label>{gt text="Choose the groups that can add documents to this category"}</label>
        <div class="z-formnote">
            {foreach item=group from=$groups}
            {if $group.id neq '-1'} {* Discard unregistered users *}
            <input type="checkbox" {if in_array($group.id, $category.groupsAddArray)}checked="checked"{/if} name="groupsAdd[]" value="{$group.id}" /> {$group.name}
                   <br />
            {/if}
            {/foreach}
            </ul>
        </div>
        <div class="z-formrow">
            <label for="active">{gt text="Active"}</label>
            <input type="checkbox" id="active" {if $category.active eq 1}checked="checked"{/if} name="active" value="1" />
        </div>
        <div class="z-center">
            <span class="z-buttons">
                <a class="z-pointer" onClick="updateCategory({$category.categoryId});">
                    {img modname='core' src='button_ok.png' set='icons/large' __alt='Send'}
                    {gt text="Send"}
                </a>
            </span>
            <span class="z-buttons">
                <a class="z-pointer" onClick="cancelCreateCategory({$category.categoryId});">
                    {img modname='core' src='button_cancel.png' set='icons/large' __alt='Cancel'}
                    {gt text="Cancel"}
                </a>
            </span>
        </div>
</form>
