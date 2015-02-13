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
        var parentForm = $(this.editorCollection[0]).up('form');
        parentForm.onsubmit();
    };    
    /**
     * Render the html to all the elements that have editors
     * @returns {undefined}
     */
    this.renderAllElements = function()
    {
        // call the onsubmit event on the parent form, Xinha needs this to 
        // load back the iframe content to the textarea. 
        var parentForm = $(this.editorCollection[0]).up('form');
        parentForm.onsubmit();
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
        scribite_init();
        // fill editor variable with instantiated editors.
        this.editorCollection = this.params;
    };
    /**
     * create an editor for one textarea
     * @param {string} domId
     * @returns {undefined}
     */
    this.createEditor = function(domId)
    {
        // not sure if this works ok
        Xinha.replace(domId, xinha_config);
    };
    /**
     * destroy the editor for one textarea
     * @param {string} domId
     * @returns {null|undefined}
     */
    this.destroyEditor = function(domId)
    {
        this.editorCollection.get(domId).remove();
    };
    /**
     * Retrieve the contents of the edited textarea
     * @param {string} domId
     * @returns {string}
     */
    this.getEditorContents = function(domId)
    {
        return this.editorCollection.get(domId).getEditorContent();
    };
    /**
     * Generate a randomn string of n alpha characters
     * @see http://stackoverflow.com/questions/1349404/generate-a-string-of-5-random-characters-in-javascript
     * @param {number} n the number of characters
     * @returns {String}
     */
    this.generateString = function(n)
    {
        n = typeof n !== 'number' ? n : 5;
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < n; i++ ) {
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        return text;
    };
};