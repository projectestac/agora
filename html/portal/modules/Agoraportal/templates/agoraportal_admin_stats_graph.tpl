{if $error}
    <div id="chart" class="alert alert-danger">{$error}</div>
{elseif !empty($graph_title)}
<div class="panel panel-primary">
    <div class="panel-heading">{gt text="Gràfic:"} {$graph_title}</div>
    <div class="panel-body">
        <div id="chart">
            <div id="canvas-holder" style="text-align:center;">
                <canvas id="chart-area" width="1024" height="500"/>
            </div>
            <div id="legend"></div>
        </div>
        <script>
            var ctx = document.getElementById("chart-area").getContext("2d");
            var data = {/literal}{$chartdata|@json_encode}{literal};
            {/literal}
                {if $charttype eq 'line'}
            {literal}
                var options = {
                    bezierCurve : true,
                    bezierCurveTension : 0.2,
                    animationSteps : 20,
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\">&nbsp;&nbsp;&nbsp;&nbsp;</span> <%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                };
                var chart = new Chart(ctx).Line(data, options);
            {/literal}
                {else}
            {literal}
                var options = {
                    animationSteps : 20,
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\">&nbsp;&nbsp;&nbsp;&nbsp;</span> <%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                };
                var chart = new Chart(ctx).Bar(data, options);
            {/literal}
                {/if}
            {literal}
            document.getElementById('legend').innerHTML = chart.generateLegend();
        </script>
    </div>
</div>
{/if}