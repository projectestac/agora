<script type="text/javascript">
    //<![CDATA[
    {{modurl modname='Content' type='user' func='view' preview='1' pid='__PID__' assign='previewUrl'}}
    content.previewUrl = "{{$previewUrl}}";
    function contentToggle(id)
    {
        $('contentTogglePageId').value = id;
        contentTogglePageIdPost();
    }
    function expandAllPages()
    {
        contentExpandAllPost();
    }
    function collapseAllPages()
    {
        contentCollapseAllPost();
    }    //]]>
</script>
{formpostbackfunction function='contentExpandAllPost' commandName='expandAll'}
{formpostbackfunction function='contentCollapseAllPost' commandName='collapseAll'}
{formpostbackfunction function='contentTogglePageIdPost' commandName='toggleExpand'}
<div>
    <input type="hidden" id="contentTogglePageId" name="contentTogglePageId" />
</div>
{modurl modname='Content' type='admin' func='translatePage' pid=$smarty.ldelim|cat:"commandArgument"|cat:$smarty.rdelim assign='translateUrl'}

{formcontextmenu id="contentTocMenu" width="auto"}
{formcontextmenuitem __title='Edit' imageURL="images/icons/extrasmall/edit.png" commandName="editPage"}
{formcontextmenuitem __title='Preview' imageURL="images/icons/extrasmall/14_layer_visible.png" commandScript="content.popupPreviewWindow(commandArgument)"}
{formcontextmenuseparator}
{if $access.pageCreateAllowed}
{formcontextmenuitem __title='Clone page' imageURL="images/icons/extrasmall/editcopy.png" commandName="clonePage"}
{formcontextmenuitem __title='New page' imageURL="images/icons/extrasmall/filenew.png" commandName="newPage"}
{formcontextmenuitem __title='New sub-page' imageURL="images/icons/extrasmall/insert_table_row.png" commandName="newSubPage"}
{/if}
{formcontextmenuitem __title='Decrease indent' imageURL="images/icons/extrasmall/1leftarrow.png" commandName="decIndent"}
{formcontextmenuitem __title='Increase indent' imageURL="images/icons/extrasmall/1rightarrow.png" commandName="incIndent"}
{if $multilingual}{formcontextmenuitem __title='Translate' imageURL="images/icons/extrasmall/voice-support.png" commandRedirect=$translateUrl}{/if}
{if $enableVersioning}{formcontextmenuitem __title='History' imageURL="images/icons/extrasmall/clock.png" commandName='history'}{/if}
{if $access.pageDeleteAllowed}
{formcontextmenuseparator}
{formcontextmenuitem __title='Delete' imageURL="images/icons/extrasmall/delete_table_row.png" commandName='deletePage' __confirmMessage='Delete'}
{/if}
{formcontextmenuseparator}
{formcontextmenuitem __title='Order subpages by title' imageURL='modules/Content/images/sort_incr.gif' commandName='sortPagesBelowByTitle'}
{formcontextmenuseparator}
{formcontextmenuitem __title='Expand All' imageURL='modules/Content/images/page-collapsed3.gif' commandName='expandAllBelow'}
{formcontextmenuitem __title='Collapse All' imageURL='modules/Content/images/page-expanded3.gif' commandName='collapseAllBelow'}
{/formcontextmenu}

{gt text="Click to activate this page" assign='activate'}
{gt text="Click to deactivate this page" assign='deactivate'}
{gt text="Click to put this page in the menu" assign='inmenu'}
{gt text="Click to pull this page from the menu" assign='outmenu'}

