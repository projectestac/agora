{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">{img modname='core' src='editdelete.png' set='icons/large'}</div>
        <h2>{gt text="Create zip file"}</h2>
    </div>
    <form class="z-form" action="{modurl modname='Files' type='user' func='createZipListFile'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="folder" value="{$folder}" />
            <input type="hidden" name="confirm" value="1" />
            <input type="hidden" name="external" value="{$external}" />
            <input type="hidden" name="hook" value="{$hook}" />
            <fieldset>
                <legend>{gt text="Generates a zip with this content"}</legend>
                {foreach item=fileName from=$listFileName}
                <div class="z-formnote">
                    {$fileName|safetext}
                    <input type="hidden" name="listFileName[]" value="{$fileName|safetext}" />
                </div>
                {/foreach}
                <div class="z-formrow">
                    <label for="filename">{gt text="Filename"}</label>
                    <input id="filename" name="name" size="35" value="new" type="text" />
                </div>
            </fieldset>
            <div class="z-formbuttons">
                {button src='button_ok.png' set='icons/small' altml='true' titleml='true' __alt="Accept" __title="Accept"}
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
        </div>
    </form>
</div>

{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}