/**
 * JS Class to implement the Scribite API to allow Modules
 * to initialize Scribite editors and manipulate via ajax
 *
 * methods that are mandatory:
 *   createEditors();
 *
 * methods that are used typical JS/ajax calls
 *   renderAllElements();
 *
 * Other methods can be useful if defined
 *
 * @param {object} iParams collection of editor params
 * @returns {ScribiteUtil}
 */
var ScribiteUtil = function(iParams)
{
    /**
     * Collection of editor instances by domId
     * @type Object
     */
    //this.editorCollection = {};
    /**
     * Collection of editor params
     * @type Object
     */
    //this.params = iParams;

    /**
     * Render the html to the original element from the editor
     * @param {string} domId
     * @returns {null}
     */
    this.renderToElement = function(domId)
    {
        jQuery.wymeditors(domId).update();
    };
    /**
     * Render the html to all the elements that have editors
     * @returns {undefined}
     */
    this.renderAllElements = function()
    {
        //console.log(this.editorCollection);
        wymeditors = jQuery.wymeditors;
        for (var i = 0; i < wymeditors.length; i++) {
            wymeditors(i).update();
            //wymeditors(i).setContent('');
        }
    };
    /**
     * create all the editors for the appropriate textareas
     * @returns {undefined}
     */
    this.createEditors = function()
    {
        jQuery(function() {
            var textareaList = document.getElementsByTagName('textarea');
            for(i = 0; i < textareaList.length; i++) {
                // check to make sure textarea not in disabled list or has 'noeditor' class
                if ((jQuery.inArray(textareaList[i].id, disabledTextareas) == -1) && !jQuery('#' + textareaList[i].id).hasClass('noeditor')) {
                    // attach the editor
                    jQuery('#' + textareaList[i].id).wymeditor({
                        lang: '{{$lang}}',
                        updateEvent: 'click',
                        updateSelector: '[type=submit]'
                    });
                }
            }
        });
        // Notify subscriber outside jQuery call to WYMeditor
        var textareaList = document.getElementsByTagName('textarea');
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            // this editor does not use jQuery or prototype so reverting to manual JS
            var textareaId = textareaList[i].id;
            if ((disabledTextareas.indexOf(textareaId) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // notify subscriber
                insertNotifyInput(textareaList[i].id);
            }
        }
    };
    /**
     * create an editor for one textarea
     * @param {string} domId
     * @returns {undefined}
     */
    this.createEditor = function(domId)
    {
        jQuery('#' + domId).wymeditor({
            updateEvent: 'click',
            updateSelector: '[type=submit]'
        });
    };
    /**
     * destroy the editor for one textarea
     * @param {string} domId
     * @returns {null|undefined}
     */
    this.destroyEditor = function(domId)
    {
        if (typeof this.editorCollection[domId] === 'undefined') {
            return;
        }
        this.editorCollection[domId].destroy();
        this.editorCollection[domId] = null;
    };
    /**
     * Retrieve the contents of the edited textarea
     * @param {string} domId
     * @returns {string}
     */
    this.getEditorContents = function(domId)
    {
        return this.editorCollection[domId].getData();
    };
};