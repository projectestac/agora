{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Executa una SQL"}</h3>
    <form name="sqlForm" id="sqlForm" action="index.php?module=Agoraportal&type=admin&func=sql" method="POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="actionselect">{gt text="Operació SQL"}</label>
                        <textarea class="form-control" id="sqlfunction" name="sqlfunction" rows=8 width="100%">{$sqlfunc}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-warning" name="clear" onClick="document.getElementById('sqlfunction').value='';">
                            <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
                            {gt text="Neteja"}
                        </button>
                        <button type="button" class="btn btn-info" name="saveComand" onclick="sqlShowDescription();">
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                            {gt text="Desa la comanda"}
                        </button>
                        <input name="ask" type="hidden" value="Executa" />
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
                            {gt text='Executa'}
                        </button>
                    </div>
                    <div class="panel panel-default form-inline">
                        <div class="panel-heading">{gt text="Mostra un exemple de l'operació:"}</div>
                        <div class="panel-body">
                            <select class="form-control" id="sqloperation" onchange="sqlExampleUpdate();">
                                <option value=""></option>
                                <option value="SELECT">SELECT</option>
                                <option value="INSERT">INSERT</option>
                                <option value="UPDATE">UPDATE</option>
                                <option value="DELETE">DELETE</option>
                                <option value="ALTER">ALTER</option>
                            </select>
                            <span id="sqlexample"></span>
                        </div>
                    </div>
                    <div id="commandFormDiv" class="hidden">
                        <div class="panel panel-info">
                            <div class="panel-heading">{gt text="Desa la comanda"}</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="description">{gt text="Escriu una descripció:"}</label>
                                    <textarea class="form-control" id="description" rows=4 width="100%"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="command_type">{gt text="Tipus de comanda:"}</label>
                                    <select class="form-control" name="command_type" id="command_type">
                                        <option value=""></option>
                                        <option value="select">SELECT</option>
                                        <option value="insert">INSERT</option>
                                        <option value="update">UPDATE</option>
                                        <option value="delete">DELETE</option>
                                        <option value="alter">ALTER</option>
                                    </select>
                                </div>
                                <input id="commandId" type="hidden" value="" />
                                <button type="button" class="btn btn-success" onclick="sqlSave();">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {gt text="Desa"}
                                </button>
                                <button type="button" class="btn btn-danger" onclick="document.getElementById('comandFormDiv').className='hidden';document.getElementById('comandId').value='';document.getElementById('description').value='';document.getElementById('type').value='0';">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {gt text="Cancel·la"}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">{gt text="Comandes desades:"} <span id="msg"></span></div>
                            <div class="panel-body">
                                <input type="hidden" id="selected_tab" value="all" />
                                <ul class="nav nav-tabs">
                                    <li id="tab_all" role="presentation" class="active"><a href="#msg" onclick="sqlComandsUpdateTab('all');">Totes</a></li>
                                    <li id="tab_select" role="presentation" class=""><a href="#msg" onclick="sqlComandsUpdateTab('select');">SELECT</a></li>
                                    <li id="tab_insert" role="presentation" class=""><a href="#msg" onclick="sqlComandsUpdateTab('insert');">INSERT</a></li>
                                    <li id="tab_update" role="presentation" class=""><a href="#msg" onclick="sqlComandsUpdateTab('update');">UPDATE</a></li>
                                    <li id="tab_delete" role="presentation" class=""><a href="#msg" onclick="sqlComandsUpdateTab('delete');">DELETE</a></li>
                                    <li id="tab_alter" role="presentation" class=""><a href="#msg" onclick="sqlComandsUpdateTab('alter');">ALTER</a></li>
                                </ul>
                                <div id="commandList" style="max-height:250px; width:100%; overflow:auto;">{$comands}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    {include file="agoraportal_admin_service_filter.tpl"}
                </div>
            </div>
    </div>
</form>
