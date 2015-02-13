<div class="z-formrow">
    <label for="orderFormField">{gt text="Ordenation form field"}</label>
    {if isset($fields) and count($fields) gt 0}
    <select id="orderFormField" name="orderFormField">
        <option value="0">{gt text="Select an option..."}</option>
        {foreach item="field" from=$fields}
        <option  {if $item.orderFormField eq $field.fndid}selected="selected"{/if} value="{$field.fndid}">{$field.fndid} - {$field.fieldName}</option>
        {/foreach}
    </select>
    {else}
    <div class="z-formnote">
        {gt text="There are not defined fields. You should select this option editing this form after fields creation. The default option is Cronologicaly inverse"}
    </div>
    <input type="hidden" name="orderFormField" value="0" />
    {/if}
</div>