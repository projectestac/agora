<form class="z-form" id="createDir" action="{modurl modname='Files' type='user' func='createDir' editor=$editor}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="folder" value="{$folder}" />
        <input type="hidden" name="external" value="{$external}" />
        <input type="hidden" name="hook" value="{$hook}" />
        <fieldset>
            <legend>{gt text="Create folder"}</legend>
            <div class="z-formrow">
                <label for="newFolder">{gt text="Folder name"}</label>
                <input type="text" name="newFolder" id="newFolder" />
            </div>
            <div class="z-formbuttons">
                <a href="javascript:submitCreateDir();">
                    {img modname='core' src='button_ok.png' set='icons/small' altml='true' titleml='true' __alt="Accept" __title="Accept"}
                </a>
                <a href="{modurl modname='Files' type=$type func=$func folder=$folder|replace:'/':'|' hook=$hook editor=$editor}">
                    {img modname='core' src='button_cancel.png' set='icons/small' altml='true' titleml='true' __alt="Cancel" __title="Cancel"}
                </a>
            </div>
        </fieldset>
    </div>
</form>