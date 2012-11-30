<div class="content-layout column2">
    {* The layout is split into 2 columns, where the right column
           contains the additional right side blocks *}
    <div class="content-area-left w66">
        <div class="content-layout column2">
            <div class="content-area-top">
                {if !empty($page.content[0])}
                {foreach from=$page.content[0] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>

            <div class="content-area-left w50">
                {if !empty($page.content[1])}
                {foreach from=$page.content[1] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>

            <div class="content-area-right w50">
                {if !empty($page.content[2])}
                {foreach from=$page.content[2] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>

            <div class="content-area-middle">
                {if !empty($page.content[3])}
                {foreach from=$page.content[3] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>
            
            <div class="content-area-left w50">
                {if !empty($page.content[4])}
                {foreach from=$page.content[4] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>	
            
            <div class="content-area-right w50">
                {if !empty($page.content[5])}
                {foreach from=$page.content[5] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>	
	
            <div class="content-area-middle">
                {if !empty($page.content[6])}
                {foreach from=$page.content[6] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>

            <div class="content-area-left w50">
                {if !empty($page.content[7])}
                {foreach from=$page.content[7] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>

            <div class="content-area-right w50">
                {if !empty($page.content[8])}
                {foreach from=$page.content[8] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>

            <div class="content-area-bottom">
                {if !empty($page.content[9])}
                {foreach from=$page.content[9] item=c}
                {contenteditthis data=$c access=$access type='content'}
                {$c.output}
                {/foreach}
                {/if}
            </div>	    
        </div>
    </div>

    <div class="content-area-right w33">
        <div>
            {if !empty($page.content[10])}
            {foreach from=$page.content[10] item=c}
            {contenteditthis data=$c access=$access type='content'}
            {$c.output}
            {/foreach}
            {/if}
        </div>

        <div>
            {blockposition name=content_rightblocks}
        </div>

        <div>
            {if !empty($page.content[11])}
            {foreach from=$page.content[11] item=c}
            {contenteditthis data=$c access=$access type='content'}
            {$c.output}
            {/foreach}
            {/if}
        </div>
    </div>
</div>
{include file="layouttype/footer.tpl" pid=$page.id}