{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Registra un tipus nou de plantilla"}</h2>
    <form class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="addNewModelType" action="{modurl modname='Agoraportal' type='admin' func='addNewModelType'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <div class="z-formrow">
            <label for="shortcode">{gt text="Codi curt pels noms dels fitxers"}</label>
            <input type="text" name="shortcode" size="100" maxlength="100" />
        </div>
        <div class="z-formrow">
            <label for="keyword">{gt text="Paraula clau per al formulari d'activació"}</label>
            <input type="text" name="keyword" size="100" maxlength="100" />
        </div>
        <div class="z-formrow">
            <label for="keyword">{gt text="Descripció que veuen els usuaris"}</label>
            <input type="text" name="description" size="100" maxlength="255" />
        </div>
        <div class="z-formrow">
            <label for="keyword">{gt text="URL (per replace)"}</label>
            <input type="text" name="url" size="100" maxlength="255" />
        </div>
        <div class="z-formrow">
            <label for="keyword">{gt text="Base de dades (per replace)"}</label>
            <input type="text" name="dbHost" size="50" maxlength="50" />
        </div>
        <div class="z-center z-buttons">
            <input class="z-bt-ok" type="submit" value="{gt text="Registra la plantilla"}" />
        </div>
    </form>
</div>
