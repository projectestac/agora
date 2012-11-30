<!-- start Scribite with nicEdit for {$modname} -->
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/nicEdit.js"></script>
<script type="text/javascript">
/* <![CDATA[ */

{{if $modareas eq "all"}}
    bkLib.onDomLoaded(function() {
    var editor_all = new nicEditor({iconsPath: '{{$zBaseUrl}}/{{$editors_path}}/{{$editor_dir}}/nicEditorIcons.gif', BBCode: true{{if $nicedit_xhtml eq true}}, xhtml : true{{/if}}{{if $nicedit_fullpanel eq true}}, fullPanel : true{{else}}, buttonList: ['bold','italic','link','unlink','image','xhtml'], {{/if}}}).allTextAreas;
    });
{{else}}
    bkLib.onDomLoaded(function() {
    {{section name=modareas loop=$modareas}}
    var editor_{{$modareas[modareas]}} = new nicEditor({iconsPath : '{{$zBaseUrl}}/{{$editors_path}}/{{$editor_dir}}/nicEditorIcons.gif'{{if $nicedit_xhtml eq true}}, xhtml : true{{/if}}{{if $nicedit_fullpanel eq true}}, fullPanel : true{{else}}, buttonList : ['bold','italic','link','unlink','image','xhtml'], {{/if}}}).panelInstance('{{$modareas[modareas]}}');
    {{/section}}
    });
{{/if}}

/* ]]> */
</script>
<!-- end Scribite with nicEdit -->