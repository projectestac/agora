<div class="z-linear">
    <div class="z-formrow">
        {formlabel for='text' __text='Computer code lines'}
        {formtextinput id='text' textMode='multiline' group='data' cols='60' rows='20'}
    </div>
    <div class="z-formrow">
        <div>
            {formradiobutton id='usenative' value='native' dataField='codeFilter' group='data' mandatory='1' checked='true' autoPostBack='1'}
            {formlabel for='usenative' __text='Use native code filter'}
            {modavailable modname='BBCode' assign='bbcode'}
            {if $bbcode}
            {formradiobutton id='usebbcode' value='bbcode' dataField='codeFilter' group='data' mandatory='1' autoPostBack='1'}
            {formlabel for='usebbcode' __text='Use BBCode filter'}
            {else}
            <p class="z-sub">{gt text="If the BBCode module is available, you can filter your code with BBCode instead."}</p>
            <p class="z-sub">{gt text="There is no need to 'hook' BBCode to Content for this functionality."}</p>
            {/if}
        </div>
    </div>
    {contentcodeeditor inputId='text' htmlradioid='usenative' textradioid='usebbcode' inputtype=$codeFilter}
</div>
