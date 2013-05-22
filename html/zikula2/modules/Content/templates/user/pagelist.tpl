{contentpageheading __header='Complete page list'}
{nocache}{modulelinks modname='Content' type='user'}{/nocache}

{gt text="Complete page list" assign=title}
{pagesetvar name='title' value=$title}

{if !empty($pages)}
    <div class="content-pagelist">
        {foreach from=$pages item=page}
        {include file=$page.layoutTemplate inlist=1}
        <a class="content-pagemore" href="{modurl modname='Content' type='user' func='view' pid=$page.id}">{gt text="View full page"}</a>
        <hr />
        {/foreach}
    </div>
{else}
    {gt text="There are no pages to display."}
{/if}

{pager show="page" rowcount=$pageCount limit=$pageSize posvar=page display=page}