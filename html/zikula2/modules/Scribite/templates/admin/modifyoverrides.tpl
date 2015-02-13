{pageaddvar name='javascript' value='jquery-ui'}
{pageaddvar name='javascript' value='modules/Scribite/javascript/admin-modifyoverrides.js'}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Textarea/module overrides"}</h3>
</div>

<h3>{gt text="Module editor overrides"}</h3>
<div class='z-sub z-warningmsg'>
    {gt text="Notice: entering values here will override the default values for the selected module only."}
</div>
<table id='module_table' class='z-datatable' style='margin-right:50%; width: 50%'>
    <thead>
    <tr>
        <th>{gt text="Module"}</th>
        <th>{gt text="Editor"}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <!-- these are existing values -->
    {counter start=0 assign='moduleOverridesCount'}
    {foreach from=$modvars.Scribite.overrides key='module' item='override'}
    {if isset($override.editor)}
    <tr>
        <td><input name='override[{$module}]' id="module_{$module}" disabled='disabled' style='width:99%' maxLength="50" value='{$module}'></td>
        <td>{html_options id="editor_`$module`" disabled='disabled' name='override[`$module`][editor]' options=$editorList selected=$override.editor}</td>
        <td>
            <a class='ajaxsubmit' style='display:none;' id='modifyModuleOverride_{$module}' title='{gt text="modify"}' href='javascript:void(0);'>{icon type="ok" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='editModuleOverride_{$module}' title='{gt text="edit"}' href='javascript:void(0);'>{icon type="edit" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='deleteModuleOverride_{$module}' title='{gt text="delete"}' href='javascript:void(0);'>{icon type="delete" size="extrasmall"}</a>
        </td>
    </tr>
    {counter}
    {/if}
    {/foreach}
    <tr id='moduleoverridesempty' class='z-center z-informationmsg'{if $moduleOverridesCount > 0} style='display:none'{/if}>
        <td colspan='3'>{gt text='There are currently no module overrides. Add a new entry below.'}</td>
    </tr>
    <!-- this is a hidden row to contain new values and then make visible via jQuery -->
    <tr id='ai_moduleoverride' style='display:none'>
        <td><input id="ai_module" style='width:99%' maxLength="50" value='' disabled='disabled'></td>
        <td>{html_options name="ai_editor" id="ai_editor" disabled='disabled' options=$editorList}</td>
        <td>
            <a class='ajaxsubmit' style='display:none;' id='ai_modifyModuleOverride' title='{gt text="modify"}' href='javascript:void(0);'>{icon type="ok" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='ai_editModuleOverride' title='{gt text="edit"}' href='javascript:void(0);'>{icon type="edit" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='ai_deleteModuleOverride' title='{gt text="delete"}' href='javascript:void(0);'>{icon type="delete" size="extrasmall"}</a>
        </td>
    </tr>
    <!-- this is a blank row for new additions -->
    <tr id='newmodule'>
        <td>{html_options id="module_1" name='override[0][module]' options=$moduleList}</td>
        <td>{html_options id="editor_1" name='override[0][editor]' options=$editorList}</td>
        <td><a class='ajaxsubmit' id='submitModuleOverride_1' title='{gt text="submit"}' href='javascript:void(0);'>{icon type="ok" size="extrasmall"}</a></td>
    </tr>
    </tbody>
</table>

<h3>{gt text="Textarea overrides"}</h3>
<div class="z-sub z-warningmsg">{gt text="Enter only <strong>one</strong> Textarea DOM ID per row, or enter 'all' to configure all textareas."}<br />
{gt text="Disabling a textarea means no scribite editor will be loaded for the specificed textarea. (You cannot disable 'all' textareas.)"}<br />
{gt text="Currently only CKEditor and TinyMCE support parameter overrides."}<br />
{gt text="Enter template parameters as comma-separated, name:value pairs (with colon)."}</div>
<table id='textarea_table' class='z-datatable'>
    <thead>
    <tr>
        <th class='z-w15'>{gt text="Module"}</th>
        <th class='z-w25'>{gt text="Textarea DOM ID"}</th>
        <th class='z-w05'>{gt text='disabled'}</th>
        <th class='z-w45'>{gt text="Plugin template parameters"}</th>
        <th class='z-w10'></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td class='z-sub'><em>{gt text="example: 'hometext' or 'all'"}</em></td>
        <td class='z-sub'><em>{gt text="this"}</em></td>
        <td class='z-sub'><em>{gt text="example: 'toolbar:Basic,uiColor:#0099FF' or leave empty"}</em></td>
        <td class='z-sub'></td>
    </tr>
    <!-- these are existing values -->
    {counter start=0 assign='textareaOverridesCount'}
    {foreach from=$modvars.Scribite.overrides key='module' item='override'}
    {foreach from=$override key="textarea" item="settings"}
    {if ($textarea != "editor") && ($textarea != '')}
    <tr>
        <td><input name='override[{$module}]' id="module_{$module}{$textarea}" disabled='disabled' style='width:99%' maxLength="50" value='{$module}'></td>
        <td><input name='override[{$module}][textarea]' id="area_{$module}{$textarea}" disabled='disabled' style='width:99%' maxLength="50" value='{$textarea}'></td>
        <td><input type='checkbox' name='override[{$module}][disabled]' id="disabled_{$module}{$textarea}"{if $settings.disabled == "true"} checked="checked"{/if} disabled='disabled'></td>
        <td><input name='override[{$module}][params]' id="params_{$module}{$textarea}" disabled='disabled' style='width:99%' maxLength="100" value='{implodeparams params=$settings.params}'></td>
        <td>
            <a class='ajaxsubmit' style='display:none;' id='modifyTextareaOverride_{$module}{$textarea}' title='{gt text="modify"}' href='javascript:void(0);'>{icon type="ok" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='editTextareaOverride_{$module}{$textarea}' title='{gt text="edit"}' href='javascript:void(0);'>{icon type="edit" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='deleteTextareaOverride_{$module}{$textarea}' title='{gt text="delete"}' href='javascript:void(0);'>{icon type="delete" size="extrasmall"}</a>
        </td>
    </tr>
    {counter}
    {/if}
    {/foreach}
    {/foreach}
    <tr id='textareaoverridesempty' class='z-center z-informationmsg'{if $textareaOverridesCount > 0} style='display:none'{/if}>
        <td colspan='5'>{gt text='There are currently no textarea overrides. Add a new entry below.'}</td>
    </tr>
    <!-- this is a hidden row to contain new values and then make visible via jQuery -->
    <tr id='ai_textareaoverride' style='display:none'>
        <td><input id="ai_module" style='width:99%' maxLength="50" value='' disabled='disabled'></td>
        <td><input id="ai_area" style='width:99%' maxLength="50" value='' disabled='disabled'></td>
        <td><input type='checkbox' id="ai_disabled" disabled='disabled'></td>
        <td><input id="ai_params" style='width:99%' maxLength="100" value='' disabled='disabled'></td>
        <td>
            <a class='ajaxsubmit' style='display:none;' id='ai_modifyTextareaOverride' title='{gt text="modify"}' href='javascript:void(0);'>{icon type="ok" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='ai_editTextareaOverride' title='{gt text="edit"}' href='javascript:void(0);'>{icon type="edit" size="extrasmall"}</a>
            <a class='ajaxsubmit' id='ai_deleteTextareaOverride' title='{gt text="delete"}' href='javascript:void(0);'>{icon type="delete" size="extrasmall"}</a>
        </td>
    </tr>
    <!-- this is a blank row for new additions -->
    <tr id='newtextarea'>
        <td>{html_options id="module_0" name='override[0][module]' options=$moduleList}</td>
        <td><input name='override[0][textarea]' id="area_0" style='width:99%' maxLength="50"></td>
        <td><input type='checkbox' name='override[0][disabled]' id="disabled_0"></td>
        <td><input name='override[0][params]' id="params_0" style='width:99%' maxLength="100"></td>
        <td><a class='ajaxsubmit' id='submitTextareaOverride_0' title='{gt text="submit"}' href='javascript:void(0);'>{icon type="ok" size="extrasmall"}</a></td>
    </tr>
    </tbody>
</table>

{adminfooter}