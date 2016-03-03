{ajaxheader modname=Agoraportal filename=Agoraportal.js}

{insert name="getstatusmsg"}

<script>
    function submitform() {
        sitesList(document.filterForm.typeId.value,document.filterForm.location.value,document.filterForm.search.value,document.filterForm.valueToSearch.value,-1,document.filterForm.rpp.value);
        return false;
    }
</script>

<h3>{gt text="Llista d'espais actius"}</h3>
<div class="panel panel-default">
    <div class="panel-heading">{gt text="Cercador"} <span id="reload"></span></div>
    <div class="panel-body">
        <form class="form-inline form-inline-multiline" name="filterForm" id="filterForm" onsubmit="return submitform();">
            <div class="form-group">
                <label for="location">{gt text="Servei Territorial"}</label>&nbsp;
                <select class="form-control" name="location" id="location" onChange="submitform()">
                    <option value="">{gt text="Tots els Serveis Territorials"}</option>
                    {foreach item=locationName key=value from=$locations}
                        <option {if $locationId eq $value}selected{/if} value="{$value}">{$locationName}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <label for="typeId">{gt text="Tipus"}</label>&nbsp;
                <select class="form-control" name="typeId" id="typeId" onChange="submitform()">
                    <option value="">{gt text="Tots els tipus"}</option>
                    {foreach item=typeName key=value from=$types}
                        <option {if $typeId eq $value}selected{/if} value="{$value}">{$typeName}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <label for="valueToSearch">{gt text="Cerca per"}</label>&nbsp;
                <select class="form-control" name="search" id="search">
                    <option value=""></option>
                    <option value="clientCode">{gt text="Codi"}</option>
                    <option value="clientName">{gt text="Nom"}</option>
                    <option value="clientCity">{gt text="Municipi"}</option>
                </select>
                <input class="form-control" type="text" name="valueToSearch" id="valueToSearch" size="20"/>
            </div>
             <div class="form-group">
                <label for="rpp">{gt text="Nombre de centres"}</label>&nbsp;
                <select class="form-control" name="rpp" id="rpp" onChange="submitform()">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Cerca
            </button>
        </form>
    </div>
</div>
<div id="sitesListContent" name="sitesListContent">
    {$sitesListContent}
</div>

