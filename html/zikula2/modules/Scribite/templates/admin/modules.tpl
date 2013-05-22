{ajaxheader ui=true}
{adminheader}

{pageaddvarblock}
<script type="text/javascript">
    document.observe("dom:loaded", function() {
        Zikula.UI.Tooltips($$('.tooltips'));
    });
</script>
{/pageaddvarblock}

<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Module list'}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text="Module"}</th>
            <th>{gt text="Editor"}</th>
            <th>{gt text="Functions"}</th>
            <th>{gt text="Textareas"}</th>
            <th class="z-nowrap z-right">{gt text="Options"}</th>
        </tr>
    </thead>
    <tbody>
        {section name=mid loop=$modconfig}
        {modavailable modname=$modconfig[mid].modname assign="installed"}
        {if $installed eq '1'}
        <tr class="{cycle values="z-odd,z-even}">
            <td>{$modconfig[mid].modname|safetext}</td>
            <td><span class="tooltips" title="{$modconfig[mid].modeditortitle|safetext}">{$modconfig[mid].modeditor|safetext}</span></td>
            <td>{$modconfig[mid].modfunclist|safetext}</td>
            <td>{$modconfig[mid].modarealist|safetext}</td>
            <td class="z-nowrap z-right">
                <a href="{modurl modname='Scribite' type='admin' func='modifymodule' mid=$modconfig[mid].mid}">{img modname='core' src='xedit.png' set='icons/extrasmall' __alt="Edit module" __title="Edit module" class="tooltips"}</a>
                <a href="{modurl modname='Scribite' type='admin' func='delmodule' mid=$modconfig[mid].mid}">{img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete module" __title="Delete module" class="tooltips"}</a>
            </td>
        </tr>
        {/if}
        {/section}
    </tbody>
</table>
{adminfooter}