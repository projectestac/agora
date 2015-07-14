{include file="agoraportal_user_menu.tpl"}
<div class="container-fluid">
    <h3>{gt text="Registre d'accions fetes"}</h3>
    <div class="panel panel-default">
        <div class="panel-heading">{gt text="Filtra"}<span id="reload"></span></div>
        <div class="panel-body">
            <form class="form-inline form-inline-multiline" name="filterForm" id="filterForm">
                <div class="form-group">
                    <label for="actionCode">{gt text="Filtra per tipus d'acció"}</label>
                    <select class="form-control" name="actionCode" id="actionCode">
                        <option value="0">{gt text="Totes les accions"}</option>
                        <option value="1">{gt text="Addició/Alta"}</option>
                        <option value="2">{gt text="Modificació/Notificació"}</option>
                        <option value="3">{gt text="Eliminació/Baixa"}</option>
                        <option value="4">{gt text="Error"}</option>
                        {if $isAdmin}
                            <option value="-1">{gt text="Administració"}</option>
                        {/if}
                    </select>
                </div>
                <div class="form-group">
                    <label for="from_inpt">{gt text="Filtra per data"}</label>
                    {gt text="des de: "}
                    <input type="date" class="form-control" id="from_inpt" name="from_inpt" value="" max="{$smarty.now|date_format:"%Y-%m-%d"}"/>
                    {gt text="fins a: "}
                    <input type="date" class="form-control" id="to_inpt" name="to_inpt" value="" max="{$smarty.now|date_format:"%Y-%m-%d"}"/>
                </div>
                {if $isAdmin}
                    <div class="form-group">
                        <label for="uname">{gt text="Filtra per nom d'usuari/ària"}</label>
                        <input class="form-control" type="text" name="uname" id="uname" size="20"/>
                    </div>
                {else}
                    <input type="hidden" name="uname" id="uname"/>
                {/if}
                <button class="btn btn-primary" type="button" onclick="logs('{$client->clientCode}', document.filterForm.actionCode.value,document.filterForm.from_inpt.value,document.filterForm.to_inpt.value,document.filterForm.uname.value,-1)">
                <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filtra
                </button>
            </form>
        </div>
    </div>
    <div id="logsContent" name="logsContent">
        {$logsContent}
    </div>
</div>