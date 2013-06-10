{include file="user/header.tpl"}
<div class="wl-borderbox">

    <div class="wl-center">
        {if $mostpoplinkspercentrigger == 1}
        <h3>{gt text="Most-popular - leading"} {$toplinkspercent}% ({gt text="of all"} {$totalmostpoplinks} {gt text="Links"})</h3>
        {else}
        <h3>{gt text="Most-popular - leading"} {$mostpoplinks}</h3>
        {/if}
        <p>
            {gt text="Show leading"}: [
            <a href="{modurl modname='Weblinks' type='user' func='mostpopular' ratenum=10 ratetype='num'}">10</a> -
            <a href="{modurl modname='Weblinks' type='user' func='mostpopular' ratenum=25 ratetype='num'}">25</a> -
            <a href="{modurl modname='Weblinks' type='user' func='mostpopular' ratenum=50 ratetype='num'}">50</a> |
            <a href="{modurl modname='Weblinks' type='user' func='mostpopular' ratenum=1 ratetype='percent'}">1%</a> -
            <a href="{modurl modname='Weblinks' type='user' func='mostpopular' ratenum=5 ratetype='percent'}">5%</a> -
            <a href="{modurl modname='Weblinks' type='user' func='mostpopular' ratenum=10 ratetype='percent'}">10%</a> ]
        </p>
    </div>

    {foreach from=$weblinks item='link'}
    <div class="wl-linkbox">
        {include file="user/linkbox.tpl"}
    </div>
    {/foreach}

</div>
{include file="user/footer.tpl"}