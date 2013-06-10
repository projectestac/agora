<dl class="wl-sortlinks wl-center">
    <dt><strong>{gt text="Sites currently sorted by"}: {orderbyTrans orderby=$orderby}</strong></dt>
    <dd>{gt text="Sort links by"}:
        {gt text="Title"} ( <a href="{modurl modname='Weblinks' type='user' func='category' cid=$category.cat_id orderby=titleA}" title="{gt text="Title (A to Z)"}">+</a> | <a href="{modurl modname='Weblinks' type='user' func='category cid=$category.cat_id orderby=titleD}" title="{gt text="Title (Z to A)"}">-</a> )
        {gt text="Date"} ( <a href="{modurl modname='Weblinks' type='user' func='category' cid=$category.cat_id orderby=dateA}" title="{gt text="Date (oldest links listed first)"}">+</a> | <a href="{modurl modname='Weblinks' type='user' func='category cid=$category.cat_id orderby=dateD}" title="{gt text="Date (newest links listed first)"}">-</a> )
        {gt text="Popularity"} ( <a href="{modurl modname='Weblinks' type='user' func='category' cid=$category.cat_id orderby=hitsA}" title="{gt text="Popularity (from fewest hits to most hits)"}">+</a> | <a href="{modurl modname='Weblinks' type='user' func='category cid=$category.cat_id orderby=hitsD}" title="{gt text="Popularity (from most hits to fewest hits)"}">-</a> )
    </dd>
</dl>