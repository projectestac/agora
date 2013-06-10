<a id="faq{$faqid}"></a>
{if $modvars.ZConfig.shorturls and $modvars.FAQ.addcategorytitletopermalink}
<p><a href="{modurl modname="FAQ" type='user' func="display" faqid=$faqid cat=$__CATEGORIES__.Main.name}"><strong>{$question|notifyfilters:'faq.filter_hooks.questions.filter'|safehtml}</strong></a></p>
{else}
<p><a href="{modurl modname="FAQ" type='user' func="display" faqid=$faqid}"><strong>{$question|notifyfilters:'faq.filter_hooks.questions.filter'|safehtml}</strong></a></p>
{/if}
<p>{$answer|notifyfilters:'faq.filter_hooks.questions.filter'|safehtml}</p>
<hr />
