<p>
    {assign var="notfirst" value=0}
    {foreach from=$path item="page"}
    {if $notfirst}
    &raquo;
    {/if}
    {if $page.id != $thispage}<a href="{modurl modname="Content" type='user' func="view" pid=$page.id}">{/if}{$page.title|safetext}{if $page.id != $thispage}</a>{/if}
    {assign var="notfirst" value="1"}
    {/foreach}
</p>

{* 
Could be grapically enhanced, see:
- http://css-tricks.com/triangle-breadcrumbs/
- http://veerle-v2.duoh.com/blog/comments/simple_scalable_css_based_breadcrumbs/ 
*}