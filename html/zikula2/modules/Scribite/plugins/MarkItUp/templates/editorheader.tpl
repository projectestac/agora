<!-- start Scribite with Markitup for {$Scribite.modname} -->
{pageaddvar name="javascript" value="jquery"}
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/MarkItUp/style/style.css"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/MarkItUp/vendor/markitup/jquery.markitup.js"}
{pageaddvar name="javascript" value="modules/Scribite/plugins/MarkItUp/vendor/markitup/sets/default/set.js"}
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/MarkItUp/vendor/markitup/sets/default/style.css"}
{pageaddvar name="stylesheet" value="modules/Scribite/plugins/MarkItUp/vendor/markitup/skins/markitup/style.css"}

<script type="text/javascript">
<!--
jQuery(document).ready(function() {
    var textareaList = document.getElementsByTagName('textarea');
    for(i = 0; i < textareaList.length; i++) {
        // check to make sure textarea not in disabled list or has 'noeditor' class
        if ((jQuery.inArray(textareaList[i].id, disabledTextareas) == -1) && !jQuery('#' + textareaList[i].id).hasClass('noeditor')) {
            // attach the editor
            jQuery('#' + textareaList[i].id)
                .css('width','{{if $Scribite.editorVars.width eq "auto"}}auto{{else}}{{$Scribite.editorVars.width}}{{/if}}')
                .css('height','{{if $Scribite.editorVars.height eq "auto"}}auto{{else}}{{$Scribite.editorVars.height}}{{/if}}')
                .markItUp(mySettings);
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
        }
    }
});
-->
</script>
<!-- end Scribite with Markitup -->