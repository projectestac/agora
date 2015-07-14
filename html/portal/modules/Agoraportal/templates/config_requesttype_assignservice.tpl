{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Crea un nou tipus de sol·licitud"}</h3>
<form  class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" action="{modurl modname='Agoraportal' type='admin' func='addNewRequestTypeService'}">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirmation" value="1" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="service">{gt text="Tipus de servei"}:</label>
        <div class="col-sm-8">
            <select class="form-control" id="service" name="service">
                {foreach item=serviceItem from=$services}
                    <option value="{$serviceItem->serviceId}">{$serviceItem->serviceName}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="requesttype">{gt text="Tipus de sol·licitud"}:</label>
        <div class="col-sm-8">
            <select class="form-control" id="requesttype" name="requesttype">
                {foreach item=serviceItem from=$requestType}
                    <option value="{$serviceItem->requestTypeId}">{$serviceItem->name}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-success" title="Afegeix" type="submit">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Afegeix"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='config'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>
