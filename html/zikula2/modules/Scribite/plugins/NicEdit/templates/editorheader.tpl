<!-- start Scribite with nicEdit for {$Scribite.modname} -->
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/NicEdit/style/style.css"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/NicEdit/vendor/nicedit/nicEdit_compressed.js"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/NicEdit/javascript/NicEdit.ajaxApi.js"}
<script type="text/javascript">
/* <![CDATA[ */


bkLib.onDomLoaded(function() {
    var params = {
        iconsPath : '{{$baseurl}}modules/Scribite/plugins/NicEdit/vendor/nicedit/nicEditorIcons.gif',
        xhtml : {{if $Scribite.editorVars.xhtml eq true}}true{{else}}false{{/if}},
        {{if $Scribite.editorVars.fullpanel eq true}}
        fullPanel : true
        {{else}}
        buttonList : ['bold','italic','link','unlink','image','xhtml']
        {{/if}}
        };
    // instantiate CKEditor's Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil(params);
    Scribite.createEditors();
});

/* ]]> */
</script>
<!-- end Scribite with nicEdit -->