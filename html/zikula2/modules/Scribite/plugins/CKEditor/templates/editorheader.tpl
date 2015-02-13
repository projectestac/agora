<!-- start Scribite with CKEditor for {$Scribite.modname} -->
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/CKEditor/style/style.css"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/CKEditor/vendor/ckeditor/ckeditor.js"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/CKEditor/javascript/CKEditor.ajaxApi.js"}

{assign value=false var='useckfinder'}
{assign value=false var='usekcfinder'}

{if file_exists("`$Scribite.editorVars.filemanagerpath`/ckfinder.html")}
    {assign var="useckfinder" value=true}<script type="text/javascript" src="{$Scribite.editorVars.filemanagerpath}/ckfinder.js"></script>
{elseif file_exists("`$Scribite.editorVars.filemanagerpath`/browse.php")}
    {assign var="usekcfinder" value=true}
{/if}
{callfunc x_function='session_id' x_assign='session_id'}
<script type="text/javascript">
/* <![CDATA[ */
    {{if !empty($Scribite.addExtEdPlugins)}}
    {{foreach from=$Scribite.addExtEdPlugins item='ePlugin'}}
    CKEDITOR.plugins.addExternal('{{$ePlugin.name}}',Zikula.Config.baseURL+'{{$ePlugin.path}}','{{$ePlugin.file}}');
    {{/foreach}}
    {{/if}}

    var params = {
        customConfig: 'custconfig.js',
        toolbar: "{{$Scribite.editorVars.barmode}}",
        {{if $Scribite.editorVars.height}}height: "{{$Scribite.editorVars.height}}",{{/if}}
        {{if $Scribite.editorVars.skin}}skin: "{{$Scribite.editorVars.skin}}",{{/if}}
        {{if $Scribite.editorVars.uicolor}}uiColor: "{{$Scribite.editorVars.uicolor}}",{{/if}}
        {{if $Scribite.editorVars.langmode eq 'zklang'}}language: "{{$lang}}",{{/if}}
        {{if $Scribite.editorVars.resizemode eq 'resize'}}extraPlugins: 'resize', resize_enabled: true, removePlugins: 'autogrow', resize_minHeight: "{{$Scribite.editorVars.resizeminheight}}", resize_maxHeight : "{{$Scribite.editorVars.resizemaxheight}}",
        {{elseif $Scribite.editorVars.resizemode eq 'autogrow'}}extraPlugins: 'autogrow', removePlugins: 'resize', autoGrow_minHeight : "{{$Scribite.editorVars.growminheight}}", autoGrow_maxHeight : "{{$Scribite.editorVars.growmaxheight}}",
        {{else}}resize_enabled: false, removePlugins: 'autogrow,resize', extraPlugins: '',{{/if}}
        {{if $Scribite.editorVars.style_editor}}contentsCss: '{{$baseurl}}{{$Scribite.editorVars.style_editor}}',{{/if}}
        entities_greek: false, entities_latin: false,
// Zikula styling tags can be added optionally later on
//        format_tags: 'p;h1;h2;h3;h4;h5;h6;zsub;pre;address;div', for adding Zikula specific styles
//        format_zsub: { element: 'span', attributes: { 'class': 'z-sub' } },
        {{if $Scribite.editorVars.entermode}}enterMode: {{$Scribite.editorVars.entermode}},{{/if}}
        {{if $Scribite.editorVars.shiftentermode}}shiftEnterMode: {{$Scribite.editorVars.shiftentermode}},{{/if}}
        {{if $useckfinder eq true}}
        filebrowserBrowseUrl: '{{$Scribite.editorVars.filemanagerpath}}/ckfinder.html',
        filebrowserImageBrowseUrl: '{{$Scribite.editorVars.filemanagerpath}}/ckfinder.html?Type=Images',
        filebrowserFilesBrowseUrl: '{{$Scribite.editorVars.filemanagerpath}}/ckfinder.html?Type=Files',
        filebrowserFlashBrowseUrl: '{{$Scribite.editorVars.filemanagerpath}}/ckfinder.html?Type=Flash',
        filebrowserUploadUrl: '{{$Scribite.editorVars.filemanagerpath}}/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '{{$Scribite.editorVars.filemanagerpath}}/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFilesUploadUrl: '{{$Scribite.editorVars.filemanagerpath}}/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserFlashUploadUrl: '{{$Scribite.editorVars.filemanagerpath}}/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        {{/if}}
        {{if $usekcfinder eq true}}
        filebrowserBrowseUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/browse.php?type=files&s={{$session_id}}',
        filebrowserImageBrowseUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/browse.php?type=images&s={{$session_id}}',
        filebrowserFilesBrowseUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/browse.php?type=files&s={{$session_id}}',
        filebrowserFlashBrowseUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/browse.php?type=flash&s={{$session_id}}',
        filebrowserUploadUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/upload.php?type=files&s={{$session_id}}',
        filebrowserImageUploadUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/upload.php?type=images&s={{$session_id}}',
        filebrowserFilesUploadUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/upload.php?type=files&s={{$session_id}}',
        filebrowserFlashUploadUrl: '{{$baseurl}}{{$Scribite.editorVars.filemanagerpath}}/upload.php?type=flash&s={{$session_id}}',
        {{/if}}
    };
    {{if $Scribite.editorVars.extraplugins}}params.extraPlugins = params.extraPlugins + ',' + '{{$Scribite.editorVars.extraplugins}}';{{/if}}
    {{if !empty($Scribite.addExtEdPlugins)}}{{foreach from=$Scribite.addExtEdPlugins item='ePlugin'}}
    params.extraPlugins = params.extraPlugins + ',' + '{{$ePlugin.name}}';
    {{/foreach}}{{/if}}
    
    // instantiate CKEditor's Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil(params);

    if (window.addEventListener) { // modern browsers
        window.addEventListener('load' , Scribite.createEditors, false);
    } else if (window.attachEvent) { // ie8 and even older browsers
        window.attachEvent('onload', Scribite.createEditors);
    } else { // fallback, not truly necessary
        window.onload = Scribite.createEditors;
    }

/* ]]> */
</script>
<!-- end Scribite with CKEditor -->
