<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="modules/Agoraportal/javascript/calendar/css/agora/agora.css" />	
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/Agoraportal/javascript/calendar/lang/ca.js"></script>
{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Envia avisos"}</h2>
    <div class="form_up">
        <div class="form_left">&nbsp;</div>
        <div class="form_right {if $which eq "all"}hidden{/if}" id="cerca">
             <b>{gt text="Cerca per..."}</b>
                        <form name="filterForm" id="filterForm">	
                            <select name="search" id="search">
                                <option {if $search eq 1}selected{/if} value="1">{gt text="Codi"}</option>
                                <option {if $search eq 2}selected{/if} value="2">{gt text="Nom client"}</option>
                            </select>
                            <input type="text" value="{$searchText}" name="valueToSearch" id="valueToSearch" size="20" onChange="javascript:sqlservicesList(document.filterForm.search.value,document.filterForm.valueToSearch.value)"/>
                            <input type="button" value="Envia" onClick="javascript:sqlservicesList(document.filterForm.search.value,document.filterForm.valueToSearch.value)" />
                            <span id="reload"></span>
                        </form>
                    </div>
        </div>
        <form name="advicesForm" id="advicesForm" action="{modurl modname='Agoraportal' type='admin' func='advices'}" method="POST">
            <div class="form_down">
                <div class="form_left">
                    <b>{gt text="Missatge"}</b>
                    <textarea id="message" name="message" rows=18 width=100%>{$message}</textarea>
                    <br />
                    <input type="checkbox" name="only_admins" id="only_admins" value="1" {if $only_admins eq "1"}checked{/if}>
                           <label for="only_admins">{gt text="Mostra només als administradors"}</label>
                    <br />
                    <table>
                        <tr>
                            <td>{gt text="Des de: "}</td>
                            <td>
                                <input size="15" id="date_start" name="date_start"  value="{$date_start}"/>
                                <input type="button" id="from_btn" value="..." />{gt text="Format YYYYmmdd"}
                            </td>
                        </tr>
                        <tr>
                            <td>{gt text="Fins a: "}</td>
                            <td>
                                <input size="15" id="date_stop" name="date_stop" value="{$date_stop}"/>
                                <input type="button" id="to_btn" value="..." />{gt text="Format YYYYmmdd"}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form_right">
                    <b>{gt text="Executa sobre:"}</b><br/>
                    <select name="which" id="which" onchange="javascript:sqlservicesList()">
                        <option value="all" {if $which neq "selected"}selected="selected"{/if}>{gt text="Tots els centres"}</option>
                        <option value="selected" {if $which eq "selected"}selected="selected"{/if}>{gt text="Només els sel·leccionats"}</option>
                    </select>
                    <br />
                    <select name="service_sel" id="service_sel" onchange="javascript:sqlservicesList()">
                        {foreach item=service from=$services}
                        <option value="{$service.serviceId}" {if $service_sel eq $service.serviceId}selected="selected"{/if}>{gt text="Envia a %s" tag1=$service.serviceName}</option>
                        {/foreach}
                    </select>
                    <br />
                    <div id="servicesListContent" name="servicesListContent" class="{if $which eq 'all'}hidden{/if}">
                        {$servicesListContent}
                    </div>
                </div>
            </div>
            <div class="clear">
            <input name="ask" value="{gt text='Executa'}" type="submit" />
        </div>
    </form>
</div>

<script type="text/javascript">
    var cal = Calendar.setup({
        onSelect	   : 	function(cal) { cal.hide() }
    });
	
    cal.manageFields("from_btn", "date_start", "%Y%m%d");
    cal.manageFields("to_btn", "date_stop", "%Y%m%d");
</script>

