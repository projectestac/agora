{adminheader}

<script src="modules/Agoraportal/includes/chartjs/Chart.min.js"></script>

{include file="agoraportal_admin_menu.tpl"}

<h3>{gt text="Estadístiques"}</h3>
<form name="statsForm" id="statsForm" action="{modurl modname='Agoraportal' type='admin' func='statsGetCSVContent'}" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <input type="hidden" name="lastorder" id="lastorder" value="clientDNS" />
                <input type="hidden" name="tableorder" id="tableorder" value="ASC" />
                <div class="panel panel-default">
                    <div class="panel-heading">{gt text="Estadística:"}</div>
                    <div class="panel-body">
                        <div class="form-inline">
                            <select class="form-control" name="stats" id="stats">
                                <option value="0"></option>
                            </select>
                            <div class="form-group">
                                <label for="date_start">{gt text="Des de: "}</label>
                                <input type="date" class="form-control" id="date_start" name="date_start"  value="{$date_start}" min="2000-01-01" max="{$smarty.now|date_format:"%Y-%m-%d"}"/>
                            </div>
                            <div class="form-group">
                                <label for="date_stop">{gt text="Fins a: "}</label>
                                <input type="date" class="form-control" id="date_stop" name="date_stop" value="{$date_stop}" min="2000-01-01"  max="{$smarty.now|date_format:"%Y-%m-%d"}"/>
                            </div>
                            <button type="button" class="form-control btn btn-primary" onclick="statsGetStatistics('clientDNS');">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                {gt text="Mostra"}
                            </button>
                            <input type="hidden" name="tableorderby" value="clientDNS" />
                            <button class="form-control btn btn-info" type="submit">
                                <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                {gt text="CSV"}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {include file="agoraportal_admin_service_filter.tpl"}
            </div>
        </div>
    </div>
</form>

<div id="resultsContent"></div>
<div id="graphsContent"></div>

<script type="text/javascript">
    window.onload = getServiceStats();
</script>

{adminfooter}
