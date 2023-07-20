{adminheader}

{include file="agoraportal_admin_menu.tpl"}

<script>
    function submitform() {
        clientsList(document.filterForm.search.value, document.filterForm.valueToSearch.value, -1, document.filterForm.rpp.value);
        return false;
    }
</script>

<h3>{gt text="Llista de clients"}</h3>
<div class="panel panel-default">
    <div class="panel-heading">{gt text="Cercador"} <span id="reload"></span></div>
    <div class="panel-body">
        <form class="form-inline form-inline-multiline" name="filterForm" id="filterForm" onsubmit="return submitform();">
            <div class="form-group">
                <label for="valueToSearch">{gt text="Cerca per..."}</label>&nbsp;
                <select class="form-control" name="search" id="search" onchange="return submitform();">
                    <option value=""></option>
                    <option {if $search eq 'clientCode'}selected{/if} value="clientCode">{gt text="Codi"}</option>
                    <option {if $search eq 'clientName'}selected{/if} value="clientName">{gt text="Nom client"}</option>
                    <option {if $search eq 'clientDNS'}selected{/if} value="clientDNS">{gt text="DNS"}</option>
                    <option {if $search eq 'clientOldDNS'}selected{/if} value="clientOldDNS">{gt text="DNS antic"}</option>
                </select>
                <input class="form-control" type="text" name="valueToSearch" id="valueToSearch" size="20" value="{$searchText}"  onchange="return submitform();"/>
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
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Cerca</button>
        </form>
    </div>
</div>
<a class="btn btn-default" href="{modurl modname='Agoraportal' type='admin' func='newClient'}">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Afegeix un client nou</a>
<div id="clientsListContent" name="clientsListContent">
    {$clientsListContent}
</div>

{adminfooter}
