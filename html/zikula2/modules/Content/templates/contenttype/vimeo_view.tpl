{if $displayMode=='inline'}
<dl class="content-video content-vimeo">
    <dt>
        <object type="application/x-shockwave-flash" style="width:{$width}px; height:{$height}px" data="http://vimeo.com/moogaloop.swf?clip_id={$clipId}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1">
            <param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id={$clipId}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" />
        </object>
    </dt>
    <dd>{$text}&nbsp;|&nbsp;<a href="http://vimeo.com/{$clipId}">vimeo.com</a></dd>
</dl>
{else}
{pageaddvar name="javascript" value="prototype"}
{pageaddvar name="javascript" value="modules/Content/lib/vendor/lightwindow/javascript/lightwindow.js"}
{pageaddvar name="stylesheet" value="modules/Content/lib/vendor/lightwindow/css/lightwindow.css"}

{assign var="image" value=http://i.ytimg.com/vi/`$clipId`/default.jpg}
{assign var="imageSize" value=$image|getimagesize}

<dl class="content-video content-vimeo" style="width:{$imageSize[0]}px;">
    <dt>
        <a title="{$text}" href="http://vimeo.com/{$clipId}" class="lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false"><img src="http://i.ytimg.com/vi/{$clipId}/default.jpg" alt="{$text}" /></a>
    </dt>
    <dd>{$text}</dd>
    <dd><a title="{$text}" href="http://vimeo.com/{$clipId}" class="play-icon lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false">{ gt text='Play Video'}</a></dd>
</dl>
{/if}
