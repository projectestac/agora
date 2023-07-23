{adminheader}

{include file="agoraportal_admin_menu.tpl"}

{if $execOper}
    <script>
        window.onload = function() {
        operations_execute({{$execOper}});
        };
    </script>
{/if}

<script>
    function submitform() {
        listServices(document.filterForm.service.value,
                    document.filterForm.stateFilter.value,
                    document.filterForm.search.value,
                    document.filterForm.valueToSearch.value,
                    document.filterForm.order.value,
                    -1,
                    document.filterForm.rpp.value);
        return false;
    }
</script>

<h3>{gt text="Llista de serveis dels clients"}</h3>
<div class="panel panel-default">
    <div class="panel-heading">{gt text="Cercador"} <span id="reload"></span></div>
    <div class="panel-body">
        <form class="form-inline form-inline-multiline" name="filterForm" id="filterForm" onsubmit="return submitform();">
            <div class="form-group">
                <label for="service">{gt text="Servei"}</label>&nbsp;
                <select class="form-control" name="service" id="service" onChange="submitform();">
                    <option value="">{gt text="Tots els serveis"}</option>
                    {foreach item=servicetype from=$servicetypes}
                        <option {if $servicetype->serviceId eq $service}selected{/if} value="{$servicetype->serviceId}">{$servicetype->serviceName}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <label for="stateFilter">{gt text="Estat"}</label>&nbsp;
                <select class="form-control" name="stateFilter" id="stateFilter" onchange="return submitform();">
                    <option {if $stateFilter eq -1}selected{/if} value="-1">{gt text="Tots els estats"}</option>
                    <option {if $stateFilter eq 0}selected{/if} value="0">{gt text="Per revisar"}</option>
                    <option {if $stateFilter eq 1}selected{/if} value="1">{gt text="Actiu"}</option>
                    <option {if $stateFilter eq -2}selected{/if} value="-2">{gt text="Denegat"}</option>
                    <option {if $stateFilter eq -3}selected{/if} value="-3">{gt text="Donat de baixa"}</option>
                    <option {if $stateFilter eq -4}selected{/if} value="-4">{gt text="Desactivat"}</option>
                    <option {if $stateFilter eq -5}selected{/if} value="-5">{gt text="Migració en curs"}</option>
                    <option {if $stateFilter eq -6}selected{/if} value="-6">{gt text="Migrat"}</option>
                    <option {if $stateFilter eq -7}selected{/if} value="-7">{gt text="Bloquejat per saturació"}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="search">{gt text="Cerca per..."}</label>&nbsp;
                <select class="form-control" name="search" id="search" onchange="return submitform();">
                    <option value=""></option>
                    <option {if $search eq 'clientCode'}selected{/if} value="clientCode">{gt text="Codi"}</option>
                    <option {if $search eq 'clientName'}selected{/if} value="clientName">{gt text="Nom client"}</option>
                    <option {if $search eq 'clientCity'}selected{/if} value="clientCity">{gt text="Municipi"}</option>
                    <option {if $search eq 'clientDNS'}selected{/if} value="clientDNS">{gt text="DNS"}</option>
                </select>
                <input class="form-control" type="text" value="{$searchText}" name="valueToSearch" id="valueToSearch" size="20"/>
            </div>
            <div class="form-group">
                <label for="order">{gt text="Ordena per..."}</label>&nbsp;
                <select class="form-control" name="order" id="order" onchange="return submitform();">
                    <option {if $order eq 1}selected{/if} value="1">{gt text="Nom client"}</option>
                    <option {if $order eq 2}selected{/if} value="2">{gt text="Data d'edició"}</option>
                    <option {if $order eq 3}selected{/if} value="3">{gt text="activedId"}</option>
                    <option {if $order eq 4}selected{/if} value="4">{gt text="Codi"}</option>
                    <option {if $order eq 5}selected{/if} value="5">{gt text="DNS"}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rpp">{gt text="Nombre de registres..."}</label>&nbsp;
                <select class="form-control" name="rpp" id="rpp" onchange="return submitform();">
                    <option {if $rpp eq 15}selected{/if} value="15">15</option>
                    <option {if $rpp eq 30}selected{/if} value="30">30</option>
                    <option {if $rpp eq 50}selected{/if} value="50">50</option>
                    <option {if $rpp eq 100}selected{/if} value="100">100</option>
                    <option {if $rpp eq 200}selected{/if} value="200">200</option>
                    <option {if $rpp eq 500}selected{/if} value="500">500</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>{gt text="Cerca"}
            </button>
        </form>
    </div>
</div>

<div id="listServicesContent" name="listServicesContent">
    {$listServicesContent}
</div>

{adminfooter}
