<nav class="pull-right">
    {$total} {$itemsname}
    {if $items}
    - <strong>{gt text="Pàgines"} </strong>
        <ul class="pagination">
            {foreach from=$items key=pag item=item}
                {if $pag eq $init}
                    <li class="active">
                        <button type="button" class="btn btn-primary">{$item}</button>
                    </li>
                {else}
                    <li>{$item}</li>
                {/if}
            {/foreach}
        </ul>
    {/if}
</nav>