{pagesetvar name='title' value=$item.title}
{insert name='getstatusmsg'}

{if $item.metadescription ne ''}
    {setmetatag name='description' value=$item.metadescription|safehtml}
{/if}
{if $item.metakeywords ne ''}
    {setmetatag name='keywords' value=$item.metakeywords|safehtml}
{/if}

<div class="Pages_ContentType_Page_container">
    {if $item.displaytitle}
    <h2>{$item.title|safehtml}</h2>
    {/if}

    {if $item.displaywrapper or $item.displaycreated or $item.displayupdated}
    <div class="Pages_ContentType_Page_header">
        <ul>
            {if $item.displaycreated && isset($item.cr_uid)}
            {usergetvar name='uname' uid=$item.cr_uid assign='cr_uname'}
            <li>{gt text='Created by %1$s on %2$s' tag1=$cr_uname|profilelinkbyuname tag2=$item.cr_date|dateformat}</li>
            {/if}
            {if $item.displayupdated && isset($item.lu_uid)}
            {usergetvar name='uname' uid=$item.lu_uid assign='lu_uname'}
            <li>{gt text='Last update by %1$s on %2$s' tag1=$lu_uname|profilelinkbyuname tag2=$item.lu_date|dateformat}</li>
            {/if}

            {if $modvars.Pages.enablecategorization && isset($item.categories)}
            <li>{gt text='Categories'}:
                {foreach from=$item.categories key='property' item='c' name='cats'}
                {if isset($c.category.displayName.$lang)}
                {assign var="name" value=$c.category.displayName.$lang}
                {else}
                {assign var="name" value=$c.category.name}
                {/if}
                {if $modvars.ZConfig.shorturls}
                <a href="{modurl modname='Pages' type='user' func='view' prop='Main' cat=$c.category.name}" title="{$c.category.name}">{$c.category.name}</a>
                {else}
                <a href="{modurl modname='Pages' type='user' func='view' cat=$c.category.Id}" title="{$name}">{$name}</a>
                {/if}
                {if $smarty.foreach.cats.last}{else}, {/if}
                {/foreach}
            </li>
            {/if}
        </ul>
    </div>





    {/if}

    <div class="Pages_ContentType_Page_body">
        {$item.content|notifyfilters:'pages.filter_hooks.pages.filter'|safehtml}
    </div>

    {if $item.displayprint or $item.displaytextinfo or $displayeditlink}
    <div class="Pages_ContentType_Page_footer">
        {if $displayeditlink}
        <a href="{modurl modname='Pages' type='admin' func='modify' pageid=$item.pageid}">{gt text='Edit'}</a>
        <span class="text_separator">|</span>
        {/if}
        {if $item.displaytextinfo}
        {gt text='%s total words in this text' tag1=$item.content|count_words}
        <span class="text_separator">|</span>
        {gt text='%s reads' tag1=$item.counter}
        {/if}
        {if $item.displayprint}
        <span class="Pages_ContentType_Page_printerlink">
            <a href="{modurl modname='Pages' type='user' func='display' pageid=$item.pageid theme='Printer'}">{img modname='core' src='printer.png' set='icons/small' __alt='Print page'}</a>
        </span>
        {/if}
    </div>
    {/if}

    {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='page'}

    {notifydisplayhooks eventname='pages.ui_hooks.pages.display_view' id=$item.pageid}
</div>