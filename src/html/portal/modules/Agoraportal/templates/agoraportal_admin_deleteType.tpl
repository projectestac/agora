{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Esborra la tipologia de client"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="deleteType" action="{modurl modname='Agoraportal' type='admin' func='deleteType'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="typeId" value="{$type.typeId}" />
        <input type="hidden" name="confirmation" value="1" />
        {gt text="Confirma que vols esborrar la tipologia de client"}: <strong>{$type.typeName}</strong>
        <div class="z-center">
            <div class="z-buttons">
            <a title="{gt text='Esborra'}" onClick="javascript:sendDeleteType()">
                {img modname='core' src='button_ok.png' set='icons/small'}
                {gt text="Esborra"}
            </a>
            </div>
        </div>
    </form>
</div>