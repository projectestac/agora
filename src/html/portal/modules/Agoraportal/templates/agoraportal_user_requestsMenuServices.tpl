{gt text="Servei"}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="requestMenuServices" id="requestMenuServices" onchange="javascript:showRequestMessage($('requestMenuServices').value, $('requestFilter').value, $('clientCode').value);">
    <option value="0">{gt text="Tria el servei"}</option>
    {foreach from=$services key=serviceid item=servicename }
        <option value="{$serviceid}">{$servicename}</option>
    {/foreach}
</select>
