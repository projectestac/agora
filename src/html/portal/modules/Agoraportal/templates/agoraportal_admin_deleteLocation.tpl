{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Esborra el Servei territorial"}</h2>
    <form  class="z-adminform" enctype="application/x-www-form-urlencoded" method="post" id="deleteLocation" action="{modurl modname='Agoraportal' type='admin' func='deleteLocation'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="locationId" value="{$location.locationId}" />
        <input type="hidden" name="confirmation" value="1" />
        {gt text="Confirma que vols esborrar el Servei Territorial"}: <strong>{$location.locationName}</strong>
        <div class="z-center">
            <div class="z-buttons">
                <a title="{gt text='Esborra'}" onClick="javascript:sendDeleteLocation()">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Esborra"}
                </a>
            </div>
        </div>
    </form>
</div>