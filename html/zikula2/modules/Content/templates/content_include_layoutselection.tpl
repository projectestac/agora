{foreach from=$layouts item=layout}
<div class="z-formrow">
    <div class="z-formnote">
        {formradiobutton id=$layout.name dataField='layout' mandatory='true'}
        {formlabel text=$layout.title for=$layout.name}
    </div>
    <em class="z-sub z-formnote">{$layout.description}</em>
</div>
{/foreach}
