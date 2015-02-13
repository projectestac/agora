<!-- start Scribite with Xinha for {$Scribite.modname} -->
<script type="text/javascript">
/* <![CDATA[ */
  _editor_url = '{{$baseurl}}modules/Scribite/plugins/Xinha/vendor/xinha/';
  _editor_lang = '{{$lang}}';
  _editor_skin = '{{$Scribite.editorVars.skin}}';
  _editor_icons = 'Classic';
/* ]]> */
</script>
{pageaddvar name='javascript' value='modules/Scribite/plugins/Xinha/vendor/xinha/XinhaLoader.js'}
{pageaddvar name='javascript' value='modules/Scribite/plugins/Xinha/javascript/Xinha.ajaxApi.js'}

<script type="text/javascript">
/* <![CDATA[ */
    var textareasInUse = new Array();
    var scribite_init = function() {
        xinha_editors = null;
        xinha_init    = null;
        xinha_config  = null;
        xinha_plugins = null;

        xinha_init = xinha_init ? xinha_init : function()
        {
        xinha_editors = xinha_editors ? xinha_editors : textareasInUse;
        // Added line for news ajax edit:
        xinha_editorsarray = textareasInUse;

        xinha_plugins = xinha_plugins ? xinha_plugins :
        [ '{{"','"|implode:$Scribite.editorVars.activeplugins}}' ];

        if (!Xinha.loadPlugins(xinha_plugins, xinha_init)) {
            return;
        }

        xinha_config = xinha_config ? xinha_config() : new Xinha.Config();
        xinha_config.width  = '{{$Scribite.editorVars.width}}{{if $Scribite.editorVars.width ne 'auto'}}px{{/if}}';
        xinha_config.height = '{{$Scribite.editorVars.height}}{{if $Scribite.editorVars.height ne 'auto'}}px{{/if}}';
        xinha_config.charSet = '{{charset}}';
        xinha_config.baseURL = '{{$baseurl}}';
        xinha_config.browserQuirksMode = false;
        xinha_config.stripBaseHref = true;
        xinha_config.killWordOnPaste = true;
        xinha_config.flowToolbars = true;
        xinha_config.stripSelfNamedAnchors = false;
        xinha_config.stripScripts = true;
        xinha_config.sizeIncludesBars = true;
        xinha_config.pageStyleSheets = ['{{$baseurl}}{{$Scribite.editorVars.style}}'];
        xinha_config.statusBar = {{if $Scribite.editorVars.statusbar}}true;{{else}}false;{{/if}}
        xinha_config.showLoading = {{if $Scribite.editorVars.showloading}}true;{{else}}false;{{/if}}
        xinha_config.convertUrlsToLinks = {{if $Scribite.editorVars.converturls}}true;{{else}}false;{{/if}}
        xinha_config.pageStyle = '';

        if(typeof DynamicCSS != 'undefined') {
            xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url('{{$baseurl}}{{$Scribite.editorVars.style_dynamiccss}}');";
        }
        if(typeof Stylist != 'undefined') {
            xinha_config.stylistLoadStylesheet('{{$baseurl}}{{$Scribite.editorVars.style_stylist}}');
        }

    {{* atm false but left in code for future use *}}
    {{* if $Scribite.editorParameters.useEFM eq true}}
        xinha_config.ExtendedFileManager.use_linker = true;
        if (xinha_config.ExtendedFileManager) {
            with (xinha_config.ExtendedFileManager) {
                {{$Scribite.editorParameters.EFMConfig}}
            }
        }
    {{/if *}}

    {{if $Scribite.editorVars.barmode eq "reduced"}}
    {{include file="toolbar_reduced.tpl"}}
    {{/if}}
    {{if $Scribite.editorVars.barmode eq "mini"}}
    {{include file="toolbar_mini.tpl"}}
    {{/if}}

    {{if $Scribite.modname eq "News"}}
        xinha_config.registerButton({
            id        : "pagebreak_news",
            tooltip   : "Insert pagebreak for News module",
            image     : "modules/Scribite/images/pagebreak.gif",
            textMode  : false,
            action:
            function(editor, id)
            {
                editor.insertHTML("<div class=\"pagebreak\"><\/div><!--pagebreak-->");
            }
        });
        xinha_config.toolbar[xinha_config.toolbar.length-1].push("pagebreak_news");
        xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url('{{$baseurl}}modules/Scribite/plugins/Xinha/style/pagebreak.css');";
    {{/if}}

    {{if $Scribite.modname eq "Pages"}}
        xinha_config.registerButton({
            id        : "pagebreak_pages",
            tooltip   : "Insert pagebreak for Pages module",
            image     : "modules/Scribite/images/pagebreak.gif",
            textMode  : false,
            action:
            function(editor, id)
            {
            editor.insertHTML("<div class=\"pagebreak\"><\/div><!--pagebreak-->");
            }
        });
        xinha_config.toolbar[xinha_config.toolbar.length-1].push("pagebreak_pages");
        xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url('{{$baseurl}}modules/Scribite/plugins/Xinha/style/pagebreak.css');";
    {{/if}}

        xinha_editors   = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);
        Xinha.startEditors(xinha_editors);
        }
        
        // make textarea array
        var textareaList = document.getElementsByTagName('textarea');
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            // this editor does not use jQuery or prototype so reverting to manual JS
            if ((disabledTextareas.indexOf(textareaList[i].id) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                textareasInUse.push(textareaList[i].id);
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
            }
        }
        xinha_init();
    };

    // instantiate Xinha's Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil(textareasInUse);
    
    if (window.addEventListener) { // modern browsers
        window.addEventListener('load' , Scribite.createEditors, false);
    } else if (window.attachEvent) { // ie8 and even older browsers
        window.attachEvent('onload', Scribite.createEditors);
    } else { // fallback, not truly necessary
        window.onload = Scribite.createEditors;
    }
/* ]]> */
</script>
<!-- end Scribite with Xinha -->