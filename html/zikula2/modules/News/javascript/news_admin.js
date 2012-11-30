/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 'load', news_admin_init_check);

function news_admin_init_check() 
{
    if ($('news_select_all') && $('news_deselect_all')) {
        news_admin_selectall_init(); 
    }
    if ($('news_bulkaction_select')) {
        news_admin_bulkaction_init();
    }
}

// Initialize and process the (de)select all functions
function news_admin_selectall_init()
{
    $('news_select_all').observe('click', function(e){
        Zikula.toggleInput('news_bulkaction_form', true);
        e.stop();
    });
    $('news_deselect_all').observe('click', function(e){
        Zikula.toggleInput('news_bulkaction_form', false);
        e.stop();
    });
}

// Initialize and process bulkactions on selected articles
function news_admin_bulkaction_init()
{
    $('news_bulkaction_select').observe('change', function(event){
        var values=$$('input:checked[type=checkbox][name=news_selected_articles\[\]]').pluck('value');
        values.sort(function(a,b){return a - b});
        var valuescount=values.length;
        var action=$F('news_bulkaction_select');
        var actionmap=new Array(6);
        actionmap[0]=null;
        actionmap[1]=Zikula.__('delete','module_News');
        actionmap[2]=Zikula.__('archive','module_News');
        actionmap[3]=Zikula.__('publish','module_News');
        actionmap[4]=Zikula.__('reject','module_News');
        actionmap[5]=Zikula.__('change categories for','module_News');
        var actionword=actionmap[action];
        if (actionword=='delete') {
            var deletemessage='<br /><br /><strong class="z-warningmsg">'+Zikula.__('You cannot undo this operation!','module_News')+'</strong>';
        } else {
            var deletemessage='';
        }
        if ((action>0) && (valuescount>0)) {
            var options = {modal:true,draggable:false};
            executeform = function(data){
                if(data) {
                    $('news_bulkaction_categorydata').setValue(Object.toJSON(data));
                    $('news_bulkaction_form').submit();
                } else {
                    // action cancelled
                    $('news_bulkaction_select').selectedIndex=0;
                }
            }
            if (action!=5) {
                // standard bulk actions
                var conf=Zikula.UI.Confirm(
                    Zikula._fn('Are you sure you want to %s the following article',
                        'Are you sure you want to %s the following articles',
                        valuescount,
                        ['<strong>'+actionword+'</strong>'],
                        'module_News')+': '+values+deletemessage,
                    Zikula.__('Confirm Bulk Action','module_News'),
                    executeform,
                    options
                );
            } else {
                // change categories
                var formdialog = new Zikula.UI.FormDialog(
                    $('news_changeCategoriesForm'),
                    executeform,
                    options
                );
                formdialog.open();
            }
        } else {
            // no articles selected
            $('news_bulkaction_select').selectedIndex=0;
            Zikula.UI.Alert(
                Zikula.__f('Please select at least one article to %s.',actionword,'module_News'),
                Zikula.__('Bulk action error','module_News')
            );
        }
    });
}