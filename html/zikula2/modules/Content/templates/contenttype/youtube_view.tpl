{if $displayMode=='inline'}
<dl class="content-video content-youtube">
    <dt>
        <object type="application/x-shockwave-flash" style="width:{$width}px; height:{$height}px" data="http://www.youtube.com/v/{$videoId}">
            <param name="movie" value="http://www.youtube.com/v/{$videoId}" />
        </object>
    </dt>
    <dd>{$text|safetext}&nbsp;|&nbsp;<a href="http://www.youtube.com/v/{$videoId}&amp;rel=1">youtube.com</a></dd>
</dl>
{else}
{pageaddvar name="javascript" value="prototype"}
{pageaddvar name="javascript" value="modules/Content/lib/vendor/lightwindow/javascript/lightwindow.js"}
{pageaddvar name="stylesheet" value="modules/Content/lib/vendor/lightwindow/css/lightwindow.css"}

{assign var="image" value=http://i.ytimg.com/vi/`$videoId`/default.jpg}
{assign var="imageSize" value=$image|getimagesize}

<dl class="content-video content-youtube" style="width:{$imageSize[0]}px;">
    <dt>
        <a title="{$text|safetext}" href="http://www.youtube.com/v/{$videoId}&amp;autoplay=1" class="lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false"><img src="http://i.ytimg.com/vi/{$videoId}/default.jpg" alt="{$text|safetext}" /></a>
    </dt>
    <dd>{$text|safetext}</dd>
    <dd><a title="{$text|safetext}" href="http://www.youtube.com/v/{$videoId}&amp;autoplay=1" class="play-icon lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false">{gt text="Play Video"}</a></dd>
</dl>
{/if}
