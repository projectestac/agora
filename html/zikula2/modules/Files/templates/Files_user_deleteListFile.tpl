{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">{img modname='core' src='editdelete.png' set='icons/large'}</div>
        <h2>{gt text="Delete File"}</h2>
    </div>

    <dl class="z-warningmsg">
        <dt>{if $thumb eq 1}{gt text="Confirm deletion of the thumbnail of:"}{else}{gt text="Confirm deletion of:"}{/if}</dt>
        {foreach item=fileName from=$list_show}
        <dd><strong>{$fileName}</strong></dd>
        {/foreach}
    </dl>

    <form class="z-form" action="{modurl modname='Files' type='user' func='deleteListFile' hook=$hook editor=$editor}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="folder" value="{$folder}" />
            <input type="hidden" name="confirm" value="1" />
            <input type="hidden" name="external" value="{$external}" />
            <input type="hidden" name="thumb" value="{$thumb}" />
            <input type="hidden" name="hook" value="{$hook}" />
            {foreach item=file from=$listFileName}
            <input type="hidden" name="listFileName[]" value="{$file}" />
            {/foreach}
            <fieldset>
                <legend>{gt text="Confirmation prompt"}</legend>
                <div class="z-formbuttons">
                    {button src='button_ok.png' set='icons/small' altml='true' titleml='true' __alt="Accept" __title="Accept"}
                    {if $external eq 1}
                    <a href="{modurl fqurl='true' modname='Files' type='external' func='getFiles' folder=$folder hook=$hook|replace:'/':'|' editor=$editor}">
                        {img modname='core' src='button_cancel.png' set='icons/small' altml='true' titleml='true' __alt="Cancel" __title="Cancel"}
                    </a>
                    {else}
                    <a href="{modurl modname='Files' type='user' func='main' folder=$folder|replace:'/':'|' hook=$hook}">
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