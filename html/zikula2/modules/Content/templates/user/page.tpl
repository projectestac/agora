{if $page.metadescription ne ''}
    {setmetatag name='description' value=$page.metadescription|replace:"<br />":"\n"|strip_tags|replace:"\"":""}
{/if}
{if $page.metakeywords ne ''}
    {setmetatag name='keywords' value=$page.metakeywords|replace:"<br />":"\n"|strip_tags|replace:"\"":""}
{/if}
<div id="page{$page.id}" class="z-content-page">
    {include file='user/pageinfo.tpl'}
    {if $page.showTitle && !$page.titleintemplate}<h2>{$page.title}</h2>{/if}
    {include file=$page.layoutTemplate inlist=0}
</div>