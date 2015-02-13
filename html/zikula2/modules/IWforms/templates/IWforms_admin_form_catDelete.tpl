{include file="IWforms_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='editdelete.png' set='icons/medium'}</div>
    <h2>{gt text="Delete category"}</h2>
    <form id="catDelete" class="z-form" action="{modurl modname='IWforms' type='admin' func='deleteCat'}" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="confirm" value="1" />
        <input type="hidden" name="cid" value="{$item.cid}" />
        {gt text="Confirms delete the category"} <strong>{$item.catName}</strong>
        <div class="z-center">
            <span class="z-buttons">
                <a onClick="javascript:forms['catDelete'].submit()">
                    {img modname='core' src='button_ok.png' set='icons/small' __alt="Delete" __title="Delete"} {gt text="Delete"}
                </a>
            </span>
            <span class="z-buttons">
                <a href="{modurl modname='IWforms' type='admin' func='conf'}">
                    {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}
                </a>
            </span>
        </div>
    </form>
</div>
