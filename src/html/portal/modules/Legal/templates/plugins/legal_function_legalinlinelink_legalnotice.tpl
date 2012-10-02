{modurl modname='Legal_Constant::MODNAME'|constant type='user' func='legalNotice' assign='policyUrl'}
{assign var='customUrl' value='Legal_Constant::MODVAR_LEGALNOTICE_URL'|constant}
{assign var='customUrl' value=$modvars.Legal.$customUrl}
{if $customUrl ne ''}{assign var='policyUrl' value=$customUrl}{/if}
<a class="legal_inlinelink_legalnotice" href="{$policyUrl|safetext}" target="{$target}">{gt text='Legal notice'}</a>