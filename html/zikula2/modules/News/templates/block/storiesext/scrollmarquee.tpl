{pageaddvar name='javascript' value='modules/News/javascript/storiesext_marquee.js'}
{assign var='divid' value='#storiesext'|cat:$bid}
{assign var='parsedstyle' value=$scrollstyle|replace:'%DIVID%':$divid}
{pageaddvar name='header' value='<style type="text/css">'|cat:$parsedstyle|cat:'</style>'}

<div id="storiesext{$bid}">
    <div id="vmarquee{$bid}" style="position: absolute; width: 98%;">
        <ul class="storiesext">
        {foreach from=$stories item=story}
            <li>{$story}</li>
        {/foreach}
        </ul>
    </div>
</div>

<script type="text/javascript">
    // <![CDATA[
    new marqueescroller("storiesext{{$bid}}", "vmarquee{{$bid}}", {{$scrolldelay}}, {{$scrollmspeed}})
    // ]]>
</script>

{checkpermissionblock component='Storiesextblock::' instance="$bid::" level=ACCESS_ADMIN}
<div style="position: relative; top: -1em; margin-bottom: -1em; text-align: right;">
    {gt text='Edit this block' assign='editlink'}
    <a href="{modurl modname='Blocks' type='admin' func='modify' bid=$bid}">{img modname='core' set='icons/extrasmall' src='edit.png' title=$editlink alt=$editlink}</a>
</div>
{/checkpermissionblock}
