<div class="content-paragraph">
    {if $inputType!="raw"}
    {$text|paragraph|notifyfilters:'content.hook.contentitem.ui.filter'}
    {else}
    {$text|notifyfilters:'content.hook.contentitem.ui.filter'}
    {/if}
</div>