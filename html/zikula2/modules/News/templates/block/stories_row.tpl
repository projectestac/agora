{if $readperm}
    <a href="{modurl modname='News' type='user' func='display' sid=$sid}">{$title|safehtml}</a> ({$from|dateformat:'datebrief'})
{else}
    {$title|safehtml} ({$from|dateformat:'datebrief'})
{/if}
