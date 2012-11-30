<div class="content-layout column3">

    <div class="content-area-top">
        {if !empty($page.content[0])}
        {foreach from=$page.content[0] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>

    <div class="content-area-left w25">
        {if !empty($page.content[1])}
        {foreach from=$page.content[1] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>

    <div class="content-area-center w25">
        {if !empty($page.content[2])}
        {foreach from=$page.content[2] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>

    <div class="content-area-right w50">
        {if !empty($page.content[3])}
        {foreach from=$page.content[3] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>

    <div class="content-area-bottom">
        {if !empty($page.content[4])}
        {foreach from=$page.content[4] item=c}
        {contenteditthis data=$c access=$access type='content'}
        {$c.output}
        {/foreach}
        {/if}
    </div>

</div>
{include file="layouttype/footer.tpl" pid=$page.id}