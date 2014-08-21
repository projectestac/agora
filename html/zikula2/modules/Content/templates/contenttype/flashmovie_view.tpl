{if $displayMode eq 'inline'}
<dl class="content-video content-shockwave">
    <dt>
            {assign var='playerwidth' value=" width=\"`$width`\""}
            {assign var='playerheight' value=" height=\"`$height`\""}

            {literal}<!--[if !IE]> -->{/literal}
                <object id="teaser"
                        type="application/x-shockwave-flash"
                        data="{$videoPath|safetext}"
                        {$playerwidth}{$playerheight}>
                    <param name="pluginurl" value="http://www.macromedia.com/go/getflashplayer" />
            {literal}<!-- <![endif]-->{/literal}

            {literal}<!--[if IE]>{/literal}
                <object id="teaser"
                        classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                        {$playerwidth}{$playerheight}>
                    <param name="movie" value="{$videoPath|safetext}" />
            {literal}<!--><!---->{/literal}

                    <param name="quality" value="high" />
                    <param name="menu" value="0" />
                    <param name="scale" value="showall" />
                    <param name="salign" value="TL" />
                    <param name="FlashVars" value="playerMode=embedded" />
                    <param name="allowScriptAcess" value="sameDomain" />

                    <param name="wmode" value="transparent" />
                    {* <param name="wmode" value="opaque" /> *}

                    <p>
                        Your browser does not support embedded flash files.<br />
                        Please click <a href="{$videoPath|safetext}">here</a> to download the file you requested.<br />
                        <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" title="Download Flash Player" target="_blank">
                            {gt text='Download Flash Player'}
                        </a>
                    </p>
                </object>
            {literal}<!-- <![endif]-->{/literal}

    </dt>
    <dd>{$text}</dd>
{if $author ne ''}
    <dd>{gt text='by %s' tag1=$author}</dd>
{/if}
</dl>
{else}
{pageaddvar name='javascript' value='prototype'}
{pageaddvar name='javascript' value='modules/Content/lib/vendor/lightwindow/javascript/lightwindow.js'}
{pageaddvar name='stylesheet' value='modules/Content/lib/vendor/lightwindow/css/lightwindow.css'}

<dl class="content-video content-shockwave">
    <dt>
        <a title="{$videoPath}" caption="{$text}" author="{$author}" href="{$videoPath}" class="lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false">{gt text='Play Video'}</a>
    </dt>
    <dd><a title="{$videoPath}" caption="{$text}" author="{$author}" href="{$videoPath}" class="play-icon lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false" title=>{gt text='Play Video'}</a></dd>
</dl>
<p>{$text}</p>
{/if}