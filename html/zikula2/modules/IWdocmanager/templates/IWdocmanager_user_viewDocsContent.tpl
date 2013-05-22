{checkpermission component='IWdocmanager::' instance='::' level='ACCESS_ADMIN' assign='authadmin'}
{checkpermission component='IWdocmanager::' instance='::' level='ACCESS_DELETE' assign='authdelete'}
{checkpermission component='IWdocmanager::' instance='::' level='ACCESS_EDIT' assign='authedit'}
{checkpermission component='IWdocmanager::' instance='::' level='ACCESS_ADD' assign='authadd'}

<table class="z-datatable">
    <thead>
        <tr>
            <th>{gt text="Document name"}</th>
            <th>{gt text="Size"}</th>
            <th>{gt text="Description"}</th>
            <th>{gt text="Version"}</th>
            <th>{gt text="Date"}</th>
            <th>{gt text="Author"}</th>
            <th>{gt text="Downloads"}</th>
            <th>{gt text="Options"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=document from=$documents}
        <tr style="height: 30px;" {if $document.validated eq 0}class="notValiatedDocument"{/if}>
            <td width="200" style="padding: 5px;">
                {if $document.extension neq ''}
                <img src="modules/IWmain/images/fileIcons/{$document.extension}" style="vertical-align: middle;" />
                {elseif $document.documentLink neq ''}
                {img modname='core' src='web.png' set='icons/extrasmall' __alt='link'}
                {/if}
                {$document.documentName}
                {if $document.validated eq 0}
                <div class="notValidatedLabel">
                    {gt text="The document is pending of validation."}
                </div>
                {/if}
            </td>
            <td>
                {$document.filesize}
            </td>
            <td class="tableCellTop">
                {$document.description}
            </td>
            <td width="50" class="tableCellTop">
                {$document.version}
            </td>
            <td width="100" class="tableCellTop">
                {$document.cr_date|date_format:"%d/%m/%y - %H:%M"}
            </td>
            <td width="100" class="tableCellTop">
                {if $document.authorName neq ''}
                {$document.authorName}
                {else}
                {$users[$document.cr_uid]}
                {/if}
            </td>
            <td width="50" class="tableCellTop">
                {$document.nClicks}
            </td>
            <td width="100" class="tableCellTop">
                {if $authedit}
                {if $document.fileName eq '' && $document.documentLink eq ''}
                {assign var=uploadErrors value=1}
                {img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Error'}
                {else}
                {if $document.validated eq 0}
                {assign var=toValidate value=1}
                <a class="z-pointer" onClick="validateDocument({$document.documentId});">
                    {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt='Validate'}
                </a>
                {/if}
                {/if}
                {/if}
                {if $document.fileName != ''}
                <a href="{modurl modname='IWdocmanager' type='user' func='downloadDocument' documentId=$document.documentId}">
                    {img modname='core' src='download.png' set='icons/extrasmall' __alt='Download'}
                </a>
                {elseif $document.documentLink neq ''}
                <a href="{$document.documentLink}" target="_blank" onClick="openDocumentLink({$document.documentId});">
                    {img modname='core' src='web.png' set='icons/extrasmall' __alt='Browse website'}
                </a>
                {/if}
                {if $document.fileName neq '' AND ($canAdd || $authadd) AND $document.validated eq 1 AND $document.versioned lt 1}
                <a href="{modurl modname='IWdocmanager' type='user' func='editDocument' documentId=$document.documentId newVersion=1}">
                    {img modname='core' src='filenew.png' set='icons/extrasmall' __alt='New version'}
                </a>
                {/if}                
                {if $authedit OR $document.canEdit}
                <a href="{modurl modname='IWdocmanager' type='user' func='editDocument' documentId=$document.documentId}">
                    {img modname='core' src='xedit.png' set='icons/extrasmall' __alt='Edit'}
                </a>
                {/if}
                {if $authdelete OR $document.canDelete}
                <a class="z-pointer" onClick="deleteDocument({$document.documentId});">
                    {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt='Delete'}
                </a>
                {/if}
                {if $document.versionFrom neq '' AND not isset($versionsVision)}
                {assign var=versions value=1}
                <a class="z-pointer" onClick="viewDocumentVersions({$document.documentId});">
                    {img modname='core' src='mydocuments.png' set='icons/extrasmall' __alt='View versions'}
                </a>
                {/if}
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="10">
                {gt text="No documents found in this category."}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>

<h3>{gt text="Options legend"}</h3>
<ul>
    {if $authadmin}
    {if isset($toValidate)}
    <li>{img modname='core' src='button_ok.png' set='icons/extrasmall' __alt='Validate'} {gt text="The document is pending of validation."}</li>
    {/if}
    {if isset($uploadErrors)}
    <li>{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Error'} {gt text="Error during the upload process. The document should be deleted or modified."}</li>
    {/if}
    {/if}
    <li>{img modname='core' src='download.png' set='icons/extrasmall' __alt='Download'} {gt text="Download document"}</li>
    {if not isset($versionsVision)}
    <li>{img modname='core' src='web.png' set='icons/extrasmall' __alt='Browse'} {gt text="Browse website"}</li>
    {/if}
    {if $canAdd}
    <li>{img modname='core' src='filenew.png' set='icons/extrasmall' __alt='New version'} {gt text="Add a new version of the document"}</li>
    {/if}
    {if $authedit OR $canEdit}
    <li>{img modname='core' src='xedit.png' set='icons/extrasmall' __alt='Edit'} {gt text="Edit document information"}</li>
    {/if}
    {if $authdelete OR $canDelete}
    <li>{img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt='Delete'} {gt text="Delete document"}</li>
    {/if}
    {if isset($versions)}
    <li>{img modname='core' src='mydocuments.png' set='icons/extrasmall' __alt='View versions'} {gt text="View versions"}</li>
    {/if}
</ul>

<script>
    var deteleText = '{{gt text="Confirm deletion!"}}';
</script>