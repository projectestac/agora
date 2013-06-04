{pagesetvar name='title' value=$item.title}
{insert name='getstatusmsg'}

{if $item.metadescription ne ''}
    {setmetatag name='description' value=$item.metadescription|safehtml}
{/if}
{if $item.metakeywords ne ''}
    {setmetatag name='keywords' value=$item.metakeywords|safehtml}
{/if}

<div class="pages_page_container">
    {if $item.displaytitle}
    <h2>{$item.title|safehtml}</h2>
    {/if}

    {if $item.displaywrapper or $item.displaycreated or $item.displayupdated}
    <div class="pages_page_header">
        <ul>
            {if $item.displaycreated and $item.cr_uid}
            {usergetvar name='uname' uid=$item.cr_uid assign='cr_uname'}
            <li>{gt text='Created by %1$s on %2$s' tag1=$cr_uname|profilelinkbyuname tag2=$item.cr_date|dateformat}</li>
            {/if}
            {if $item.displayupdated and $item.lu_uid}
            {usergetvar name='uname' uid=$item.lu_uid assign='lu_uname'}
            <li>{gt text='Last update by %1$s on %2$s' tag1=$lu_uname|profilelinkbyuname tag2=$item.lu_date|dateformat}</li>
            {/if}
            {if $item.__CATEGORIES__}
            <li>{gt text='Categories'}:
                {foreach from=$item.__CATEGORIES__ key='property' item='category' name='cats'}
                {if $category.accessible}
                {if $modvars.ZConfig.shorturls}
                <a href="{modurl modname='Pages' type='user' func='view' prop=$property cat=$category.path_relative}" title="{$category.display_desc.$lang}">{$category.display_name.$lang}</a>
                {else}
                <a href="{modurl modname='Pages' type='user' func='view' prop=$property cat=$category.id}" title="{$category.display_desc.$lang}">{$category.display_name.$lang}</a>
                {/if}
                {/if}
                {if $smarty.foreach.cats.last}{else}, {/if}
                {/foreach}
            </li>
            {/if}
        </ul>
    </div>
    {/if}

    <div class="pages_page_body">
        {$item.content|notifyfilters:'pages.filter_hooks.pages.filter'|safehtml}
    </div>

    {if $item.displayprint or $item.displaytextinfo or $item.displayeditlink}
    <div class="pages_page_footer">
        {if $item.displayeditlink}
        <a href="{modurl modname='Pages' type='admin' func='modify' pageid=$item.pageid}">{gt text='Edit'}</a>
        <span class="text_separator">|</span>
        {/if}
        {if $item.displaytextinfo}
        {gt text='%s total words in this text' tag1=$item.content|count_words}
        <span class="text_separator">|</span>
        {gt text='%s reads' tag1=$item.counter}
        {/if}
        {if $item.displayprint}
        <span class="pages_page_printerlink">
            <a href="{modurl modname='Pages' type='user' func='display' pageid=$item.pageid theme='Printer'}">{img modname='core' src='printer.png' set='icons/small' __alt='Print page'}</a>
        </span>
        {/if}
    </div>
    {/if}

    {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='page'}

    {notifydisplayhooks eventname='pages.ui_hooks.pages.display_view' id=$item.pageid}
</div>