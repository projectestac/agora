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
    this.editorCollection = {};
    /**
     * Collection of editor params
     * @type Object
     */
    this.params = iParams;

    /**
     * Render the html to the original element from the editor
     * @param {string} domId
     * @returns {null}
     */
    this.renderToElement = function(domId)
    {
        this.editorCollection[domId].updateElement();
    };
    /**
     * Render the html to all the elements that have editors
     * @returns {undefined}
     */
    this.renderAllElements = function()
    {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
            CKEDITOR.instances[instance].setData('', function() {
                this.checkDirty();
            });
        }
    };
    /**
     * create all the editors for the appropriate textareas
     * @returns {undefined}
     */
    this.createEditors = function()
    {
        if (this.editorCollection === undefined) {
            this.editorCollection = {};
        }
        var textareaList = document.getElementsByTagName('textarea');
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            // this editor does not use jQuery or prototype so reverting to manual JS
            if ((disabledTextareas.indexOf(textareaId) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // override parameters
                var textareaId = textareaList[i].id;
                var oParams = new Object();
                CKEDITOR.tools.extend(oParams, this.params);
                var paramOverrideObj = window["paramOverrides_" + textareaId];
                if (typeof paramOverrideObj !== "undefined") {
                    // override existing values in the `params` obj
                    CKEDITOR.tools.extend(oParams, paramOverrideObj, true);
                }
                if (typeof paramOverrides_all !== "undefined") {
                    // override existing values in if 'all' is set as textarea for override
                    // overrides individual textarea overrides!
                    CKEDITOR.tools.extend(oParams, paramOverrides_all, true);
                }
                // attach the editor
                this.editorCollection[textareaId] = CKEDITOR.replace(textareaId, oParams);
                // notify subscriber
                insertNotifyInput(textareaId);
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
        this.editorCollection[domId] = CKEDITOR.replace(domId, oParams);
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