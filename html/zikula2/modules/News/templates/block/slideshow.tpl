{ajaxheader modname='News' filename='slideshow.js' effects=true}
{pageaddvar name='stylesheet' value='modules/News/style/slideshow.css'}

<div id="ssb_gallery">
    {section name='slideshowblock' loop=$slideshow}
    {$slideshow[slideshowblock]}
    {/section}
    
<!--	<div class="caption"><div class="content"></div></div>-->
	<div id="ssb_caption"><div id="ssb_caption_content"></div></div>
</div>
<script type="text/javascript">
// <![CDATA[
slideShow(3000);
// ]]>
</script>
<div class="clear"></div>
