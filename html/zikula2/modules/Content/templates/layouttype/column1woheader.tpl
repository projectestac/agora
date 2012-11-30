{if !empty($page.content[0])}
{foreach from=$page.content[0] item=c}
{contenteditthis data=$c access=$access type='content'}
{$c.output}
{/foreach}
{/if}
{include file="layouttype/footer.tpl" pid=$page.id}