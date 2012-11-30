{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Settings'}</h3>
</div>

<form class="z-form" action="{modurl modname='Quotes' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlencoded">
	<div>
		<input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
		<fieldset>
			<div class="z-formrow">
				<label for="quotes_enablecategorization">{gt text='Enable categorization'}</label>
				<input id="quotes_enablecategorization" type="checkbox" name="enablecategorization"{if $enablecategorization} checked="checked"{/if} />
			</div>
			<div class="z-formrow">
				<label for="quotes_itemsperpage">{gt text='Items per page'}</label>
				<input id="quotes_itemsperpage" type="text" name="itemsperpage" size="3" value="{$itemsperpage|safetext}" />
			</div>
		</fieldset>
		<div class="z-formbuttons">
			{button src='button_ok.gif' set='icons/small' __alt='Save' __title='Save'}
			<a href="{modurl modname='Quotes' type='admin' func='view'}">{img modname='core' src='button_cancel.gif' set='icons/small' __alt='Cancel' __title='Cancel'}</a>
		</div>
	</div>
</form>
{adminfooter}