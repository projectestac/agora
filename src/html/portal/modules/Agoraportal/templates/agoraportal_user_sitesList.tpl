{ajaxheader modname=Agoraportal filename=Agoraportal.js}
{insert name="getstatusmsg"}
<div class="usercontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Llista d'espais actius"}</h2>
    <div class="z-form">
        <fieldset>
            <legend>{gt text="Filtre"}</legend>
            <form name="filterForm" id="filterForm">
                {gt text="Servei Territorial"}&nbsp;
                <select name="location" id="location" onChange="javascript:sitesList(document.filterForm.typeId.value,document.filterForm.location.value,document.filterForm.search.value,document.filterForm.valueToSearch.value,1,document.filterForm.rpp.value)">
                    <option value="0">{gt text="Tots els Serveis Territorials"}</option>
                    {foreach item=location from=$locations}
                    <option value="{$location.locationId}">{$location.locationName}</option>
                    {/foreach}
                </select>
                <span style="margin-left:40px;">&nbsp;</span>
                {gt text="Tipus"}&nbsp;
                <select name="typeId" id="typeId" onChange="javascript:sitesList(document.filterForm.typeId.value,document.filterForm.location.value,document.filterForm.search.value,document.filterForm.valueToSearch.value,1,document.filterForm.rpp.value)">
                    <option selected value="0">{gt text="Tots els tipus"}</option>
                    {foreach item=type from=$types}
                    <option value="{$type.typeId}">{$type.typeName}</option>
                    {/foreach}
                </select>
                <span style="margin-left:40px;">&nbsp;</span>
                {gt text="Cerca per"}&nbsp;
                <select name="search" id="search">
                    <option value="0"></option>
                    <option value="1">{gt text="Codi"}</option>
                    <option value="2">{gt text="Nom"}</option>
                    <option value="3">{gt text="Municipi"}</option>
                </select>
                <input type="text" name="valueToSearch" id="valueToSearch" size="20"/>
                <input type="button" value="Envia" onClick="javascript:sitesList(document.filterForm.typeId.value,document.filterForm.location.value,document.filterForm.search.value,document.filterForm.valueToSearch.value,1,document.filterForm.rpp.value)" />
                <span id="reload"></span>
                <div>
                    <br />
                    {gt text="Nombre de centres"}
                    <select name="rpp" onChange="javascript:sitesList(document.filterForm.typeId.value,document.filterForm.location.value,document.filterForm.search.value,document.filterForm.valueToSearch.value,1,document.filterForm.rpp.value)">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                    </select>
                </div>
            </form>
        </fieldset>
    </div>
    <div id="sitesListContent" name="sitesListContent">
        {$sitesListContent}
    </div>
</div>
