{ajaxheader modname='Quotes' filename='quotes.js' nobehaviour=true noscriptaculous=true}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Quotes List'}</h3>
</div>

<form class="z-form" action="{modurl modname='Quotes' type='admin' func='view'}" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset{if $filter_active} class='filteractive'{/if}>
        {if $filter_active}{gt text='active' assign='filteractive'}{else}{gt text='inactive' assign='filteractive'}{/if}
        <legend>{gt text='Filter %1$s, %2$s page listed' plural='Filter %1$s, %2$s records listed' count=$pager.numitems tag1=$filteractive tag2=$pager.numitems}</legend>
		{if $enablecategorization and $numproperties gt 0}
		<div id="quotes_multicategory_filter">
			<label for="quotes_property">{gt text='Category'}</label>
			{gt text='All' assign='lblDef'}
			{nocache}
			{if $numproperties gt 1}
			{html_options id='quotes_property' name='quotes_property' options=$properties selected=$property}
			{else}
			<input type="hidden" id="quotes_property" name="quotes_property" value="{$property}" />
			{/if}
			<div id="quotes_category_selectors" style="display: inline">
				{foreach from=$catregistry key='prop' item='cat'}
				{assign var='propref' value=$prop|string_format:'quotes_%s_category'}
				{if $property eq $prop}
				{assign var='selectedValue' value=$category}
				{else}
				{assign var='selectedValue' value=0}
				{/if}
				<noscript>
					<div class="property_selector_noscript"><label for="{$propref}">{$prop}</label>:</div>
				</noscript>
				{selector_category category=$cat name=$propref selectedValue=$selectedValue allValue=0 allText=$lblDef editLink=false}
				{/foreach}
			</div>
			{/nocache}
		</div>
		{/if}
		<label for="quotes_keyword">{gt text='Search by keyword'}:</label>
		<input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
		<input id="quotes_keyword" type="text" name="quotes_keyword" value="{$quotes_keyword|safetext}" size="20" maxlength="128" />
		&nbsp;
		<label for="quotes_author">{gt text='Author'}</label>
		{nocache}
		{gt text='All authors' assign='lbLAllAuthors'}
		{selector_field_array modname='Quotes' table='quotes' name='quotes_author' field='author' assocKey='author' sort='author' allText=$lbLAllAuthors allValue='' selectedValue=$quotes_author defaultValue='' defaultText=$lbLAllAuthors distinct=1 truncate=30}
		{/nocache}
		&nbsp;&nbsp;
		<span class="z-nowrap z-buttons">
			<input class='z-bt-filter' name="submit" type="submit" value="{gt text='Filter'}" />
			<input class='z-bt-cancel' name="clear" type="submit" value="{gt text='Clear'}" />
		</span>
    </fieldset>
</form>

<table class="z-datatable">
	<thead>
		<tr>
			<th>{sortlink __linktext='Quote content' sort='quote' currentsort=$sort sortdir=$sortdir modname='Quotes' type='admin' func='view' keyword=$quotes_keyword author=$quotes_author property=$property category=$category}</th>
			<th>{sortlink __linktext='Author' sort='author' currentsort=$sort sortdir=$sortdir modname='Quotes' type='admin' func='view' keyword=$quotes_keyword author=$quotes_author property=$property category=$category}</th>
			{if $enablecategorization}
			<th>{gt text='Category'}</th>
			{/if}
			<th>{sortlink __linktext='ID' sort='qid' currentsort=$sort sortdir=$sortdir modname='Quotes' type='admin' func='view' keyword=$quotes_keyword author=$quotes_author property=$property category=$category}</th>
			<th>{sortlink __linktext='Status' sort='status' currentsort=$sort sortdir=$sortdir modname='Quotes' type='admin' func='view' keyword=$quotes_keyword author=$quotes_author property=$property category=$category}</th>
			<th>{gt text='Actions'}</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$quotes item='quote'}
		<tr class="{cycle values='z-odd,z-even'}">
			<td>{$quote.quote|safehtml}</td>
			<td>{$quote.author|safehtml}</td>
			{if $enablecategorization}
			<td>
				{assignedcategorieslist item=$quote}
			</td>
			{/if}
			<td>{$quote.qid|safetext}</td>
			<td>
				{if $quote.status eq 0}<strong><em>{gt text='Inactive'}</em></strong>{/if}
				{if $quote.status eq 1}{gt text='Active'}{/if}
			</td>
			<td>
				{foreach item='option' from=$quote.options}
				<a href="{$option.url|safetext}">{img modname='core' set='icons/extrasmall' src=$option.image title=$option.title alt=$option.title}</a>
				{/foreach}
			</td>
		</tr>
		{foreachelse}
		<tr class="z-datatableempty"><td colspan="4">{gt text='No Quotes found.'}</td></tr>
		{/foreach}
	</tbody>
</table>

{pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}

{adminfooter}