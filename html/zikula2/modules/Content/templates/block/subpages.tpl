{if !empty($subPages)}
<ul class="content-subpages">
{foreach item='page' from=$subPages}
    {include file='block/menuitem.tpl' page=$page}
{/foreach}
</ul>
{else}
<div>{gt text="No subpages"}</div>
{/if}