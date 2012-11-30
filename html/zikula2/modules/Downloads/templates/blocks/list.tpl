<ul>
{foreach from=$downloads item='d'}
    <li>
        <a href="{modurl modname="Downloads" type="user" func="prepHandOut" lid=$d->getLid()}">{$d->getTitle()|safetext} (v{$d->getVersion()|safetext})[{$d->getFilesize()|safetext}Kb]</a>
        <a href="{modurl modname="Downloads" type="user" func="display" lid=$d->getLid()}">{img modname='core' set='icons/extrasmall' src='info.png' __title='View' __alt='View'}</a>
    </li>
    {* other array values available in a template override *}
    {*$d->getHits()*}
    {*$d->getDescription()*}
    {*$d->getSubmitter()*}
    {*assign var='category' value=$d->getCategory()*}{*$category->getTitle()*}
    {*$d->getUrl() is available but don't use it! - use prepHandOut method above*}
    
{foreachelse}
    <li>{gt text='No downloads available'}</li>
{/foreach}
</ul>
