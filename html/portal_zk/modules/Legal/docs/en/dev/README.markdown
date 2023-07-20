Legal
=====

Directory Structure
-------------------

=========================   ===========
Directory                   Description
=========================   ===========
src/docs                    General and site-administrator related documentation (English).
src/docs/en/dev             Documentation intended for module developers (English versions).
src/images                  Image files specific to this module.
src/lib/Legal               Module libraries.
src/lib/Legal/Api           Classes providing API access to the module's functions, accessed by other modules.
src/lib/Legal/Controller    Classes that manage the UI and user workflow through the module.
src/lib/Legal/HookHandler   Classes that handle hook notifications.
src/lib/Legal/Listener      Persistent event handlers.
src/locale                  Module internationalization.
src/style                   Module CSS stylesheets.
src/templates               Module templates used by the controllers and by other functions and plugins defined by the module.
src/templates/en            English language versions of the policy texts. Unlike other templates in the module, gettext is largely not used in these templates. Texts for additional languages would be placed in directories named with the appropriate language code.
src/templates/plugins       Smarty/Zikula_View template plugins specific to this module, and templates used by these functions.
tests                       PHPUnit tests.
=========================   ===========
