Scribite Plugins
================

Creating a plugin
-----------------

- Plugins can be added after Scribite is released and so writing and using your
  own plugin is a great way to improve the functionality of Scribite for your own
  site.
- When writing your own plugin please copy the structure of the existing plugins.
- The Plugin.php is required and should be located in the root of the plugin.
- Any additional classes should be located in <plugin>/lib/<plugin>/MyClass.php
- addParameters() and addExternalPlugins() methods should be added to a
  Util class in the plugin/lib directory.
- images/logo.png should be present for your plugin
- templates/configure.tpl is a template used by a Zikula_Form_View class to set
  parameters that the editorheader.tpl will use (the values are sent in the
  modvars array).
- editorheader.tpl should load and configure the javascript needed for the editor.
- Within editorheader.tpl be sure to copy existing examples. Especially note how
  all textareas are fetched via javascript and tested for the existence of a 
  'noeditor' class and also if the selected textarea is in the disabledTextareas
  array. Lastly, note `that insertNotifyInput(textareaList[i].id);` is called
  to notify the subscriber module of the use of the editor.
- A Javascript API has been outlined to allow subscriber modules to fetch data,
  enable and destroy instances of the editors as part of the Scribite object.
  A good example is located in CKEditor/javascript/CKEditor.ajaxApi.js
  It is important that your methods and final object have exactly the same name
  as all the other editors so that they can be utilized by the subscriber.


Plugin Meta info
----------------

- displayname: the name you wish displayed
- description: a short description of the functionality.
- version: the version of the vendor lib
- url: the site where the vendor is location
- license: use SPDX license abbreviation from http://www.spdx.org/licenses/
- dependencies: other libraries (e.g. jQuery or such) that must be loaded. Please
   note that this is not used in the code, it is just information.
