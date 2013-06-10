{ajaxheader modname='Pages' filename='chosen/chosen.proto.min.js'}
{pageaddvar name='stylesheet' value='modules/Pages/javascript/chosen/chosen.css'}

<div id="chosenCss" class="z-formrow">
    <label for="htmlpages_pid">{gt text='Page' domain='module_pages'}</label>    
    <select id="htmlpages_pid" name='pid' class="chzn-select">
        {foreach from=$pages item="page"}
            <option value="{$page.pageid|safehtml}" {if $page.pageid == $pid}selected="selected"{/if} >
                {$page.title|safehtml}
            </option>
        {/foreach}
    </select>
</div>

<script type="text/javascript">
    New Chosen($("chzn_select_field"),{no_results_text: "No results matched"});
</script>