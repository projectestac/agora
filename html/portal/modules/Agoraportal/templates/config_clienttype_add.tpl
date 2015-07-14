{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Crea una tipologia de client nova"}</h3>
<form class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" id="editType" action="{modurl modname='Agoraportal' type='admin' func='addNewType'}"  onsubmit="return sendEditType();">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirmation" value="1" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="typeName">{gt text="Nom de la tipologia"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="typeName" type="text" name="typeName" size="30" maxlength="150"/>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-success" title="Crea" type="submit">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Crea"}
        </button>
        <a class="btn btn-danger" title="Cancel·la" href="{modurl modname='Agoraportal' type='admin' func='config'}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
        </a>
    </div>
</form>

<script>
    var noTypeName = "{{gt text="No has escrit el nom de la tipologia"}}";
</script>