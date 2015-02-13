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
 * @param {text} ihtml the html for the toolbar
 * @returns {ScribiteUtil}
 */
var ScribiteUtil = function()
{
    /**
     * Collection of editor instances by domId
     * @type Object
     */
    this.editorCollection = {};
    /**
     * Render the html to the original element from the editor
     * @param {string} domId
     * @returns {null}
     */
    this.renderToElement = function(domId)
    {
        // the textarea automatically contains the rendered html so there is
        // nothing to do here
    };
    /**
     * Render the html to all the elements that have editors
     * @returns {undefined}
     */
    this.renderAllElements = function()
    {
        // the textarea automatically contains the rendered html so there is
        // nothing to do here
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
            if ((disabledTextareas.indexOf(textareaList[i].id) == -1) && !(textareaList[i].className.split(' ').indexOf('noeditor') > -1)) {
                // attach the editor
                var domId = textareaList[i].id;
                // would prefer to use this.createEditor(domId) here but can't figure out how...
                // Insert editor header
                var toolbar = document.createElement("div");
                toolbar.id = 'toolbar_'+domId;
                toolbar.style = 'display: none';
                // toolbarhtml is a global var
                toolbar.innerHTML = toolbarhtml;
                var textarea = document.getElementById(domId);
                var parentDiv = textarea.parentNode;
                parentDiv.insertBefore(toolbar, textarea);
                this.editorCollection[domId] = new wysihtml5.Editor(domId, {
                    toolbar: 'toolbar_'+domId,
                    parserRules: wysihtml5ParserRules
                });
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
        // Insert editor header
        var toolbar = document.createElement("div");
        toolbar.id = 'toolbar_'+domId;
        toolbar.style = 'display: none';
        toolbar.innerHTML = toolbarhtml;
        var textarea = document.getElementById(domId);
        var parentDiv = textarea.parentNode;
        parentDiv.insertBefore(toolbar, textarea);
        this.editorCollection[domId] = new wysihtml5.Editor(domId, {
            toolbar: 'toolbar_'+domId,
            parserRules: wysihtml5ParserRules
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
        // the textarea automatically contains the rendered html
        return document.getElementById(domId).value;
    };
};