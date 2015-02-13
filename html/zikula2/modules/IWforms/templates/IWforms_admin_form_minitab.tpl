<li class="admintab{if $tab eq 1} active{/if}">
    <a href="javascript:actionToDo({$item.fid},'edit')" title="{gt text="Define the form"}">{gt text="Definition"}</a>
</li>
<li class="admintab{if $tab eq 2} active{/if}">
    <a href="javascript:actionToDo({$item.fid},'field')" title="{gt text="Form fields"}">{gt text="Field"}</a>
</li>
<li class="admintab{if $tab eq 3} active{/if}">
    <a href="javascript:actionToDo({$item.fid},'group')" title="{gt text="Groups who have acces to the form"}">{gt text="Groups"}</a>
</li>
<li class="admintab{if $tab eq 4} active{/if}">
    <a href="javascript:actionToDo({$item.fid},'validators')" title="{gt text="People who validated the entries in the form"}">{gt text="Validators"}</a>
</li>