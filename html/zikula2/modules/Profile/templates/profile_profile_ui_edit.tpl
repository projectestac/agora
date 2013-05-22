{ajaxheader modname='Profile' filename='Profile.UI.Edit.js' noscriptaculous=true effects=true}
<fieldset>
    <legend>{gt text='Personal information'}</legend>
    {foreach from=$duditems item='item' key='itemlabel}
    {duditemmodify item=$item uid=$userid error=$duderrors.$itemlabel|default:''}
    {/foreach}
</fieldset>
