{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Crea un nou tipus de sol·licitud"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="addNewRequestTypeService" action="{modurl modname='Agoraportal' type='admin' func='addNewRequestTypeService'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <div class="z-formrow">
            <label for="service">{gt text="Indiqueu el servei:"}</label>
            <select name="service" id="service">
                {foreach item=serviceItem from=$services}
                <option value="{$serviceItem.serviceId}">{$serviceItem.serviceName}</option>
                {/foreach}
            </select>
        </div>
        <div class="z-formrow">
            <label for="service">{gt text="Indiqueu el tipus de sol·licitud:"}</label>
            <select name="requesttype" id="type">
                {foreach item=serviceItem from=$requestType}
                <option value="{$serviceItem.requestTypeId}">{$serviceItem.name}</option>
                {/foreach}
            </select>
        </div>
        <div class="z-center">
            <input type="submit" value="Afegeix" />	
        </div>
    </form>
</div>