{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Crea un nou tipus de sol·licitud"}</h3>
<form class="form-horizontal" enctype="application/x-www-form-urlencoded" method="post" id="editRequestType" action="{modurl modname='Agoraportal' type='admin' func='addNewRequestType'}" onsubmit="return sendEditRequestType();">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="confirmation" value="1" />
    <div class="form-group">
        <label class="col-sm-4 control-label" for="requestTypeName">{gt text="Nom del Tipus de sol·licitud"}:</label>
        <div class="col-sm-8">
            <input class="form-control" id="requestTypeName" type="text" name="requestTypeName" size="100" maxlength="150" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="requestTypeDescription">{gt text="Descripció del Tipus de sol·licitud"}:</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="requestTypeDescription" cols="50" rows="3" name="requestTypeDescription"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label" for="requestTypeUserComments">{gt text="Text per al quadre de comentaris dels usuaris"}:</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="requestTypeUserCommentsText" cols="50" rows="3" name="requestTypeUserCommentsText"></textarea>
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
