<div style="text-align:left;">
    <strong>Servei</strong><br/>
    <select name="service_sel" id="service_sel" onchange="sqlservicesList(); {$serviceSQL}" style="width:100%;">
        <option value="0" {if $service_sel eq 0}selected="selected"{/if}>portal</option>
        {foreach item=service from=$services}
        <option value="{$service.serviceId}" {if $service_sel eq $service.serviceId}selected="selected"{/if}>{gt text="%s" tag1=$service.serviceName}</option>
        {/foreach}
    </select><br/><br/>
    <fieldset style="width:100%; margin:0; border: 1px solid #CCC;">
        <legend><strong>{gt text="Selecció de centres"}</strong></legend>
        <select name="which" id="which" onchange="sqlservicesList()" style="width:100%;">
            <option value="all" {if $which neq "selected"}selected="selected"{/if}>{gt text="Tots els centres"}</option>
            <option value="selected" {if $which eq "selected"}selected="selected"{/if}>{gt text="Només els seleccionats"}</option>
        </select><br />

        <div class="{if $which eq "all"}hidden{/if}" id="cerca">
            <div id="servicesListContent" name="servicesListContent" class="{if $which eq 'all'}hidden{/if}"  style="width:100%;">
                {$servicesListContent}
            </div>
            <strong>{gt text="Ordenat per"}</strong><br/>
            <select name="order_sel" id="order_sel" onchange="sqlservicesList()" style="width:100%;">
                <option {if $order eq 1}selected{/if} value="1">{gt text="Nom del centre"}</option>
                <option {if $order eq 3}selected{/if} value="3">{gt text="Id del centre"}</option>
                <option {if $order eq 4}selected{/if} value="4">{gt text="Codi del centre"}</option>
                <option {if $order eq 5}selected{/if} value="5">{gt text="DNS del centre"}</option>
            </select><br/><br/>

            <fieldset style="width:90%; margin:0 auto; border: 1px solid #CCC;">
                <legend><strong>{gt text="Filtra"}</strong></legend>
                <select id="search">
                    <option {if $search eq 1}selected{/if} value="1">{gt text="Codi"}</option>
                    <option {if $search eq 2}selected{/if} value="2">{gt text="Nom client"}</option>
                    <option {if $search eq 3}selected{/if} value="3">{gt text="Ciutat"}</option>
                    <option {if $search eq 4}selected{/if} value="4">{gt text="DNS"}</option>
                    <option {if $search eq 5}selected{/if} value="5">{gt text="Id"}</option>
                </select>
                <input type="text" value="{$searchText}" id="valueToSearch" size="20"/><br/><br/>
                Característica:
                <select id="pilot" onchange="sqlservicesList()">
                    <option {if $pilot === 0}selected{/if} value="0">{gt text="Cap"}</option>
                    <option {if $pilot === 'educat'}selected{/if} value="educat">{gt text="Centre Educat"}</option>
                    <option {if $pilot === 'educatNetwork'}selected{/if} value="educatNetwork">{gt text="Fa ús de la xarxa Educat"}</option>
                </select>
                <select id="include" onchange="sqlservicesList()">
                    <option {if $include eq 1}selected{/if} value="1">{gt text="Incloure"}</option>
                    <option {if $include eq 0}selected{/if} value="0">{gt text="Excloure"}</option>
                </select><br/><br/>
                <center>
                    <input type="button" value="Filtra" onclick="sqlservicesList()" />
                </center>
                <span id="reload"></span>
            </fieldset>
        </div>
    </fieldset>
</div>
