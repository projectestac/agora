{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">
            {img modname='core' src='edit.png' set='icons/large'}
        </div>
        <h2>{gt text="Rename file"}</h2>
    </div>

    <form class="z-form" action="{modurl modname='Files' type='user' func='renameFile' hook=$hook editor=$editor}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="confirm" value="1" />
            <input type="hidden" name="fileName" value="{$fileName|safetext}" />
            <input type="hidden" name="folder" value="{$folder|safetext}" />
            <input type="hidden" name="external" value="{$external|safetext}" />
            <input type="hidden" name="hook" value="{$hook|safetext}" />
            <fieldset>
                <legend>{gt text="Rename file"}</legend>
                <div class="z-formrow">
                    <label for="newname">{gt text="New filename"}</label>
                    <input type="text" name="newname" id="newname" value="{$fileName|safetext}" />
                </div>
            </fieldset>
            <div class="z-formbuttons">
                {button src='button_ok.png' set='icons/small' __alt="Accept" __title="Accept"}
                {if $external eq 1}
                <a href="{modurl fqurl='true' modname='Files' type='external' func='getFiles' folder=$folder|replace:'/':'|' hook=$hook editor=$editor}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"}
                </a>
                {else}
                <a href="{modurl modname='Files' type='user' func='main' folder=$folder|replace:'/':'|'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"}
                </a>
                {/if}
            </div>
        </div>
    </form>
</div>

{if $external eq 1}
{include file="Files_external_footer.tpl"}
{/if}