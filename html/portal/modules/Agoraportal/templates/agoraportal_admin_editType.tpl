{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Edita el nom de la tipologia de client"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="editType" action="{modurl modname='Agoraportal' type='admin' func='editType'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="typeId" value="{$type.typeId}" />
        <input type="hidden" name="confirmation" value="1" />
        <div class="z-formrow">
            <label for="typeName">{gt text="Nom de la tipologia"}</label>
            <input type="text" name="typeName" size="30" maxlength="150" value="{$type.typeName}" />
        </div>
        <div class="z-center">
            <div class="z-buttons">
                <a title="{gt text='Modifica la tipologia'}" onClick="javascript:sendEditType()">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Modifica el Servei Territorial"}
                </a>
            </div>
        </div>
    </form>
</div>
<script>
    var noTypeName = "{{gt text="No has escrit el nom de la tipologia de client"}}";
</script>