{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Edita el nom de la tipologia de client"}</h3>
<form class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" id="editType" action="{modurl modname='Agoraportal' type='admin' func='editType'}"  onsubmit="return sendEditType();">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="typeId" value="{$type->typeId}" />
    <input type="hidden" name="confirmation" value="1" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="typeName">{gt text="Nom de la tipologia"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="typeName" type="text" name="typeName" size="30" maxlength="150"  value="{$type->typeName}"/>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-success" title="Desa" type="submit">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Desa"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='config'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>
<script>
    var noTypeName = "{{gt text="No has escrit el nom de la tipologia de client"}}";
</script>