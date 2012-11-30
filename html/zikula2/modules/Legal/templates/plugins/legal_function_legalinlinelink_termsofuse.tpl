{modurl modname='Legal_Constant::MODNAME'|constant type='user' func='termsofuse' assign='policyUrl'}
{assign var='customUrl' value='Legal_Constant::MODVAR_TERMS_URL'|constant}
{assign var='customUrl' value=$modvars.Legal.$customUrl}
{if $customUrl ne ''}{assign var='policyUrl' value=$customUrl}{/if}
<a class="legal_inlinelink_termsofuse" href="{$policyUrl|safetext}" target="{$target}">{gt text='Terms of Use'}</a>