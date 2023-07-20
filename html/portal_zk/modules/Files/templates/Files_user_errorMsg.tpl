{if isset($external) AND $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

{insert name="getstatusmsg"}
<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">{img modname='core' src='lists.png' set='icons/large'}</div>
        <h2>{gt text="List of files in folder"}</h2>
    </div>
    <div class="z-errormsg">{$errorMsg}</div>
</div>

{if isset($external) AND $external eq 1}
{include file="Files_external_footer.tpl"}
{/if}