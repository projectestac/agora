{if $notes|@count gt 0}
<div style="height:15px;">&nbsp;</div>
{foreach item="note" from=$notes}
    {include file="IWforms_user_userNoteContent.tpl" fid=$form.fid}
{/foreach}
<script type="text/javascript">
    var deleteUserNoteText = "{{gt text="Delete the note"}}";
</script>
{/if}
