{adminheader}

{include file="agoraportal_admin_menu.tpl"}

<h3>{gt text="Operacions"}</h3>
<form name="serviceForm" id="serviceForm" action="{modurl modname='Agoraportal' type='admin' func='operations'}" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="actionselect">{gt text="Acció"}</label>
                    <select class="form-control" name="actionselect" id="actionselect" onchange="prepareAction()" style="width:100%;">
                        <option value="">{gt text="No hi ha accions disponibles"}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{gt text="Descripció"}</label>
                    <div id="actiondescription" class="alert alert-info"></div>
                </div>
                <div class="form-group">
                    <label for="actionparams">{gt text="Paràmetres"}</label>
                </div>
                <div id="actionparams"></div>
            </div>
            <div class="col-md-4">
                {include file="agoraportal_admin_service_filter.tpl"}
                <br/><br/>
            </div>
        </div>
        <div class="row form-inline">
            <input name="queue" type="hidden" value="Executa" />
            <label for="actionparams">{gt text="Prioritat (Negativa: nocturna):"}</label>
            {html_options style="width:auto;" class="form-control" name="priority" options=$priority_values values=$priority_values selected=0}
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {gt text='Posa a la cua'}
            </button>
        </div>
    </div>
</form>

<script>
    var actions;
    window.onload = getServiceActions();
</script>

{adminfooter}
