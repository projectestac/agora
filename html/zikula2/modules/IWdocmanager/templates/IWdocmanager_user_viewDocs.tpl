{checkpermission component='IWdocmanager::' instance='::' level='ACCESS_EDIT' assign='authedit'}
{include file="IWdocmanager_user_menu.htm"}

<h2>{gt text="Documents list"}</h2>

{if $categoryId gt 0}
{include file="IWdocmanager_user_viewDocsCatTitle.tpl"}
<div class="categoryListRow" style="margin-bottom: 15px;">
    <div class="categoryNameList">
        {$categories[$categoryId].categoryPathLinks}
    </div>
    <div class="categorynDocumentsList">
        {$categories[$categoryId].nDocuments}{if $authedit}/<span style="color: red;">{$categories[$categoryId].nDocumentsNV}</span>{/if}
    </div>
    <div class="categoryDescriptionList">
        {$categories[$categoryId].description}
    </div>
    <div class="z-clearer"></div>
</div>
<div id="documentsContent">
{$documentsContent}
</div>
{else}
{include file="IWdocmanager_user_viewDocsCatTitle.tpl"}
{foreach item=category from=$categories}
<div class="categoryListRow">
    <div class="categoryNameList" style="padding-left: {$category.padding};">
        <a href="{modurl modname='IWdocmanager' type='user' func='viewDocs' categoryId=$category.categoryId}">
            {$category.categoryName}
        </a>
    </div>
    <div class="categorynDocumentsList">
        {$category.nDocuments}{if $authedit}/<span style="color: red;">{$category.nDocumentsNV}</span>{/if}
    </div>
    <div class="categoryDescriptionList">
        {$category.description}
    </div>
    <div class="z-clearer"></div>
</div>
{foreachelse}
<div>
    {gt text="You can access any category."}
</div>
{/foreach}
{/if}