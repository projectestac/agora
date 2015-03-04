<table class="z-datatable">
    <thead>
        {foreach item=centre key=row from=$results}
        <tr class="{cycle values='z-odd,z-even'}">
            {foreach item=field key=camp from=$centre}
            {if $row eq '0'}
            <th>
                <span style="cursor: pointer;font-weight: bold;" onclick="statsGetStatistics(document.statsForm.which.value,document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, '{$field}')">{$field}</span>
            </th>
            {else}
            {if $camp eq 'clientDNS'}
            {assign var='usuari' value=$field}
            {/if}
            {if $camp eq 'date'}
            <td>{$field}</td>
            {assign var='date' value=$field}
            {elseif $camp eq 'yearmonth'}
            <td>{$field}</td>
            {assign var='date' value=$field}
            {elseif $camp eq 'clientDNS' && $stats neq 1 && $stats neq 2}
            <td>
                <a href="#" onclick="statsGetStatisticsGraphs(document.statsForm.which.value,'{$field}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','*','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>

            {elseif $camp eq 'total_access'}
            <td>
                <a href="#"onclick="statsGetStatisticsGraphs(document.statsForm.which.value,'{$usuari}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','*','{$date}');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>

            {elseif ($camp eq 'users' || $camp eq 'courses' ||$camp eq 'activities') && ($stats eq 1 || $stats eq 2) }
            <td>
                <a href="#" onclick="statsGetStatisticsGraphs(document.statsForm.which.value,'{$usuari}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','{$camp}','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>
            {else}
            <td>{$field}</td>
            {/if}
            {/if}
            {/foreach}
        </tr>
        {if $row eq '0'}
    </thead>
    <tbody>
        {/if}
        {/foreach}
        <tr class="{cycle values='z-odd,z-even'}">
            {foreach item=field key=camp from=$totals}
            {if $camp eq 'clientDNS'}
            {assign var='usuari' value=$field}
            {/if}
            {if $camp eq 'clientDNS' && $stats neq 1 && $stats neq 2}
            <td>
                <a href="#" onclick="statsGetStatisticsGraphs(document.statsForm.which.value,'{$field}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','totals','*','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>
            {elseif ($camp eq 'users' || $camp eq 'courses' || $camp eq 'activities') && ($stats eq 1 || $stats eq 2)}
            <td>
                <a href="#" onclick="statsGetStatisticsGraphs(document.statsForm.which.value,'{$field}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','totals','{$camp}','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>
            {elseif $camp eq 'total_access'}
            <td>
                <a href="#" onclick="statsGetStatisticsGraphs(document.statsForm.which.value,'{$usuari}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','*','total');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>
            {else}
            <td>{$field}</td>
            {/if}
            {/foreach}
        </tr>
    </tbody>
</table>

{if $error}
    <div id="chart">
    <p>{$error}</p>
    </div>
{elseif !empty($graph_title)}
    <div id="chart">
        <h3>{$graph_title}</h3>
        <p><span style="background-color:rgba(255,20,147,1);">&nbsp;&nbsp;&nbsp;</span> <strong>Estadística:</strong> {$datalabel}<br>
        <strong>Dates:</strong> {$graph_dates}<br>
        <strong>Centre:</strong> {$graph_legend}</p>
        <div id="canvas-holder" style="text-align:center;"><canvas id="chart-area" width="1024" height="500"/></div>
        </div>
    <script>
        var ctx = document.getElementById("chart-area").getContext("2d");
        var data = {
            labels: [{/literal}{foreach item=field key=camp from=$xlabels}"{$field}", {/foreach}{literal}],
            datasets: [
                {
                    label: "{/literal}{$datalabel}{literal}",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(255,20,147,1)",
                    pointColor: "rgba(255,20,147,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [{/literal}{foreach item=dada key=camp from=$graph_data}{$dada}, {/foreach}{literal}]
                }
            ]
        };
        var options = {
            bezierCurve : true,
            bezierCurveTension : 0.2,
        };
        window.lineChart = new Chart(ctx).Line(data, options);
        var legend = window.lineChart.generateLegend();
    </script>
{/if}