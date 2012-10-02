{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Edita el tipus de sol·licitud"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="editRequestType" action="{modurl modname='Agoraportal' type='admin' func='editRequestType'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="requestTypeId" value="{$requestType.requestTypeId}" />
        <input type="hidden" name="confirmation" value="1" />
        <div class="z-formrow">
            <label for="requestTypeName">{gt text="Nom del Tipus de sol·licitud"}</label>
            <input type="text" name="requestTypeName" size="100" maxlength="150" value="{$requestType.name}" />
        </div>
        <div class="z-formrow">
            <label for="requestTypeDescription">{gt text="Descripció del Tipus de sol·licitud"}</label>
            <textarea name="requestTypeDescription" style="width: 630px" rows="3">{$requestType.description}</textarea>
        </div>
        <div class="z-formrow">
            <label for="requestTypeUserComments">{gt text="Text per al quadre de comentaris dels usuaris:"}</label>
            <textarea name="requestTypeUserCommentsText" style="width: 630px" rows="3">{$requestType.userCommentsText}</textarea>
        </div>

        <div class="z-center">
            <div class="z-buttons">
                <a title="{gt text='Modifica el tipus de sol·licitud'}" onClick="javascript:sendEditRequestType()">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Modifica el tipus de sol·licitud"}
                </a>
            </div>
        </div>
    </form>
</div>
