{if $external eq 1}
{include file="Files_external_header.tpl"}
{/if}

<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">
            {img modname='core' src='editdelete.png' set='icons/large'}
        </div>
        <h2>{gt text="Moving"}</h2>
    </div>

    <form class="z-form" action="{modurl modname="Files" func="moveListFile"}" method="post" enctype="application/x-www-form-urlencoded">
          <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <input type="hidden" name="folder" value="{$folder|safetext}" />
            <input type="hidden" name="external" value="{$external|safetext}" />
            <input type="hidden" name="hook" value="{$hook}" />
            {foreach item=fileName from=$listFileName}
            <input type="hidden" name="listFileName[]" value="{$fileName|safetext}" />
            {/foreach}
            <fieldset>
                <legend>{gt text="Move to"}</legend>
                <div>
                    <input id="dir_root" type="radio" name="confirm" value="root_inital_value" />
                    <label for="dir_root"><span class="fi_image fi_folder">{gt text="(root)"}</span></label>
                </div>
                {foreach item=dir from=$directoris key=key}
                <div>
                    <input id="dir_{$key}" type="radio" name="confirm" value="{$dir|safetext}" />
                    <label for="dir_{$key}">
                        <span class="fi_image fi_folder">{$dir|safetext}</span>
                    </label>
                </div>
                {/foreach}
            </fieldset>
            <div class="z-formbuttons">
                {button src='button_ok.gif' set='icons/small' altml='true' titleml='true' __alt="Accept" __title="Accept"}                
                {if $external eq 1}
                <a href="{modurl modname='Files' type='external' func='getFiles' folder=$folder|replace:'/':'|' hook=$hook}">
                    {img modname='core' src='button_cancel.png' set='icons/small' altml='true' titleml='true' __alt="Cancel" __title="Cancel"}
                </a>
                {else}
                <a href="{modurl modname='Files' func='main' folder=$folder|replace:'/':'|'}">
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