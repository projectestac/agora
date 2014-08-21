{insert name="getstatusmsg"}
{if $page.metadescription ne ''}
    {setmetatag name='description' value=$page.metadescription|replace:"<br />":"\n"|strip_tags|replace:"\"":""}
{/if}
{if $page.metakeywords ne ''}
    {setmetatag name='keywords' value=$page.metakeywords|replace:"<br />":"\n"|strip_tags|replace:"\"":""}
{/if}
<div id="page{$page.id}" class="z-content-page">
    {if empty($modvars.Content.pageinfoLocation) or $modvars.Content.pageinfoLocation eq 'top'}
        {include file='user/pageinfo.tpl'}
    {/if}
    {if $page.showTitle && !$page.titleintemplate}<h2>{$page.title}</h2>{/if}
    {*<p>{$page.optionalString1}</p>
    <p>{$page.optionalString2}</p>
    <p>{$page.optionalText}</p>*}
    {include file=$page.layoutTemplate inlist=0}
    {if !empty($modvars.Content.pageinfoLocation) and $modvars.Content.pageinfoLocation eq 'bottom'}
        {include file='user/pageinfo.tpl'}
    {/if}
</div>

