<div class="form-group">
    <label for="service_sel">{gt text="Servei"}</label>
    <select class="form-control" name="service_sel" id="service_sel" onchange="filter_listServices(); {$actiononchangeservice}" style="width:100%;">
        {foreach item=service key=serviceId from=$services}
        <option value="{$serviceId}" {if $service_sel eq $serviceId}selected="selected"{/if}>{gt text="%s" tag1=$service->serviceName}</option>
        {/foreach}
    </select>
</div>

<div class="panel panel-default">
    <div class="panel-heading">{gt text="Selecció de centres"} <span id="reload"></span></div>
    <div class="panel-body">
        <select class="form-control" name="which" id="which" onchange="filter_listServices()" style="width:100%;">
            <option value="all" {if $which neq "selected"}selected="selected"{/if}>{gt text="Tots els centres"}</option>
            <option value="selected" {if $which eq "selected"}selected="selected"{/if}>{gt text="Només els seleccionats"}</option>
        </select>

        <div class="{if $which eq "all"}hidden{/if}" id="cerca">
            <div id="listServicesContent" name="listServicesContent" class="{if $which eq 'all'}hidden{/if}"  style="width:100%;">
                {$listServicesContent}
            </div>
            <div class="form-group">
                <label for="order">{gt text="Ordenat per"}</label>
                <select class="form-control" name="order" id="order" onchange="filter_listServices()" style="width:100%;">
                    <option {if $order eq 1}selected="selected"{/if} value="1">{gt text="Nom del centre"}</option>
                    <option {if $order eq 3}selected="selected"{/if} value="3">{gt text="Id del centre"}</option>
                    <option {if $order eq 4}selected="selected"{/if} value="4">{gt text="Codi del centre"}</option>
                    <option {if $order eq 5}selected="selected"{/if} value="5">{gt text="DNS del centre"}</option>
                </select>
            </div>
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading">{gt text="Cercador"}</div>
                <div class="panel-body">
                    <div class="form-inline form-group">
                        <select class="form-control" id="search" name="search">
                            <option {if $search eq 1}selected{/if} value="1">{gt text="Codi"}</option>
                            <option {if $search eq 2}selected{/if} value="2">{gt text="Nom client"}</option>
                            <option {if $search eq 3}selected{/if} value="3">{gt text="Ciutat"}</option>
                            <option {if $search eq 4}selected{/if} value="4">{gt text="DNS"}</option>
                            <option {if $search eq 5}selected{/if} value="5">{gt text="Id"}</option>
                        </select>
                        <input class="form-control" type="text" value="{$searchText}" id="valueToSearch" name="valueToSearch" size="20"/><br/><br/>
                    </div>
                    <div class="form-group">
                        <label for="pilot">{gt text="Característica:"}</label>
                        <select class="form-control" id="pilot" name="pilot" onchange="filter_listServices()">
                            <option {if $pilot === 0}selected{/if} value="0">{gt text="Cap"}</option>
                            <option {if $pilot === 'educat'}selected{/if} value="educat">{gt text="Centre Educat"}</option>
                        </select>
                        <select class="form-control" id="include" name="include" onchange="filter_listServices()">
                            <option {if $include eq 1}selected{/if} value="1">{gt text="Incloure"}</option>
                            <option {if $include eq 0}selected{/if} value="0">{gt text="Excloure"}</option>
                        </select>
                    </div>
                    <br/>
                    <button type="button" class="form-control btn btn-primary" onclick="filter_listServices()">
                    <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Cerca</button>
                </div>
            </div>
        </div>
    </div>
</div>
