{gt text='Pages' assign=templatetitle}
{pagesetvar name='title' value=$templatetitle}
{insert name='getstatusmsg'}

{if $modvars.Pages.enablecategorization}
<h2>{$templatetitle}</h2>
<p>{gt text='Available categories:'}</p>
{foreach from=$propertiesdata item='property'}
<ul>
    {foreach from=$property.subcategories item='category'}
    {* get the category name and description avoiding E_ALL errors *}
    {array_field assign='categoryname' array=$category.display_name field=$modvars.ZConfig.language_i18n}
    {if $categoryname eq ''}{assign var='categoryname' value=$category.name}{/if}
    {array_field assign="categorydesc" array=$category.display_desc field=$modvars.ZConfig.language_i18n}

    {if $modvars.ZConfig.shorturls}
    <li><a href="{modurl modname='Pages' type='user' func='view' prop=$property.name cat=$category.path|replace:$property.rootcat.path:''}" title="{$categorydesc}">{$categoryname}</a> ({gt text='%s page' plural='%s pages' count=$category.count tag1=$category.count})</li>
    {else}
    <li><a href="{modurl modname='Pages' type='user' func='view' prop=$property.name cat=$category.id}" title="{$categorydesc}">{$categoryname}</a> ({gt text='%s page' plural='%s pages' count=$category.count tag1=$category.count})</li>
    {/if}
    {/foreach}
</ul>
{/foreach}
{else}
{modfunc modname='Pages' type='user' func='view'}
{/if}