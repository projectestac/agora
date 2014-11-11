{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">{img modname='core' src='xedit.png' set='icons/large'}</div>
        <h2>{gt text="Edit file"}</h2>
    </div>

    <form class="z-form" action="{modurl modname='Files' type='user' func='editFile'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="folder" value="{$folder}" />
            <input type="hidden" name="confirm" value="1" />
            <input type="hidden" name="external" value="{$external}" />
            <input type="hidden" name="fileName" value="{$fileName}" />
            <fieldset>
                <legend>{gt text="%s/%s" tag1=$folder tag2=$fileName}</legend>
                <div>
                    <textarea name="fileContent" class="editTextArea">{$fileContent}</textarea>
                </div>
                <div class="z-formbuttons">
                    {button src='button_ok.gif' set='icons/small' altml='true' titleml='true' __alt="Accept" __title="Accept"}
                    {if $external eq 1}
                    <a href="{modurl fqurl='true' modname='Files' type='external' func='getFiles' folder=$folder|replace:'/':'|' hook=$hook}">
                        {img modname='core' src='button_cancel.png' set='icons/small' altml='true' titleml='true' __alt="Cancel" __title="Cancel"}
                    </a>
                    {else}
                    <a href="{modurl modname='Files' type='user' func='main' folder=$folder|replace:'/':'|'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' altml='true' titleml='true' __alt="Cancel" __title="Cancel"}
                    </a>
                    {/if}
                </div>
            </fieldset>
        </div>
    </form>
</div>

{if $external eq 1}
{include file="Files_external_footer.tpl"}
{/if}