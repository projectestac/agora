{ajaxheader modname='Legal_Constant::MODNAME'|constant filename='Legal.UI.Edit.js' noscriptaculous=true effects=true}
{if (is_numeric($policiesUid) && ($policiesUid > 2) || ($policiesUid == ''))}
<fieldset>
    <legend>{gt text='Site policies'}</legend>
    <input type="hidden" id="acceptpolicies_csrftoken" name="acceptpolicies_csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" id="acceptpolicies_uid" name="acceptedpolicies_uid" value="{$policiesUid}" />
    {if $activePolicies.termsOfUse && $viewablePolicies.termsOfUse}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='termsofuse' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_TERMS_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Terms of Use' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label>{gt text='Terms of Use'}</label>
            {if ($editablePolicies.termsOfUse)}
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_termsofuse_yes" name="acceptedpolicies_termsofuse"{if isset($fieldErrors.termsofuse) && !empty($fieldErrors.termsofuse)} class="z-form-error"{/if}{if $acceptedPolicies.termsOfUse} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_termsofuse_yes">{gt text='%1$s accepted.' tag1=$policyLink|safehtml}</label>
            </span>
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_termsofuse_no" name="acceptedpolicies_termsofuse"{if isset($fieldErrors.termsofuse) && !empty($fieldErrors.termsofuse)} class="z-form-error"{/if}{if !$acceptedPolicies.termsOfUse} checked="checked"{/if} value="0" />
                <label for="acceptpolicies_termsofuse_no">{gt text='Policy not accepted.'}</label>
            </span>
            <p id="acceptpolicies_termsofuse_error" class="z-formnote z-errormsg{if !isset($fieldErrors.termsofuse) || empty($fieldErrors.termsofuse)} z-hide{/if}">
                {$fieldErrors.termsofuse|default:''|safetext}
            </p>
            {else}
            <span>{if $acceptedPolicies.termsOfUse}{gt text='Accepted.'}{else}{gt text='Not accepted.'}{/if}</span>
            {/if}
        </div>
    {/if}
    {if $activePolicies.privacyPolicy && $viewablePolicies.privacyPolicy}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='privacypolicy' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_PRIVACY_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Privacy Policy' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label>{gt text='Privacy Policy'}</label>
            {if ($editablePolicies.privacyPolicy)}
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_privacypolicy_yes" name="acceptedpolicies_privacypolicy"{if isset($fieldErrors.privacypolicy) && !empty($fieldErrors.privacypolicy)} class="z-form-error"{/if}{if $acceptedPolicies.privacyPolicy} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_privacypolicy_yes">{gt text='%1$s accepted.' tag1=$policyLink|safehtml}</label>
            </span>
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_privacypolicy_no" name="acceptedpolicies_privacypolicy"{if isset($fieldErrors.privacypolicy) && !empty($fieldErrors.privacypolicy)} class="z-form-error"{/if}{if !$acceptedPolicies.privacyPolicy} checked="checked"{/if} value="0" />
                <label for="acceptpolicies_privacypolicy_no">{gt text='Policy not accepted.'}</label>
            </span>
            <p id="acceptpolicies_privacypolicy_error" class="z-formnote z-errormsg{if !isset($fieldErrors.privacypolicy) || empty($fieldErrors.privacypolicy)} z-hide{/if}">
                {$fieldErrors.privacypolicy|default:''|safetext}
            </p>
            {else}
            <span>{if $acceptedPolicies.privacyPolicy}{gt text='Accepted.'}{else}{gt text='Not accepted.'}{/if}</span>
            {/if}
        </div>
    {/if}
    {if $activePolicies.agePolicy && $viewablePolicies.agePolicy}
        <div class="z-formrow">
            <label>{gt text='Minimum Age'}</label>
            {if ($editablePolicies.agePolicy)}
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_agepolicy_yes" name="acceptedpolicies_agepolicy"{if isset($fieldErrors.agepolicy) && !empty($fieldErrors.agepolicy)} class="z-form-error"{/if}{if $acceptedPolicies.agePolicy} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_agepolicy_yes">{gt text='Confirmed minimum age requirement (%1$s years of age) met.' tag1=$modvars.Legal.minimumAge|safetext}</label>
            </span>
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_agepolicy_no" name="acceptedpolicies_agepolicy"{if isset($fieldErrors.agepolicy) && !empty($fieldErrors.agepolicy)} class="z-form-error"{/if}{if !$acceptedPolicies.agePolicy} checked="checked"{/if} value="0" />
                <label for="acceptpolicies_agepolicy_no">{gt text='Minimum age requirement not confirmed.'}</label>
            </span>
            <p id="acceptpolicies_agepolicy_error" class="z-formnote z-errormsg{if !isset($fieldErrors.agepolicy) || empty($fieldErrors.agepolicy)} z-hide{/if}">
                {$fieldErrors.agepolicy|default:''|safetext}
            </p>
            {else}
            <span>{if $acceptedPolicies.agePolicy}{gt text='Confirmed minimum age requirement (%1$s years of age) met.' tag1=$modvars.Legal.minimumAge|safetext}{else}{gt text='Minimum age requirement not confirmed.'}{/if}</span>
            {/if}
        </div>
    {/if}
    {if $activePolicies.tradeConditions && $viewablePolicies.tradeConditions}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='tradeConditions' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_TRADECONDITIONS_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='General Terms and Conditions of Trade' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label>{gt text='General Terms and Conditions of Trade'}</label>
            {if ($editablePolicies.tradeConditions)}
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_tradeconditions_yes" name="acceptedpolicies_tradeconditions"{if isset($fieldErrors.tradeconditions) && !empty($fieldErrors.tradeconditions)} class="z-form-error"{/if}{if $acceptedPolicies.tradeConditions} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_tradeconditions_yes">{gt text='%1$s accepted.' tag1=$policyLink|safehtml}</label>
            </span>
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_tradeconditions_no" name="acceptedpolicies_tradeconditions"{if isset($fieldErrors.tradeConditions) && !empty($fieldErrors.tradeConditions)} class="z-form-error"{/if}{if !$acceptedPolicies.tradeConditions} checked="checked"{/if} value="0" />
                <label for="acceptpolicies_tradeconditions_no">{gt text='Policy not accepted.'}</label>
            </span>
            <p id="acceptpolicies_tradeconditions_error" class="z-formnote z-errormsg{if !isset($fieldErrors.tradeconditions) || empty($fieldErrors.tradeconditions)} z-hide{/if}">
                {$fieldErrors.tradeconditions|default:''|safetext}
            </p>
            {else}
            <span>{if $acceptedPolicies.tradeConditions}{gt text='Accepted.'}{else}{gt text='Not accepted.'}{/if}</span>
            {/if}
        </div>
    {/if}
    {if $activePolicies.cancellationRightPolicy && $viewablePolicies.cancellationRightPolicy}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='cancellationRightPolicy' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Cancellation Right Policy' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label>{gt text='Cancellation Right Policy'}</label>
            {if ($editablePolicies.cancellationRightPolicy)}
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_cancellationrightpolicy_yes" name="acceptedpolicies_cancellationrightpolicy"{if isset($fieldErrors.cancellationrightpolicy) && !empty($fieldErrors.cancellationrightpolicy)} class="z-form-error"{/if}{if $acceptedPolicies.cancellationRightPolicy} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_cancellationrightpolicy_yes">{gt text='%1$s accepted.' tag1=$policyLink|safehtml}</label>
            </span>
            <span class="z-formlist">
                <input type="radio" id="acceptpolicies_cancellationrightpolicy_no" name="acceptedpolicies_cancellationrightpolicy"{if isset($fieldErrors.cancellationrightpolicy) && !empty($fieldErrors.cancellationrightpolicy)} class="z-form-error"{/if}{if !$acceptedPolicies.cancellationRightPolicy} checked="checked"{/if} value="0" />
                <label for="acceptpolicies_cancellationrightpolicy_no">{gt text='Policy not accepted.'}</label>
            </span>
            <p id="acceptpolicies_cancellationrightpolicy_error" class="z-formnote z-errormsg{if !isset($fieldErrors.cancellationrightpolicy) || empty($fieldErrors.cancellationrightpolicy)} z-hide{/if}">
                {$fieldErrors.cancellationrightpolicy|default:''|safetext}
            </p>
            {else}
            <span>{if $acceptedPolicies.cancellationRightPolicy}{gt text='Accepted.'}{else}{gt text='Not accepted.'}{/if}</span>
            {/if}
        </div>
    {/if}
</fieldset>
{/if}