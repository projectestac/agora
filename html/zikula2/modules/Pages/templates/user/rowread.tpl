{if $modvars.Pages.enablecategorization and $modvars.ZConfig.shorturls and $modvars.Pages.addcategorytitletopermalink}
{assign var='prop' value=$properties.0}
<a href="{modurl modname='Pages' type='user' func='display' pageid=$item.pageid cat=$item.__CATEGORIES__.$prop.path_relative}">{$item.title|safehtml}</a>
{else}
<a href="{modurl modname='Pages' type='user' func='display' pageid=$item.pageid}">{$item.title|safehtml}</a>
{/if}