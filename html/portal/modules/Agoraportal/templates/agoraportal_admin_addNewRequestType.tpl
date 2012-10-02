{include file="agoraportal_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Crea un nou tipus de sol·licitud"}</h2>
    <form  class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="addNewRequestType" action="{modurl modname='Agoraportal' type='admin' func='addNewRequestType'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirmation" value="1" />
        <div class="z-formrow">
            <label for="requestTypeName">{gt text="Nom del Tipus de sol·licitud"}</label>
            <input type="text" name="requestTypeName" size="100" maxlength="150" />
        </div>
        <div class="z-formrow">
            <label for="requestTypeDescription">{gt text="Descripció del Tipus de sol·licitud"}</label>
            <textarea name="requestTypeDescription" style="width: 630px" rows="3"></textarea>
        </div>
        <div class="z-formrow">
            <label for="requestTypeUserComments">{gt text="Text per al quadre de comentaris dels usuaris:"}</label>
            <textarea name="requestTypeUserCommentsText" style="width: 630px" rows="3"></textarea>
        </div>
        <div class="z-center">
            <div class="z-buttons">
                <a title="{gt text='Crea un nou tipus de sol·licitud'}" onClick="javascript:sendNewRequestType();">
                    {img modname='core' src='button_ok.png' set='icons/small'}
                    {gt text="Crea un nou tipus de sol·licitud"}
                </a>
            </div>
        </div>
    </form>
</div>
