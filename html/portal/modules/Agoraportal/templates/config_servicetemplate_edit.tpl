{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Edita un tipus de plantilla"}</h3>
<form class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" action="{modurl modname='Agoraportal' type='admin' func='editModelType'}" id="editModelType" onsubmit="return sendEditModelType();">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirmation" value="1" />
    <input type="hidden" name="modelTypeId" value="{$model->modelTypeId}" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="shortcode">{gt text="Codi curt pels noms dels fitxers"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="shortcode" type="text" name="shortcode" size="100" maxlength="100" value="{$model->shortcode}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="description">{gt text="Descripció que veuen els usuaris"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="description" type="text" name="description" size="100" maxlength="255" value="{$model->description}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="url">{gt text="URL (per replace)"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="url" type="text" name="url" size="255" maxlength="255" value="{$model->url}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="dbHost">{gt text="Base de dades (per replace)"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="dbHost" type="text" name="dbHost" size="30" maxlength="255" value="{$model->dbHost}"/>
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
