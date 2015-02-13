<div id="note_options_{$note.fmid}">
    {if $note.validate eq 0}
    <a href="javascript:validateNote({$note.fmid})">
        {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt="Validates the note" __title="Validates the note"}
    </a> |
    {else}
    <a href="javascript:validateNote({$note.fmid})">
        {img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Invalidates the note" __title="Invalidates the note"}
    </a> |
    {/if}
    <a href="javascript:IWforms_deleteNote({$note.fmid})">
        {img modname='IWforms' src='esborrar.gif' __alt="Delete the note" __title="Delete the note"}
    </a>
    {if $note.state eq 1}
    | <a href="javascript:setCompleted({$note.fmid})">
        {img modname='IWforms' src='uncomplete.gif' __alt="Show the note as not completed" __title="Show the note as not completed"}
    </a>
    {else}
    | <a href="javascript:setCompleted({$note.fmid})">
        {img modname='IWforms' src='complete.gif' __alt="Shows like complete" __title="Shows like complete"}
    </a>
    {/if}
    {if $note.marked eq 1}
    | <a href="javascript:markNote({$note.fmid})">
        {img modname='IWforms' src='unmark.gif' __alt="Delete the mark" __title="Delete the mark"}
    </a>
    {else}
    | <a href="javascript:markNote({$note.fmid})">
        {img modname='IWforms' src='mark.gif' __alt="Mark" __title="Mark"}
    </a>
    {/if}
    {if $note.userName neq '' && $IWmessages}
    | <a href="{modurl modname='IWmessages' type='user' func='compose' uname=$note.userName}">
        {img modname='core' src='mail_send.png' set='icons/extrasmall' __alt="Respond with a private message" __title="Respond with a private message"}
    </a>
    {/if}
    | <a href="{modurl modname='IWforms' type='user' func='read' fmid=$note.fmid fid=$fid}" target="_blank">
        {img modname='core' src='14_layer_visible.png' set='icons/extrasmall' __alt="View note" __title="View note"}
    </a>
</div>