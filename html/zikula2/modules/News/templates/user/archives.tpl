{nocache}
{pageaddvar name='javascript' value='modules/News/javascript/simpletree.js'}
{pageaddvar name='stylesheet' value='modules/News/style/news_treeview.css'}
{include file='user/menu.tpl'}
{/nocache}
{insert name='getstatusmsg'}

{* Check if overview display is needed or detail display for a month *}
{if $archiveitems eq ''}
{* assign page title *}
{gt text='News archive' assign='NewsArchiveTitle'}
{pagesetvar name='title' value=$NewsArchiveTitle}

<h3>{gt text='News archive'}</h3>
<p><a href="javascript:ddtreemenu.flatten('news-archive', 'expand')">{gt text='Expand all'}</a> | <a href="javascript:ddtreemenu.flatten('news-archive', 'contract')">{gt text='Contract all'}</a></p>

<ul id="news-archive" class="news_treeview">
    {foreach from=$archivemonths key='year' item='years'}
    <li>
        <h4>{$year}</h4>
        <ul>
            {foreach from=$years item='month'}
            <li>
                <a href="{$month.url|safetext}">{$month.title|safetext}</a>
                <span class="z-sub">({if $month.nrofarticles gt 0}{gt text='%s article' plural='%s articles' count=$month.nrofarticles tag1=$month.nrofarticles}{/if})</span>
            </li>
            {/foreach}
        </ul>
    </li>
    {/foreach}
</ul>

<script type="text/javascript">
    //ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
    ddtreemenu.closefolder = "{{$baseurl}}modules/News/images/expand.gif"; //set image path to "closed" folder image
    ddtreemenu.openfolder = "{{$baseurl}}modules/News/images/contract.gif"; //set image path to "open" folder image
    ddtreemenu.createTree("news-archive", true);
    ddtreemenu.flatten('news-archive', 'expand');
</script>

{else}
{* assign page title *}
{gt text='News archive for %1$s, %2$s' tag1=$month tag2=$year assign='NewsArchiveTitle'}
{pagesetvar name='title' value=$NewsArchiveTitle}

<h3>{$NewsArchiveTitle}</h3>

<table class="z-datatable">
    <thead>
        <tr>
            <th>{gt text='Title'}</th>
            {if $enablecategorization}
            <th>{gt text='Category'}</th>
            {/if}
            <th>{gt text='Pageviews'}</th>
            <th>{gt text='Contributed'}</th>
        </tr>
    </thead>
    <tbody>
        {section name='items' loop=$archiveitems}
        <tr>
            <td><a href="{modurl modname='News' type='user' func='display' sid=$archiveitems[items].sid|safetext}">{$archiveitems[items].title|safetext}</a></td>
            {if $enablecategorization}
            <td>
                {* assignedcategorieslist item=$archiveitems[items] format=1 start='' end='' seperator=',' possible after http://code.zikula.org/core/ticket/1043 plugin enhancements *}
                {assignedcategorieslist item=$archiveitems[items]}
            </td>
            {/if}
            <td>{$archiveitems[items].counter|safetext}</td>
            <td>{gt text='by %1$s on %2$s' tag1=$archiveitems[items].contributor|safetext tag2=$archiveitems[items].from|dateformat:'datetimebrief'|safetext}</td>
        </tr>
        {/section}
    </tbody>
</table>
{/if}
