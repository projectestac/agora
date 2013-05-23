{nocache}{include file='user/menu.tpl'}{/nocache}
{insert name='getstatusmsg'}

{if $enablecategorization}
    {* assign page title *}
    {gt text='News categories' assign='NewsCatTitle'}
    {pagesetvar name='title' value=$NewsCatTitle}

    <h3>{$NewsCatTitle}</h3>

    {foreach from=$propertiesdata item='property'}
        {if $propertiesdata|@count gt 1}
        <h4>
        {$property.name} 
        {if $property.category.news_totalarticlecount gt 0}
            ({gt text='%s article' plural='%s articles' count=$property.category.news_totalarticlecount tag1=$property.category.news_totalarticlecount})
        {else}
            ({gt text='Currently no articles'})
        {/if}
        </h4>
        {/if}

        {assign var='category' value=`$property.category`}
        <ul class="news_categorylist">
        {foreach from=$category.subcategories item='category'}
            {* get the category name and description avoiding EAll errors *}
            {array_field assign='categoryname' array=$category.category.display_name field=$lang}
            {if $categoryname eq ''}{assign var='categoryname' value=$category.category.name}{/if}
            {array_field assign='categorydesc' array=$category.category.display_desc field=$lang}
            {assign var='categoryid' value=$category.category.id}
            {checkpermission component='Categories::category' instance="ID::$category.category.id" level='ACCESS_EDIT' assign='authcatedit'}
            <li>
                {* Remove this line to enable category image display
                {if !empty($category.category.catimage)}
                    <img src="{$catimagepath}{$category.category.catimage}" alt="{$categoryname}" />
                {/if}
                Remove this line to enable category image display *} 
                {if $shorturls}
                <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$category.category.path|replace:$property.category.path:'' theme='RSS'}">{img modname='core' set='feeds' src='feed-icon-12x12.png' __alt='RSS feed' __title='RSS feed'}</a>
                {else}
                <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$category.category.id theme='RSS'}">{img modname='core' set='feeds' src='feed-icon-12x12.png' __alt='RSS feed' __title='RSS feed'}</a>
                {/if}

                {if $authcatedit}
                <a href="{modurl modname='Categories' type='admin' func='edit' mode='edit' cid=$category.category.id}">{img modname='core' set='icons/extrasmall' src='xedit.png' __alt='Edit' __title='Edit this category'}</a>
                {/if}
                {if $shorturls}
                <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$category.category.path|replace:$property.category.path:''}" title="{$categorydesc}">{$categoryname}</a>
                {else}
                <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$category.category.id}" title="{$categorydesc}">{$categoryname}</a>
                {/if}

                &nbsp;&nbsp;
                <span class="z-sub">
                    {nocache}
                    {if $category.category.news_totalarticlecount gt 0}
                        {if $category.category.news_articlecount gt 0}{gt text='%s article' plural='%s articles' count=$category.category.news_articlecount tag1=$category.category.news_articlecount}{/if}
                        {if $category.category.news_totalarticlecount gt $category.category.news_articlecount}{$category.category.news_totalarticlecount} {gt text='Total'}{/if}
                        {if $category.category.news_yourarticlecount gt 0}{gt text='%s contributed by you' tag1=$category.category.news_yourarticlecount}{/if}
                    {else}
                        {gt text='Currently no articles.'}
                    {/if}
                    {/nocache}
                </span>

                {* Second level category display *}
                {if !empty($category.subcategories)}
                <ul style="margin-bottom: 0">
                {foreach from=$category.subcategories item='subcat'}
                    {array_field assign='categoryname' array=$subcat.category.display_name field=$lang}
                    {if $categoryname eq ''}{assign var='categoryname' value=$subcat.category.name}{/if}
                    {array_field assign='categorydesc' array=$subcat.category.display_desc field=$lang}
                    {assign var='categoryid' value=$subcat.category.id}
                    {checkpermission component='Categories::category' instance="ID::$subcat.category.id" level='ACCESS_EDIT' assign='authcatedit'}
                    <li>
                {* Remove this line to enable category image display
                {if !empty($subcat.category.catimage)}
                    <img src="{$catimagepath}{$subcat.category.catimage}" alt="{$categoryname}" />
                {/if}
                Remove this line to enable category image display *} 
                        {if $shorturls}
                        <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$subcat.category.path|replace:$property.category.path:'' theme='RSS'}">{img modname='core' set='feeds' src='feed-icon-12x12.png' __alt='RSS feed' __title='RSS feed'}</a>
                        {else}
                        <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$subcat.category.id theme='RSS'}">{img modname='core' set='feeds' src='feed-icon-12x12.png' __alt='RSS feed' __title='RSS feed'}</a>
                        {/if}

                        {if $authcatedit}
                        <a href="{modurl modname='Categories' type='admin' func='edit' mode='edit' cid=$subcat.category.id}">{img modname='core' set='icons/extrasmall' src='xedit.png' __alt='Edit' __title='Edit this category'}</a>
                        {/if}
                        {if $shorturls}
                        <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$subcat.category.path|replace:$property.category.path:''}" title="{$categorydesc}">{$categoryname}</a>
                        {else}
                        <a href="{modurl modname='News' type='user' func='view' prop=$property.name cat=$subcat.category.id}" title="{$subcatdesc}">{$categoryname}</a>
                        {/if}

                        &nbsp;&nbsp;
                        <span class="z-sub">
                            {nocache}
                            {if $subcat.category.news_totalarticlecount gt 0}
                                {if $subcat.category.news_articlecount gt 0}{gt text='%s article' plural='%s articles' count=$subcat.category.news_articlecount tag1=$subcat.category.news_articlecount}{/if}
                                {if $subcat.category.news_totalarticlecount gt $subcat.category.news_articlecount}| {$subcat.category.news_totalarticlecount} {gt text='Total'}{/if}
                                {if $subcat.category.news_yourarticlecount gt 0}| {gt text='%s contributed by you' tag1=$subcat.category.news_yourarticlecount}{/if}
                            {else}
                                {gt text='Currently no articles.'}
                            {/if}
                            {/nocache}
                        </span>
                    </li>
                {/foreach}
                </ul>
                {/if}
                {* End of second level subcategories *}

            </li>
        {/foreach}
        </ul>
    {/foreach}
{else}
    {modfunc modname='News' type='user' func='view'}
{/if}
