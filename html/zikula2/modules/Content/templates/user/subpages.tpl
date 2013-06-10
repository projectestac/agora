<h2>{gt text="Subpages of %s" tag1=$title}</h2>
<ul>
    {foreach from=$subPages item=page}
    {include file="user/subpagelistitem.tpl page=$page}
    {foreachelse}
    <li>{gt text="No subpages available"}</li>
    {/foreach}
</ul>