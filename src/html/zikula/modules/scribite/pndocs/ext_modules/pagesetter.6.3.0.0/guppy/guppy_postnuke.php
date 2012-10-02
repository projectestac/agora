<?php
// $Id: guppy_postnuke.php 56 2008-08-05 07:55:41Z hilope $
// =======================================================================
// Guppy/PostNuke integration by Jorn Lind-Nielsen (C) 2003.
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WithOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// =======================================================================

define('guppyPostNukeModule', 'pagesetter');

global $guppy_postnuke_addEditorheadersCalled;
$guppy_postnuke_addEditorheadersCalled = false;


function guppy_postnuke_addEditorheaders()
{
  global $guppy_postnuke_addEditorheadersCalled;
  if ($guppy_postnuke_addEditorheadersCalled)
    return;
  $guppy_postnuke_addEditorheadersCalled = true;

  global $guppyBaseURL;
  global $guppyThemeURL;

    // Get base URL for htmlArea additions that need to know where we are when running fullscreen editor mode
  $postnukeBaseURL = (array_key_exists('HTTPS',$_SERVER) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http')
                     . '://' . $_SERVER['HTTP_HOST'] . strrev(strstr(strrev($_SERVER['PHP_SELF']),'/'));
  $postnukeBaseURL = rtrim($postnukeBaseURL,'/'); // Do not end in slashes

  $guppyBaseURL  = "$postnukeBaseURL/modules/" . guppyPostNukeModule . '/guppy';
  $guppyThemeURL = "$guppyBaseURL/themes/" . pnVarPrepForOS(pnUserGetTheme());
  $guppyThemeDir = "modules/pagesetter/guppy/themes/" . pnVarPrepForOS(pnUserGetTheme());
  $themeBaseURL  = "$postnukeBaseURL/themes/" . pnVarPrepForOS(pnUserGetTheme());

  $photoshareThumbnailSize = pnModGetVar('photoshare', 'thumbnailsize');

  if (!@is_dir($guppyThemeDir))
    $guppyThemeURL = "modules/" . guppyPostNukeModule . "/guppy/themes/guppy";

    // Ensure guppy stylesheet is included

  $cssURL = $guppyThemeURL . "/style.css";

  $photoshareInstalled = (pnModLoad('photoshare','user') ? 1 : 0);
  $mediashareInstalled = (pnModLoad('mediashare','user') ? 1 : 0);
  $folderInstalled = (pnModLoad('folder','folder') ? 1 : 0);

    // Use PostNuke variable for insertion of special HTML header tags.
  global $additional_header;
  if (!is_array($additional_header))
    $additional_header = array();
  $additional_header[] = "<link rel=\"stylesheet\" href=\"$cssURL\" type=\"text/css\" />";

// start scribite!
//  $additional_header[] = "
//<script type=\"text/javascript\">
//var postnukeBaseURL = '$postnukeBaseURL';
//var postnukeThemeURL = '$themeBaseURL';
//var _editor_url = '$guppyBaseURL/xinha/'; // Use for htmlArea
//var _editor_lang = \"en\";  // Use for htmlArea
//var photoshareThumbnailSize = '$photoshareThumbnailSize';
//var photoshareInstalled = $photoshareInstalled;
//var mediashareInstalled = $mediashareInstalled;
//var folderInstalled = $folderInstalled;
//</script>";
//  $additional_header[] = "<script type=\"text/javascript\" src=\"$guppyBaseURL/xinha/htmlarea.js\"></script>";
//  $additional_header[] = "<link rel=\"StyleSheet\" href=\"$guppyBaseURL/xinha/htmlarea.css\" type=\"text/css\" />";
// end scribite!

  $additional_header[] = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"modules/pagesetter/guppy/jscalendar/css/calendar-win2k-cold-1.css\" title=\"win2k-cold-1\" />";
  $additional_header[] = "<script type=\"text/javascript\" src=\"modules/pagesetter/guppy/jscalendar/calendar.js\"></script>";
  $additional_header[] = "<script type=\"text/javascript\" src=\"modules/pagesetter/guppy/jscalendar/lang/calendar-en.js\"></script>";
  $additional_header[] = "<script type=\"text/javascript\" src=\"modules/pagesetter/guppy/jscalendar/calendar-setup.js\"></script>";
  $additional_header[] = "<script type=\"text/javascript\" src=\"modules/pagesetter/pnjavascript/findpub.js\"></script>";
  
// start scribite!
//  if ($photoshareInstalled)
//    $additional_header[] = "<script type=\"text/javascript\" src=\"modules/photoshare/pnjavascript/findimage.js\"></script>";
//
//  if ($mediashareInstalled)
//    $additional_header[] = "<script type=\"text/javascript\" src=\"modules/mediashare/pnjavascript/finditem.js\"></script>";
//
//
//  if ($folderInstalled)
//    $additional_header[] = "<script type=\"text/javascript\" src=\"modules/folder/pnjavascript/selector.js\"></script>";
// end scribite!

  header("Expires: Mon, 1 Jul 2000 00:00:00 GMT"); 
  header("Cache-Control: no-cache"); 
  header("Cache-Control: no-store", false); 
}


function guppy_redirect($url)
{
  pnRedirect($url);
}


function guppy_getUploadDir()
{
  return pnModGetVar('pagesetter', 'uploadDirDocs');
}


/* Get/Set Guppy settings 
   - 'htmlAreaEnabled'  => true/false
   - 'htmlAreaStyled'   => Include theme stylesheet (true/false)
   - 'htmlAreaUndo'     => Undo enabled
   - 'htmlAreaWordKill' => Kill MS-Word codes on paste
 */

function guppy_getSetting($var)
{
  return pnModGetVar('guppy', $var);
}


function guppy_setSetting($var, $value)
{
  return pnModSetVar('guppy', $var, $value);
}

$guppy_WindowCache = null;

function guppy_getWindowCache()
{
  global $guppy_WindowCache;
  if ($guppy_WindowCache != null)
    return $guppy_WindowCache;

  list($dbconn) = pnDBGetConn();
  $pntable = pnDBGetTables();

  $sessionTable = &$pntable['pagesetter_session'];
  $sessionColumn = &$pntable['pagesetter_session_column'];

  $sessionId = session_id();

  $sql = "SELECT $sessionColumn[cache] FROM $sessionTable WHERE $sessionColumn[sessionId] = '" . pnVarPrepForStore($sessionId) . "'";

  $result = $dbconn->execute($sql);
  if ($dbconn->errorNo() != 0)
    return pagesetterErrorApi(__FILE__, __LINE__, '"guppy_getWindowCache" failed: ' 
                                                  . $dbconn->errorMsg() . " while executing: $sql");
  if ($result->EOF)
    return null;

  $guppy_WindowCache = unserialize($result->fields[0]);

  return $guppy_WindowCache;
}


function guppy_setWindowCache($cache)
{
  global $guppy_WindowCache;
  $guppy_WindowCache = $cache;

  list($dbconn) = pnDBGetConn();
  $pntable = pnDBGetTables();

  $sessionTable = &$pntable['pagesetter_session'];
  $sessionColumn = &$pntable['pagesetter_session_column'];

  $sessionId = session_id();

  $cacheData = serialize($cache);


  // Update data
  $sql = "REPLACE INTO $sessionTable ($sessionColumn[sessionId], $sessionColumn[cache], $sessionColumn[lastUsed]) 
          VALUES('" . pnVarPrepForStore($sessionId) . "',
                 '" . pnVarPrepForStore($cacheData) . "', NOW())";

  $result = $dbconn->execute($sql);
  if ($dbconn->errorNo() != 0)
    return pagesetterErrorApi(__FILE__, __LINE__, '"guppy_setWindowCache" failed: ' 
                                                  . $dbconn->errorMsg() . " while executing: $sql");


  // Remove unused old data (including other sessions - the users of those sessions might never return)
  $sql = "DELETE FROM $sessionTable WHERE $sessionColumn[lastUsed] < DATE_SUB(NOW(), INTERVAL 1 DAY)";

  $result = $dbconn->execute($sql);
  if ($dbconn->errorNo() != 0)
    return pagesetterErrorApi(__FILE__, __LINE__, '"guppy_setWindowCache" failed: ' 
                                                  . $dbconn->errorMsg() . " while executing: $sql");
  return true;
}


function guppy_unknownWindowError()
{
  $url = pnModUrl('pagesetter','admin','main');
  $msg = _GUPPYUNKNOWNWINDOWID . "<br/><br/><a href=\"$url\">" . _GUPPYBACKTOADMIN . "</a>";
  return $msg;
}

?>
