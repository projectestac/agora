{include file="ephemerids_admin_menu.tpl"}
{gt text="Ephemerids list" assign=templatetitle}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname=core src=windowlist.png set=icons/large}</div>
    <h2>{$templatetitle}</h2>
    <table class="z-admintable">
        <thead>
            <tr>
                <th>{gt text="Date"}</th>
                <th>{gt text="Content"}</th>
                <th>{gt text="Internal ID"}</th>
                <th>{gt text="Actions"}</th>
            </tr>
        </thead>
        <tbody>
            {section name=ephemerids loop=$ephemerids}
            <tr class="{cycle values='z-odd,z-even'}">
                <td>{$ephemerids[ephemerids].datetime|safetext}</td>
                <td>{$ephemerids[ephemerids].content|safetext}</td>
                <td>{$ephemerids[ephemerids].eid|safetext}</td>
                <td>
                    {assign var="options" value=$ephemerids[ephemerids].options}
                    {section name=options loop=$options}
                    <a href="{$options[options].url|safetext}">{img modname=core set=icons/extrasmall src=$options[options].image alt=$options[options].title}</a>
                    {/section}
                </td>
            </tr>
            {sectionelse}
            <tr class="z-admintableempty"><td colspan="4">{gt text='No items found.'}</td></tr>
            {/section}
        </tbody>
    </table>
    {pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar=startnum shift=1 img_prev=images/icons/extrasmall/previous.png img_next=images/icons/extrasmall/next.png}
</div>
