{section name=messages loop=$messages}
<div class="admin_messages_block">
    <h2>{$messages[messages].title|safehtml}</h2>
    {$messages[messages].content|safehtml}
</div>
{/section}