{include file="user/header.tpl"}
{pagesetvar name=title value=$category.title}
<div class="wl-borderbox">

    <div class="wl-center">
        <h3>{gt text="Category"}: {catpath cid=$category.cat_id start=1 links=1 linkmyself=0}</h3>
        {if $category.cdescription}
        <p><em>{$category.cdescription|safehtml}</em></p>
        {/if}

        {if $subcategory}
        <dl class="wl-sublist">
            <dt>{gt text="Links also available in"} {$category.title|safetext} {gt text="sub-categories"}:</dt>
            {foreach from=$subcategory item=subcategory}
            <dd><a href="{modurl modname='Weblinks' type='user' func='category' cid=$subcategory.cat_id}" class="wl-catsub">{$subcategory.title|safetext}</a> ({countsublinks cid=$subcategory.cat_id})&nbsp;{categorynewlinkgraphic cat=$subcategory.cat_id}</dd>
            {/foreach}
        </dl>
        {/if}
    </div>

    {include file="user/sortlinksbymenu.tpl"}

    {foreach from=$weblinks item='link'}
    <div class="wl-linkbox">
        {include file="user/linkbox.tpl"}
    </div>
    {/foreach}

    {pager rowcount=$pagernumitems limit=$modvars.Weblinks.perpage posvar='startnum' shift=1 img_prev='images/icons/extrasmall/previous.png' img_next='images/icons/extrasmall/next.png'}
</div>
{include file="user/footer.tpl"}