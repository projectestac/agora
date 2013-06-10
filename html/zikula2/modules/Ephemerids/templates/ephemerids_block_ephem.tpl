{section name=ephemerids loop=$items}
<div class="ephemerids_block">
    <h3>{$items[ephemerids].yid|safetext}</h3>
    {$items[ephemerids].content|nl2br|safehtml}
</div>
{/section}
