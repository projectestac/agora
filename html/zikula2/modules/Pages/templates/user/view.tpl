{gt text='Pages list' assign=templatetitle}
{pagesetvar name='title' value=$templatetitle}
{insert name='getstatusmsg'}

{if $action eq 'subcatslist'}
<h2>{gt text='Contents'}</h2>
<p>{gt text='Available categories:'}</p>
<ul>
    {section loop=$listproperties name='k'}
    {section loop=$listcategories[k] name='i'}
    {* get the category name and description avoiding E_ALL errors *}
    {array_field assign='categoryname' array=$listcategories[k][i].display_name field=$lang}
    {if $categoryname eq ''}{assign var='categoryname' value=$listcategories[k][i].name}{/if}
    {array_field assign='categorydesc' array=$listcategories[k][i].display_desc field=$lang}

    {if $modvars.ZConfig.shorturls}
    <li><a href="{modurl modname='Pages' type='user' func='view' prop=$listproperties[k] cat=$listcategories[k][i].path|replace:$listrootcats[k].path:''}" title="{$categorydesc}">{$categoryname}</a></li>
    {else}
    <li><a href="{modurl modname='Pages' type='user' func='view' prop=$listproperties[k] cat=$listcategories[k][i].id}" title="{$categorydesc}">{$categoryname}</a></li>
    {/if}
    {/section}
    {/section}
</ul>
{else}
{if $modvars.Pages.enablecategorization and $category}
{* get the category name avoiding E_ALL errors *}
{array_field assign='categoryname' array=$category.display_name field=$lang}
{if $categoryname eq ''}{assign var='categoryname' value=$category.name}{/if}
<h2>{gt text='Category: %s' tag1=$categoryname} </h2>
<p>{gt text='Pages published under this category:'}</p>
{else}
<h2>{gt text='Pages list'}</h2>
<p>{gt text='Available pages:'}</p>
{/if}

<ul>
    {foreach item='page' from=$pages}
    <li>{$page}</li>
    {/foreach}
</ul>

{pager show='page' rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}
{/if}