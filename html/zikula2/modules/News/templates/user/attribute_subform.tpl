{pageaddvar name="javascript" value="javascript/helpers/Zikula.itemlist.js"}
<div class="z-formrow">
    <div class="z-itemlist_newitemdiv">
        <a id='appendattribute' href="#" class='z-icon-es-insertrow'>{gt text='Create new attribute'}</a>
    </div>
    <ol id="newsattributes" class="z-itemlist">
        <li class="z-clearfix z-itemheader">
            <span class="z-itemcell z-w05"><strong>&nbsp;</strong></span>
            <span class="z-itemcell z-w40"><strong>{gt text="Attribute name"}</strong></span>
            <span class="z-itemcell z-w40"><strong>{gt text="Attribute value"}</strong></span>
            <span class="z-itemcell z-w05"><strong>{gt text="Action"}</strong></span>
        </li>
        {if isset($item.__ATTRIBUTES__)}
        {foreach from=$item.__ATTRIBUTES__ key='attributename' item='attributevalue' name='attributeitems'}
        <li id="li_newsattributes_{$smarty.foreach.attributeitems.index}" class="sortable z-clearfix {cycle values='z-odd,z-even'}">
            <div class="z-clearfix">
                <span class="z-itemcell z-w05">&nbsp;</span>
                <span class="z-itemcell z-w40">
                    <input type="text" id="story_attributes_{$smarty.foreach.attributeitems.index}_name" name="story[attributes][{$smarty.foreach.attributeitems.index}][name]" size="25" maxlength="255" value="{$attributename}" />
                </span>
                <span class="z-itemcell z-w40">
                    <input type="text" id="story_attributes_{$smarty.foreach.attributeitems.index}_value" name="story[attributes][{$smarty.foreach.attributeitems.index}][value]" size="25" maxlength="255" value="{$attributevalue}" />
                </span>
                <span class="z-itemcell z-w15">
                    <button type="button" id="buttondelete_newsattributes_{$smarty.foreach.attributeitems.index}" class="z-imagebutton buttondelete">{img src='14_layer_deletelayer.png' modname='core' set='icons/extrasmall' __alt='Delete'  __title='Delete this attribute' }</button>
                    (<span class="itemid">{$smarty.foreach.attributeitems.index}</span>)
                </span>
            </div>
        </li>
        {/foreach}
        <input type='hidden' id='attributecount' value='{$item.__ATTRIBUTES__|@count}' />
        {else}
        <input type='hidden' id='attributecount' value='0' />
        {/if}
    </ol>
    <ul style="display:none">
        <li id="newsattributes_emptyitem" class="sortable z-clearfix">
            <div class="z-clearfix">
                <span class="z-itemcell z-w05">&nbsp;</span>
                <span class="z-itemcell z-w40">
                    <input type="text" class="listinput" id="story_attributes_X_name" name="dummy[]" size="25" maxlength="255" value="" />
                </span>
                <span class="z-itemcell z-w40">
                    <input type="text" class="listinput" id="story_attributes_X_value" name="dummy[]" size="25" maxlength="255" value="" />
                </span>
                <span class="z-itemcell z-w15">
                    <button type="button" id="buttondelete_newsattributes_X" class="z-imagebutton buttondelete">{img src='14_layer_deletelayer.png' modname='core' set='icons/extrasmall' __alt='Delete'  __title='Delete this attribute' }</button>
                    (<span class="itemid"></span>)
                </span>
            </div>
        </li>
    </ul>
</div>
<script type="text/javascript">
    // <![CDATA[
    var list_newsattributes = null;
    document.observe("dom:loaded",function(){
        list_newsattributes = new Zikula.itemlist('newsattributes', {headerpresent: true, firstidiszero: true});
    });
    $('appendattribute').observe('click',function(event){
        list_newsattributes.appenditem();
        event.stop();
    });
    // ]]>
</script>