<div class="content-toc">
    <table class="z-datatable">
        <thead>
            <tr>
                <th>{gt text="Page title [id]"}</th>
                <th class="z-center">{gt text="Status"}</th>
                <th class="z-center">{gt text="Menu"}</th>
                <th>{if $enableVersioning}{gt text="Last updated (revision)"}{else}{gt text="Last updated"}{/if}</th>
                {if isset($categoryUsage) && ($categoryUsage lt 4)}<th>{gt text="Category"}</th>{/if}
                {if $multilingual}<th>{gt text="Language"}</th>{/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$pages item=page}
            <tr class="{cycle values="z-odd,z-even"}">
                <td style="padding-left: {$page.level*1.5}em">
                    <div id="page_{$page.id}">
                        {if $page.setRight - $page.setLeft != 1}
                        {if $page.isExpanded}
                        <img src="modules/Content/images/page-expanded3.gif" onclick="contentToggle({$page.id})" title="{gt text="Click to hide sub-pages"}" alt="" class="clickable" />
                        {else}
                        <img src="modules/Content/images/page-collapsed3.gif" onclick="contentToggle({$page.id})" title="{gt text="Click to show sub-pages"}" alt="" class="clickable" />
                        {/if}
                        {else}
                        <img src="modules/Content/images/page-none3.gif" alt="" />
                        {/if}

                        {if $access.pageEditAllowed}
                        <img src="images/icons/extrasmall/move.png" alt="{gt text="Page draggable"}" title="{gt text="Page draggable"}" class="draggable"/>
                        {/if}

                        <a href="{modurl modname='Content' type='admin' func='editPage' pid=$page.id}" id="droppable_{$page.id}">{$page.title} [{$page.id}{* {$page.position}|{$page.setLeft}/{$page.setRight}  *}]</a>
                        {if $access.pageEditAllowed}&nbsp;{formcontextmenureference menuId="contentTocMenu" commandArgument=$page.id imageURL="modules/Content/images/contextarrow.png"}{/if}
                    </div>
                </td>
                <td class="z-center z-nowrap">
                    {if $page.active}
                    <a class="content_activationbutton" href="javascript:void(0);" onclick="togglepagestate({$page.id})">{img src="page-greenled.gif" modname="Content" title=$deactivate alt=$deactivate id="active_`$page.id`"}{img src="page-redled.gif" modname="Content" title=$activate alt=$activate style="display: none;" id="inactive_`$page.id`"}</a>
                    <noscript><div>{img src=greenled.png modname=core set=icons/extrasmall __title="Active" __alt="Active" }</div></noscript>
                    <span id="activity_{$page.id}">{gt text="Active"}</span>
                    {else}
                    <a class="content_activationbutton" href="javascript:void(0);" onclick="togglepagestate({$page.id})">{img src="page-greenled.gif" modname="Content" title=$deactivate alt=$deactivate style="display: none;" id="active_`$page.id`"}{img src="page-redled.gif" modname="Content" title=$activate alt=$activate id="inactive_`$page.id`"}</a>
                    <noscript><div>{img src=redled.png modname=core set=icons/extrasmall __title="Inactive" __alt="Inactive" }</div></noscript>
                    <span id="activity_{$page.id}">{gt text="Inactive"}</span>
                    {/if}
                </td>
                <td class="z-center z-nowrap">
                    {if $page.inMenu}
                    <a class="content_activationbutton" href="javascript:void(0);" onclick="togglepageinmenu({$page.id})">{img src="page-greenled.gif" modname="Content" title=$outmenu alt=$outmenu id="inmenu_`$page.id`"}{img src="page-redled.gif" modname="Content" title=$inmenu alt=$inmenu style="display: none;" id="outmenu_`$page.id`"}</a>
                    <noscript><div>{img src=greenled.png modname=core set=icons/extrasmall __title="In" __alt="In" }</div></noscript>
                    <span id="menustatus_{$page.id}">{gt text="In"}</span>
                    {else}
                    <a class="content_activationbutton" href="javascript:void(0);" onclick="togglepageinmenu({$page.id})">{img src="page-greenled.gif" modname="Content" title=$outmenu alt=$outmenu style="display: none;" id="inmenu_`$page.id`"}{img src="page-redled.gif" modname="Content" title=$inmenu alt=$inmenu id="outmenu_`$page.id`"}</a>
                    <noscript><div>{img src=redled.png modname=core set=icons/extrasmall __title="Out" __alt="Out" }</div></noscript>
                    <span id="menustatus_{$page.id}">{gt text="Out"}</span>
                    {/if}
                </td>
                <td>{gt text='on %1$s by %2$s' tag1=$page.lu_date|dateformat:'datebrief' tag2=$page.lu_uid|profilelinkbyuid}
                    {if $enableVersioning}
                    {modapifunc modname=Content type=History func=getPageVersionNo pageId=$page.id assign=versionNo}
                    (#{$versionNo})
                    {/if}
                </td>
                {if isset($categoryUsage) && ($categoryUsage lt 4)}<td>{foreach from=$categories[$page.id] item=cat name=categories}{$cat}{if !$smarty.foreach.categories.last}<br />{/if}{/foreach}</td>{/if}
                {if $multilingual}<td>{if $page.isTranslated}{gt text='%1$s (%2$s original)' tag1=$language|getlanguagename tag2=$page.language|getlanguagename}{elseif $language neq $page.language}{gt text="%s original used" tag1=$page.language|getlanguagename}{else}{$page.language|getlanguagename}{/if}</td>{/if}
            </tr>
            {foreachelse}
            <tr class="z-datatableempty"><td colspan="{if $multilingual}5{else}4{/if}">{gt text="No pages available."}</td></tr>
            {/foreach}
        </tbody>
    </table>
</div>

<script type="text/javascript">
    Event.observe(window, 'load', initcontentactivationbuttons, false);
</script>