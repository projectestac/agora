{assign var="pageid" value=$page.pageid}
{assign var="title" value=$page.title}
{checkpermission component="Pages::Page" instance="$title::$pageid" level="ACCESS_READ" assign="auth"}
{if $auth}
<li></a><a href="{modurl modname="Pages" type="user" func="display" pageid=$page.pageid}">{$page.title}</a></li>
{/if}