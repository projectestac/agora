{if $requestTypeId eq '1' && !$thresholdExceeded}
<div class="alert alert-info">
    El servei seleccionat no arriba al mínim d'espai ocupat per poder sol·licitar
    l'ampliació de la quota. Només és possible demanar-la si es donen simultàniament
    dues condicions: que l'ocupació superi el {$diskRequestThreshold}% i que, a
    més, l'espai lliure sigui inferior a {$maxFreeQuotaForRequest} MB.
</div>
{else}
<div class="alert alert-info">
    {$info->description}
</div>
<div class="form-group clearfix" style="display: block; margin-bottom:15px;">
    <label class="col-sm-4 control-label" for="comments">{$info->userCommentsText}:</label>
    <div class="col-sm-8">
        <textarea class="form-control" id="comments" name="comments" rows="3" style="width:100%;"></textarea>
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-success" title="Afegeix">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Afegeix"}
    </button>
    <a class="btn btn-danger" href="{modurl modname='Agoraportal' type='user' func='myAgora' clientCode=$client.clientCode}" title="Cancel·la">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  {gt text="Cancel·la"}
    </a>
</div>
{/if}





