<div id="content-translate-html-details" style="border:1px dashed #0c0;background-color:#efe;padding:3px 5px">
{$data.text}
</div>
<label for="content_translate_source"><a style="padding-bottom:3px;" id="content_translate_source_collapse" href="javascript:void(0);"><span id="content_translate_source_showhide">{gt text='Show'}</span> {gt text='html markup source'}</a></label>
<div id="content-translate-source-details" style="width:95%;border:1px dashed #00c;background-color:#eef;">
<xmp>{$data.text}</xmp>
</div>

<script type="text/javascript">
/* <![CDATA[ */
	Event.observe(window, 'load', function(){
		// Source view is standard closed
		$('content_translate_source_collapse').observe('click', function() {
			if ($('content-translate-source-details').style.display != "none") {
				Element.removeClassName.delay(0.9, $('content_translate_source_collapse'), 'z-toggle-link-open');
				$('content_translate_source_showhide').update(Zikula.__('Show','module_content_js'));
			} else {
				$('content_translate_source_collapse').addClassName('z-toggle-link-open');
				$('content_translate_source_showhide').update(Zikula.__('Hide','module_content_js'));
			}
			switchdisplaystate('content-translate-source-details');
		});
		$('content_translate_source_collapse').addClassName('z-toggle-link');
		if ($('content-translate-source-details').style.display != "none") {
			$('content_translate_source_collapse').removeClassName('z-toggle-link-open');
			$('content_translate_source_showhide').update(Zikula.__('Show','module_content_js'));
			$('content-translate-source-details').hide();
		}
	});    
/* ]]> */
</script>
