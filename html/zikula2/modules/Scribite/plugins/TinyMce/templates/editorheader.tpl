<!-- start Scribite with TinyMCE for {$Scribite.modname} -->
{pageaddvar name='javascript' value='modules/Scribite/plugins/TinyMce/vendor/tinymce/tinymce.min.js'}
{pageaddvar name='javascript' value="modules/Scribite/plugins/TinyMce/vendor/tinymce/themes/`$Scribite.editorVars.theme`/theme.min.js"}
{pageaddvar name='javascript' value='modules/Scribite/plugins/TinyMce/javascript/TinyMce.ajaxApi.js'}

<script type="text/javascript">
/* <![CDATA[ */

    // constuct param object for default config of tinymce
    var tinymceParams = {
        mode : "exact",
        schema: 'html5',
        theme : "{{$Scribite.editorVars.theme}}",
        toolbar: 'code | undo redo | fontselect fontsizeselect forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image files',
        language : "{{$Scribite.editorVars.language}}",
{{if isset($Scribite.editorVars.activeplugins) && $Scribite.editorVars.activeplugins != ''}}
        plugins : ['{{' '|implode:$Scribite.editorVars.activeplugins}}{{if !empty($Scribite.addExtEdPlugins)}}{{foreach from=$Scribite.addExtEdPlugins item='ePlugin'}} -{{$ePlugin.name}}{{/foreach}}{{/if}}'],
{{/if}}
        content_css : "{{$baseurl}}{{$Scribite.editorVars.style}}",
        cleanup : true,
{{if $Scribite.editorVars.theme eq "modern"}}
        theme_modern_toolbar_location : "top",
        theme_modern_toolbar_align : "left",
        theme_modern_statusbar_location : "bottom",
        theme_modern_resizing : true,
        // Default buttons available in the modern theme
        theme_modern_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,outdent,indent,cut,copy,paste,undo,redo,link,unlink,image,cleanup",
        theme_modern_buttons2 : "code,anchor,fontselect,fontsizeselect,sub,sup,forecolor,backcolor,charmap,visualaid,blockquote,hr,removeformat,help",
        // Individual buttons configured in the module's settings
        theme_modern_buttons3 : "{{if !empty($Scribite.editorParameters.buttons)}}{{$Scribite.editorParameters.buttons}}{{/if}}{{if !empty($Scribite.addExtEdPlugins)}}{{foreach from=$Scribite.addExtEdPlugins item='ePlugin'}},{{$ePlugin.name}}{{/foreach}}{{/if}}",
        // TODO: I really would like to split this into multiple row, but I do not know how
        //theme_modern_buttons3 : "{{* foreach from=$Scribite.editorParameters.buttons item='tinymce_button' *}}{{* $timymce_button *}},{{* /foreach *}}",
        // Skin options
        skin : "lightgray",
        plugin_insertdate_dateFormat : "{{$Scribite.editorVars.dateformat}}",
        plugin_insertdate_timeFormat : "{{$Scribite.editorVars.timeformat}}",
{{/if}}
        valid_elements : "*[*]",
{{if isset($Scribite.disallowedhtml)}}invalid_elements : "{{','|implode:$Scribite.disallowedhtml}}",{{/if}}
        height : "{{$Scribite.editorVars.height}}",
        width : "{{$Scribite.editorVars.width}}",
    }
    
    var textareaClassnames = {};
    var scribite_init = function () {
    var textareaList = document.getElementsByTagName('textarea');
    {{if $Scribite.paramOverrides}}
        // configure and init each textarea
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            // this editor does not use jQuery or prototype so reverting to manual JS
            if ((disabledTextareas.indexOf(textareaList[i].id) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // generate and add a classname to the textarea and store in object
                textareaClassnames[textareaList[i].id] = Scribite.generateString(5);
                tinymce.dom.addClass(textareaList[i].id, textareaClassnames[textareaList[i].id]);
                var oParams = new Object();
                tinymce.extend(oParams, tinymceParams);
                var paramOverrideObj = window["paramOverrides_" + textareaList[i].id];
                if (typeof paramOverrideObj != "undefined") {
                    // override existing values in the `params` obj
                    tinymce.extend(oParams, paramOverrideObj);
                }
                if (typeof paramOverrides_all != "undefined") {
                    // override existing values in if 'all' is set as textarea for override
                    // overrides individual textarea overrides!
                    tinymce.extend(oParams, paramOverrides_all);
                }
                oParams.mode = 'textareas';
                oParams.editor_selector = textareaClassnames[textareaList[i].id];
                tinymce.init(oParams);
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
            }
        }
    {{else}}
        // make a list of all textareas except those disabled or excluded and init all of them.
        var assignedTextareasList = '';
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            // this editor does not use jQuery or prototype so reverting to manual JS
            if ((disabledTextareas.indexOf(textareaList[i].id) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // add textarea to element list
                assignedTextareasList += textareaList[i].id + ",";
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
            }
        }
        // add element list to param object (remove trailing comma)
        tinymceParams.elements = assignedTextareasList.substr(0, assignedTextareasList.length-1);
        tinymce.init(tinymceParams);
    {{/if}}
    // load external plugins if available
    {{if !empty($Scribite.addExtEdPlugins)}}
    {{foreach from=$Scribite.addExtEdPlugins item='ePlugin'}}
        tinymce.PluginManager.load('{{$ePlugin.name}}', Zikula.Config.baseURL+'{{$ePlugin.path}}');
    {{/foreach}}
    {{/if}}
    }
    // instantiate TinyMce's Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil(tinymceParams);

if (window.addEventListener) { // modern browsers
    window.addEventListener('load' , Scribite.createEditors, false);
} else if (window.attachEvent) { // ie8 and even older browsers
    window.attachEvent('onload', Scribite.createEditors);
} else { // fallback, not truly necessary
    window.onload = Scribite.createEditors;
}
/* ]]> */
</script>
<!-- End Scribite with TinyMCE for {$Scribite.modname} -->
