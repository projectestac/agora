{ajaxheader modname='Profile' filename='profile.js'}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text='Personal info items list'}</h3>
</div>

<form class="z-adminform" action="" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" id="csrftoken" name="csrftoken" value="{insert name="csrftoken"}" />
        <input type="hidden" id="startnum" name="startnum" value="{$startnum}" />
        <div id="profilehint" class="z-informationmsg" style="display:none">{gt text="Notice: Use drag and drop to arrange the arrange the personal info items into your desired order. The new order will be saved automatically when you drop the item into place."}</div>
        <ol id="profilelist" class="z-itemlist">
            <li class="z-itemheader z-itemsortheader z-clearfix">
                <span class="z-itemcell z-w25">{gt text='Label'}</span>
                <span class="z-itemcell z-w25">{gt text='Attribute name'}</span>
                <span class="z-itemcell z-w15">{gt text='Type'}</span>
                <span class="z-itemcell z-w15">{gt text='Status'}</span>
                <span class="z-itemcell z-w10">{gt text='Actions'}</span>
            </li>
            {foreach from=$duditems item='duditem'}
            <li id="profile_{$duditem.prop_id}" class="{cycle values='z-odd,z-even'} z-itemsort z-sortable z-clearfix">
                <span class="z-itemcell z-w25" id="profiledrag_{$duditem.prop_id}">{$duditem.prop_label|safehtml} ({gt text=$duditem.prop_label})</span>
                <span class="z-itemcell z-w25">{$duditem.prop_attribute_name}</span>
                <span class="z-itemcell z-w15">{$duditem.dtype|safehtml}</span>
                <span class="z-itemcell z-w15">
                    {if $duditem.status.url ne ''}
                    <a href="{$duditem.status.url|safetext}" id="profilestatus_{$duditem.prop_id}" class="profilestatus_{$duditem.statusval}">
                        {img modname='core' set='icons/extrasmall' src=$duditem.status.image alt=$duditem.status.title title=$duditem.status.title}
                        <strong>{$duditem.status.title}</strong>
                    </a>
                    {else}
                    {img modname='core' set='icons/extrasmall' src=$duditem.status.image alt=$duditem.status.title title=$duditem.status.title}
                    {/if}
                </span>
                <span class="z-itemcell z-w10">
                    {assign var='options' value=$duditem.options}
                    {section name='options' loop=$options}
                    <a href="{$options[options].url|safetext}"{if $options[options].class} class="{$options[options].class|safetext}"{/if}>{img modname='core' set='icons/extrasmall' src=$options[options].image alt=$options[options].title title=$options[options].title}</a>
                    {/section}
                </span>
            </li>
            {/foreach}
        </ol>
    </div>
</form>

{pager rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum' shift=1}
{adminfooter}

<script type="text/javascript">
    // <![CDATA[
    var msgProfileStatusDeactivate = '{{gt text="Deactivate"}}';
    var msgProfileStatusActivate = '{{gt text="Activate"}}';
    Event.observe(window, 'load', profileinit, false);
    // ]]>
</script>
