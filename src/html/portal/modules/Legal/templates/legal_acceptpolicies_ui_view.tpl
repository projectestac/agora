<div class="z-form">
    <fieldset>
        <legend>{gt text='Site policies'}</legend>
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
                <label>{gt text='Terms of Use:'}</label>
                <span>{if $acceptedPolicies.termsOfUse}{gt text='%1$s accepted.' tag1=$policyLink|safehtml}{else}{gt text='%1$s not accepted.' tag1=$policyLink|safehtml}{/if}</span>
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
                <label>{gt text='Privacy Policy:'}</label>
                <span>{if $acceptedPolicies.privacyPolicy}{gt text='%1$s accepted.' tag1=$policyLink|safehtml}{else}{gt text='%1$s not accepted.' tag1=$policyLink|safehtml}{/if}</span>
            </div>
        {/if}
        {if $activePolicies.agePolicy && $viewablePolicies.agePolicy}
            <div class="z-formrow">
                <label>{gt text='Minimum Age'}</label>
                <span>{if $acceptedPolicies.agePolicy}{gt text='Confirmed minimum age requirement (%1$s years of age) met.' tag1=$modvars.Legal.minimumAge|safetext}{else}{gt text='Minimum age requirement not confirmed.'}{/if}</span>
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
                <label>{gt text='General Terms and Conditions of Trade:'}</label>
                <span>{if $acceptedPolicies.tradeConditions}{gt text='%1$s accepted.' tag1=$policyLink|safehtml}{else}{gt text='%1$s not accepted.' tag1=$policyLink|safehtml}{/if}</span>
            </div>
        {/if}
        {if $activePolicies.cancellationRight && $viewablePolicies.cancellationRight}
            {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='cancellationRightPolicy' assign='policyUrl'}
            {assign var='customUrl' value='Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL'|constant}
            {assign var='customUrl' value=$modvars.Legal.$customUrl}
            {if $customUrl ne ''}
                {assign var='policyUrl' value=$customUrl}
            {/if}
            {gt text='Cancellation Right Policy' assign='policyName'}
            {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
            <div class="z-formrow">
                <label>{gt text='Cancellation Right Policy:'}</label>
                <span>{if $acceptedPolicies.cancellationRight}{gt text='%1$s accepted.' tag1=$policyLink|safehtml}{else}{gt text='%1$s not accepted.' tag1=$policyLink|safehtml}{/if}</span>
            </div>
        {/if}
    </fieldset>
</div>
