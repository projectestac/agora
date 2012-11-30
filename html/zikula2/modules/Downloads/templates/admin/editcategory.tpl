{adminheader}
<div class="z-admin-content-pagetitle">
    {if isset($cid)}{assign var='icontype' value='edit'}{else}{assign var='icontype' value='new'}{/if}
    {icon type=$icontype size="small"}
    <h3>{if isset($cid)}{gt text="Edit Category"}{else}{gt text="New Category"}{/if}</h3>
</div>

{form cssClass="z-form" enctype="multipart/form-data"}
    <fieldset>
        <legend>{if isset($cid)}{gt text="Edit Category"}{else}{gt text="New Category"}{/if}</legend>

        {formvalidationsummary}

        <div class="z-formrow">
            {formlabel mandatorysym=true for="title" __text="Category title"}
            {formtextinput id="title" mandatory=true maxLength=100}
        </div>

        <div class="z-formrow">
            {formlabel mandatorysym=true for="description" __text="Description"}
            {formtextinput textMode='multiline' id="description" rows='6' cols='50' mandatory=true}
        </div>

        <div class="z-formrow">
            {formlabel mandatorysym=true for="pid" __text="Child of:"}
            {formdropdownlist id="pid" items=$categories mandatory=true}
        </div>

    </fieldset>

    <div class="z-buttons z-formbuttons">
        {formbutton class='z-bt-ok' commandName='create' __text='Save'}
        {formbutton class='z-bt-cancel' commandName='cancel' __text='Cancel'}
        {if isset($cid)}{formbutton class="z-bt-delete z-btred" commandName="delete" __text="Delete" __confirmMessage='Delete'}{/if}
    </div>
{/form}
{adminfooter}