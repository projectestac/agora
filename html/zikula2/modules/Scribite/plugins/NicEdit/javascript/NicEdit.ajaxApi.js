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
        nicEd = nicEditors.findEditor(domId);
        nicEd.saveContent();
        nicEd.setContent('');
    };
    /**
     * Render the html to all the elements that have editors
     * @returns {undefined}
     */
    this.renderAllElements = function()
    {
        console.log(this.editorCollection);
        for (domId in this.editorCollection) {
            nicEd = nicEditors.findEditor(domId);
            nicEd.saveContent();
            nicEd.setContent('');
        }
    };
    /**
     * create all the editors for the appropriate textareas
     * @returns {undefined}
     */
    this.createEditors = function()
    {
        var textareaList = document.getElementsByTagName('textarea');
        for(i = 0; i < textareaList.length; i++) {
            // check to make sure textarea not in disabled list or has 'noeditor' class
            // this editor does not use jQuery or prototype so reverting to manual JS
            if ((disabledTextareas.indexOf(textareaList[i].id) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // attach the editor
                this.editorCollection[textareaList[i].id] = new nicEditor(this.params).panelInstance(textareaList[i].id);
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
        this.editorCollection[domId] = new nicEditor(this.params).panelInstance(domId);
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
        this.editorCollection[domId].removeInstance(domId);
        this.editorCollection[domId] = null;
    };
    /**
     * Retrieve the contents of the edited textarea
     * @param {string} domId
     * @returns {string}
     */
    this.getEditorContents = function(domId)
    {
        return this.editorCollection[domId].getContent();
    };
};