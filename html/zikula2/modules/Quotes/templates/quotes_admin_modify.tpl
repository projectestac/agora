{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="edit" size="small"}
    <h3>{gt text='Edit quote'}</h3>
</div>

<form class="z-form" action="{modurl modname='Quotes' type='admin' func='update'}" method="post" enctype="application/x-www-form-urlencoded">
	<div>
		<input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
		<input type="hidden" name="quote[qid]" value="{$qid|safetext}" />
		<fieldset>
			<legend>{gt text='Content'}</legend>
			<div class="z-formrow">
				<label for="quote_quote">{gt text='Quote Text'}</label>
				<textarea id="quote_quote" rows="8" name="quote[quote]" cols="50">{$quote|safehtml}</textarea>
			</div>
			<div class="z-formrow">
				<label for="quote_author">{gt text='Author'}</label>
				<input id="quote_author" type="text" name="quote[author]" size="30" maxlength="128" value="{$author|safehtml}" />
			</div>
			{if $enablecategorization}
			<div class="z-formrow">
				<label>{gt text='Categories'}</label>
				{gt text='Choose a category' assign='lblDef'}
				{nocache}
				{foreach from=$catregistry key='property' item='category'}
				{array_field_isset array=$__CATEGORIES__ field=$property assign='catExists'}
				{if $catExists}
				{array_field_isset array=$__CATEGORIES__.$property field='id' returnValue=1 assign='selectedValue'}
				{else}
				{assign var='selectedValue' value='0'}
				{/if}
				<div class="z-formnote">{selector_category category=$category name="quote[__CATEGORIES__][$property]" field='id' selectedValue=$selectedValue defaultValue='0' defaultText=$lblDef}</div>
				{/foreach}
				{/nocache}
			</div>
			{/if}
			<div class="z-formrow">
				<label for="quote_status">{gt text="Status"}</label>
				<select name="quote[status]" id="quote_status">
					<option label="{gt text="Active"}" value="1"{if $status eq 1} selected="selected"{/if}>{gt text="Active"}</option>
					<option label="{gt text="Inactive"}" value="0"{if $status eq 0} selected="selected"{/if}>{gt text="Inactive"}</option>
				</select>
			</div>
		</fieldset>
		<fieldset>
			<legend>{gt text='Meta data'}</legend>
			<ul>
				{usergetvar name='uname' uid=$cr_uid assign='username'}
				<li>{gt text='Created by %s' tag1=$username}</li>
				<li>{gt text='Created on %s' tag1=$cr_date|date_format}</li>
				{usergetvar name='uname' uid=$lu_uid assign='username'}
				<li>{gt text='Last update by %s' tag1=$username}</li>
				<li>{gt text='Updated on %s' tag1=$lu_date|date_format}</li>
			</ul>
		</fieldset>
		<div class="z-formbuttons">
			{button src='button_ok.gif' set='icons/small' __alt='Update' __title='Update'}
			<a href="{modurl modname='Quotes' type='admin' func='view'}">{img modname='core' src='button_cancel.gif' set='icons/small' __alt='Cancel' __title='Cancel'}</a>
		</div>
	</div>
</form>
{adminfooter}