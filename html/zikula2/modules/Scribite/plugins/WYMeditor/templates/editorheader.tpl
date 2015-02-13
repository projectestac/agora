<!-- start Scribite with wymeditor for {$Scribite.modname} -->
{pageaddvar name="javascript" value="jquery"}
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/WYMeditor/style/style.css"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/WYMeditor/vendor/wymeditor/jquery.wymeditor.min.js"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/WYMeditor/javascript/WYMeditor.ajaxApi.js"}

<script type="text/javascript">
/* <![CDATA[ */
    // instantiate YUI Scribite object for editor creation and ajax manipulation
    Scribite = new ScribiteUtil();

    if (window.addEventListener) { // modern browsers
        window.addEventListener('load' , Scribite.createEditors, false);
    } else if (window.attachEvent) { // ie8 and even older browsers
        window.attachEvent('onload', Scribite.createEditors);
    } else { // fallback, not truly necessary
        window.onload = Scribite.createEditors;
    }
    
/* ]]> */
</script>
<!-- end Scribite with wymeditor -->
