<!-- start Scribite with TinyMCE for {$modname} -->
<script type="text/javascript" src="modules/Scribite/includes/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
/* <![CDATA[ */

   tinyMCE.init({
        mode : "textareas",
        theme : "{{$tinymce_theme}}",
        language : "{{$tinymce_language}}",
{{if isset($tinymce_listplugins)}}
        plugins : "{{$tinymce_listplugins}}",
{{/if}}
        content_css : "{{$zBaseUrl}}/{{$tinymce_style}}",
        cleanup : true,

{{if $tinymce_theme eq "advanced"}}
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Default buttons available in the advanced theme
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,outdent,indent,cut,copy,paste,undo,redo,link,unlink,image,cleanup",
        theme_advanced_buttons2 : "code,anchor,fontselect,fontsizeselect,sub,sup,forecolor,backcolor,charmap,visualaid,blockquote,hr,removeformat,help",

        // Individual buttons configured in the module's settings
        theme_advanced_buttons3 : "{{$tinymce_buttons}}",
        
        // TODO: I really would like to split this into multiple row, but I do not know how
        //theme_advanced_buttons3 : "{{foreach from=$tinymce_buttons key=k item=tinymce_button}}{{$tinymce_button}},{{/foreach}}",

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        plugin_insertdate_dateFormat : "{{$tinymce_dateformat}}",
        plugin_insertdate_timeFormat : "{{$tinymce_timeformat}}",

        paste_auto_cleanup_on_paste : true,
        paste_convert_middot_lists : true,
        paste_strip_class_attributes : "all",
        paste_remove_spans : false,
        paste_remove_styles_if_webkit : true,
{{/if}}

        valid_elements : "*[*]",
{{if isset($disallowedhtml)}}	
        invalid_elements : "{{$disallowedhtml}}",
{{/if}}
        height : "{{$tinymce_height}}",
        width : "{{$tinymce_width}}"
    });

/* ]]> */
</script>
<!-- End Scribite with TinyMCE for {$modname} -->