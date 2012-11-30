<!-- start Scribite with CKEditor for {$modname} -->
{pageaddvar name="stylesheet" value="modules/Scribite/style/ckeditor/style.css"}
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/ckeditor.js"></script>
{if file_exists("`$editors_path`/`$editor_dir`/ckfinder/")}
{assign var="useckfinder" value=true}
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/ckfinder/ckfinder.js"></script>
{else}
{assign var="useckfinder" value=false}
{/if}
<script type="text/javascript">
/* <![CDATA[ */
{{if $modareas eq "all"}}

    ckload = function () {
        var allTextAreas = document.getElementsByTagName("textarea");
        for (var i=0; i < allTextAreas.length; i++) {
            var {{$modname}}Editor = CKEDITOR.replace(allTextAreas[i].id, {
                toolbar: "{{$ckeditor_barmode}}",
                language: "{{$ckeditor_language}}",
                skin: "{{$ckeditor_skin}}",
                extraPlugins : 'autogrow,stylesheetparser,zikulapagebreak',
                removePlugins : 'resize',
                autoGrow_maxHeight : "{{$ckeditor_maxheight}}",
                contentsCss : '{{$zBaseUrl}}/{{$ckeditor_style_editor}}',
                entities_greek: false,
                entities_latin: false{{if $useckfinder eq true}},{{/if}}
                {{if $useckfinder eq true}}
                filebrowserBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html?Type=Images',
                filebrowserFilesBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html?Type=Files',
                filebrowserFlashBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFilesUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserFlashUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                {{/if}}
            });
        }
    }
    
{{else}}

    ckload = function () {
        {{foreach from=$modareas item=area}}
            var {{$modname}}Editor = CKEDITOR.replace('{{$area}}', {
                toolbar: "{{$ckeditor_barmode}}",
                language: "{{$ckeditor_language}}",
                skin: "{{$ckeditor_skin}}",
                extraPlugins : 'autogrow,stylesheetparser,zikulapagebreak',
                removePlugins : 'resize',
                autoGrow_maxHeight : "{{$ckeditor_maxheight}}",
                contentsCss : '{{$zBaseUrl}}/{{$ckeditor_style_editor}}',
                entities_greek: false,
                entities_latin: false{{if $useckfinder eq true}},{{/if}}
                {{if $useckfinder eq true}}
                filebrowserBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html?Type=Images',
                filebrowserFilesBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html?Type=Files',
                filebrowserFlashBrowseUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFilesUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserFlashUploadUrl : '{{$editors_path}}/{{$editor_dir}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                {{/if}}
            });
        {{/foreach}}
    }
    
{{/if}}

Event.observe(window, 'load', ckload);

/* ]]> */
</script>
<!-- end Scribite with CKEditor -->