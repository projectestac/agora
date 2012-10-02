{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Llista de clients"}</h2>
    <div class="z-form">
    <fieldset>
        <legend>{gt text="Filtre"}</legend>
        <form name="filterForm" id="filterForm">
            {gt text="Cerca per..."}
            <select name="search" id="search">
                <option value="0"></option>
                <option {if $search eq 1}selected{/if} value="1">{gt text="Codi"}</option>
                <option {if $search eq 2}selected{/if} value="2">{gt text="Nom client"}</option>
            </select>
            <input type="text" name="valueToSearch" id="valueToSearch" size="20" value="{$searchText}"/>
            <input type="button" value="Envia" onClick="javascript:clientsList(document.filterForm.search.value,document.filterForm.valueToSearch.value,1)" />
            <span id="reload"></span>
        </form>
    </fieldset>
    </div>
    <div id="clientsListContent" name="clientsListContent">
        {$clientsListContent}
    </div>
</div>