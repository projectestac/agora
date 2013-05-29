<div>
    <input type="checkbox" id="active_admin_messages" name="active[AdminMessages]" value="1" {if $active}checked="checked"{/if} />
           <label for="active_admin_messages">
        {gt text="Administrator messages"}
    </label>
    {if $allowsearchinactive}
    <input type="checkbox" id="admin_messages_activeonly" name="modvar[AdminMessages][activeonly]" value="1" {if $activeonly}checked="checked"{/if} />
           <label for="admin_messages_activeonly">{gt text="Include active messages only"}</label>
    {/if}
</div>