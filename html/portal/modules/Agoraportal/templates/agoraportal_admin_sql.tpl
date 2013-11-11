{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Executa una SQL"}</h2>
    <div class="form_up">
        <div class="form_left">
            {gt text="Mostra un exemple de l'operació:"}
            <br />
            <form name="sqlExForm" id="sqlExForm">
                <select name="operation" id="operation" onChange="javascript:sqlExampleUpdate(document.sqlExForm.operation.value)">
                    <option value=""></option>
                    <option value="SELECT">SELECT</option>
                    <option value="INSERT">INSERT</option>
                    <option value="UPDATE">UPDATE</option>
                    <option value="DELETE">DELETE</option>
                    <option value="ALTER">ALTER</option>
                </select>
                <span id="sqlexample" name="sqlexample"></span>
            </form>
            <br />
        </div>
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
        <form name="sqlForm" id="sqlForm" action="index.php?module=Agoraportal&type=admin&func=sql" method="POST">
            <div class="form_down">
                <div class="form_left">
                    <b>{gt text="Operació SQL"}</b><br />
                    <textarea id="sqlfunction" name="sqlfunction" rows=8 width="100%">{$sqlfunc}</textarea><br />
                    <input type="button" name="clear" onClick="document.getElementById('sqlfunction').value='';" value="{gt text="Neteja"}" />
                           <input type="button" name="saveComand" onClick="document.getElementById('comandFormDiv').className='visible'; javascript:sqlSearch();" value="{gt text="Desa la comanda"}" />			
                           <div id="comandFormDiv" class="hidden">
                        {gt text="Escriu una descripció:"}
                        <textarea id="description" rows=4 width="100%"></textarea>
                        {gt text="Tipus de comanda:"}
                        <select name="comand_type" id="comand_type">
                            <option value="0"></option>
                            <option value="1">SELECT</option>
                            <option value="2">INSERT</option>
                            <option value="3">UPDATE</option>
                            <option value="4">DELETE</option>
                            <option value="5">ALTER</option>
                        </select>
                        <div class="z-center">
                            <input id="comandId" type="hidden" value="" />
                            <span class="z-buttons">
                                <a href="javascript:sqlComandsUpdate(1);">
                                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Desa" __title="Desa"}
                                    {gt text="Desa"}
                                </a>
                            </span>
                            <span class="z-buttons">
                                <a href="document.getElementById('comandFormDiv').className='hidden';document.getElementById('comandId').value='';document.getElementById('description').value='';document.getElementById('type').value='0';">
                                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                                    {gt text="Cancel·la"}
                                </a>
                            </span>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <b>{gt text="Comandes desades:"}</b><br />
                        <div id="msg"></div>
                        <div id="waitCircle" style="text-align:right; float:right;"></div>
                        <input type="hidden" id="selected_tab" value="0" />
                        <ul class="tabnav" style="margin:3px;">
                            <li id="tab_0" class="tab_select"><span onClick="javascript:sqlComandsUpdate(0,0,0);">Totes</span></li>
                            <li id="tab_1" class=""><span onClick="javascript:sqlComandsUpdate(0,0,1);">SELECT</span></li>
                            <li id="tab_2" class=""><span onClick="javascript:sqlComandsUpdate(0,0,2);">INSERT</span></li>
                            <li id="tab_3" class=""><span onClick="javascript:sqlComandsUpdate(0,0,3);">UPDATE</span></li>
                            <li id="tab_4" class=""><span onClick="javascript:sqlComandsUpdate(0,0,4);">DELETE</span></li>
                            <li id="tab_5" class=""><span onClick="javascript:sqlComandsUpdate(0,0,5);">ALTER</span></li>
                        </ul>
                        <div id="comandList" style="height:250px; width:100%; overflow:auto; border: 1px solid #666;">{$comands}</div>
                    </div>
                </div>
                <div class="form_right">
                    <b>{gt text="Executa sobre:"}</b><br/>
                    <select name="which" id="which" onchange="javascript:sqlservicesList()">
                        <option value="all" {if $which neq "selected"}selected="selected"{/if}>{gt text="Tots els centres"}</option>
                        <option value="selected" {if $which eq "selected"}selected="selected"{/if}>{gt text="Només els seleccionats"}</option>
                    </select>
                    <br />
                    <select name="service_sel" id="service_sel" onchange="javascript:sqlservicesList()">
                        <option value="0" {if $service_sel eq $service.serviceId}selected="selected"{/if}>{gt text="Envia al portal" tag1="portal"}</option>
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
