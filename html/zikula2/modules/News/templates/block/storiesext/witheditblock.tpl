<ul class="storiesext">
    {foreach from=$stories item='story'}
    <li>{$story}</li>
    {/foreach}
</ul>

{checkpermissionblock component='Storiesextblock::' instance="$bid::" level=ACCESS_ADMIN}
<div style="position: relative; top: -1em; margin-bottom: -1em; text-align: right;">
    {gt text='Edit this block' assign='editlink'}
    <a href="{modurl modname='Blocks' type='admin' func='modify' bid=$bid}">{img modname='core' set='icons/extrasmall' src='edit.png' title=$editlink alt=$editlink}</a>
</div>
{/checkpermissionblock}
