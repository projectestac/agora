{include file="IWdocmanager_admin_menu.htm"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='windowlist.png' set='icons/large' __alt=''}</div>
    <h2>{gt text="Documents categories"}</h2>
    <div id="IWdocmanager_admin">
        {$categories}
    </div>
    <div class="z-informationmsg">
        {gt text="The users with edition access to the module IWdocmanager can view and add to all the categories."}
    </div>
</div>
<script>
    var deteleText = '{{gt text="Do you really want to the detele this category"}}';
</script>