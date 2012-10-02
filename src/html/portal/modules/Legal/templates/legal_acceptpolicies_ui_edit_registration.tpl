{* TODO - Use Zikula.UI to display policies in a pop-up window. *}
{ajaxheader modname='Legal_Constant::MODNAME'|constant filename='Legal.UI.Edit.js' noscriptaculous=true effects=true}
<fieldset>
    <legend>{gt text='Site policies'}</legend>
    <input type="hidden" id="acceptpolicies_csrftoken" name="acceptpolicies_csrftoken" value="{insert name='csrftoken'}" />
    <input type="hidden" id="acceptpolicies_uid" name="acceptedpolicies_uid" value="" />
    {if $activePolicies.termsOfUse}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='termsofuse' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_TERMS_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Terms of Use' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label for="acceptpolicies_termsofuse">{gt text='Terms of Use'}<span class="z-form-mandatory-flag">{gt text="*"}</span></label>
            <span class="z-formlist">
                <input type="checkbox" id="acceptpolicies_termsofuse" name="acceptedpolicies_termsofuse"{if isset($fieldErrors.termsofuse) && !empty($fieldErrors.termsofuse)} class="z-form-error"{/if}{if $acceptedPolicies.termsOfUse} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_termsofuse">{gt text='Check this box to indicate your acceptance of this site\'s %1$s.' tag1=$policyLink|safehtml}</label>
            </span>
            <p id="acceptpolicies_termsofuse_error" class="z-formnote z-errormsg{if !isset($fieldErrors.termsofuse) || empty($fieldErrors.termsofuse)} z-hide{/if}">
                {$fieldErrors.termsofuse|default:''|safetext}
            </p>
        </div>
    {/if}
    {if $activePolicies.privacyPolicy}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='privacyPolicy' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_PRIVACY_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Privacy Policy' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label for="acceptpolicies_privacypolicy">{gt text='Privacy Policy'}<span class="z-form-mandatory-flag">{gt text="*"}</span></label>
            <span class="z-formlist">
                <input type="checkbox" id="acceptpolicies_privacypolicy" name="acceptedpolicies_privacypolicy"{if isset($fieldErrors.privacypolicy) && !empty($fieldErrors.privacypolicy)} class="z-form-error"{/if}{if $acceptedPolicies.privacyPolicy} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_privacypolicy">{gt text='Check this box to indicate your acceptance of this site\'s %1$s.' tag1=$policyLink|safehtml}</label>
            </span>
            <p id="acceptpolicies_privacypolicy_error" class="z-formnote z-errormsg{if !isset($fieldErrors.privacypolicy) || empty($fieldErrors.privacypolicy)} z-hide{/if}">
                {$fieldErrors.privacypolicy|default:''|safetext}
            </p>
        </div>
    {/if}
    {if $activePolicies.agePolicy}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='termsofuse' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_TERMS_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Terms of Use' assign='policyName'}
        {assign var='termsOfUseLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}

        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='privacypolicy' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_PRIVACY_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Privacy Policy' assign='policyName'}
        {assign var='privacyPolicyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}

        <div class="z-formrow">
            <label for="acceptpolicies_agepolicy">{gt text='Minimum Age'}<span class="z-form-mandatory-flag">{gt text="*"}</span></label>
            <span class="z-formlist">
                <input type="checkbox" id="acceptpolicies_agepolicy" name="acceptedpolicies_agepolicy"{if isset($fieldErrors.agepolicy) && !empty($fieldErrors.agepolicy)} class="z-form-error"{/if}{if $acceptedPolicies.agePolicy} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_agepolicy">{gt text='Check this box to indicate that you are %1$s years of age or older.' tag1=$modvars.Legal.minimumAge|safetext}</label>
            </span>
            <em class="z-formnote z-sub">{gt text='Information on our minimum age policy, and on how we handle personally identifiable information can be found in our %1$s and in our %2$s.' tag1=$termsOfUseLink|safehtml tag2=$privacyPolicyLink|safehtml}</em>
            <p id="acceptpolicies_agepolicy_error" class="z-formnote z-errormsg{if !isset($fieldErrors.agepolicy) || empty($fieldErrors.agepolicy)} z-hide{/if}">
                {$fieldErrors.agepolicy|default:''|safetext}
            </p>
        </div>
    {/if}
    {if $activePolicies.tradeConditions}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='tradeConditions' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_TRADECONDITIONS_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='General Terms and Conditions of Trade' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label for="acceptpolicies_tradeconditions">{gt text='General Terms and Conditions of Trade'}<span class="z-form-mandatory-flag">{gt text="*"}</span></label>
            <span class="z-formlist">
                <input type="checkbox" id="acceptpolicies_tradeconditions" name="acceptedpolicies_tradeconditions"{if isset($fieldErrors.tradeconditions) && !empty($fieldErrors.tradeconditions)} class="z-form-error"{/if}{if $acceptedPolicies.tradeConditions} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_tradeconditions">{gt text='Check this box to indicate your acceptance of this site\'s %1$s.' tag1=$policyLink|safehtml}</label>
            </span>
            <p id="acceptpolicies_tradeconditions_error" class="z-formnote z-errormsg{if !isset($fieldErrors.tradeconditions) || empty($fieldErrors.tradeconditions)} z-hide{/if}">
                {$fieldErrors.tradeconditions|default:''|safetext}
            </p>
        </div>
    {/if}
    {if $activePolicies.cancellationRightPolicy}
        {modurl modname='Legal_Constant::MODNAME'|constant type='user' func='cancellationRightPolicy' assign='policyUrl'}
        {assign var='customUrl' value='Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL'|constant}
        {assign var='customUrl' value=$modvars.Legal.$customUrl}
        {if $customUrl ne ''}
            {assign var='policyUrl' value=$customUrl}
        {/if}
        {gt text='Cancellation Right Policy' assign='policyName'}
        {assign var='policyLink' value='<a class="legal_popup" href="%1$s" target="_blank">%2$s</a>'|sprintf:$policyUrl:$policyName}
        <div class="z-formrow">
            <label for="acceptpolicies_cancellationrightpolicy">{gt text='Cancellation Right Policy'}<span class="z-form-mandatory-flag">{gt text="*"}</span></label>
            <span class="z-formlist">
                <input type="checkbox" id="acceptpolicies_cancellationrightpolicy" name="acceptedpolicies_cancellationrightpolicy"{if isset($fieldErrors.cancellationrightpolicy) && !empty($fieldErrors.cancellationrightpolicy)} class="z-form-error"{/if}{if $acceptedPolicies.cancellationRightPolicy} checked="checked"{/if} value="1" />
                <label for="acceptpolicies_cancellationrightpolicy">{gt text='Check this box to indicate your acceptance of this site\'s %1$s.' tag1=$policyLink|safehtml}</label>
            </span>
            <p id="acceptpolicies_cancellationrightpolicy_error" class="z-formnote z-errormsg{if !isset($fieldErrors.cancellationrightpolicy) || empty($fieldErrors.cancellationrightpolicy)} z-hide{/if}">
                {$fieldErrors.cancellationrightpolicy|default:''|safetext}
            </p>
        </div>
    {/if}
</fieldset>

