{contentpageheading __header='Categories'}
{nocache}{modulelinks modname='Content' type='user'}{/nocache}
{gt text="Contents" assign=title}
{pagesetvar name='title' value=$title}
<h2>{gt text='Welcome to the contents for %s' tag1=$modvars.ZConfig.sitename}</h2>

{if !empty($categories)}
    <p>{gt text="The available sections are as follows:"}</p>
    <ul>
        {foreach from=$categories item=category}
        {if $modvars.ZConfig.shorturls}
        <li><a href="{modurl modname='Content' type='user' func='view' cat=$category.path|replace:$rootCategory.path:''}" title="{$category.display_desc.$lang}">{$category.display_name.$lang}</a></li>
        {else}
        <li><a href="{modurl modname='Content' type='user' func='list' cat=$category.id}" title="{$category.display_desc.$lang}">{$category.display_name.$lang}</a></li>
        {/if}
        {/foreach}
    </ul>
{else}
    <p>{gt text="There are no pages to display."}</p>
{/if}
