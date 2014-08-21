{contentpageheading __header='Categories'}
{nocache}{modulelinks modname='Content' type='user'}{/nocache}
{gt text="Contents" assign=title}
{pagesetvar name='title' value=$title}
<h2>{gt text='Welcome to the contents for %s' tag1=$modvars.ZConfig.sitename}</h2>

{if !empty($categories)}
    <p>{gt text="The available categories:"}</p>
    <ul>
        {foreach from=$categories item=category}
        {if $modvars.ZConfig.shorturls}
        <li><a href="{modurl modname='Content' type='user' func='view' cat=$category.id}" title="{$category.display_desc.$lang}">{$category.display_name.$lang}</a> {if $pagecount[$category.id] gt 0}({gt text="%s Page" plural="%s Pages" tag1=$pagecount[$category.id] count=$pagecount[$category.id]}){/if}</li>
        {else}
        <li><a href="{modurl modname='Content' type='user' func='listpages' cat=$category.id}" title="{$category.display_desc.$lang}">{$category.display_name.$lang}</a> {if $pagecount[$category.id] gt 0}({gt text="%s Page" plural="%s Pages" tag1=$pagecount[$category.id] count=$pagecount[$category.id]}){/if}</li>
        {/if}
        {/foreach}
    </ul>
{else}
    <p>{gt text="There are no pages to display."}</p>
{/if}

