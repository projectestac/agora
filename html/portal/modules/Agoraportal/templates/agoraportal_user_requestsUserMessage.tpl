{if $requestTypeId eq '1' && !$thresholdExceeded}
<div class="z-informationmsg">
    El servei seleccionat no arriba al mínim d'espai ocupat per poder sol·licitar 
    l'ampliació de la quota. Només és possible demanar-la si es donen simultàniament
    dues condicions: que l'ocupació superi el {$diskRequestThreshold}% i que, a
    més, l'espai lliure sigui inferior a {$maxFreeQuotaForRequest} MB.
</div>
{else}

<div class="z-informationmsg">

    {$info.description}
</div>
<div>
    {$info.userCommentsText}:
    <textarea name="comments" rows="3"></textarea>
</div>

<div class="z-center">
    <span class="z-buttons">
        <a href="javascript:addRequest();">
            {img modname='core' src='button_ok.gif' set='icons/small' __alt="Afegeix" __title="Afegeix"}
            {gt text="Afegeix"}
        </a>
    </span>
    <span class="z-buttons">
        {if $isAdmin}
        <a href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client.clientCode}">
            {img modname='core' src='button_cancel.gif' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
            {gt text="Cancel·la"}
        </a>
        {else}
        <a href="{modurl modname='Agoraportal' type='user' func='myAgora'}">
            {img modname='core' src='button_cancel.gif' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
            {gt text="Cancel·la"}
        </a>
        {/if}
    </span>
</div>
{/if}





