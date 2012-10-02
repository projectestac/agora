<table class="z-datatable">
    <thead>
        {foreach item=centre key=row from=$results} 
        <tr class="{cycle values='z-odd,z-even'}">
            {foreach item=field key=camp from=$centre}
            {if $row eq '0'}
            <th>
                <span style="cursor: pointer;font-weight: bold;" onClick="javascript:statsGetStatistics(document.statsForm.which.value,document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, '{$field}')">{$field}</span>
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
                <a href="#" onClick="javascript:statsGetStatisticsGraphs(document.statsForm.which.value,'{$field}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','*','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>

            {elseif $camp eq 'total_access'}   
            <td>
                <a href="#"onClick="javascript:statsGetStatisticsGraphs(document.statsForm.which.value,'{$usuari}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','*','{$date}');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>

            {elseif ($camp eq 'users' || $camp eq 'courses' ||$camp eq 'activities') && ($stats eq 1 || $stats eq 2) }   
            <td>            
                <a href="#" onClick="javascript:statsGetStatisticsGraphs(document.statsForm.which.value,'{$usuari}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','{$camp}','*');" rel='lightbox'>
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
                <a href="#" onClick="javascript:statsGetStatisticsGraphs(document.statsForm.which.value,'{$field}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','totals','*','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a> 
                {$field}
            </td>
            {elseif ($camp eq 'users' || $camp eq 'courses' || $camp eq 'activities') && ($stats eq 1 || $stats eq 2)}   
            <td>
                <a href="#" onClick="javascript:statsGetStatisticsGraphs(document.statsForm.which.value,'{$field}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','totals','{$camp}','*');" rel='lightbox'>
                    <img src='modules/Agoraportal/images/statistics_icon.jpg' />
                </a>
                {$field}
            </td>
            {elseif $camp eq 'total_access'}   
            <td>
                <a href="#" onClick="javascript:statsGetStatisticsGraphs(document.statsForm.which.value,'{$usuari}',document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value, 'clientDNS','usuaris','*','total');" rel='lightbox'>
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

{*$enllac*}

<img src='{$enllac}' rel='lightbox' />
