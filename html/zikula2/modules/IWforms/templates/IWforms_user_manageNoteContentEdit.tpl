{if $do eq 'print'}
<div id="note_content_{$fnid}">
    {$value|nl2br|safehtml}
    <div style="float:right;">
        <a href="javascript:editNoteManageContent({$fnid},'content')">
            {img modname='core' src='xedit.png' set='icons/extrasmall' __alt="Edit" __title="Edit "}
        </a>
    </div>
</div>
{/if}

{if $do eq 'edit'}
<form name="submitValueFormC_{$noteContent.fnid}" id="submitValueFormC_{$noteContent.fnid}" class="z-form" method="post">
    <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" name="fnid" value="{$noteContent.fnid}" />
    <input type="hidden" name="toDo" value="content" />
    <textarea class='noeditor' name="content" id="textarea_{$noteContent.fnid}" style="width: 90%; margin: 10px;">{$noteContent.content|trim}</textarea>
    <div class="z-right z-buttons">
		<a onClick='toggleHtmlEditor("textarea_{$noteContent.fnid}");'>
			{img modname='core' src='web.png' set='icons/small'} {gt text="HtmlEditor"}
		</a>

        <a onClick="sendNoteContent('{$noteContent.fnid}');" title="{gt text='Send'}">
            {img modname='core' src='button_ok.png' set='icons/small'} {gt text="Send"}
        </a>
    </div>
</form>
{/if}
