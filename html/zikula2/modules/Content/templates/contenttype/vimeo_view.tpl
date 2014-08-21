{if $displayMode=='inline'}
<dl class="content-video content-vimeo">
    <dt>
    	<iframe src="http://player.vimeo.com/video/{$clipId}" width="{$width}" height="{$height}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen seamless></iframe>
    </dt>
    <dd>{if $text}{$text}&nbsp;|&nbsp;{/if}<a href="http://vimeo.com/{$clipId}">vimeo.com</a></dd>
</dl>
{else}
{pageaddvar name="javascript" value="prototype"}
{pageaddvar name="javascript" value="modules/Content/lib/vendor/lightwindow/javascript/lightwindow.js"}
{pageaddvar name="stylesheet" value="modules/Content/lib/vendor/lightwindow/css/lightwindow.css"}

{assign var="image" value=http://i.ytimg.com/vi/`$clipId`/default.jpg}
{assign var="imageSize" value=$image|getimagesize}

<dl class="content-video content-vimeo" style="width:{$imageSize[0]}px;">
    <dt>
        <a title="{$text}" href="http://player.vimeo.com/video/{$clipId}" class="lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false"><img src="http://i.ytimg.com/vi/{$clipId}/default.jpg" alt="{$text}" /></a>
    </dt>
    {if $text}<dd>{$text}</dd>{/if}
    <dd><a title="{$text}" href="http://player.vimeo.com/video/{$clipId}" class="play-icon lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false">{ gt text='Play Video'}</a></dd>
</dl>
{/if}
