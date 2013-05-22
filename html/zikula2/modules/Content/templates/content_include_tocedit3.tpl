{foreach from=$pages item=page}
    content.tocAddPage({$page.id});
{/foreach}