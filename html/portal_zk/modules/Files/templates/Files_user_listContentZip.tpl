{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

<div class="files_container z-form">
    <div class="z-clearfix">
        <div class="userpageicon">{img modname='core' src='edit.png' set='icons/large'}</div>
        <h2>{gt text="The list of the archive content"} {$folder}</h2>
    </div>
    <div class="z-fieldset">
        {foreach item=list from=$list}
        {$list.index} - {$list.filename}<br />
        {/foreach}
    </div>
    <div class="z-formbuttons">
        {if $external eq 1}
        <a href="{modurl modname='Files' fqurl='true' type='external' func='getFiles' folder=$folder|replace:'/':'|' hook=$hook editor=$editor}">
            {img modname='core' src='button_ok.png' set='icons/small' __alt="Accept" __title="Accept"}
        </a>
        {else}
        <a href="{modurl modname='Files' type='user' func='main' folder=$folder|replace:'/':'|'}">
            {img modname='core' src='button_ok.png' set='icons/small' __alt="Accept" __title="Accept"}
        </a>
        {/if}
    </div>
</div>

{if $external eq 1}
{include file="Files_external_footer.tpl"}
{/if}