{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Esborra la relació del tipus de sol·licitud i el servei"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="deleteRequestTypeService" action="{modurl modname='Agoraportal' type='admin' func='deleteRequestTypeService'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="requestTypeId" value="{$requestType.requestTypeId}" />
        <input type="hidden" name="serviceId" value="{$requestType.serviceId}" />
        <input type="hidden" name="confirmation" value="1" />
        {gt text="Confirma que vols esborrar la relació del tipus de sol·licitud"}: <strong>{$requestType.type}</strong> {gt text=" amb el servei: "}: <strong>{$requestType.serviceName}</strong>
        <div class="z-center">
            <div class="z-buttons">
                <a title="{gt text='Esborra'}" onClick="javascript:sendDeleteRequestTypeService()">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Esborra"}
                </a>
            </div>
        </div>
    </form>
</div>