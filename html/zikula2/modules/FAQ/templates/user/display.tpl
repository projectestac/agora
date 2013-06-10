{include file="user/menu.tpl"}

<h2>{gt text="Question"}</h2>
<p><strong>{$question|notifyfilters:'faq.filter_hooks.questions.filter'|safehtml}</strong></p>

<h2>{gt text="Answer"}</h2>
<p>{$answer|notifyfilters:'faq.filter_hooks.questions.filter'|safehtml}</p>
<div style="border-top: 1px dashed #AAA">
    <ul>
        {if $submittedbyid neq ''}
        <li>{gt text="Submitted by %s" tag1=$submittedbyid|profilelinkbyuid}</li>
        {/if}
        {if $answeredbyid neq ''}
        <li>{gt text="Answered by %s" tag1=$answeredbyid|profilelinkbyuid}</li>
        {/if}
    </ul>
</div>

{notifydisplayhooks eventname='faq.ui_hooks.questions.display_view' id=$faqid}
