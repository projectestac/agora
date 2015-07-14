{include file="agoraportal_admin_menu.tpl"}
<h3>{gt text="Envia avisos"}</h3>
    <form name="advicesForm" id="advicesForm" action="{modurl modname='Agoraportal' type='admin' func='advices'}" method="POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="message">{gt text="Missatge"}</label>
                        <textarea class="form-control" id="message" name="message" rows="18" width="100%">{$message}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="only_admins" id="only_admins" value="1" {if $only_admins eq "1"}checked{/if}>
                        <label for="only_admins">{gt text="Mostra només als administradors"}</label>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="date_start">{gt text="Des de: "}</label>
                            <input type="date" class="form-control" id="date_start" name="date_start" value="{$date_start}" min="{$smarty.now|date_format:"%Y-%m-%d"}"/>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="date_stop">{gt text="Fins a: "}</label>
                            <input type="date" class="form-control" id="date_stop" name="date_stop" value="{$date_stop}" min="{$smarty.now|date_format:"%Y-%m-%d"}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    {include file="agoraportal_admin_service_filter.tpl"}
                </div>
            </div>
            <div class="row text-center">
                <input name="ask" type="hidden" value="Envia" />
                <button type="submit" class="btn btn-primary" name="queue">
                <span class="glyphicon glyphicon-send" aria-hidden="true"></span> {gt text='Envia'}</button>
            </div>
        </div>
</form>