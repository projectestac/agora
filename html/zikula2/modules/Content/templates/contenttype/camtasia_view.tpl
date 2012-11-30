{if $displayMode=='inline'}
<dl class="content-video content-shockwave">
    <dt>
        <object id="csSWF" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="{$width}" height="{$height}" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,115,0">
            <param name="src" value="{$folder}/{$videoPath}/{$videoPath}_controller.swf" />
            <param name="bgcolor" value="#1a1a1a"/>
            <param name="quality" value="best"/>
            <param name="allowScriptAccess" value="always"/>
            <param name="allowFullScreen" value="true"/>
            <param name="scale" value="showall"/>
            <param name="flashVars" value="autostart=false&thumb={$folder}/{$videoPath}/FirstFrame.png&thumbscale=75&color=0x000000,0x000000"/>
            <embed name="csSWF" src="{$folder}/{$videoPath}/{$videoPath}_controller.swf" width="{$width}" height="{$height}" bgcolor="#1a1a1a" quality="best" allowScriptAccess="always" allowFullScreen="true" scale="showall" flashVars="autostart=false&thumb={$folder}/{$videoPath}/FirstFrame.png&thumbscale=75&color=0x000000,0x000000" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed>
        </object>
    </dt>
    <dd>{$text}</dd>
    <dd>{gt text='by %s' tag1=$author}</dd>
</dl>
{else}
{pageaddvar name="javascript" value="prototype"}
{pageaddvar name="javascript" value="modules/Content/lib/vendor/lightwindow/javascript/lightwindow.js"}
{pageaddvar name="stylesheet" value="modules/Content/lib/vendor/lightwindow/css/lightwindow.css"}

{assign var="image" value=$folder|cat:'/'|cat:$videoPath|cat:'/FirstFrame.png'}

<dl class="content-video content-shockwave">
    <dt>
        <a title="{$videoPath}" caption="{$text}" author="{$author}" href="{$folder}/{$videoPath}/{$videoPath}_controller.swf" class="lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false"><img src="{$image}" width="{$thumbwidth}" height="{$thumbheight}" alt="{$videoPath}" /></a>
    </dt>
    <dd><a title="{$videoPath}" caption="{$text}" author="{$author}" href="{$folder}/{$videoPath}/{$videoPath}_controller.swf" class="play-icon lightwindow page-options" params="lightwindow_width={$width},lightwindow_height={$height},lightwindow_loading_animation=false" title=>{gt text='Play Video'}</a></dd>
</dl>
<p><!--[$text]--></p>
{/if}