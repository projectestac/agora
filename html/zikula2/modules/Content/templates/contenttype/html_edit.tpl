<div class="z-linear">
    <div class="z-formrow">
        {formlabel for='text' __text='Text'}
        {formtextinput id='text' textMode='multiline' group='data' cols='60' rows='20'}
    </div>

    {modavailable modname=Scribite assign=scribite}

    <div class="z-formrow">
        <div>
            {if $scribite}
            {formradiobutton id='htmlButton' value='html' dataField='inputType' group='data' mandatory='1' autoPostBack='1'}
            {formlabel for='htmlButton' __text='HTML'}
            {/if}
            {formradiobutton id='textButton' value='text' dataField='inputType' group='data' mandatory='1' autoPostBack='1' checked='true'}
            {formlabel for='textButton' __text='Formatted text'}
            {formradiobutton id='rawButton' value='raw' dataField='inputType' group='data' mandatory='1' autoPostBack='1'}
            {formlabel for='rawButton' __text='Unformatted text'}
        </div>
    </div>
    {contenthtmleditor inputId='text' htmlradioid='htmlButton' textradioid='textButton' inputtype=$pluginInputType}
</div>