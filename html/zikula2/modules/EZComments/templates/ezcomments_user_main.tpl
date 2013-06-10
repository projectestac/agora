{gt text="The last %s created or owned comment" plural="The last %s created or owned comments" count=$itemsperpage tag1=$itemsperpage assign=templatetitle}
{gt text="unknown" assign=lblunknown}
{include file="ezcomments_user_header.tpl"}

<h3>{$templatetitle}</h3>
<form class="z-form" action="{modurl modname='EZComments' type='user'}" method="post">
    <fieldset>
        <label for="ezcomments_filter">{gt text="Filter by status"}</label>
        <select id="ezcomments_filter" name="status">
            <option value="-1"{if $status eq -1} selected="selected"{/if}>{gt text="All"}</option>
            <option value="0"{if $status eq 0} selected="selected"{/if}>{gt text="Approved"}</option>
            <option value="1"{if $status eq 1} selected="selected"{/if}>{gt text="Pending"}</option>
            <option value="2"{if $status eq 2} selected="selected"{/if}>{gt text="Rejected"}</option>
        </select>
        &nbsp;&nbsp;
        <span class="z-nowrap z-buttons">
            <input class='z-bt-filter z-bt-small' type="submit" value="{gt text="Filter"}" />
        </span>
    </fieldset>
</form>

<table id="ezcomments_comments" class="z-datatable">
    <thead>
        <tr>
            <th>{gt text="Status"}</th>
            <th>{gt text="Date"}</th>
            <th>
                <span class="z-nowrap">{gt text="Commentator"}</span><br />
                <span class="z-nowrap">{gt text="Owner"}</span>
            </th>
            <th>{gt text="Comment"}</th>
            <th class="z-nowrap z-right">{gt text="Options"}</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$items item=item}
        <tr class="{cycle values=z-odd,z-even}">
            <td>
                {if $item.status eq 0}{img modname="EZComments" class="tooltips" src='green.gif' __alt='Approved' __title='Approved'}{/if}
                {if $item.status eq 1}{img modname="EZComments" class="tooltips" src='yellow.gif' __alt='Pending' __title='Pending'}{/if}
                {if $item.status eq 2}{img modname="EZComments" class="tooltips" src='red.gif' __alt='Rejected' __title='Rejected'}{/if}
            </td>
            <td>
                <span class="z-nowrap">{$item.date|dateformat:datebrief}</span>
                <span class="z-nowrap">{$item.date|dateformat:timebrief}</span>
            </td>
            <td>
                <span class="z-nowrap">
                    {if $item.uid neq 0}
                    {$item.uid|profilelinkbyuid|default:$lblunknown}
                    {else}
                    {$item.anonname|safetext|default:$lblunknown}
                    {/if}
                </span>
                <br />
                <span class="z-nowrap">
                    {if $item.owneruid ne "0"}
                    {$item.owneruid|profilelinkbyuid|default:$lblunknown}
                    {else}
                    {$lblunknown}
                    {/if}
                </span>
            </td>
            <td>
                {if $item.subject}<em class="tooltips" title="{gt text="Subject"}">{$item.subject|strip_tags}: </em>{/if}
                {$item.comment|strip_tags|truncate:80}
            </td>
            <td class="z-nowrap z-right">
                {assign var="options" value=$item.options}
                {section name=options loop=$options}
                <a href="{$options[options].url|safetext}">{img modname='core' set='icons/extrasmall' src=$options[options].image title=$options[options].title alt=$options[options].title class="tooltips"}</a>
                {/section}
            </td>
        </tr>
        {foreachelse}
        <tr class="z-datatableempty">
            <td colspan="5">{gt text="No items found"}</td>
        </tr>
        {/foreach}
    </tbody>
</table>

{pager show="page" rowcount=$ezc_pager.numitems limit=$ezc_pager.itemsperpage posvar=startnum shift=1}

<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>