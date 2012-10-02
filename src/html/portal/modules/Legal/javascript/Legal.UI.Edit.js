// Copyright 2011 Zikula Foundation.

Zikula.define('Legal.UI');

Zikula.Legal.UI.Edit = {
    init: function() {
        Zikula.Users.NewUser.addValidatorHandler('module.legal.users_ui_handler', Zikula.Legal.UI.Edit.getRegistrationErrorsResponse)
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
                var element = $('acceptpolicies_' + pair.key);
                if (element) {
                    element.addClassName('z-form-error');
                }

                element = $('acceptpolicies_' + pair.key + '_error');
                element.update(pair.value);
                element.removeClassName('z-hide');
            });
        }
    }
}

document.observe("dom:loaded", Zikula.Legal.UI.Edit.init);
