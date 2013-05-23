{ajaxheader modname='News' filename='news_admin.js' ui=true}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='New articles list'}</h3>
</div>

{if $modvars.News.enablecategorization}
<form class="z-form" id="news_filter" action="{modurl modname='News' type='admin' func='view'}" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset id="news_multicategory_filter"{if $filter_active} class='filteractive'{/if}>
        {if $filter_active}{gt text='active' assign=filteractive}{else}{gt text='inactive" assign=filteractive}{/if}
        <legend>{gt text='Filter %1$s, %2$s article listed' plural='Filter %1$s, %2$s articles listed' count=$total_articles tag1=$filteractive tag2=$total_articles}</legend>
        <input type="hidden" name="startnum" value="{$startnum}" />
        <input type="hidden" name="order" value="{$order}" />
        <input type="hidden" name="sdir" value="{$sdir}" />
        <label for="news_status">{gt text='Status'}</label>
        {html_options name='news_status' id='news_status' options=$itemstatus selected=$news_status}
        &nbsp;
        {if $modvars.News.enablecategorization}
        <span id='categoryfilter'>{include file='admin/filtercats.tpl'}</span>
        {/if}
        {if $modvars.ZConfig.multilingual}
        &nbsp;
        <label for="news_language">{gt text='Language'}</label>
        {nocache}
        {html_select_languages id="news_language" name="news_language" installed=1 all=1 selected=$selected_language}
        {/nocache}
        {/if}
        &nbsp;&nbsp;
        <span class="z-nowrap z-buttons">
            <input class='z-bt-filter' name="submit" type="submit" value="{gt text='Filter'}" />
            <a href="{modurl modname="News" type='admin' func='view'}" title="{gt text="Clear"}">{img modname=core src="button_cancel.png" set="icons/extrasmall" __alt="Clear" __title="Clear"} {gt text="Clear"}</a>
        </span>
    </fieldset>
</form>
{elseif $modvars.ZConfig.multilingual}
<form action="{modurl modname='News' type='admin' func='view'}" method="post" enctype="application/x-www-form-urlencoded">
    <div id="news_multicategory_filter">
        <label for="news_language">{gt text='Language'}</label>
        {nocache}
        {html_select_languages id="news_language" name="news_language" installed=1 all=1 selected=$modvars.ZConfig.language_i18n|default:''}
        {/nocache}
        <label for="news_status">{gt text='Status'}</label>
        {html_options name='news_status' id='news_status' options=$itemstatus selected=$status}
        <input name="submit" type="submit" value="{gt text='Apply filter'}" />
        <input name="clear" type="submit" value="{gt text='Reset'}" />
    </div>
</form>
{/if}

<form class="z-form" id="news_bulkaction_form" action="{modurl modname='News' type='admin' func='processbulkaction'}" method="post">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <table id="news_admintable" class="z-datatable">
            <thead>
                <tr>
                    <th></th>
                    <th><a class='{$sort.class.sid}' href='{$sort.url.sid|safetext}'>{gt text='ID'}</a></th>
                    <th>{gt text='Title'}</th>
                    <th>{gt text='Contributor'}</th>
                    {if $modvars.News.enablecategorization}
                    <th>{gt text='Category'}</th>
                    {/if}
                    {if $modvars.News.picupload_enabled}
                    <th>{gt text='Pictures'}</th>
                    {/if}
                    <th>{gt text='Index page<br />listing'} / <a class='{$sort.class.weight}' href='{$sort.url.weight|safetext}'>{gt text='Weight'}</a></th>
                    <th><a class='{$sort.class.from}' href='{$sort.url.from|safetext}'>{gt text='Date'}</a></th>
                    <th>{gt text='Actions'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$newsitems item='newsitem'}
                <tr class="{cycle values='z-odd,z-even'}">
                    <td><input type="checkbox" name="news_selected_articles[]" value="{$newsitem.sid}" class="news_checkbox" /></td>
                    <td>{$newsitem.sid|safetext}</td>
                    <td>
                        {include file='admin/publisheddata.tpl' assign='publisheddata'}
                        <span title='{$publisheddata}' class='z-icon-es-info tooltips'></span>{$newsitem.title|strip_tags|safetext}
                        {if $newsitem.published_status eq 2}<strong><em> - {gt text='Pending Review'}</em></strong>{/if}
                        {if $newsitem.published_status eq 4}<strong><em> - {gt text='Draft'}</em></strong>{/if}
                        {if $modvars.ZConfig.multilingual && !empty($newsitem.language) && empty($selected_language)}({$newsitem.language|safetext}){/if}
                    </td>
                    <td>{$newsitem.contributor|safetext}</td>
                    {if $modvars.News.enablecategorization}
                    <td class="news_categorieslist">
                        {assignedcategorieslist item=$newsitem}
                    </td>
                    {/if}
                    {if $modvars.News.picupload_enabled}
                    <td>
                        {$newsitem.pictures|safetext}
                    </td>
                    {/if}
                    <td>{$newsitem.displayonindex|yesno|safetext} / {$newsitem.weight|safetext}</td>
                    <td>
                        {if $newsitem.published_status eq '2'}
                        {gt text='Last edited %s' tag1=$newsitem.lu_date|dateformatHuman:'%x':'3'}
                        {else}
                        {if $newsitem.infuture}{gt text='Scheduled for'}{else}{$newsitem.published_status|news_getstatustext}{/if}
                        {$newsitem.from|dateformatHuman:'%x':'2'}.
                        {if $newsitem.to neq null}<br />{gt text='until %s' tag1=$newsitem.to|dateformatHuman:'%x':'3'}{/if}
                        {/if}
                        {if $newsitem.allowcomments eq '0'}
                        <br /><em>{gt text='No comments allowed.'}</em>
                        {/if}
                    </td>
                    <td>
                        {assign var='options' value=$newsitem.options}
                        {section name='options' loop=$options}
                        <a href="{$options[options].url|safetext}">{img modname='core' set='icons/extrasmall' src=$options[options].image title=$options[options].title alt=$options[options].title class='tooltips'}</a>
                        {/section}
                    </td>
                </tr>
                {foreachelse}
                <tr class="z-datatableempty"><td colspan="{if $modvars.News.enablecategorization}7{else}6{/if}">{gt text='No articles currently in database.'}</td></tr>
                {/foreach}
            </tbody>
        </table>
        <p id='news_bulkaction_control'>
            {img modname='core' set='icons/extrasmall' src='2uparrow.png' __alt='doubleuparrow'}<a href="javascript:void(0);" id="news_select_all">{gt text="Check all"}</a> / <a href="javascript:void(0);" id="news_deselect_all">{gt text="Uncheck all"}</a>
            <select id='news_bulkaction_select' name='news_bulkaction_select'>
                <option value='0' selected='selected'>{gt text='With selected:'}</option>
                <option value='1'>{gt text='Delete'}</option>
                <option value='2'>{gt text='Archive'}</option>
                <option value='3'>{gt text='Publish'}</option>
                <option value='4'>{gt text='Reject'}</option>
                <option value='5'>{gt text='Change categories'}</option>
            </select>
        </p>
        <input type='hidden' name='news_bulkaction_categorydata' id='news_bulkaction_categorydata' value='' />
    </div>
</form>

<form class="z-form" action="{modurl modname='News' type='admin' func='modify'}" method="post">
    <div>
        <fieldset>
            <label for="directsid">{gt text='Access a past article via its ID'}:</label>
            <input type="text" id="directsid" name="sid" value="" size="5" maxlength="8" />
            <span class="z-nowrap z-buttons">
                <input class="z-bt-small" name="submit" type="submit" value="{gt text='Go retrieve'}" />
                <input class="z-bt-small" name="reset" type="reset" value="{gt text='Reset'}" />
            </span>
        </fieldset>
    </div>
</form>

{pager rowcount=$total_articles limit=$modvars.News.itemsperadminpage posvar='startnum'}

{adminfooter}

<!-- This form below appears as a formdialog when a bulk action of 'change categories' is selected -->
<div id='news_changeCategoriesForm' style='display: none;'>
    <form class='z-form' method='post' action="#" enctype="application/x-www-form-urlencoded">
        <div>
            <fieldset>
                <legend>{gt text='Select a Category'}</legend>
                <div class="z-formrow">
                    <label>{gt text='Category'}</label>
                    {gt text='Choose category' assign='lblDef'}
                    {foreach from=$catregistry key='property' item='category'}
                    <div class="z-formnote">{selector_category category=$category name=$property field='id' defaultValue='0' editLink=false defaultText=$lblDef}</div>
                    {/foreach}
                </div>
            </fieldset>
        </div>
    </form>
</div>
<script type="text/javascript">
// <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
// ]]>
</script>