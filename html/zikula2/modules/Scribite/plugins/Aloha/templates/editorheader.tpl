<!-- start Scribite with Aloha for {$Scribite.modname} -->
{pageaddvar name="javascript" value="jquery"}
{pageaddvar name="stylesheet" value="http://cdn.aloha-editor.org/latest/css/aloha.css"}
{pageaddvar name="javascript" value="http://cdn.aloha-editor.org/latest/lib/require.js"}

<!-- load the Aloha Editor core and some plugins -->
<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js"
                    data-aloha-plugins="common/ui,
                                         common/format,
                                         common/list,
                                         common/link,
                                         common/highlighteditables">
</script>

<script type="text/javascript">
    Aloha.ready( function() {
        var $ = Aloha.jQuery;
        var textareaList = document.getElementsByTagName('textarea');
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            if ((jQuery.inArray(textareaList[i].id, disabledTextareas) == -1) && !jQuery('#' + textareaList[i].id).hasClass('noeditor')) {
                // attach the editor
                $('#' + textareaList[i].id).aloha();
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
            }
        }
      });
</script>
<!-- end Scribite with Aloha -->