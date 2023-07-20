{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="view" size="small"}
    <h3>{gt text="Settings"}</h3>
</div>

    <p class="z-warningmsg">{gt text='<strong>Important Usage Note</strong>: The provided legal statements are samples only. They need to be adapted to specific needs and locales. You will find the content of the statements in files in the "modules/legal/pntemplates/en" directory. These templates can be <a href="http://community.zikula.org/Wiki-TemplateOverridng.htm">overridden</a> by theme templates, or by global templates you would create in the "config/templates/legal/" directory (in the appropriate sub-directory for the language you are writing for).'}</p>
    <form id="legal_config" class="z-form" action="{modurl modname="legal" type="admin" func="updateconfig"}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>{gt text="Legal document types"}</legend>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_LEGALNOTICE_ACTIVE'|constant}
                    <label for="legal_{$fieldName}">{gt text="Legal notice"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="checkbox" value="1"{if $modvars.Legal.$fieldName == 1} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_TERMS_ACTIVE'|constant}
                    <label for="legal_{$fieldName}">{gt text="Terms of use"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="checkbox" value="1"{if $modvars.Legal.$fieldName == 1} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_PRIVACY_ACTIVE'|constant}
                    <label for="legal_{$fieldName}">{gt text="Privacy policy"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="checkbox" value="1"{if $modvars.Legal.$fieldName == 1} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_TRADECONDITIONS_ACTIVE'|constant}
                    <label for="legal_{$fieldName}">{gt text="General Terms and Conditions of Trade"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="checkbox" value="1"{if $modvars.Legal.$fieldName == 1} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_ACTIVE'|constant}
                    <label for="legal_{$fieldName}">{gt text="Cancellation Right Policy"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="checkbox" value="1"{if $modvars.Legal.$fieldName == 1} checked="checked"{/if} />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_ACCESSIBILITY_ACTIVE'|constant}
                    <label for="legal_{$fieldName}">{gt text="Accessibility statement"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="checkbox" value="1"{if $modvars.Legal.$fieldName == 1} checked="checked"{/if} />
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Custom urls"}</legend>
                <p>{gt text='The following fields allow to reference any custom url. As soon as an url is given it will be used instead of the normal Legal templates. So you can now use any page you want for displaying and managing your legal data.'}</p>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_LEGALNOTICE_URL'|constant}
                    <label for="legal_{$fieldName}">{gt text="Legal notice"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="text" value="{$modvars.Legal.$fieldName}" />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_TERMS_URL'|constant}
                    <label for="legal_{$fieldName}">{gt text="Terms of use"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="text" value="{$modvars.Legal.$fieldName}" />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_PRIVACY_URL'|constant}
                    <label for="legal_{$fieldName}">{gt text="Privacy policy"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="text" value="{$modvars.Legal.$fieldName}" />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_TRADECONDITIONS_URL'|constant}
                    <label for="legal_{$fieldName}">{gt text="General Terms and Conditions of Trade"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="text" value="{$modvars.Legal.$fieldName}" />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_CANCELLATIONRIGHTPOLICY_URL'|constant}
                    <label for="legal_{$fieldName}">{gt text="Cancellation Right Policy"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="text" value="{$modvars.Legal.$fieldName}" />
                </div>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_ACCESSIBILITY_URL'|constant}
                    <label for="legal_{$fieldName}">{gt text="Accessibility statement"}</label>
                    <input id="legal_{$fieldName}" name="{$fieldName}" type="text" value="{$modvars.Legal.$fieldName}" />
                </div>
            </fieldset>
            <fieldset>
                <legend>{gt text="Further settings"}</legend>
                <div class="z-formrow">
                    {assign var='fieldName' value='Legal_Constant::MODVAR_MINIMUM_AGE'|constant}
                    <label for="legal_{$fieldName}">{gt text="Minimum age permitted to register"}<span class="z-form-mandatory-flag">{gt text="*"}</span></label>
                    <input id="legal_{$fieldName}"{if isset($errorFields.legal_minage)} class="z-form-error"{/if} type="text" name="{'Legal_Constant::MODVAR_MINIMUM_AGE'|constant}" value="{$modvars.Legal.$fieldName|safetext}" size="2" maxlength="2" />
                    <em class="z-formnote z-sub">{gt text="Enter a positive integer, or 0 for no age check."}</em>
                </div>
                <div class="z-formrow">
                    <label for="legal_resetagreement">{gt text="Reset user group's acceptance of 'Terms of use'"}</label>
                    <select id="legal_resetagreement" name="resetagreement">
                        {foreach item=group from=$groups}
                        <option value="{$group.gid|safetext}">{$group.name|safetext}</option>
                        {/foreach}
                    </select>
                    <p class="z-formnote z-informationmsg">{gt text="Notice: This setting resets the acceptance of the 'Terms of use' for all users in this group. Next time they want to log-in, they will have to acknowledge their acceptance of them again, and will not be able to log-in if they do not. This action does not affect the main administrator account. You can perform the same operation for individual users by visiting the Users manager in the site admin panel."}</p>
                </div>
            </fieldset>
            <div class="z-formbuttons z-buttons">
                {button src='button_ok.png' set='icons/extrasmall' __alt='Save' __title='Save' __text='Save'}
                <a href="{modurl modname='Legal' type='admin' func='main'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
            </div>
        </div>
    </form>

{adminfooter}