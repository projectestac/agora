{if $service->diskSpace}
    {assign var="percentage" value=$service->disk_percentage}
    {assign var="alert" value=$service->disk_alert_class}
    <div class="clearfix">

        <div class="pull-left"><strong>{gt text="Espai de disc ocupat"}</strong>:&nbsp;</div>
        <div class="progress pull-left" style="width:200px;">
          <div class="progress-bar progress-bar-{$alert}" role="progressbar" aria-valuenow="{$percentage}" aria-valuemin="0" aria-valuemax="100" style="width: {$percentage}%;">
            {$percentage}%
          </div>
        </div>

        <div class="pull-left">&nbsp;&nbsp;({$service->diskConsume/1024|round:2} MB / {$service->diskSpace|round:2} MB) <a href="{modurl modname='Agoraportal' type='user' func='recalcConsume' clientServiceId=$service->clientServiceId}">{gt text="Actualitza"}</a></div>
        {if $alert neq 'success'}
        <div class="pull-left">&nbsp;&nbsp;
            <a href="{modurl modname='Agoraportal' type='user' func='requests' clientCode=$client->clientCode}">
                {gt text="Sol·licita més espai"}
            </a>
        </div>
        {/if}
    </div>
{/if}
