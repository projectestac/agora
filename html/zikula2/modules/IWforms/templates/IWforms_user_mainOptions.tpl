<div id="option_{$form.fid}">
    {if ($form.accessLevel eq 1 || $form.accessLevel >= 3) AND $form.closeInsert eq 0}
    <div>
        <a href="{modurl modname=IWforms type=user func=newitem fid=$form.fid}">
            {img modname='core' src='lists.png' set='icons/extrasmall'   __alt="Send an annotation" __title="Send an annotation"}
        </a>
    </div>
    {/if}
    {if ($form.accessLevel eq 2 || $form.accessLevel >= 3) && $form.accessLevel != 7}
    <div>
        <a href="{modurl modname=IWforms type=user func=read fid=$form.fid}">
            {img modname='core' src='reminders.png' set='icons/extrasmall'   __alt="Show annotations" __title="Show annotations"}
        </a>
    </div>
    {/if}
    <div>
        <a href="{modurl modname=IWforms type=user func=sended form_id=$form.fid}">
            {img modname='core' src='14_layer_visible.png' set='icons/extrasmall'   __alt="Show the notes I sent" __title="Show the notes I sent"}
        </a>
    </div>
    {if $form.accessLevel eq 7}
    <div>
        <a href="{modurl modname=IWforms type=user func=manage fid=$form.fid}">
            {img modname='core' src='configure.png' set='icons/extrasmall'   __alt="Managing annotations" __title="Managing annotations"}
        </a>
    </div>
    {/if}
    {if $form.accessLevel eq 7 AND $form.closeableInsert eq 1}
    <div>
        <a href="javascript:closeForm({$form.fid})">
            {if $form.closeInsert eq 0}
                {img modname='core' src='unlocked.png' set='icons/extrasmall'   __alt="Close the entry of annotations and editing" __title="Close the entry of annotations and editing" id='11'}
            {else}
                {img modname='core' src='locked.png' set='icons/extrasmall'   __alt="Open the entry of annotations and editing" __title="Open the entry of annotations and editing"}
            {/if}
        </a>
    </div>
    {/if}
</div>