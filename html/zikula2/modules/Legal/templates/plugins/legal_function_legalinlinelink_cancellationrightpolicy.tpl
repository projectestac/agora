{modurl modname='Legal_Constant::MODNAME'|constant type='user' func='cancellationRightPolicy' assign='policyUrl'}
{assign var='customUrl' value='Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL'|constant}
{assign var='customUrl' value=$modvars.Legal.$customUrl}
{if $customUrl ne ''}{assign var='policyUrl' value=$customUrl}{/if}
<a class="legal_inlinelink_cancellationrightpolicy" href="{$policyUrl|safetext}" target="{$target}">{gt text='Cancellation Right Policy'}</a>