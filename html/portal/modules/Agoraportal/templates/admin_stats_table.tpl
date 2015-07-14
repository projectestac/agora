{if $error}
    <div id="chart" class="alert alert-danger">{$error}</div>
{else}
    <div class="panel panel-primary">
        <div class="panel-heading">{gt text="Resultats"} <span id="reload"></span></div>
        <div class="panel-body">
            <table class="table table-hover table-striped table-condensed">
                <thead>
                    <tr>
                    {foreach item=column from=$columns}
                        <th style="cursor: pointer;" onclick="statsGetStatistics('{$column}')">
                            {$column}
                        </th>
                    {/foreach}
                    </tr>
                </thead>
                <tbody>
                    {foreach item=item from=$results}
                        <tr>
                            {foreach item=column from=$columns}
                                <td>
                                {assign var=field value=$item[$column]}

                                {if $column eq 'clientDNS'}
                                    {assign var=clientDNS value=$field}
                                    {if $show_access_button}
                                        <button onclick="statsGetStatistics(false, '{$clientDNS}'); statsGetStatisticsGraphs('{$clientDNS}', false);" class="btn btn-default btn-xs" aria-label="Filtra aquest centre i mostra els accessos" title="Filtra aquest centre i mostra els accessos">
                                            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                                        </button>
                                    {/if}
                                {elseif $column eq 'date' || $column eq 'yearmonth' }
                                    {assign var=date value=$field}
                                {elseif $column neq 'clientcode' && $column|strlen gt 3 && $column neq 'educat' && $column neq 'lastaccess_date' && $column neq 'lastaccess_user'}
                                    <button onclick="statsGetStatisticsGraphs('{$clientDNS}', '{$column}');" class="btn btn-default btn-xs" aria-label="Mostra la gràfica" title="Mostra la gràfica de {$column} per a {$clientDNS}">
                                        <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                                    </button>
                                {/if}

                                {$field}</td>
                        {/foreach}
                        </tr>
                    {/foreach}

                    <tr>
                        {foreach item=column from=$columns}
                            <td>
                            {assign var=field value=$totals[$column]}
                            {if $column eq 'clientDNS'}
                                {if $show_access_button}
                                    <button onclick="statsGetStatisticsGraphs(false, false);" class="btn btn-default btn-xs" aria-label="Mostra la gràfica" title="Mostra la gràfica">
                                        <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                                    </button>
                                {/if}
                            {elseif $column neq 'date' && $column neq 'yearmonth' && $column neq 'clientcode' && $column|strlen gt 3 && $column neq 'educat' && $column neq 'lastaccess_date' && $column neq 'lastaccess_user'}
                                <button onclick="statsGetStatisticsGraphs(false, '{$column}');" class="btn btn-default btn-xs" aria-label="Mostra la gràfica" title="Mostra la gràfica">
                                    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                                </button>
                            {/if}
                            {$field}</td>
                        {/foreach}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
{/if}