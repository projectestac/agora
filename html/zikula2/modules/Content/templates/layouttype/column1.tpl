<div class="content-layout column1">

    <div class="content-area-top">
        {if !empty($page.content[0])}
        {foreach from=$page.content[0] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>

    <div class="content-area-center">
        {if !empty($page.content[1])}
        {foreach from=$page.content[1] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>
</div>
{include file="layouttype/footer.tpl" pid=$page.id}