{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large'}</div>
    <h2>{gt text="Executa una SQL"}</h2>
        <form name="sqlForm" id="sqlForm" action="index.php?module=Agoraportal&type=admin&func=sql" method="POST">
            <div class="form_left">
                <b>{gt text="Operació SQL"}</b><br />
                <textarea id="sqlfunction" name="sqlfunction" rows=8 width="100%">{$sqlfunc}</textarea><br />
                <input type="button" name="clear" onClick="document.getElementById('sqlfunction').value='';" value="{gt text="Neteja"}" />
                <input type="button" name="saveComand" onClick="document.getElementById('comandFormDiv').className='visible'; javascript:sqlSearch();" value="{gt text="Desa la comanda"}" />
                <br /><br />
                {gt text="Mostra un exemple de l'operació:"}
                <br />
                <select  id="sqloperation" onchange="sqlExampleUpdate();">
                    <option value=""></option>
                    <option value="SELECT">SELECT</option>
                    <option value="INSERT">INSERT</option>
                    <option value="UPDATE">UPDATE</option>
                    <option value="DELETE">DELETE</option>
                    <option value="ALTER">ALTER</option>
                </select>
                <span id="sqlexample"></span>
                <br />
                <div id="comandFormDiv" class="hidden">
                    {gt text="Escriu una descripció:"}
                    <textarea id="description" rows=4 width="100%"></textarea>
                    {gt text="Tipus de comanda:"}
                    <select name="comand_type" id="comand_type">
                        <option value=""></option>
                        <option value="select">SELECT</option>
                        <option value="insert">INSERT</option>
                        <option value="update">UPDATE</option>
                        <option value="delete">DELETE</option>
                        <option value="alter">ALTER</option>
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
                {include file="agoraportal_admin_service_filter.tpl"}
            </div>
        <div class="clear">
            <input name="ask" value="{gt text='Executa'}" type="submit" />
        </div>
    </form>
</div>
