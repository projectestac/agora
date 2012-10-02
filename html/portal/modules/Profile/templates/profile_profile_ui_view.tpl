<div class="z-form">
    <fieldset>
        <legend>{gt text='Personal Information'}</legend>
        {foreach from=$duditems item='item'}
            {duditemdisplay item=$item userinfo=$userinfo}
        {/foreach}
    </fieldset>
</div>

