{ajaxheader ui=true}
{adminheader}

<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Editor list'}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text="Installed editors"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item="editor" key="key" from=$editors}
        <tr class="{cycle values="z-odd,z-even"}">
            <td>{$editor} {if $editor eq $defaulteditor}({gt text="default editor"}){/if}</td>
        </tr>
        {/foreach}
    </tbody>
</table>

<em class="z-formnote">
    <a href="{modurl modname='Extensions' type='admin' func='viewPlugins' bymodule='Scribite'}">{gt text="Manage and configure editors via module plugin list"}</a>
</em>

{adminfooter}