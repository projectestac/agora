
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/agora/agora.css" />
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/lang/ca.js"></script>

{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Estadístiques"}</h2>
    <input type="hidden" name="lastorder" id="lastorder" value="clientDNS" />
    <input type="hidden" name="order" id="order" value="ASC" />
    <div class="form_up">
        <div class="form_left">
            <h3>{gt text="Executa sobre:"}</h3>
            <form name="statsForm" id="statsForm" action="index.php?module=Agoraportal&type=admin&func=statsGetCSVContent" method="POST">
                <select name="which" id="which" onchange="javascript:statsServiceSelected()">
                    <option value="all" {if $which neq "selected"}selected="selected"{/if}>{gt text="Tots els centres"}</option>
                    <option value="selected" {if $which eq "selected"}selected="selected"{/if}>{gt text="Només els seleccionats"}</option>
                </select>
                <select name="stats_sel" id="stats_sel" onchange="javascript:statsServiceSelected()">
                    <option value="0">{gt text="Selecciona una opció"}</option>
                    <option value="1" {if $stats_sel eq "1"}selected="selected"{/if} onclick="javascript:statsAssistent(1)">{gt text="Estadístiques mensuals Moodle 1.9"}</option>
                    <option value="2" {if $stats_sel eq "2"}selected="selected"{/if}>{gt text="Estadístiques setmanals Moodle 1.9"}</option>
                    <option value="3" {if $stats_sel eq "3"}selected="selected"{/if}>{gt text="Estadístiques diàries Moodle 1.9"}</option>
                    <option value="4" {if $stats_sel eq "4"}selected="selected"{/if}onclick="javascript:statsAssistent(1)">{gt text="Estadístiques mensuals Intraweb"}</option>
                    <option value="5" {if $stats_sel eq "5"}selected="selected"{/if}onclick="javascript:statsAssistent(1)">{gt text="Estadístiques mensuals Moodle 2"}</option>
                    <option value="6" {if $stats_sel eq "6"}selected="selected"{/if}>{gt text="Estadístiques setmanals Moodle 2"}</option>
                    <option value="7" {if $stats_sel eq "7"}selected="selected"{/if}>{gt text="Estadístiques diàries Moodle 2"}</option>
                </select>
                <span id="reload"></span>
                <br/>
                {gt text="Des de: "}<input size="8" id="date_start" name="date_start"  value="{$date_start}"/><input type="button" id="from_btn" value="..." />
                {gt text="Fins a: "}<input size="8" id="date_stop" name="date_stop" value="{$date_stop}"/><input type="button" id="to_btn" value="..." />
                <div id="servicesListContent" name="servicesListContent" class="{if $which eq "all"}hidden{/if}">
                     {$statsservicesList}
                </div>
                <input type="button" value="Envia" onClick="javascript:statsGetStatistics(document.forms['statsForm'].which.value,document.forms['statsForm'].stats_sel.value, document.forms['statsForm'].date_start.value, document.forms['statsForm'].date_stop.value, 'clientDNS')" />
                <br/>

                <!--<input type="button" name="Obté csv" value="Exporta a format .csv" onClick="javascript:statsGetCSV(document.statsForm.which.value,document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value,'clientDNS')" />
          <a href="index.php?module=Agoraportal&type=admin&func=statsDownloadCSV" >Descarrega l'últim fitxer .csv generat</a>-->
                <input type="hidden" name="clients" />
                <input type="hidden" name="orderby" value="clientDNS" />
                <!-- <a href="index.php?module=Agoraportal&type=admin&func=statsGetCSVContent" onClick="javascript:statsGetCSV(document.statsForm.which.value,document.statsForm.stats_sel.value, document.statsForm.date_start.value, document.statsForm.date_stop.value,'clientDNS')" >Descarrega l'últim fitxer .csv generat</a>
                -->
                <input type="submit" name="kk" value="Exporta a format .csv"/>
            </form>

        </div>
        <div class="form_right {if $which eq "all"}hidden{/if}" id="cerca">
             <h3>{gt text="Cerca per..."}</h3>
            <form name="filterForm" id="filterForm">
                <select name="search" id="search">
                    <option {if isset($search) AND $search eq 1}selected{/if} value="1">{gt text="Codi"}</option>
                    <option {if isset($search) AND $search eq 2}selected{/if} value="2">{gt text="Nom client"}</option>
                </select>
                <input type="text" value="{$searchText}" name="valueToSearch" id="valueToSearch" size="20" onChange="javascript:statsServiceSelected(document.filterForm.search.value,document.filterForm.valueToSearch.value)"/>
                <input type="button" value="Envia" onClick="javascript:statsServiceSelected(document.filterForm.search.value,document.filterForm.valueToSearch.value)" />
                <input type="button" value="Pick Files..." />
            </form>
        </div>
    </div>
    <div class="form_down">
        <h3>{gt text="Resultats"}</h3>
        <div id="resultsContent" name="resultsContent">
            {$resultsContent}
        </div>
        <h3>{gt text="Generar estadístiques"}</h3>
        <form name="generateForm" id="generateForm">
            {gt text="Data: "}<input size="8" id="date" name="date"/><input type="button" id="date_btn" value="..." />
            <input type="button" value="Genera" onClick="javascript:statsGenerateStatistics(document.generateForm.date.value)" />
            <span id="generate" name="generate"></span>
        </form>
    </div>
</div>

<script type="text/javascript">
    var cal1 = Calendar.setup({
        trigger     : "from_btn",
        inputField  : "date_start",
        dateFormat  : "%d/%m/%Y",
        onSelect    : function(cal1) {
            cal1.hide();
            javascript:statsAssistent(2, cal1.selection.get());
        }
    });
    var cal1 = Calendar.setup({
        trigger     : "to_btn",
        inputField  : "date_stop",
        dateFormat  : "%d/%m/%Y",
        onSelect    : function(cal1) {
            cal1.hide();
        }
    });
    var cal1 = Calendar.setup({
        trigger     : "date_btn",
        inputField  : "date",
        dateFormat  : "%d/%m/%Y",
        onSelect    : function(cal1) {
            cal1.hide();
        }
    });
</script>