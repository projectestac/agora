{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Crea un Servei Territorial nou"}</h3>
<form class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" id="editLocation" action="{modurl modname='Agoraportal' type='admin' func='addNewLocation'}" onsubmit="return sendEditLocation();">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirmation" value="1" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="locationName">{gt text="Nom del Servei Territorial"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="locationName" type="text" name="locationName" size="30" maxlength="150"/>
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
    var noLocationName = "{{gt text='No has escrit el nom del Servei Territorial'}}";
</script>