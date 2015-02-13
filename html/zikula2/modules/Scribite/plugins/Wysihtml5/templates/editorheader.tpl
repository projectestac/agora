<!-- start Scribite with Wysihtml5 for {$Scribite.modname} -->
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/Wysihtml5/style/style.css"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/Wysihtml5/vendor/wysihtml5-0.3.0.min.js"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/Wysihtml5/vendor/parser_rules/simple.js"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/Wysihtml5/javascript/Wysihtml5.ajaxApi.js"}

<script type="text/javascript">
    var toolbarhtml = '{{include file="toolbar.tpl"}}';
    // instantiate Wysihtml5's Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil();

    if (window.addEventListener) { // modern browsers
        window.addEventListener('load' , Scribite.createEditors, false);
    } else if (window.attachEvent) { // ie8 and even older browsers
        window.attachEvent('onload', Scribite.createEditors);
    } else { // fallback, not truly necessary
        window.onload = Scribite.createEditors;
    }
</script>
<!-- end Scribite with Wysihtml5 -->