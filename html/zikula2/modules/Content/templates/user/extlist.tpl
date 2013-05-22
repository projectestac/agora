{contentpageheading __header='Extended page list'}
{gt text="Extended page list" assign=title}
{nocache}{modulelinks modname='Content' type='user'}{/nocache}
{pagesetvar name='title' value=$title}

{if !empty($pages)}
    {foreach from=$pages item=page}
        <h2><a href="{modurl modname='Content' type='user' func='view' pid=$page.id}">{$page.title}</a></h2>
        {if !empty($page.content[0])}
        {foreach from=$page.content[0] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        <p><a href="{modurl modname='Content' type='user' func='view' pid=$page.id}">{gt text="more"}</a></p>
        {/if}
    {/foreach}
{else}
    {gt text="There are no pages to display."}
{/if}

{pager show="page" rowcount=$pageCount limit=$pageSize posvar=page display=page}
