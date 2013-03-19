{if $categories|@count gt 0}
<div class="tablehead IWdocmanager_item" style="padding-left: 7px;">
    <div class="IWdocmanager_left">
        <div class="IWdocmanager_categoryId">
            {gt text="Id"}
        </div>
        <div class="IWdocmanager_main">
            {gt text="Nom de la categoria"}
            <div class="IWdocmanager_description">
                {gt text="Description"}
            </div>
        </div>
    </div>
    <div class="IWdocmanager_actions">
        {gt text="Actions"}
    </div>
    <div class="IWdocmanager_groupsAdd">
        {gt text="Groups that can add"}
    </div>
    <div class="IWdocmanager_groupsAdd">
        {gt text="Groups that can access"}
    </div>
</div>

{foreach item=category from=$categories}
<div id="categoryId_{$category.categoryId}">
    <div class="IWdocmanager_item {if $category.active eq 1}IWdocmanager_active{else}IWdocmanager_inactive{/if}">
        <div class="IWdocmanager_categoryId">
            {$category.categoryId}
        </div>
        <div class="IWdocmanager_left" style="padding-left:{$category.padding};">
            {if $category.level neq ''}
            <div class="IWdocmanager_level">
                {$category.level}
            </div>
            {/if}
            <div class="IWdocmanager_main">
                {$category.categoryName}
                <div class="IWdocmanager_description">
                    {$category.description|nl2br}
                </div>
            </div>
        </div>
        <div class="IWdocmanager_actions">
            <a class="z-pointer" onclick="editCategory({$category.categoryId})">
                {img modname='core' src='xedit.png' set='icons/extrasmall' __alt="Edit" __title="Edit"}
            </a>
            <a class="z-pointer" onclick="deleteCategory({$category.categoryId})">
                {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete" __title="Delete"}
            </a>
            <a class="z-pointer" onclick="addCategory({$category.categoryId})" title="{gt text='Submenu'}">
                {img modname='IWdocmanager' src='subcategory.png' __alt="Submenu" __title="Submenu"}
            </a>
        </div>
        <div class="IWdocmanager_groupsAdd">
            <div class="IWdocmanager_group">
                {foreach item=group from=$category.groupsAddArray}
                <div>
                    {$groups[$group]}
                </div>
                {foreachelse}
                <div>
                    {gt text="No groups"}
                </div>
                {/foreach}
            </div>
        </div>
        <div class="IWdocmanager_groups">
            <div class="IWdocmanager_group">
                {foreach item=group from=$category.groupsArray}
                <div>
                    {$groups[$group]}
                </div>
                {foreachelse}
                <div>
                    {gt text="No groups"}
                </div>
                {/foreach}
            </div>
        </div>
        <div class="z-clearer" id="newCategory_{$category.categoryId}"></div>
    </div>
</div>
{/foreach}
{else}
{gt text="There is no root categories defined."}
{/if}
<div class="z-clearer"></div>