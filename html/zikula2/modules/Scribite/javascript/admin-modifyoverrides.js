jQuery(document).ready(function(){
    // ajax handler for successful result
    var successHandler = function(result, message, request) {
//        console.log(result.data);
        rowHandler(result.data);
    },
    // ajax handler for failure result
    errorHandler = function(request, message, detail) {
        console.log('FAILURE RESPONSE', {
            request: request,
            message: message,
            detail: detail
        })
    },
    clearform = function(ele) {
        jQuery(ele).find(':input').each(function() {
            switch(this.type) {
                case 'text':
                case 'select-one':
                    jQuery(this).val('');
                    break;
                case 'checkbox':
                    this.checked = false;
            }
        })
    },
    disableFormElements = function(ele) {
        jQuery(ele).find(':input').each(function() {
            jQuery(this).attr('disabled', 'disabled');
        })
    },
    rowHandler = function(data) {
        var newRow;
        switch (data.action) {
            case 'submitTextareaOverride':
                var disabledChecked = (data.disabled == 'true');
                // create new row and insert new ids and values and re-id buttons
                newRow = jQuery('#ai_textareaoverride').clone(true)
                    .find('#ai_module').attr('id', 'module_'+data.modname+data.area).val(data.modname).end()
                    .find('#ai_area').attr('id', 'area_'+data.modname+data.area).val(data.area).end()
                    .find('#ai_params').attr('id', 'params_'+data.modname+data.area).val(data.params).end()
                    .find('#ai_disabled').attr('id', 'disabled_'+data.modname+data.area).prop('checked', disabledChecked).end()
                    .find('#ai_modifyTextareaOverride').attr('id', 'modifyTextareaOverride_'+data.modname+data.area).end()
                    .find('#ai_editTextareaOverride').attr('id', 'editTextareaOverride_'+data.modname+data.area).end()
                    .find('#ai_deleteTextareaOverride').attr('id', 'deleteTextareaOverride_'+data.modname+data.area).end()
                    .removeAttr('id');
                // insert the row at the end of the table before the 'newtextarea' row
                jQuery('#newtextarea').before(newRow);
                // display the row & highlight
                newRow.show().effect('highlight', 2000);
                // remove #moduleoverridesempty row
                if (jQuery('#textareaoverridesempty').is(':visible')) {
                    jQuery('#textareaoverridesempty').hide();
                }
                // clear the 'new' row
                clearform('#newtextarea');
                break;
            case 'submitModuleOverride':
                // create new row and insert new ids and values and re-id buttons
                newRow = jQuery('#ai_moduleoverride').clone(true)
                    .find('#ai_module').attr('id', 'module_'+data.modname).val(data.modname).end()
                    .find('#ai_editor').attr('id', 'editor_'+data.modname).val(data.editor).end()
                    .find('#ai_modifyModuleOverride').attr('id', 'modifyModuleOverride_'+data.modname).end()
                    .find('#ai_editModuleOverride').attr('id', 'editModuleOverride_'+data.modname).end()
                    .find('#ai_deleteModuleOverride').attr('id', 'deleteModuleOverride_'+data.modname).end()
                    .removeAttr('id');
                // insert the row at the end of the table before the 'newtextarea' row
                jQuery('#newmodule').before(newRow);
                // display the row & highlight
                newRow.show().effect('highlight', 2000);
                // remove #moduleoverridesempty row
                if (jQuery('#moduleoverridesempty').is(':visible')) {
                    jQuery('#moduleoverridesempty').hide();
                }
                // clear the 'new' row
                clearform('#newmodule');
                break;
            case 'modifyTextareaOverride':
            case 'modifyModuleOverride':
                // disabled the form fields
                jQuery('#module_'+data.rowid).parents('tr').find(':input').each(function() {
                    jQuery(this).attr('disabled', 'disabled');
                })
                // swith the button states
                jQuery('#'+data.action+'_'+data.rowid).hide();
                jQuery('#editModuleOverride_'+data.rowid).show();
                jQuery('#editTextareaOverride_'+data.rowid).show();
                break;
        }
    };
    // click handler for data submission via ajax
    jQuery('.ajaxsubmit').click(function(){
        var formarea = jQuery(this).attr('id').split('_');
        var action = formarea.shift();
        var zrowid = formarea.join('_'); // just in case the id had underscores to begin with
        if (action.substr(0,4) == 'edit') {
            // re-enable form fields (except module & textarea)
            jQuery('#editor_'+zrowid).removeAttr('disabled'),
            jQuery('#disabled_'+zrowid).removeAttr('disabled'),
            jQuery('#params_'+zrowid).removeAttr('disabled'),
            // replace edit icon with submit
            jQuery(this).hide();
            jQuery('#modifyTextareaOverride_'+zrowid).show();
            jQuery('#modifyModuleOverride_'+zrowid).show();
            return;
        }
        var post = {
            action: action,
            rowid: zrowid,
            modname: jQuery('#module_'+zrowid).val(),
            editor: jQuery('#editor_'+zrowid).val(),
            area: jQuery('#area_'+zrowid).val(),
            disabled: jQuery('#disabled_'+zrowid).is(':checked'),
            params: jQuery('#params_'+zrowid).val()
        }
        if (action.substr(0,6) == 'delete') {
            var deleteConfirm = confirm("Are you sure you want to delete this item?");
            if (!deleteConfirm) {
                return;
            }
            // hide the parent row (fake delete)
            jQuery(this).parents('tr').hide();
        }
        jQuery.ajax('ajax.php?module=Scribite&type=ajax&func=submitoverride', {
            data: post
        }).done(successHandler).fail(errorHandler);
    });
    jQuery('#disabled_0').click(function(){
        cantDisableAll();
    });
    jQuery('#area_0').blur(function() {
        cantDisableAll();
    });
    var cantDisableAll = function() {
        if ((jQuery('#disabled_0').is(':checked')) && (jQuery('#area_0').val() == 'all')) {
            alert('You may not disable all textareas. Simply unhook the module.');
            jQuery('#disabled_0').attr('checked', false);
        }
    }
            
});