<!-- start Scribite with Xinha for {$modname} -->
<script type="text/javascript">
/* <![CDATA[ */
  _editor_url = '{{$zBaseUrl}}/{{$editors_path}}/{{$editor_dir}}/';
  _editor_lang = '{{$zlang}}';
  _editor_skin = '{{$xinha_skin}}';
  _editor_icons = 'Classic';
/* ]]> */
</script>
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/XinhaLoader.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
    xinha_editors = null;
    xinha_init    = null;
    xinha_config  = null;
    xinha_plugins = null;

    xinha_init = xinha_init ? xinha_init : function()
    {
{{if $modareas eq 'all'}}
    xinha_editors = xinha_editors ? xinha_editors :
    document.getElementsByTagName('textarea');
{{elseif $modareas eq "PagEd"}}
    textareas = document.getElementsByTagName('textarea');
    xinha_editors = new Array();
    for(var i in textareas) {
       if(textareas[i].id && textareas[i].id != 'newingress' && textareas[i].id != 'newrelatedlinks') {
          xinha_editors.push(textareas[i].id);
       }
    }
{{else}}
      xinha_editors = xinha_editors ? xinha_editors :
       [ {{$modareas}} ];
      // Added line for news ajax edit:
      xinha_editorsarray = [ {{$modareas}} ];
{{/if}}

      xinha_plugins = xinha_plugins ? xinha_plugins :
      [ {{$xinha_listplugins}} ];

      if (!Xinha.loadPlugins(xinha_plugins, xinha_init)) {
        return;
      }

      xinha_config = xinha_config ? xinha_config() : new Xinha.Config();
      xinha_config.width  = '{{$xinha_width}}{{if $xinha_width ne 'auto'}}px{{/if}}';
      xinha_config.height = '{{$xinha_height}}{{if $xinha_height ne 'auto'}}px{{/if}}';
      xinha_config.charSet = '{{charset}}';
      xinha_config.baseURL = '{{$zBaseUrl}}/';
      xinha_config.browserQuirksMode = false;
      xinha_config.stripBaseHref = true;
      xinha_config.killWordOnPaste = true;
      xinha_config.flowToolbars = true;
      xinha_config.stripSelfNamedAnchors = false;
      xinha_config.stripScripts = true;
      xinha_config.sizeIncludesBars = true;
      xinha_config.pageStyleSheets = ['{{$zBaseUrl}}/{{$xinha_style}}'];
      xinha_config.statusBar = {{if $xinha_statusbar}}true;{{else}}false;{{/if}}
      xinha_config.showLoading = {{if $xinha_showloading}}true;{{else}}false;{{/if}}
      xinha_config.convertUrlsToLinks = {{if $xinha_converturls}}true;{{else}}false;{{/if}}
      xinha_config.pageStyle = '';

      if(typeof DynamicCSS != 'undefined') {
          xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url('{{$zBaseUrl}}/{{$xinha_style_dynamiccss}}');";
      }
      if(typeof Stylist != 'undefined') {
          xinha_config.stylistLoadStylesheet('{{$zBaseUrl}}/{{$xinha_style_stylist}}');
      }

{{* atm false but left in code for future use *}}
{{* if $EFMConfig}}
      xinha_config.ExtendedFileManager.use_linker = true;
      if (xinha_config.ExtendedFileManager) {
        with (xinha_config.ExtendedFileManager) {
{{modapifunc modname='Scribite' type='user' func='getEFMConfig'}}
        }
      }
{{/if *}}

{{if $xinha_barmode eq "reduced"}}
{{include file="editorheaders/xinha/toolbar_reduced.tpl"}}
{{/if}}
{{if $xinha_barmode eq "mini"}}
{{include file="editorheaders/xinha/toolbar_mini.tpl"}}
{{/if}}

{{if $modname eq "News"}}
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
      xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url('{{$zBaseUrl}}/modules/Scribite/style/xinha/pagebreak.css');";
{{/if}}

{{if $modname eq "Pages"}}
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
      xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url('{{$zBaseUrl}}/modules/Scribite/style/xinha/pagebreak.css');";
{{/if}}

      xinha_editors   = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);
      Xinha.startEditors(xinha_editors);
    }

Event.observe(window, 'load', xinha_init);

/* ]]> */
</script>
<!-- end Scribite with Xinha -->