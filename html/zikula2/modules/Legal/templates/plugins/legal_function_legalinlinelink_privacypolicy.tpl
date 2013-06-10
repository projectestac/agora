{modurl modname='Legal_Constant::MODNAME'|constant type='user' func='privacyPolicy' assign='policyUrl'}
{assign var='customUrl' value='Legal_Constant::MODVAR_PRIVACY_URL'|constant}
{assign var='customUrl' value=$modvars.Legal.$customUrl}
{if $customUrl ne ''}{assign var='policyUrl' value=$customUrl}{/if}
<a class="legal_inlinelink_privacypolicy" href="{$policyUrl|safetext}" target="{$target}">{gt text='Privacy Policy'}</a>