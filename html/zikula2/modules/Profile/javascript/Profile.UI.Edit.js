// Copyright 2011 Zikula Foundation.

Zikula.define('Profile.UI');

Zikula.Profile.UI.Edit = {
    init: function() {
        Zikula.Users.NewUser.addValidatorHandler('module.profile.users_ui_handler', Zikula.Profile.UI.Edit.getRegistrationErrorsResponse)
    },
    
    /**
     * Process an AJAX response after checking the form contents for errors, and display the appropriate error information.
     *
     * @param req The AJAX response information
     */
    getRegistrationErrorsResponse: function(errorFieldsCount, errorFields)
    {
        if (errorFieldsCount > 0) {
            errorFields.each(function(pair){
                var element = $('prop_' + pair.key);
                if (element) {
                    element.addClassName('z-form-error');
                }

                element = $('prop_' + pair.key + '_error');
                element.update(pair.value);
                element.removeClassName('z-hide');
            });
        }
    }
}

document.observe("dom:loaded", Zikula.Profile.UI.Edit.init);
