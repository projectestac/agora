{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Crea una tipologia de client nova"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="addNewType" action="{modurl modname='Agoraportal' type='admin' func='addNewType'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <div class="z-formrow">
            <label for="typeName">{gt text="Nom de la tipologia"}</label>
            <input type="text" name="typeName" size="30" maxlength="150" />
        </div>
        <div class="z-center">
            <div class="z-buttons">
                <a title="{gt text='Crea una tipologia de client nova'}" onClick="javascript:sendNewType()">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Crea un Servei Territorial nou"}
                </a>
            </div>
        </div>
    </form>
</div>
<script>
    var noTypeName = "{{gt text="No has escrit el nom de la tipologia"}}";
</script>