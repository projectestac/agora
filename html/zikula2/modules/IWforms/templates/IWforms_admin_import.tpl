{include file="IWforms_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='fileimport.png' set='icons/large'}</div>
    <div style="height:10px;">&nbsp;</div>
    <h2>{gt text="Import a form"}</h2>
    <div style="height:15px;">&nbsp;</div>
    <form  class="z-form" enctype="multipart/form-data" method="post" name="import" id="import" action="{modurl modname='IWforms' type='admin' func='import'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirm" value="1" />
        <div class="z-formrow">
            <label for="file">{gt text="Select a file"}</label>
            <input type="file" name="import" size="50">
        </div>
        <div class="z-center z-buttons">
            <a onClick="javascript:forms['import'].submit()">
                {img modname='core' src='button_ok.png' set='icons/small' __alt="Ok" __title="Ok"} {gt text="Ok"}
            </a>
        </div>
    </form>
</div>
