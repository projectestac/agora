{pageaddvar name='javascript' value='modules/News/javascript/storiesext_pausing.js'}
{assign var='divid' value='#storiesext'|cat:$bid}
{assign var='parsedstyle' value=$scrollstyle|replace:'%DIVID%':$divid}
{pageaddvar name="header" value='<style type="text/css">'|cat:$parsedstyle|cat:'</style>'}

{foreach from=$stories key='k' item='story'}
<div id="storiesext{$bid}{$k}">{$story}</div>
{/foreach}

<script type="text/javascript">
    // <![CDATA[
    var scrollcontent = new Array();
    var inc = 0;
    while (document.getElementById("storiesext{{$bid}}"+inc)) {
        scrollcontent[inc] = document.getElementById("storiesext{{$bid}}"+inc).innerHTML;
        document.getElementById("storiesext{{$bid}}"+inc).style.display = "none";
        inc++
    }
    new pausescroller(scrollcontent, "storiesext{{$bid}}", "storiesextscroll", {{$scrolldelay}})
    // ]]>
</script>

{checkpermissionblock component='Storiesextblock::' instance='$title::' level=ACCESS_ADMIN}
<div style="position: relative; top: -1em; margin-bottom: -1em; text-align: right;">
    {gt text='Edit this block' assign='editlink'}
    <a href="{modurl modname='Blocks' type='admin' func='modify' bid=$bid}">{img modname='core' set='icons/extrasmall' src='edit.png' title=$editlink alt=$editlink}</a>
</div>
{/checkpermissionblock}
