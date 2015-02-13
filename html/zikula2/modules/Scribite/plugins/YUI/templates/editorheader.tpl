<!-- start Scribite with YUI Rich Text Editor for {$Scribite.modname} -->
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/YUI/style/style.css"}
{if $Scribite.editorVars.toolbartype == 'Simple'}
    {* load scripts for YUI simple mode *}
    {pageaddvar name="stylesheet" value="http://yui.yahooapis.com/2.9.0/build/assets/skins/sam/skin.css"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/element/element-min.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/container/container_core-min.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/editor/simpleeditor-min.js"}
{else}
    {* load scripts for YUI Rich Text Editor full mode *}
    {pageaddvar name="stylesheet" value="http://yui.yahooapis.com/2.9.0/build/assets/skins/sam/skin.css"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/element/element-min.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/container/container_core-min.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/menu/menu-min.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/button/button-min.js"}
    {pageaddvar name="javascript" value="http://yui.yahooapis.com/2.9.0/build/editor/editor-min.js"}
{/if}
{pageaddvar name="javascript" value="modules/Scribite/plugins/YUI/javascript/YUI.ajaxApi.js"}
<script type="text/javascript">
/* <![CDATA[ */

var yuiConfig = {
    handleSubmit: true,
    height: '{{if $Scribite.editorVars.height eq "auto"}}auto{{else}}{{$Scribite.editorVars.height}}px{{/if}}',
    width: '{{if $Scribite.editorVars.width eq "auto"}}auto{{else}}{{$Scribite.editorVars.width}}px{{/if}}',
    dompath: {{if $Scribite.editorVars.dombar}}true{{else}}false{{/if}},
    animate: {{if $Scribite.editorVars.animate}}true{{else}}false{{/if}},
    toolbar: {
        collapse: {{if $Scribite.editorVars.collapse}}true{{else}}false{{/if}},
        draggable: false,
        buttonType: 'advanced',
        titlebar: 'Scribite - YUI Rich Text Editor for {{$Scribite.modname}}',
        {{if $Scribite.editorVars.toolbartype eq 'Full'}}
        buttons: [
            { group: 'fontstyle', label: 'Font Name and Size',
                buttons: [
                    { type: 'select', label: 'Arial', value: 'fontname', disabled: true,
                        menu: [
                            { text: 'Arial', checked: true },
                            { text: 'Arial Black' },
                            { text: 'Comic Sans MS' },
                            { text: 'Courier New' },
                            { text: 'Lucida Console' },
                            { text: 'Tahoma' },
                            { text: 'Times New Roman' },
                            { text: 'Trebuchet MS' },
                            { text: 'Verdana' }
                        ]
                    },
                    { type: 'spin', label: '12', value: 'fontsize', range: [ 9, 75 ], disabled: true }
                ]
            },
            { type: 'separator' },
            { group: 'textstyle', label: 'Font Style',
                buttons: [
                    { type: 'push', label: 'Bold CTRL + SHIFT + B', value: 'bold' },
                    { type: 'push', label: 'Italic CTRL + SHIFT + I', value: 'italic' },
                    { type: 'push', label: 'Underline CTRL + SHIFT + U', value: 'underline' },
                    { type: 'separator' },
                    { type: 'push', label: 'Subscript', value: 'subscript', disabled: true },
                    { type: 'push', label: 'Superscript', value: 'superscript', disabled: true },
                    { type: 'separator' },
                    { type: 'color', label: 'Font Color', value: 'forecolor', disabled: true },
                    { type: 'color', label: 'Background Color', value: 'backcolor', disabled: true },
                    { type: 'separator' },
                    { type: 'push', label: 'Remove Formatting', value: 'removeformat', disabled: true },
                    { type: 'push', label: 'Show/Hide Hidden Elements', value: 'hiddenelements' }
                ]
            },
            { type: 'separator' },
            { group: 'alignment', label: 'Alignment',
                buttons: [
                    { type: 'push', label: 'Align Left CTRL + SHIFT + [', value: 'justifyleft' },
                    { type: 'push', label: 'Align Center CTRL + SHIFT + |', value: 'justifycenter' },
                    { type: 'push', label: 'Align Right CTRL + SHIFT + ]', value: 'justifyright' },
                    { type: 'push', label: 'Justify', value: 'justifyfull' }
                ]
            },
            { type: 'separator' },
            { group: 'parastyle', label: 'Paragraph Style',
                buttons: [
                { type: 'select', label: 'Normal', value: 'heading', disabled: true,
                    menu: [
                        { text: 'Normal', value: 'none', checked: true },
                        { text: 'Header 1', value: 'h1' },
                        { text: 'Header 2', value: 'h2' },
                        { text: 'Header 3', value: 'h3' },
                        { text: 'Header 4', value: 'h4' },
                        { text: 'Header 5', value: 'h5' },
                        { text: 'Header 6', value: 'h6' }
                    ]
                }
                ]
            },
            { type: 'separator' },
            { group: 'indentlist', label: 'Indenting and Lists',
                buttons: [
                    { type: 'push', label: 'Indent', value: 'indent', disabled: true },
                    { type: 'push', label: 'Outdent', value: 'outdent', disabled: true },
                    { type: 'push', label: 'Create an Unordered List', value: 'insertunorderedlist' },
                    { type: 'push', label: 'Create an Ordered List', value: 'insertorderedlist' }
                ]
            },
            { type: 'separator' },
            { group: 'insertitem', label: 'Insert Item',
                buttons: [
                    { type: 'push', label: 'HTML Link CTRL + SHIFT + L', value: 'createlink', disabled: true },
                    { type: 'push', label: 'Insert Image', value: 'insertimage' }
                ]
            }
        ]
        {{else}}
        buttons: [
            { group: 'fontstyle', label: 'Font Name and Size',
                buttons: [
                    { type: 'select', label: 'Arial', value: 'fontname', disabled: true,
                        menu: [
                            { text: 'Arial', checked: true },
                            { text: 'Arial Black' },
                            { text: 'Comic Sans MS' },
                            { text: 'Courier New' },
                            { text: 'Lucida Console' },
                            { text: 'Tahoma' },
                            { text: 'Times New Roman' },
                            { text: 'Trebuchet MS' },
                            { text: 'Verdana' }
                        ]
                    },
                    { type: 'spin', label: '12', value: 'fontsize', range: [ 9, 75 ], disabled: true }
                ]
            },
            { type: 'separator' },
            { group: 'textstyle', label: 'Font Style',
                buttons: [
                    { type: 'push', label: 'Bold CTRL + SHIFT + B', value: 'bold' },
                    { type: 'push', label: 'Italic CTRL + SHIFT + I', value: 'italic' },
                    { type: 'push', label: 'Underline CTRL + SHIFT + U', value: 'underline' },
                    { type: 'separator' },
                    { type: 'color', label: 'Font Color', value: 'forecolor', disabled: true },
                    { type: 'color', label: 'Background Color', value: 'backcolor', disabled: true }
                ]
            },
            { type: 'separator' },
            { group: 'indentlist', label: 'Lists',
                buttons: [
                    { type: 'push', label: 'Create an Unordered List', value: 'insertunorderedlist' },
                    { type: 'push', label: 'Create an Ordered List', value: 'insertorderedlist' }
                ]
            },
            { type: 'separator' },
            { group: 'insertitem', label: 'Insert Item',
                buttons: [
                    { type: 'push', label: 'HTML Link CTRL + SHIFT + L', value: 'createlink', disabled: true },
                    { type: 'push', label: 'Insert Image', value: 'insertimage' }
                ]
            }
        ]
        {{/if}}
    }
};

    var scribite_init = function () {
		// variable for storing the instantiated editors
        yuiConfig.editors = {};
        var d = document.getElementsByTagName("body");
        d[0].className = d[0].className + " yui-skin-sam";
        var textareaList = document.getElementsByTagName('textarea');
        for(i = 0; i < textareaList.length; i++) {
        // check to make sure textarea not in disabled list or has 'noeditor' class
        // this editor does not use jQuery or prototype so reverting to manual JS
        if ((disabledTextareas.indexOf(textareaList[i].id) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // attach the editor
                yuiConfig.editors[textareaList[i].id] = new YAHOO.widget.{{if $Scribite.editorVars.toolbartype eq "Simple"}}Simple{{/if}}Editor(textareaList[i], yuiConfig);
                yuiConfig.editors[textareaList[i].id].render();
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
            }
        }
    }
    // instantiate YUI Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil(yuiConfig);
    
    if (window.addEventListener) { // modern browsers
        window.addEventListener('load' , Scribite.createEditors, false);
    } else if (window.attachEvent) { // ie8 and even older browsers
        window.attachEvent('onload', Scribite.createEditors);
    } else { // fallback, not truly necessary
        window.onload = Scribite.createEditors;
    }

/* ]]> */
</script>
<!-- end Scribite with YUI Rich Text Editor -->