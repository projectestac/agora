{modurl modname='Legal_Constant::MODNAME'|constant type='user' func='accessibilityStatement' assign='policyUrl'}
{assign var='customUrl' value='Legal_Constant::MODVAR_ACCESSIBILITY_URL'|constant}
{assign var='customUrl' value=$modvars.Legal.$customUrl}
{if $customUrl ne ''}{assign var='policyUrl' value=$customUrl}{/if}
<a class="legal_inlinelink_accessibilitystatement" href="{$policyUrl|safetext}" target="{$target}">{gt text='Accessibility Statement'}</a>