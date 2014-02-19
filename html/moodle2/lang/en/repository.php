<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'repository', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   repository
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessiblefilepicker'] = 'Accessible file picker';
$string['activaterep'] = 'Active repositories';
$string['activerepository'] = 'Available repository plugins';
$string['activitybackup'] = 'Activity backup';
$string['add'] = 'Add';
$string['addfile'] = 'Add...';
$string['addplugin'] = 'Add a repository plugin';
$string['allowexternallinks'] = 'Allow external links';
$string['areacategoryintro'] = 'Category introduction';
$string['areacourseintro'] = 'Course introduction';
$string['areamainfile'] = 'Main file';
$string['arearoot'] = 'System';
$string['areauserbackup'] = 'User backup';
$string['areauserdraft'] = 'Drafts';
$string['areauserpersonal'] = 'Private files';
$string['areauserprofile'] = 'Profile';
$string['attachedfiles'] = 'Attached files';
$string['attachment'] = 'Attachment';
$string['author'] = 'Author';
$string['automatedbackup'] = 'Automated backups';
$string['back'] = '&laquo; Back';
$string['backtodraftfiles'] = '&laquo; Back to draft files manager';
$string['cachecleared'] = 'Cached files are removed';
$string['cacheexpire'] = 'Cache expire';
$string['cannotaccessparentwin'] = 'If parent window is on HTTPS, then we are not allowed to access window.opener object, so we cannot refresh the repository for you automatically, but we already got your session, just go back to file picker and select the repository again, it should work now.';
$string['cannotdelete'] = 'Cannot delete this file.';
$string['cannotdownload'] = 'Cannot download this file';
$string['cannotdownloaddir'] = 'Cannot download this folder';
$string['cannotinitplugin'] = 'Call plugin_init failed';
$string['choosealink'] = 'Choose a link...';
$string['chooselicense'] = 'Choose license';
$string['cleancache'] = 'Clean my cache files';
$string['close'] = 'Close';
$string['commonrepositorysettings'] = 'Common repository settings';
$string['configallowexternallinks'] = 'This option enables all users to choose whether or not external media is copied into Moodle or not. If this is off then media is always copied into Moodle (this is usually best for overall data integrity and security).  If this is on then users can choose each time they add media to a text.';
$string['configcacheexpire'] = 'The amount of time that file listings are cached locally (in seconds) when browsing external repositories.';
$string['configsaved'] = 'Configuration saved!';
$string['confirmdelete'] = 'Are you sure you want to delete this repository - {$a}? If you choose "Continue and download", file references to external contents will be downloaded to moodle, but it could take long time to process.';
$string['confirmdeletefile'] = 'Are you sure you want to delete this file?';
$string['confirmdeletefilewithhref'] = 'Are you sure you want to delete this file? There are {$a} alias/shortcut files that use this file as their source. If you proceed then those aliases will be converted to true copies.';
$string['confirmdeletefolder'] = 'Are you sure you want to delete this folder? All files and subfolders will be deleted.';
$string['confirmremove'] = 'Are you sure you want to remove this repository plugin, its options and <strong>all of its instances</strong> - {$a}? If you choose "Continue and download", file references to external contents will be downloaded to moodle, but it could take long time to process.';
$string['confirmrenamefile'] = 'Are you sure you want to rename/move this file? There are {$a} alias/shortcut files that use this file as their source. If you proceed then those aliases will be converted to true copies.';
$string['confirmrenamefolder'] = 'Are you sure you want to move/rename this folder? Any alias/shortcut files that reference files in this folder will be converted into true copies.';
$string['continueuninstall'] = 'Continue';
$string['continueuninstallanddownload'] = 'Continue and download';
$string['copying'] = 'Copying';
$string['coursebackup'] = 'Course backups';
$string['create'] = 'Create';
$string['createfolderfail'] = 'Fail to create this folder';
$string['createfoldersuccess'] = 'Create folder successfully';
$string['createinstance'] = 'Create a repository instance';
$string['createrepository'] = 'Create a repository instance';
$string['createxxinstance'] = 'Create "{$a}" instance';
$string['date'] = 'Date';
$string['datecreated'] = 'Created';
$string['deleted'] = 'Repository deleted';
$string['deleterepository'] = 'Delete this repository';
$string['detailview'] = 'View details';
$string['dimensions'] = 'Dimensions';
$string['disabled'] = 'Disabled';
$string['download'] = 'Download';
$string['downloadfolder'] = 'Download all';
$string['downloadsucc'] = 'The file has been downloaded successfully';
$string['draftareanofiles'] = 'Cannot be downloaded because there is no files attached';
$string['editrepositoryinstance'] = 'Edit repository instance';
$string['emptylist'] = 'Empty list';
$string['emptytype'] = 'Cannot create repository type: type name is empty';
$string['enablecourseinstances'] = 'Allow users to add a repository instance into the course';
$string['enableuserinstances'] = 'Allow users to add a repository instance into the user context';
$string['enter'] = 'Enter';
$string['entername'] = 'Please enter folder name';
$string['enternewname'] = 'Please enter the new file name';
$string['error'] = 'An unknown error occurred!';
$string['errordoublereference'] = 'Unable to overwrite file with a shortcut/alias because shortcuts to this file already exist.';
$string['errornotyourfile'] = 'You cannot pick file which is not added by your';
$string['errorpostmaxsize'] = 'The uploaded file may exceed the post_max_size directive in php.ini.';
$string['erroruniquename'] = 'Repository instance name should be unique';
$string['errorwhilecommunicatingwith'] = 'Error while communicating with the repository \'{$a}\'.';
$string['errorwhiledownload'] = 'An error occurred while downloading the file: {$a}';
$string['existingrepository'] = 'This repository already exists';
$string['federatedsearch'] = 'Federated search';
$string['fileexists'] = 'File name already being used, please use another name';
$string['fileexistsdialog_editor'] = 'A file with that name has already been attached to the text you are editing.';
$string['fileexistsdialog_filemanager'] = 'A file with that name has already been attached';
$string['fileexistsdialogheader'] = 'File exists';
$string['filename'] = 'Filename';
$string['filenotnull'] = 'You must select a file to upload.';
$string['filepicker'] = 'File picker';
$string['filesaved'] = 'The file has been saved';
$string['filesizenull'] = 'File size cannot be determined';
$string['folderexists'] = 'Folder name already being used, please use another name';
$string['foldernotfound'] = 'Folder not found';
$string['folderrecurse'] = 'Folder can not be moved to it\'s own subfolder';
$string['getfile'] = 'Select this file';
$string['hidden'] = 'Hidden';
$string['iconview'] = 'View as icons';
$string['imagesize'] = '{$a->width} x {$a->height} px';
$string['instance'] = 'instance';
$string['instancedeleted'] = 'Instance deleted';
$string['instances'] = 'Repository instances';
$string['instancesforcourses'] = '{$a} Course-wide common instance(s)';
$string['instancesforsite'] = '{$a} Site-wide common instance(s)';
$string['instancesforusers'] = '{$a} User private instance(s)';
$string['invalidfiletype'] = '{$a} filetype cannot be accepted.';
$string['invalidjson'] = 'Invalid JSON string';
$string['invalidparams'] = 'Invalid parameters';
$string['invalidplugin'] = 'Invalid repository {$a} plug-in';
$string['invalidrepositoryid'] = 'Invalid repository ID';
$string['isactive'] = 'Active?';
$string['keyword'] = 'Keyword';
$string['linkexternal'] = 'Link external';
$string['listview'] = 'View as list';
$string['loading'] = 'Loading...';
$string['login'] = 'Login';
$string['logout'] = 'Logout';
$string['lostsource'] = 'Error. Source is missing. {$a}';
$string['makefileinternal'] = 'Make a copy of the file';
$string['makefilelink'] = 'Link to the file directly';
$string['makefilereference'] = 'Create an alias/shortcut to the file';
$string['manage'] = 'Manage repositories';
$string['manageurl'] = 'Manage';
$string['manageuserrepository'] = 'Manage individual repository';
$string['moving'] = 'Moving';
$string['newfolder'] = 'New folder';
$string['newfoldername'] = 'New folder name:';
$string['noenter'] = 'Nothing entered';
$string['nofilesattached'] = 'No files attached';
$string['nofilesavailable'] = 'No files available';
$string['nomorefiles'] = 'No more attachments allowed';
$string['nopathselected'] = 'No destination path select yet (double click tree node to select)';
$string['nopermissiontoaccess'] = 'No permission to access this repository.';
$string['norepositoriesavailable'] = 'Sorry, none of your current repositories can return files in the required format.';
$string['norepositoriesexternalavailable'] = 'Sorry, none of your current repositories can return external files.';
$string['noresult'] = 'No search result';
$string['notyourinstances'] = 'You can not view/edit repository instances of another user';
$string['off'] = 'Enabled but hidden';
$string['on'] = 'Enabled and visible';
$string['openpicker'] = 'Choose a file...';
$string['operation'] = 'Operation';
$string['original'] = 'Original';
$string['overwrite'] = 'Overwrite';
$string['overwriteall'] = 'Overwrite all';
$string['personalrepositories'] = 'Available repository instances';
$string['plugin'] = 'Repository plug-ins';
$string['pluginerror'] = 'Errors in repository plugin.';
$string['pluginname'] = 'Repository plugin name';
$string['pluginnamehelp'] = 'If you leave this empty the default name will be used.';
$string['popup'] = 'Click "Login" button to login';
$string['popupblockeddownload'] = 'The downloading window is blocked, please allow the popup window, and try again.';
$string['preview'] = 'Preview';
$string['privatefilesof'] = '{$a} Private files';
$string['readonlyinstance'] = 'You cannot edit/delete a read-only instance';
$string['referencesexist'] = 'There are {$a} alias/shortcut files that use this file as their source';
$string['referenceslist'] = 'Aliases/Shortcuts';
$string['refresh'] = 'Refresh';
$string['refreshnonjsfilepicker'] = 'Please close this window and refresh non-javascript file picker';
$string['removed'] = 'Repository removed';
$string['renameall'] = 'Rename all';
$string['renameto'] = 'Rename to "{$a}"';
$string['repositories'] = 'Repositories';
$string['repository'] = 'Repository';
$string['repositorycourse'] = 'Course repositories';
$string['repositoryerror'] = 'Remote repository returned error: {$a}';
$string['save'] = 'Save';
$string['saveas'] = 'Save as';
$string['saved'] = 'Saved';
$string['saving'] = 'Saving';
$string['search'] = 'Search';
$string['searching'] = 'Search in';
$string['searchrepo'] = 'Search repository';
$string['sectionbackup'] = 'Section backups';
$string['select'] = 'Select';
$string['setmainfile'] = 'Set main file';
$string['settings'] = 'Settings';
$string['setupdefaultplugins'] = 'Setting up default repository plugins';
$string['siteinstances'] = 'Repositories instances of the site';
$string['size'] = 'Size';
$string['submit'] = 'Submit';
$string['sync'] = 'Sync';
$string['thumbview'] = 'View as icons';
$string['title'] = 'Choose a file...';
$string['type'] = 'Type';
$string['typenotvisible'] = 'Type not visible';
$string['undisclosedreference'] = '(Undisclosed)';
$string['undisclosedsource'] = '(Undisclosed)';
$string['unknownoriginal'] = 'Unknown';
$string['unzipped'] = 'Unzipped successfully';
$string['upload'] = 'Upload this file';
$string['uploading'] = 'Uploading...';
$string['uploadsucc'] = 'The file has been uploaded successfully';
$string['uselatestfile'] = 'Use latest file';
$string['usenonjsfilemanager'] = 'Open file manager in new window';
$string['usenonjsfilepicker'] = 'Open file picker in new window';
$string['usercontextrepositorydisabled'] = 'You cannot edit this repository in user context';
$string['wrongcontext'] = 'You cannot access to this context';
$string['xhtmlerror'] = 'You are probably using XHTML strict header, some YUI Component doesn\'t work in this mode, please turn it off in moodle';
$string['ziped'] = 'Compress folder successfully';
