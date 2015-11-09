Files 1.0.3
===========
  - Fixing Scribite plugin problems (#20)

Files 1.0.2
===========
  - Updating Scribite plugins: functional Xinha and TinyMCE plugins for Scribite v4 and v5

Files 1.0.1 - Changes from 1.0.0
================================
  - Removed *InteractiveInstall* functions (deprecated on zk 1.3.6).
      - Firs idea was move this functions to a *Controller-Admin-config* functions. Unnecesary after 1.0.1 goals.
      - Removed also *Files_init.tpl*.

  - Created function *checkingModule* in *Controller/User*.
      - Every controller function will call it to check module configuration.
      - **folderPath**:
        - For multisites (*$ZConfig['Multisites']['multi']* = 1) folderPath will be *$ZConfig['Multisites']['filesRealPath'] . '/' . $ZConfig['Multisites']['siteFilesFolder'];*.
        - If global *$ZConfig['FilesModule']['folderPath']* use this like folderPath. It checks if this folder exist and is writable.
        - If globar var not exist, use *$ZConfig['System']['datadir']* like folderPath. It checks if this folder exist (and if not, it create it) and if is writeable (and if not, it change acces permissions).

      - **usersFiles**:
        - ~~If global *$ZConfig['FilesModule']['usersFiles']* use this like usersFiles.~~ Files folder keeps managing like a module_var (*usersFolder*). Default value is 'usersFiles'.
        - Function checks if this folder exists (or creates it) and if it's wirteable (or changes permissions).

      - Failed checks report a warning template.
      - Overcame checks return all config vars: folderPath, usersFiles, multisites.

  - Changed file.php not to start *Zikula engine* in any case.
      - With global $ZConfig, files folder is known in every case.
      - Removed also Controller-User-notPublicFile function, Files_user_notPublicFile.tpl and lang strings

  - Added Xinha and TinyMCE plugins resources to repo

  - Updated file.php request. Return to Controller-External functions and templates.
      - Fixed ajax problems in thumbnail functions.
      - Fixed insert problems
      - Removed Controller-User request and fix popup creation problems.

  - Fixed problems win zip/unzip functions
     - No zip *.htaccess*, *.locked* and *.tbn* folders.
     - Updated PclZib lib to 2.8.2 and add callback function to skip these files

  - Changes in extenal templates 
      - New option to insert pictures (not only thumbnails). Only in public folders, add option to thumbnail img, insert img and inset thumbnails.
      - Updated file links: url for public folders and *title* message for no-public.
      - Added new functions to editor.response: *insertImg*, *insertLink*, *copyURL* and *gotoURL*.
      - Added jquery_toogle menu with the new editor.responses.
      - Added alert message to no-public files links.
      - Updated warnings and template messages.
      - Added *select all* feature (also in user template).
      - Added core.css style to external template, and also *referential* jquery lib loading.

  - Agora implementation. If  *$ZConfig['iwmodules']['agora']* is *true*, module use *Àgora* functions (actually use *getDiskInfo* function and *$ZConfig["centre"]["nomPropi"]* var.

  - Update module: version number (1.0.1), installer and upgrade function.

  - Remake catalan translation.

  - Add documentation

Note
----

  - Problems with xinha plugin, when focus is in the editor but cursor is not in the textarea. Really is a Xinha plugin issue.
