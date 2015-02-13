<link rel="stylesheet" href="modules/IWmain/js/calendar/css/jscal2.css" type="text/css" />
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/border-radius.css" type="text/css" />
<link rel="stylesheet" href="modules/IWmain/js/calendar/css/style.css" type="text/css" />
<script type="text/javascript" src="modules/IWmain/js/calendar/jscal2.js"></script>
<script type="text/javascript" src="modules/IWmain/js/calendar/lang/ca.js"></script>

{include file="IWforms_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='filenew.png' set='icons/large'}</div>
    <h2>{gt text="Create a new form"}</h2>
    <ul id="admintabs" class="z-clearfix">
        <li>
            <a class="active" href="{modurl modname='IWforms' type='admin' func='create'}" title="{gt text="Define the form"}">
               {gt text="Definition"}
        </a>
    </li>
</ul>
<div class="z-admincontainer">
    <div style="padding: 10px;">
        <form id="formDefinition" class="z-form" action="{modurl modname='IWforms' type='admin' func='submit'}" method="post" enctype="application/x-www-form-urlencoded" onSubmit="return send()">
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>{gt text="General parameters"}</legend>
                <div class="z-formrow">
                    <label for="lang">{gt text="Form language"}</label>
                    <select id="lang" name="lang">
                        <option value="">{gt text="All languages"}</option>
                        {foreach item=lang from=$languages}
                        <option value="{$lang.code}">{$lang.name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="formName">{gt text="Form name"}</label>
                    <input id="formName" name="formName" type="text" size="50" maxlength="70" />
                </div>
                <div class="z-formrow">
                    <label for="title">{gt text="Title of the annotations "}</label>
                    <input id="title" name="title" type="text" size="50" maxlength="255" />
                </div>
                <div class="z-formrow">
                    <label for="cid">{gt text="Category"}</label>
                    {if $cats|@count > 0}
                    <select id="cid" name="cid">
                        <option value="0">{gt text="Chosse one category..."}</option>
                        {foreach item="cat" from=$cats}
                        <option value="{$cat.cid}">{$cat.catName}</option>
                        {/foreach}
                    </select>
                    {else}
                    <span>{gt text="There is no defined categories"}</span>
                    {/if}
                </div>
                <div class="z-formrow">
                    <label for="description">{gt text="Form description"}</label>
                    <input id="description" name="description" type="text" size="50" maxlength="255" />
                </div>
                <div class="z-formrow">
                    <label for="new">{gt text="As a new until a..."}</label>
                    <div class="z-formnote">
                        <input size="10" id="newFormDate" name="new"  onfocus="blur();" />
                        <img id="newFormDate_btn" src="modules/IWmain/images/calendar.gif" style="cursor:pointer;" />
                    </div>
                </div>
                <div class="z-formrow">
                    <label for="caducity">{gt text="Make it expires automatically a..."}</label>
                    <div class="z-formnote">
                        <input size="10" id="caducityDate" name="caducity"  onfocus="blur();" />
                        <img id="caducityDate_btn" src="modules/IWmain/images/calendar.gif" style="cursor:pointer;" />
                    </div>
                </div>
                <div class="z-formrow">
                    <label for="annonimous">{gt text="Anonymous"}</label>
                    <input id="annonimous" name="annonimous" type="checkbox" value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="unique">{gt text="Only answer"}</label>
                    <input id="unique" name="unique" type="checkbox" value="1"/>
                </div>
                {*}
                <div class="z-formrow">
                    <label for="closeableNotes">{gt text="Validators can close the annotations"}</label>
                    <input id="closeableNotes" name="closeableNotes" type="checkbox" value="1"/>
                </div>
                {*}
                <div class="z-formrow">
                    <label for="closeableInsert">{gt text="Validators can close the entries or the release of the book-entry form"}</label>
                    <input id="closeableInsert" name="closeableInsert" type="checkbox" value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="closeInsert">{gt text="The form is initially closed"}</label>
                    <input id="closeInsert" name="closeInsert" type="checkbox" value="1"/>
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Notes users read view"}</legend>
                <div class="z-formrow">
                    <label for="defaultNumberOfNotes">{gt text="Default number of notes for page in users read view"}</label>
                    <select id="defaultNumberOfNotes" name="defaultNumberOfNotes">
                        <option value="1">10</option>
                        <option value="2">20</option>
                        <option value="3">30</option>
                        <option value="4">50</option>
                        <option value="5">70</option>
                        <option value="6">100</option>
                        <option value="7">500</option>
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="defaultOrderForNotes">{gt text="Default order for notes"}</label>
                    <select id="defaultOrderForNotes" name="defaultOrderForNotes" onChange="orderField(this.value,0);">
                        <option value="1">{gt text="Cronologicaly inverse"}</option>
                        <option value="2">{gt text="Cronologicaly"}</option>
                        <option value="3">{gt text="Alphabetical"}</option>
                        <option value="4">{gt text="Random order"}</option>
                    </select>
                </div>
                <div id="orderFieldDiv"><input type="hidden" name="orderFormField" value="0" /></div>
                <div class="z-formrow">
                    <label for="unregisterednotusersview">{gt text="Unregistered users can not see the data of senders of entries"}</label>
                    <input id="unregisterednotusersview" name="unregisterednotusersview" type="checkbox" checked value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="unregisterednotexport">{gt text="Unregistered users can not export the contents of the annotations"}</label>
                    <input id="unregisterednotexport" name="unregisterednotexport" type="checkbox" checked value="1"/>
                </div>
                <div class="z-formrow">
                    <label for="publicResponse">{gt text="The answer is visible to all users who have access to information"}</label>
                    <input id="publicResponse" name="publicResponse" type="checkbox" value="1"/>
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Sending notes beheavor"}</legend>
                <div class="z-formrow">
                    <label for="allowComments">{gt text="The notes allow comments"}</label>
                    <input id="allowComments" name="allowComments" type="checkbox" value="1" onClick="javascript:allowCommentsControl(0)"/>
                </div>
                {*}
                <div class="z-formrow">
                    <label for="allowCommentsModerated">{gt text="The validators can decide if a particular note allow comments"}</label>
                    <input id="allowCommentsModerated" name="allowCommentsModerated" type="checkbox" value="1" onClick="javascript:allowCommentsControl(1)"/>
                </div>
                {*}
                <div class="z-formrow">
                    <label for="returnURL">{gt text="Return URL after sending a new note"}</label>
                    <input id="returnURL" name="returnURL" type="text" size="50" maxlength="150" />
                </div>
                <div class="z-formrow">
                    <label for="filesFolder">{gt text="Form files folder"}</label>
                    <div class="z-formnote">
                        <strong>{$filesFolder}/</strong> <input id="filesFolder" name="filesFolder" type="text" size="50" maxlength="30" />
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Expert mode"}</legend>
                <div class="z-formrow">
                    <label for="expertMode">{gt text="Use expert mode (options available after creation during edition)"}</label>
                    <input id="expertMode" name="expertMode" type="checkbox" value="1" />
                </div>
                <div id="expertModeContent">
                    {include file="IWforms_admin_form_definitionExpertMode.tpl"}
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Activation"}</legend>
                <div class="z-formrow">
                    <label for="active">{gt text="Active / non-active"}</label>
                    <input id="active" name="active" type="checkbox" value="1" />
                </div>
                <div class="z-center">
                    <span class="z-buttons">
                        <a title="Create" onClick="javascript:forms['formDefinition'].submit()">
                            {img modname='core' src='button_ok.png' set='icons/small' __alt="Create" __title="Create"} {gt text="Create"}
                        </a>
                    </span>
                    <span class="z-buttons">
                        <a href="{modurl modname=IWforms type=admin func=main}">
                            {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
                        </a>
                    </span>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>

<script type="text/javascript">
    var newForm = Calendar.setup({
        onSelect       :    function(newForm) { newForm.hide() }
    });
    newForm.manageFields("newFormDate_btn", "newFormDate", "%d/%m/%y");
    
    var caducity = Calendar.setup({
        onSelect       :    function(caducity) { caducity.hide() }
    });
    caducity.manageFields("caducityDate_btn", "caducityDate", "%d/%m/%y");
</script>
