<fieldset>
    <legend>{gt text='Personal information'}</legend>
    {foreach from=$duditems item='item'}
    {duditemmodify item=$item uid=$userid}
    {/foreach}
</fieldset>
