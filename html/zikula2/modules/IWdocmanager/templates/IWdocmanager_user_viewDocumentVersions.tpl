<div class="IWdocmanager_documentOrigin">
    <div>
        {gt text="Document name"}: <strong>{$documentOrigin.documentName}</strong>
        {if $documentOrigin.extension neq ''}
        <img src="modules/IWmain/images/fileIcons/{$documentOrigin.extension}.gif" style="vertical-align: baseline;" />
        {/if}
    </div>
    <div>
        {gt text="Size"}: {$documentOrigin.filesize}
    </div>
    <div>
        {gt text="Description"}: {$documentOrigin.description}
    </div>
    <div>
        {gt text="Version"}: {$documentOrigin.version}
    </div>
    <div>
        {gt text="Creation date"}: {$documentOrigin.cr_date|date_format:"%d/%m/%y - %H:%M:%S"}
    </div>
    <div>
        {gt text="Author"}:
        {if $documentOrigin.authorName neq ''}
        {$documentOrigin.authorName}
        {else}
        {$users[$documentOrigin.cr_uid]}
        {/if}
    </div>
</div>

<h2>
    {gt text="Versions of this document"}
</h2>
{include file="IWdocmanager_user_viewDocsContent.tpl"}
<div>
    <a class="z-pointer" onclick="viewDocuments({$documentOrigin.documentId});">
        {gt text="View documents in category"}
    </a>
</div>