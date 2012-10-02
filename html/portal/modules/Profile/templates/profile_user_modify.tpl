{gt text='Edit personal info' assign='templatetitle'}
{ajaxheader validation=true}

{include file='profile_user_menu.tpl'}

<form id="modifyprofileform" class="z-form" action="{modurl modname='Profile' type='user' func='update'}" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend>{$templatetitle}</legend>
        <p>{gt text="Items marked with an asterisk ('*') are required entries."}</p>
        <input type="hidden" id="csrftoken" name="csrftoken" value="{insert name="csrftoken"}" />
        {foreach from=$duditems item=item}
        {duditemmodify item=$item}
        {/foreach}
    </fieldset>
    <div class="z-formbuttons z-buttons">
        {button src='button_ok.png' set='icons/small' __alt='Save' __title='Save' __text='Save'}
        <a href="{modurl modname='Profile' type='user' func='view'}" title="{gt text="Cancel"}">{img modname='core' src='button_cancel.png' set='icons/small' __alt='Cancel' __title='Cancel'} {gt text="Cancel"}</a>
    </div>
</form>

<script type="text/javascript">
    // <![CDATA[
    var valid = new Validation('modifyprofileform');
    // ]]>
</script>
