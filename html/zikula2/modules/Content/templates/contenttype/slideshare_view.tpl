<div class="content-slideshare">
    <div class="content-slideshare-object">
        <object width="{$width}" height="{$height}">
            {if $playerType eq 1}
            <param name="movie" value="http://static.slideshare.net/swf/ssplayerd.swf?doc={$slideId}" />
            {else}
            <param name="movie" value="http://static.slideshare.net/swf/ssplayer2.swf?doc={$slideId}" />
            {/if}
            <param name="allowFullScreen" value="true"/>
            <param name="allowScriptAccess" value="always"/>
            {if $playerType eq 1}
            <embed src="http://static.slideshare.net/swf/ssplayerd.swf?doc={$slideId}"
            {else}
            <embed src="http://static.slideshare.net/swf/ssplayer2.swf?doc={$slideId}"
            {/if}
                type="application/x-shockwave-flash"
                allowscriptaccess="always"
                allowfullscreen="true"
                width="{$width}"
                height="{$height}">
            </embed>
        </object>
    </div>
    <p>{$text}</p>
</div>
