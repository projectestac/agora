{include file="user/menu.tpl"}

{if $categories}
<h2>{gt text="Categories"}</h2>
{foreach from=$categories key='property' item='category'}
<ul>
    {foreach from=$category.subcategories item='subcategory'}

    {* get the category name avoiding E_ALL errors *}
    {array_field assign="categoryname" array=$subcategory.display_name field=$lang}
    {if $categoryname eq ''}{assign var="categoryname" value=$subcategory.name}{/if}
    {array_field assign="categorydesc" array=$subcategory.display_desc field=$lang}

    {if $modvars.ZConfig.shorturls}
    <li><a href="{modurl modname='FAQ' type='user' func='view' prop=$property cat=$subcategory.path|replace:$category.path:''}" title="{$categorydesc}">{$categoryname}</a></li>
    {else}
    <li><a href="{modurl modname='FAQ' type='user' func='view' prop=$property cat=$subcategory.id}" title="{$categorydesc}">{$categoryname}</a></li>
    {/if}
    {/foreach}
</ul>
{/foreach}
{/if}
<hr />
{if $cat}
{array_field assign="categoryname" array=$cat.display_name field=$lang}
{if $categoryname eq ''}{assign var="categoryname" value=$cat.name}{/if}
{array_field assign="categorydesc" array=$cat.display_desc field=$lang}

<h2>{$categoryname}</h2>
{if $categorydesc neq ''}<p>{$categorydesc}</p>{/if}

{else}

<h2>{gt text="Recent FAQs"}</h2>

{/if}

{modurl modname=FAQ type='user' func='view' prop=$property startnum=$startnum assign='returnurl'}

<h3>{gt text="Questions"}</h3>
<ul>
    {foreach item=item from=$faqs}
    <li class='{cycle values="z-odd,z-even"}'><a href="#faq{$item.faqid}"><em>{$item.question}</em></a></li>
    {/foreach}
</ul>

<h3>{gt text="Answers"}</h3>
{foreach item='item' from=$items}
{$item}
{/foreach}
{pager  show="page" rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}
