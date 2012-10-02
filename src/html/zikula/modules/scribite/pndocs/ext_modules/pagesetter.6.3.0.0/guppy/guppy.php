<?php
// $Id: guppy.php 56 2008-08-05 07:55:41Z hilope $
// =======================================================================
// Guppy by Jorn Lind-Nielsen (C) 2003.
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

require_once 'modules/pagesetter/guppy/guppy_common.php';
require_once 'modules/pagesetter/guppy/guppy_plugin.php';

  // Used by user functions to indicate that Guppy should clear all its output
  // - used with PostNuke for redirecting (pnRedirect) to new pages
global $guppy_outputCleared;
$guppy_outputCleared = false;

global $guppy_registeredPageBlocks;
$guppy_registeredPageBlocks = array();

/* DEBUGGING
function guppylog($msg)
{
  $f = fopen("/mnt/web_dk/web_domains/fjeldgruppen.dk/tmp/guppy.txt", "a");
  fwrite($f, $msg . " (" . $_SERVER['QUERY_STRING'] . ") \n");
  fflush($f);
  fclose($f);
}
guppylog("\n= GUPPY (" . $_SERVER['QUERY_STRING'] . ") ===\n");
//*/

// =======================================================================
// Command builder
// =======================================================================

class GuppyCommandBuilder
{
  var $data;


  function GuppyCommandBuilder($spec)
  {
    $this->data = null;
    $this->_spec = $spec;
    $this->_closed = false;
    $this->_errors = array();
  }


  function setData($data)
  {
    $this->data = $data;
  }


  function alert($msg)
  {
    echo "<script>alert(\"" . addcslashes($msg, "\0..\37\"\\") . "\");</script>\n";
  }


  function alertAndClose($msg, $url)
  {
    echo "<script>alert(\"" . addcslashes($msg, "\0..\37\"\\") . "\");window.location=\"$url\"</script>\n";
    $this->_closed = true;
  }


  function message($msg)
  {
    echo "<div class=\"guppyMessage\">" . htmlspecialchars($msg) . "</div>\n";
  }


  function errorMessage($msg)
  {
    $this->_errors[] = $msg;
  }


  function insertRow($componentName, $rowIndex, $record) // Inserts at(before) the passed row index
  {
    array_splice($this->data[$componentName]['rows'], $rowIndex, 0, array($record));

    $data = &$this->data[$componentName]['rows'];

    for ($i=count($data)-1; $i>$rowIndex; --$i)
      ++$data[$i]['lineno'];

    $data[$rowIndex]['lineno'] = $rowIndex;
  }


  function deleteRow($componentName, $rowIndex)
  {
    array_splice($this->data[$componentName]['rows'], $rowIndex, 1);

    $data = &$this->data[$componentName]['rows'];

    for ($i=count($data)-1; $i>=$rowIndex; --$i)
      --$data[$i]['lineno'];
  }


  function setRows($componentName, $rows)
  {
    $this->data[$componentName]['rows'] = $rows;
  }


  function setActionEnabling($componentName, $actions)
  {
    $this->data[$componentName]['actions'] = array_join_merge( $this->data[$componentName]['actions'], $actions );
  }


  function treeNewItem($componentName, $rowIndex, $record) // Inserts at(before) the passed row index
  {
    $rows = &$this->data[$componentName]['rows'];

    array_splice($rows, $rowIndex, 0, array($record));

    for ($i=count($rows)-1; $i>$rowIndex; --$i)
      ++$rows[$i]['lineno'];

    $rows[$rowIndex]['lineno'] = $rowIndex;

    if ($rowIndex+1 < count($rows))
      $rows[$rowIndex]['indent'] = $rows[$rowIndex+1]['indent'];
    else
      $rows[$rowIndex]['indent'] = 0;

    $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);
  }


    // If $doIndent then indent new item AND append to last element of that level.
  function treeAdditem($componentName, $rowIndex, $record, $doIndent) // Adds after the passed row index
  {
    $rows = &$this->data[$componentName]['rows'];

    $currentIndent = $rows[$rowIndex]['indent'];

      // Find last element at same level (if adding sub-item)
    while ($rowIndex < count($rows)  &&  $rows[$rowIndex+1]['indent'] == $currentIndent+1)
      ++$rowIndex;

    array_splice($rows, $rowIndex+1, 0, array($record));

    for ($i=count($rows)-1; $i>$rowIndex+1; --$i)
      ++$rows[$i]['lineno'];

    $rows[$rowIndex+1]['lineno'] = $rowIndex+1;

    $rows[$rowIndex+1]['indent'] = $currentIndent + ($doIndent ? 1 : 0);

    $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);
  }


  function treeChangeItem($componentName, $rowIndex, $record)
  {
    $rows = &$this->data[$componentName]['rows'];

    if ($rowIndex >=0  &&  $rowIndex < count($rows))
    {
      $rows[$rowIndex] = $record;

      $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);
    }
  }


  function treeMoveUp($componentName, $rowIndex)
  {
      // A few shorthands
    $rows = &$this->data[$componentName]['rows'];
    $currentIndent = $rows[$rowIndex]['indent'];

    if ($rowIndex <= 0)
      return;
    if ($rows[$rowIndex-1]['indent'] < $currentIndent)
      return;

      // Calculate how far up to move it
    $start = $rowIndex-1;
    while ($start > 0  &&  $rows[$start]['indent'] > $currentIndent)
      --$start;

    $offset = $rowIndex - $start;

    for ($i=$rowIndex, $size=count($rows); $i < $size  &&  ($i == $rowIndex  ||  $rows[$i]['indent'] > $currentIndent); ++$i)
    {
      for ($j=0; $j<$offset; ++$j)
      {
        $tmp = $rows[$i-$j-1];
        $rows[$i-$j-1] = $rows[$i-$j];
        $rows[$i-$j] = $tmp;

        ++$rows[$i-$j]['lineno'];
        --$rows[$i-$j-1]['lineno'];
      }
    }
  }


  function treeMoveDown($componentName, $rowIndex)
  {
      // A few shorthands
    $rows = &$this->data[$componentName]['rows'];
    $size = count($rows);
    $currentIndent = $rows[$rowIndex]['indent'];

    if ($rowIndex >= $size-1)
      return;
    if ($rows[$rowIndex+1]['indent'] < $currentIndent)
      return;

      // Calculate how far to move it - and then move that position up instead of current down
    $start = $rowIndex+1;
    while ($start < $size-1  &&  $rows[$start]['indent'] > $currentIndent)
      ++$start;

    if ($rows[$start]['indent'] > $currentIndent)
      return;

    return $this->treeMoveUp($componentName, $start);
  }


  function treeIndent($componentName, $rowIndex)
  {
      // A few shorthands
    $rows = &$this->data[$componentName]['rows'];
    $currentIndent = $rows[$rowIndex]['indent'];

      // Indent is only allow if there exists at least one item above with the same indent level as the current
    if ($rowIndex == 0)
      $ok = false;
    else
    {
      $ok = false;

      for ($i=$rowIndex-1; $i>=0; --$i)
        if ($rows[$i]['indent'] == $currentIndent)
          $ok = true;
        else if ($rows[$i]['indent'] < $currentIndent)
          break;
    }

    if ($ok)
    {
      $i = $rowIndex;
      $size = count($rows)-1;

        // Indent current item and all below it.
      do
        ++$rows[$i++]['indent'];
      while ($i <= $size  &&  $rows[$i]['indent'] > $currentIndent);

      $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);
    }
  }


  function treeUndent($componentName, $rowIndex)
  {
      // Get a few shorthands
    $rows = &$this->data[$componentName]['rows'];
    $currentIndent = $rows[$rowIndex]['indent'];

      // Verify that undent is allowed (may not be moved too far to the left). Not as difficult to check as indent.
    if ($currentIndent > 0)
      $ok = true;
    else
      $ok = false;

    if ($ok)
    {
      $i = $rowIndex;
      $size = count($rows)-1;

        // Undent all below this one
      do
        --$rows[$i++]['indent'];
      while ($i <= $size  &&  $rows[$i]['indent'] > $currentIndent);

      $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);
    }
  }


  function treeDelete($componentName, $rowIndex)
  {
      // Get a few shorthands
    $rows = &$this->data[$componentName]['rows'];
    $currentIndent = $rows[$rowIndex]['indent'];

      // Remove current row
    //echo "$rowIndex\n";
    //print_r($rows);
    array_splice($rows, $rowIndex, 1);
    //print_r($rows); exit(0);

      // Update line numbers
    for ($i=count($rows)-1; $i>=$rowIndex; --$i)
      --$rows[$i]['lineno'];

      // Undent all below this one
    $i = $rowIndex;
    $size = count($rows)-1;

    while ($i <= $size  &&  $rows[$i]['indent'] > $currentIndent)
      --$rows[$i++]['indent'];

    $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);
  }


  function treeDeleteRecursive($componentName, $rowIndex)
  {
      // Get a few shorthands
    $rows = &$this->data[$componentName]['rows'];
    $currentIndent = $rows[$rowIndex]['indent'];

      // Find last row to delete (not inclusive)
    $lastRowIndex = $rowIndex+1;
    $size = count($rows);
    while ($lastRowIndex < $size  &&  $rows[$lastRowIndex]['indent'] > $currentIndent)
      ++$lastRowIndex;

    $rowsToRemove = $lastRowIndex - $rowIndex;

      // Store data from deleted rows so caller can react on it
    $deletedRows = array();
    for ($i=$rowIndex; $i<$lastRowIndex; ++$i)
      $deletedRows[] = $rows[$i];

      // Remove rows
    array_splice($rows, $rowIndex, $rowsToRemove);

      // Update line numbers
    for ($i=count($rows)-1; $i>=$rowIndex; --$i)
      $rows[$i]['lineno'] -= $rowsToRemove;

    $this->_treeCalculateFullTitles($rows, $this->_spec[$componentName]);

    return $deletedRows;
  }


  function _treeCalculateFullTitles(&$rows, $componentSpec)
  {
    //print_r($componentSpec); exit(0);
    $path = array();
    $titleFieldName = $componentSpec['titleField'];

    for ($i=0,$size=count($rows); $i<$size; ++$i)
    {
      $path[$rows[$i]['indent']] = $rows[$i][$titleFieldName];
      array_splice($path, intval($rows[$i]['indent'])+1);
      $fullTitle = implode(":", $path);

      $rows[$i]['fullTitle'] = $fullTitle;
    }
  }


  function update($componentName, $record, $rowIndex = 0)
  {
    $this->data[$componentName]['rows'][$rowIndex] = $record;

      // Just make sure this is not overwritten
    $this->data[$componentName]['rows'][$rowIndex]['lineno'] = $rowIndex;
  }


  function updatePartial($componentName, $record, $rowIndex = 0)
  {
    $this->data[$componentName]['rows'][$rowIndex] += $record;

      // Just make sure this is not overwritten
    $this->data[$componentName]['rows'][$rowIndex]['lineno'] = $rowIndex;
  }


  function clearOutput()
  {
    global $guppy_outputCleared;
    $guppy_outputCleared = true;
  }


    // Close internal window and redirect to something else afterwards
    // $nextURL may be null to avoid redirection
  function close($nextURL = null)
  {
    $this->_closed = true;
    $this->_nextURL = $nextURL;
    if ($nextURL != null)
      $this->clearOutput();
  }


  function redirect()
  {
    if (isset($this->_nextURL))
      guppy_redirect($this->_nextURL);
  }


  function closeWindow() // Close browser window
  {
    echo "<script>window.close()</script>\n";
    $this->_closed = true;
    $this->clearOutput();
  }


  function openWindow($url, $target=null, $setFocus=false)
  {
    echo "<script>\nvar pagesetterPreviewWindow = window.open('$url'" . ($target == null ? '' : ",'$target'") . ");\n";
    if ($setFocus)
      echo "if (pagesetterPreviewWindow != null) pagesetterPreviewWindow.focus();\n";
    echo "</script>\n";
  }


  function closed()
  {
    return $this->_closed;
  }


  function hasErrors()
  {
    return count($this->_errors) > 0;
  }


  function generateErrors()
  {
    if (count($this->_errors) > 0)
    {
      echo "<div class=\"guppy-error\"><ul>\n";
      foreach ($this->_errors as $error)
      {
        echo "<li>" . htmlspecialchars($error) . "</li>\n";
      }
      echo "</ul></div>\n";
    }
  }

  function raw($html)
  {
    echo $html;
  }


  var $_spec;
  var $_closed;
  var $_errors;
  var $_nextURL;
}


// =======================================================================
// Input decoding
// =======================================================================

class GuppyDecodeHandler
{
  var $commander;

  function setCommander(&$commander)
  {
    $this->commander = &$commander;
  }


  function insertRow(&$event)
  {
  }


  function deleteRow(&$event)
  {
  }


  function button(&$event)
  {
  }


  function action(&$event)
  {
  }


  function clickHeader(&$event)
  {
  }


  function menuAction(&$event)
  {
  }


  function treeNewItem(&$event)
  {
      // No authorization - someone else must do this!

    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    $record = $event['data'][$componentName]['record'];
    
    $this->commander->treeNewItem($componentName, $rowIndex, $record);
  }


  function treeAddItem(&$event)
  {
      // No authorization - someone else must do this!

    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    $record = $event['data'][$componentName]['record'];
    
    $this->commander->treeAddItem($componentName, $rowIndex, $record, false);
  }


  function treeAddSubItem(&$event)
  {
      // No authorization - someone else must do this!

    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    $record = $event['data'][$componentName]['record'];
    
    $this->commander->treeAddItem($componentName, $rowIndex, $record, true);
  }


  function treeChangeItem(&$event)
  {
      // No authorization - someone else must do this!
    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    $record = $event['data'][$componentName]['record'];

    $this->commander->treeChangeItem($componentName, $rowIndex, $record);
  }


  function treeMoveUp(&$event)
  {
      // No authorization - someone else must do this!
    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    
    $this->commander->treeMoveUp($componentName, $rowIndex);
  }


  function treeMoveDown(&$event)
  {
      // No authorization - someone else must do this!
    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    
    $this->commander->treeMoveDown($componentName, $rowIndex);
  }


  function treeIndent(&$event)
  {
      // No authorization - someone else must do this!
    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    
    $this->commander->treeIndent($componentName, $rowIndex);
  }


  function treeUndent(&$event)
  {
      // No authorization - someone else must do this!

    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    
    $this->commander->treeUndent($componentName, $rowIndex);
  }


  function treeDelete(&$event)
  {
      // No authorization - someone else must do this!

    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    
    $this->commander->treeDelete($componentName, $rowIndex);
  }


  function treeDeleteRecursive(&$event)
  {
      // No authorization - someone else must do this!

    $componentName = $event['action']['component'];
    $rowIndex = $event['action']['rowIndex'];
    
    $this->commander->treeDeleteRecursive($componentName, $rowIndex);
  }
}


function guppy_decode($decodeHandler)
{
  //echo "<pre>"; print_r($_POST); echo "</pre>\n"; exit(0);

  guppy_beginOutput();

  if (!isset($_POST[':guppyWindow:']))
    return false;

  $windowID = $_POST['windowID'];
  $windowKey = null;

    // Get window data from session
  $windowData = guppy_getWindowData($windowID, $windowKey);
  if ($windowData === false)
  {
    guppy_generateError('guppy_decode', guppy_unknownWindowError());
    return true;
  }

    // Verify that window data is valid
  $postedWindowKey = $_POST['windowKey'];
  if ($postedWindowKey != $windowKey)
  {
    guppy_generateError(null, guppy_unknownWindowError());
    return true;
  }

  //echo "<pre>"; print_r($windowData); echo "</pre>\n"; exit(0);

  $commander = new GuppyCommandBuilder($windowData['spec']['components']);

  $action = guppy_decodeAction($windowData['toolbar']['menuMapping'], $windowData['spec']['components']);
  //echo "<pre>"; print_r($action); echo "</pre>\n"; //exit(0);
  //echo "<pre>"; print_r($windowData['spec']['components']); echo "</pre>\n"; exit(0);
  //echo "<pre>"; print_r($windowData['data']); echo "</pre>\n";
  $data = guppy_decodeData($windowData['spec'], $windowData['data'], $commander, $action);
  //echo "<pre>"; print_r($data); echo "</pre>\n"; exit(0);
  //echo "<pre>"; print_r($commander); echo "</pre>\n"; exit(0);

  $commander->setData($data);

  if (!$commander->hasErrors())
  {
    global $guppyParsedLayout;
    $guppyParsedLayout = $windowData['layout'];

    $result = array( 'action' => $action,
                     'data'   => $data,
                     'extra'  => &$windowData['extra']);

    //echo "<pre>"; print_r($result); echo "</pre>"; exit(0);
    $decodeHandler->setCommander($commander);
    dispatchAction($result, $decodeHandler);

    //echo "<pre>"; print_r($result); echo "</pre>"; exit(0);
    //echo "<pre>"; print_r($commander->data); echo "</pre>\n"; exit(0);
  }
  else
    $result = true;

  if ($commander->closed())
  {
    guppy_deleteWindowID($windowID);
    $commander->redirect();
  }
  else
  {
    $windowData['data'] = $commander->data;
    $windowKey = guppy_getNewWindowKey();

    if (isset($windowData['onBeforeRender']))
    {
      $windowData['onBeforeRender']($windowData['spec'], $windowData['layout'], $windowData['data']);
    }

    guppy_dumpHTML($windowID, $windowKey, $windowData['spec'], $windowData['layout']['layout'], 
                   $windowData['toolbar'], $windowData['data'],
                   $commander,
                   array( 'actionURL' => $windowData['actionURL'],
                          'windowID'  => $windowID,
                          'action'    => $action) );

    guppy_setWindowData($windowID, $windowKey, $windowData);
  }

  return $result;
}


function dispatchAction(&$result, $decodeHandler)
{
  $actionKind = $result['action']['kind'];

  switch ($actionKind)
  {
    case 'insertRow':
      $decodeHandler->insertRow($result);
    break;

    case 'deleteRow':
      $decodeHandler->deleteRow($result);
    break;

    case 'button':
      $decodeHandler->button($result);
    break;

    case 'action':
      $decodeHandler->action($result);
    break;

    case 'clickHeader':
      $decodeHandler->clickHeader($result);
    break;

    case 'menuAction':
      $decodeHandler->menuAction($result);
    break;

    case 'treeNewItem':
      $decodeHandler->treeNewItem($result);
    break;

    case 'treeAddItem':
      $decodeHandler->treeAddItem($result);
    break;

    case 'treeAddSubItem':
      $decodeHandler->treeAddSubItem($result);
    break;

    case 'treeChangeItem':
      $decodeHandler->treeChangeItem($result);
    break;

    case 'treeMoveUp':
      $decodeHandler->treeMoveUp($result);
    break;

    case 'treeMoveDown':
      $decodeHandler->treeMoveDown($result);
    break;

    case 'treeIndent':
      $decodeHandler->treeIndent($result);
    break;

    case 'treeUndent':
      $decodeHandler->treeUndent($result);
    break;

    case 'treeDelete':
      $decodeHandler->treeDelete($result);
    break;

    case 'treeDeleteRecursive':
      $decodeHandler->treeDeleteRecursive($result);
    break;  
  }
}


function guppy_decodeData($fullSpec, $oldData, &$commander, $action)
{
  $spec = $fullSpec['components'];

  $data = array();

  foreach ($spec as $componentName => $componentSpec)
  {
    $validate = ($action['kind'] != 'button'  ||  $action['buttonKind'] != 'cancel');

    if ($componentSpec['kind'] == 'card')
    {
      $rows = array( guppy_decodeRecord($componentName, $fullSpec['upload'],  $componentSpec, $oldData[$componentName], 0, $commander, $validate) );

      $data[$componentName] = array_join_merge($oldData[$componentName], array( 'rows' => $rows ));
    }
    else
    if ($componentSpec['kind'] == 'table')
    {
      // Table may be in spec. but not in layout.
      if (isset($_POST["s:$componentName"]))
      {
        $rows = array();
        $rowCount = intval($_POST["s:$componentName"]);

        for ($rowIndex=0; $rowIndex<$rowCount; ++$rowIndex)
        {
          $rows[] = guppy_decodeRecord($componentName, $fullSpec['upload'], $componentSpec, $oldData[$componentName], $rowIndex, $commander, $validate);
        }

        $data[$componentName] = array_join_merge($oldData[$componentName], array( 'rows' => $rows ));
      }
    }
    else
    if ($componentSpec['kind'] == 'tree')
    {
      $action = $_POST['action'];
      $validate = (    $action == 'treeNewItem'  ||  $action == 'treeAddItem'
                   ||  $action == 'treeAddSubItem'  ||  $action == 'treeChangeItem');

      $record = guppy_decodeRecord($componentName, $fullSpec['upload'], $componentSpec, $oldData[$componentName], 0, $commander, $validate);

      if ($action == 'treeChangeItem')
      {
        $rowIndex = intval($_POST['rowIndex']);
        $record = $record + $oldData[$componentName]['rows'][$rowIndex];
      }

      $data[$componentName] = array('rows' => $oldData[$componentName]['rows'], 'record' => $record);
    }
  }

  return $data;
}


function guppy_decodeRecord(&$componentName, &$uploadSpec, &$componentSpec, &$oldData, $rowIndex, &$commander, $doValidate)
{
  $record = array();

  //echo "<pre>"; var_dump($oldData); echo "</pre>\n"; exit(0);

  foreach ($componentSpec['fields'] as $field)
  {
    $inUse = guppy_fetchAttribute($field, 'inUse', false);
    $readonly = guppy_fetchAttribute($field, 'readonly', false);
    if ($inUse  &&  !$readonly)
    {
      $fieldName  = $field['name'];
      $fieldTitle = isset($field['title']) ? $field['title'] : $fieldName;
      $fieldType  = $field['type'];
      $mandatory  = $field['mandatory'];
      $formName   = "f:$componentName:$fieldName:$rowIndex";

      $insertFieldData = true;

      if ($fieldType == 'bool')
      {
        $fieldDataRaw = isset($_POST[$formName]) ? 1 : 0;
      }
      else
      if ($fieldType == 'radio')
      {
        $formName = "f:$componentName:$fieldName";
        $fieldDataRaw = ($_POST[$formName] == $rowIndex ? true : false);
      }
      else
      if ($fieldType == 'select')
      {
        $selectIndex = intval($_POST[$formName]);
        $size = count($field['options']);

        if ($selectIndex > 0  &&  $selectIndex < $size)
        {
          $fieldDataRaw = $field['options'][$selectIndex]['value'];
        }
        else
        {
          $fieldDataRaw = NULL;

          if ($mandatory  &&  $doValidate)
            $commander->errorMessage(_GUPPYMISSINGMANDATORY . ': ' . guppy_Translate($fieldTitle));
        }
      }
      else
      if ($fieldType == 'upload')
      {
        $uploadInfo = $_FILES[$formName];

        if (isset($_POST[$formName.'-del']))
        {
          $fieldDataRaw = 'delete';
        }
        else if (isset($uploadInfo['error'])  &&  $uploadInfo['error'] != 0  &&  $uploadInfo['error'] != UPLOAD_ERR_NO_FILE)
        {
          $commander->errorMessage(guppyUploadErrorMsg($uploadInfo[error]) . ': ' . guppy_Translate($fieldTitle));
          $fieldDataRaw = null;
        }
        else if ($mandatory  &&  $doValidate  &&  $uploadInfo['name'] == ''  &&  $oldData['rows'][0][$fieldName] == null)
        {
          $commander->errorMessage(_GUPPYMISSINGMANDATORY. ': ' . guppy_Translate($fieldTitle));
          $fieldDataRaw = null;
        }
        else if ($uploadInfo['name'] != ''  &&  is_uploaded_file($uploadInfo['tmp_name']))
        {
          $fieldDataRaw = guppyHandleUpload($uploadSpec, $fieldName, $uploadInfo, $commander);
        }
        else
          $insertFieldData = false;
      }
      else if ($fieldType == 'int'  ||  $fieldType == 'real'  ||  $fieldType == 'date'  
               ||  $fieldType == 'time'  ||  $fieldType == 'string'
               ||  $fieldType == 'image')
      {
        $fieldDataRaw = $_POST[$formName];

        if ($mandatory  &&  $fieldDataRaw == ''  &&  $doValidate)
          $commander->errorMessage(_GUPPYMISSINGMANDATORY. ': ' . guppy_Translate($fieldTitle));
        else
        if ($fieldDataRaw == '')
        {
          $fieldDataRaw = null;
        }
        else
        {
            // If magic quotes are on then all query/post variables are escaped - so strip slashes
          if (get_magic_quotes_gpc())
            $fieldDataRaw = stripslashes($fieldDataRaw);

          if ($doValidate)
            guppy_validateField($fieldDataRaw, $fieldTitle, $fieldType, $commander);
        }
      }
      else // plugin
      {
        $plugin = & guppy_getPluginInstance($formName, $fieldType);
        
        $fieldDataRaw = $plugin->decode();

        if ($doValidate)
        {
          $validated = $plugin->validate();
        
          if (!$validated)
          {
            $errorMessage = $plugin->getErrorMessage();
            $commander->errorMessage($errorMessage . ': ' . guppy_Translate($fieldTitle));
          }
        }
      }

      if ($insertFieldData)
        $record[$fieldName] = $fieldDataRaw;
    }
  }

  //echo "<pre>"; var_dump($record); echo "</pre>\n";
  return $record;
}


function guppyHandleUpload($uploadSpec, $fieldName, $uploadInfo, &$commander)
{
  $uploadFilename = $uploadSpec['path'] . pnVarPrepForOS($fieldName);

  if (!move_uploaded_file($uploadInfo['tmp_name'], $uploadFilename))
  {
    $commander->errorMessage(_GUPPYUPLOADMOVEFAILED . $uploadFilename);
    return false;
  }

  $uploadInfo['type'] = preg_replace('/[^a-zA-Z0-9.,\/\-+_]/i', '', $uploadInfo['type']);
  $uploadInfo['name'] = preg_replace('/[^a-zA-Z0-9.,\/\-+_]/i', '', $uploadInfo['name']);

  $uploadInfo['guppy_path'] = $uploadFilename;

  return $uploadInfo;
}


function guppy_validateField($fieldDataRaw, $fieldTitle, $fieldType, &$commander)
{
  if ($fieldType == 'int')
  {
    if (!str_is_int($fieldDataRaw))
      $commander->errorMessage(_GUPPYINVALIDINT . ': ' . guppy_Translate($fieldTitle));
  }
  else if ($fieldType == 'real')
  {
    if (!is_numeric($fieldDataRaw))
      $commander->errorMessage(_GUPPYINVALIDREAL . ': ' . guppy_Translate($fieldTitle));
  }
  else if ($fieldType == 'date')
  {
    list ($year,$month,$day) = split('-', $fieldDataRaw);

    if (!checkdate($month,$day,$year))
      $commander->errorMessage(_GUPPYINVALIDDATE . ': ' . guppy_Translate($fieldTitle));
  }
  else if ($fieldType == 'time')
  {
    list ($hour,$min,$sec) = split(':', $fieldDataRaw);

    if ($hour < 0  ||  $hour > 23  ||  $min < 0  ||  $min > 59  ||  $sec < 0  ||  $sec > 59)
      $commander->errorMessage(_GUPPYINVALIDTIME . ': ' . guppy_Translate($fieldTitle));
  }
}


function str_is_int($str) 
{
  $var = intval($str);
  return ("$str" == "$var");
}


function guppy_decodeAction($menuMapping, &$componentSpecs)
{
  $action     = $_POST['action'];
  $component  = $_POST['component'];
  $rowIndex   = intval($_POST['rowIndex']);

  if ($action == 'insertRow'  ||  $action == 'deleteRow')
  {
    return array( 'kind'      => $action,
                  'component' => $component,
                  'rowIndex'  => $rowIndex );
  }
  else
  if ($action == 'button')
  {
    $button = $_POST['param1'];
    $buttonKind = $componentSpecs[$component]['actions'][$button]['kind'];

    return array( 'kind'       => $action,
                  'component'  => $component,
                  'button'     => $button,
                  'buttonKind' => $buttonKind );
  }
  else
  if ($action == 'action')
  {
    return array( 'kind'      => $action,
                  'component' => $component,
                  'rowIndex'  => $rowIndex,
                  'action'    => $_POST['param1'] );
  }
  else
  if ($action == 'clickHeader')
  {
    return array( 'kind'      => $action,
                  'component' => $component,
                  'column'    => $_POST['param1'] );
  }
  else
  if ($action == 'menuAction')
  {
    return array( 'kind'      => $action,
                  'action'    => $menuMapping["$component:$rowIndex"] );
  }
  else
  if (   $action == 'treeNewItem'  || $action == 'treeChangeItem'  || $action == 'treeAddItem'  ||  $action == 'treeAddSubItem'
      || $action == 'treeMoveUp' ||  $action == 'treeMoveDown'  || $action == 'treeIndent' ||  $action == 'treeUndent'  
      || $action == 'treeDelete'  ||  $action == 'treeDeleteRecursive' || $action == 'treeInsert'  ||  $action == 'treeAdd'  
      ||  $action == 'treeAddSub'  ||  $action == 'treeEdit')
  {
    return array( 'kind'      => $action,
                  'component' => $component,
                  'rowIndex'  => $rowIndex );
  }

  return array( 'kind' => 'unknown' );
}



// =======================================================================
// Various OnXxx generators
// =======================================================================

function guppy_invokeEvent($eventName, &$args)
{
  // FIXME: not perfect, needs some rethinking

  $windowID = $_POST['windowID'];
  $windowKey = null;

    // Get window data from session
  $windowData = guppy_getWindowData($windowID, $windowKey);

  guppy_executeEvent($windowData['spec'], $eventName, $args);
}


function guppy_executeEvent(&$fullSpec, $eventName, &$args)
{
  // echo "EVENT $eventName. ";
  $spec = $fullSpec['components'];

  foreach ($spec as $componentName => $componentSpec)
  {
    if ($componentSpec['kind'] == 'card')
    {
      guppy_executeComponentEvent($componentName, $componentSpec, 0, $eventName, $args); //FIXME
    }
    else
    if ($componentSpec['kind'] == 'table')
    {
      $rowCount = 1; // FIXME - one call for each row?

      for ($rowIndex=0; $rowIndex<$rowCount; ++$rowIndex)
      {
        guppy_executeComponentEvent($componentName, $componentSpec, $rowIndex, $eventName, $args); // FIXME
      }
    }
    else
    if ($componentSpec['kind'] == 'tree')
    {
      guppy_executeComponentEvent($componentName, $componentSpec, 0, $eventName, $args); // FIXME
    }
  }
}


function guppy_executeComponentEvent(&$componentName, &$componentSpec, $rowIndex, $eventName, &$args)
{
  //echo "<pre>"; var_dump($componentSpec); echo "</pre>\n";

  foreach ($componentSpec['fields'] as $field)
  {
    if (isset($field['inUse'])  &&  $field['inUse'])
    {
      $fieldName  = $field['name'];
      $fieldType  = $field['type'];
      $formName   = "f:$componentName:$fieldName:$rowIndex";

      if (    $fieldType == 'bool' || $fieldType == 'radio' || $fieldType == 'select' || $fieldType == 'upload'
          ||  $fieldType == 'int'  ||  $fieldType == 'real'  ||  $fieldType == 'date'  
          ||  $fieldType == 'time'  ||  $fieldType == 'string'
          ||  $fieldType == 'image')
      {
        /* Ignore */
      }
      else // plugin
      {
        $plugin = & guppy_getPluginInstance($formName, $fieldType);
        $plugin->typeData = isset($field['typeData']) ? $field['typeData'] : null;

        if (method_exists($plugin,$eventName))
        {
          call_user_func(array(&$plugin, $eventName), $args);
        }
      }
    }
  }
}

function guppy_executeFieldTypeEvent ($ftid, $fieldType, $eventName, &$args)
{
  $fieldName  = $args['name'];
  $formName   = "f:$fieldName:$ftid";

  if (!is_numeric($fieldType))
  {
    $plugin = & guppy_getPluginInstance($formName, $fieldType);

    if (method_exists($plugin,$eventName))
    {
      $plugin->{$eventName}($ftid, $args);
      // echo "<pre>$eventName: "; print_r($args);echo"</pre>";
    }
  }
}

// =======================================================================
// Handling of plugin filter methods
// =======================================================================

function guppy_usePluginFilter ($ftid, $fieldDef)
{
  $fieldName  = $fieldDef['name'];
  $fieldType = $fieldDef['type'];
  $formName   = "f:$fieldName:$ftid";

  if (!is_numeric($fieldType))
  {
    $plugin = & guppy_getPluginInstance($formName, $fieldType);

    if (method_exists($plugin,'useFilterHandler'))
    {
      return $plugin->{'useFilterHandler'}();
      // echo "<pre>$eventName: "; print_r($args);echo"</pre>";
    }
  }
  return false;
}	

function guppy_getPluginFilterSQL ($fieldDef, $operator, $value, $tableName, &$tableColumns)
{
  $ftid = $fieldDef['id'];
  $fieldName  = $fieldDef['name'];
  $fieldType = $fieldDef['type'];
  $typeData = $fieldDef['typeData'];
  $formName   = "f:$fieldName:$ftid";

  if (!is_numeric($fieldType))
  {
    $plugin = & guppy_getPluginInstance($formName, $fieldType);
    $plugin->name = $fieldName;
    $plugin->typeData = $typeData;

    if (method_exists($plugin,'getFilterSQL'))
    {
      return $plugin->{'getFilterSQL'}($operator, $value, $tableName, $tableColumns);
      // echo "<pre>$eventName: "; print_r($args);echo"</pre>";
    }
  }
  return false;
}
	
// =======================================================================
// Output generation
// =======================================================================

function guppy_open($args)
{
  guppy_beginOutput();

    // Get specification as string
  $spec = null;
  if (isset($args['specFile']))
  {
    if (($spec=guppy_loadfile('guppy_open', $args['specFile'])) === false)
      return false;
  }
  else if (isset($args['spec']))
  {
    $spec = $args['spec'];
  }
  else if (isset($args['rawSpec']))
  {
    $rawSpec = $args['rawSpec'];
  }
  else
    return guppy_generateError('guppy_open', "Missing 'spec', 'rawSpec' or 'specFile' setting");

    // Get layout as string
  $layout = null;
  if (isset($args['layoutFile']))
  {
    if (($layout=guppy_loadfile('guppy_open', $args['layoutFile'])) === false)
      return false;
  }
  else if (isset($args['layout']))
  {
    $layout = $args['layout'];
  }
  else if (isset($args['rawLayout']))
  {
    $rawLayout = $args['rawLayout'];
  }
  else
    return guppy_generateError('guppy_open', "Missing 'layout', 'rawLayout' or 'layoutFile' setting");

    // Get toolbar as string
  $toolbar = null;
  if (isset($args['toolbarFile']))
  {
    if (($toolbar=guppy_loadfile('guppy_open', $args['toolbarFile'])) === false)
      return false;
  }
  else if (isset($args['toolbar']))
  {
    $toolbar = $args['toolbar'];
  }
  else if (isset($args['rawToolbar']))
  {
    $rawToolbar = $args['rawToolbar'];
  }
  else
    $rawToolbar = null;

    // Get data
  if (isset($args['data']))
  {
    $data = $args['data'];
  }
  else
    return guppy_generateError('guppy_open', "Missing 'data' value");

  $extra = guppy_fetchAttribute($args, 'extra');

    // Get form action
  if (isset($args['actionURL']))
  {
    $actionURL = $args['actionURL'];
  }
  else
    return guppy_generateError('guppy_open', "Missing 'actionURL' value");

    // Dynamically load the parser functions for spec and layout
  require_once 'modules/pagesetter/guppy/guppy_parser.php';

    // Parse the spec and layout - if supplied as XML data
  if ($spec)
  {
    guppy_parseXMLSpec($spec, guppy_fetchAttribute($args, 'options', array()));
    global $guppyParsedSpec;
    $spec = &$guppyParsedSpec;  // Must be copy by reference
  }
  else
    $spec = $rawSpec;

  if (isset($layout))
    $layout = guppy_parseXMLLayout($layout);
  else
    $layout = $rawLayout;

  if ($toolbar)
    $toolbar = guppy_parseXMLToolbar($toolbar);
  else
    $toolbar = $rawToolbar;

  //print_r($spec); print_r($data);
  guppy_initializeData($spec, $data);
  //print_r($spec); print_r($data);

  if (isset($args['onBeforeRender']))
  {
    $args['onBeforeRender']($spec, $layout, $data);
  }

  $windowID = guppy_getNewWindowID();
  $windowKey = guppy_getNewWindowKey();


  if (isset($args['editorsetup']))
    echo "<script src=\"$args[editorsetup]\" type=\"text/javascript\"></script>\n";

  guppy_dumpHTML($windowID, $windowKey, $spec, $layout['layout'], $toolbar, $data,
                 null,
                 array( 'actionURL' => $actionURL,
                        'windowID'  => $windowID,
                        'action'    => array() ) );

  $windowData = array( 'spec'           => $spec,
                       'layout'         => $layout,
                       'toolbar'        => $toolbar,
                       'data'           => $data,
                       'extra'          => $extra,
                       'actionURL'      => $actionURL,
                       'onBeforeRender' => guppy_fetchAttribute($args, 'onBeforeRender'));

  guppy_setWindowData($windowID, $windowKey, $windowData);
}


function guppy_initializeData(&$spec, &$data)
{
  foreach ($spec['components'] as $componentName => $componentSpec)
  {
    if (isset($data[$componentName]['actions']))
      $actionsData = &$data[$componentName]['actions'];
    else
      $actionsData = array();

    foreach ($componentSpec['actions'] as $actionName => $actionSpec)
    {
        // All actions enabled initially unless otherwised specified
      if (!array_key_exists($actionName, $actionsData)  ||  $actionsData[$actionName] !== false)
        $actionsData[$actionName] = true;
    }

    $data[$componentName]['actions'] = $actionsData;

    $hasUpload = false;
    foreach ($componentSpec['fields'] as $fieldName => $fieldSpec)
    {
      if ($fieldSpec['type'] == 'upload')
        $hasUpload = true;
    }
  }


  $uploadPrefix = 'tmp' . rand(100000,999999);
  $uploadPath   = guppy_getUploadDir() . '/' . $uploadPrefix . '.';
  $spec['upload'] = array( 'enabled' => $hasUpload,
                           'path'    => $uploadPath );

  if ($hasUpload)
    guppy_removeOrphanedUploads();
}


function guppy_removeOrphanedUploads()
{
  $dirPath = guppy_getUploadDir();

  $t = time();

  // Iterate through all uploads and remove temporary files older then X seconds.

  if ($dh = opendir($dirPath))
  {
    while (($file = readdir($dh)) !== false)
    { 
      // Temporary file?
      if (substr($file,0,3) == 'tmp')
      {
        $filename = $dirPath . '/' . $file;
        $ftime = filemtime($filename);

        // Old file?
        if ($t - $ftime > 3600)
        {
          unlink($filename);
        }
      }
    } 
    closedir($dh); 
  }
}


function guppy_dumpHTML($windowID, $windowKey, $spec, $layout, &$toolbar, $data, $commander, $pageInfo)
{
  global $guppyBaseURL;

  if ($spec['upload']['enabled'])
    $encoding = ' enctype="multipart/form-data"';
  else
    $encoding = '';

  echo "\n<script src=\"$guppyBaseURL/guppy.js\" type=\"text/javascript\"></script>\n";
// start scribite!
//  echo "<form onsubmit=\"alert('A  '+this['f:pubedit:text:0'].value);\" action=\"" . htmlspecialchars($pageInfo['actionURL']) . "\" method=\"post\" id=\"guppyForm\"$encoding>\n";
  echo "<form action=\"" . htmlspecialchars($pageInfo['actionURL']) . "\" method=\"post\" id=\"guppyForm\"$encoding>\n";
// end scribite!
  echo "<input type=\"hidden\" name=\":guppyWindow:\" value=\"1\"/>\n";
  echo "<input type=\"hidden\" name=\"windowID\" value=\"$windowID\"/>\n";
  echo "<input type=\"hidden\" name=\"windowKey\" value=\"" . $windowKey . "\"/>\n";
  echo "<input type=\"hidden\" name=\"action\" value=\"\"/>\n";
  echo "<input type=\"hidden\" name=\"component\" value=\"\"/>\n";
  echo "<input type=\"hidden\" name=\"rowIndex\" value=\"\"/>\n";
  echo "<input type=\"hidden\" name=\"param1\" value=\"\"/>\n";

  echo "<div class=\"guppy\">\n";
  if ($toolbar != null)
  {
    $toolbar['menuMapping'] = array();
    guppy_buildToolbar($spec, $toolbar, $toolbar['menuMapping']);
  }

  if ($commander != null && $commander->hasErrors())
    $commander->generateErrors();

  guppy_buildLayout($spec, $layout, $data, $pageInfo);
  echo "</div>\n";
  echo "</form>\n";

  guppy_dumpPageBlocks();
}


function &guppy_getLayoutElement($id)
{
  global $guppyParsedLayout;
  return $guppyParsedLayout['idmapping'][$id];
}


/*========================================================================
  Output generator
========================================================================*/

function guppy_buildToolbar($spec, $toolbar, &$menuMapping)
{
  //echo "<pre>"; print_r($spec); echo "</pre>"; exit(0);
  //echo "B<pre>"; print_r($toolbar); echo "</pre>\n"; exit(0);

    // Make sure menu code is included
  global $guppyBaseURL;
  echo "<script src=\"$guppyBaseURL/psmenu.js\" type=\"text/javascript\"></script>\n";

  if (count($toolbar['menu']) > 0)
  {
    echo "<div class=\"guppy-toolbar\">\n";
    echo "<table class=\"menu\" summary=\"\"><tr>";
    $id = 0;
    foreach ($toolbar['menu'] as $menu)
    {
      $title = guppy_translate($menu['title']);

      echo "<td class=\"normal\" onMouseOver=\"menuTopMouseOver(this)\" onMouseOut=\"menuTopMouseOut(this)\" onMouseDown=\"mainmenu.popup(this,event,'$id')\">$title</td>\n";

      ++$id;
    }

    echo "</tr></table>\n";
    echo "</div>\n";

    $id = 0;
    foreach ($toolbar['menu'] as $menu)
    {
      $subMenu = $menu['subMenu'];

      guppy_buildMenuList($subMenu, $id, $menuMapping);

      ++$id;
    }
  }
}


function guppy_buildMenuList($menu, $id, &$menuMapping)
{
    // Menu HTML setup
  echo "<div class=\"psmenu\" id=\"menu-$id\" onmouseout=\"psmenu.onMouseOutDiv(this)\">\n<table summary=\"\">\n";

  $index = 0;
  foreach ($menu as $menuItem)
  {
    $title = guppy_translate($menuItem['title']);

    echo "<tr class=\"psmenu-menuItem\" onmouseover=\"psmenu.onMouseOver(this)\" onmouseout=\"psmenu.onMouseOut(this)\""
         . " onmousedown=\"psmenu.onMouseDown(this)\">\n"
         . "<td class=\"psmenu-title\">$title</td>\n"
         . "</tr>\n";

    $menuMapping["menu-$id:$index"] = $menuItem['action'];
    ++$index;
  }

    // End menu HTML
  echo "</table>\n</div>\n";
}


function guppy_buildLayout($spec, $layout, $data, $pageInfo)
{
  //echo "<pre>"; print_r($spec); echo "</pre><br><pre>"; print_r($layout); echo "</pre>\n"; exit(0);

  echo "\n<table class=\"guppy-pane\" summary=\"\">\n";
  
  foreach ($layout as $row)
  {
    guppy_buildRow($spec, $row, $data, 0, $pageInfo);
  }

  echo "</table>\n";
}


function guppy_buildRow($spec, $row, $data, $rowIndex, $pageInfo)
{
  echo "<tr>\n";
  
  foreach ($row as $element)
  {
    guppy_buildElement($spec, $element, $data, $rowIndex, $pageInfo, false /* not inTable */);
  }

  echo "</tr>\n";
}


function guppy_buildElement($spec, $element, $data, $rowIndex, $pageInfo, $inTable)
{
  $kind = $element['kind'];

  switch ($kind)
  {
    case 'component':
      $ok = guppy_buildComponent($spec, $element, $data, $pageInfo); 
    break;

    case 'island':
      $ok = guppy_buildIsland($spec, $element, $data, $pageInfo); 
    break;

    case 'cell':
      $ok = guppy_buildCell($spec, $element, $data, $pageInfo); 
    break;

    case 'title':
      $ok = guppy_buildTitle($spec, $element, $data); 
    break;

    case 'text':
      $ok = guppy_buildText($spec, $element, $data); 
    break;

    case 'input':
      $ok = guppy_buildField($spec, $element, $data, $rowIndex, $inTable); 
    break;

    case 'action':
      $ok = guppy_buildAction($spec, $element, $data, $rowIndex); 
    break;

    case 'raw':
      $ok = guppy_buildRaw($spec, $element, $data, $rowIndex); 
    break;

    /* Unused
    case 'treeParent':
      $ok = guppy_buildTreeParent($pageInfo); 
    break;
    */
    default:
      return guppy_generateError('element', "unknown element kind '$kind'");
    break;
  }

  return $ok;
}


function guppy_startTableCell($element, $fieldSpec, $inTable)
{
  $attribs = "";
  if (isset($element['colspan']))
    $attribs .= " colspan=\"$element[colspan]\"";

  if ($inTable  &&  ($fieldSpec['type'] == 'bool'  ||  $fieldSpec['type'] == 'radio'))
    $attribs .= " align=\"center\"";
  
  echo "<td$attribs>";
}


function guppy_endTableCell($element, $fieldSpec)
{
  echo "</td>\n";
}


function guppy_buildComponent($spec, $component, $data, $pageInfo)
{
    // Check existence of component name and get it
  if (!isset($component['name']))
    return guppy_generateError("component", "missing component name");
  $componentName = $component['name'];

    // Check existence of component spec and get it
  if (!isset($spec['components'][$componentName]))
    return guppy_generateError("component $componentName", "unknown component");
  $componentSpec = $spec['components'][$componentName];

    // Check existence of component kind and get it
  if (!isset($componentSpec['kind']))
    return guppy_generateError("component $componentName", "missing component kind");
  $componentKind = $componentSpec['kind'];

    // Check existence of component title and get it
  $componentTitle = $componentSpec['title'];
  if ($component['title'] != '')
    $componentTitle = $component['title'];
  if ($componentTitle == '')
    return guppy_generateError("component $componentName", "missing component title");
  $componentTitle = guppy_translate($componentTitle);

    // Check existence of layout and get it
  if (!isset($component['layout']))
    return guppy_generateError("component $componentName", "missing component layout");
  $componentLayout  = $component['layout'];

    // Check existence of component data and get it
  if (!isset($data[$componentName]))
     return guppy_generateError("component $componentName", "missing component data");
  $componentData = $data[$componentName];

  if (!isset($componentData['rows']))
     return guppy_generateError("component $componentName", "missing component data rows");
  $componentDataRows = $componentData['rows'];

  guppy_startTableCell($component, array(), false);

  echo "<div class=\"component\" id=\"$componentName\">\n";

    // Print component title
  echo "<div class=\"header\"><table class=\"ctab\" summary=\"\"><tr><td class=\"ctab1\"> </td><td class=\"ctab2\">\n";
  echo htmlspecialchars($componentTitle);
  echo "</td><td class=\"ctab3\"> </td><td class=\"ctab4\"></td></tr></table></div>\n";

    // Add top buttons
  guppy_buildButtons($componentName, $componentSpec['actions'], $component['buttonsTop'], $componentData);

    // Insert component pane (main input area)

  $class = ($componentKind == 'table' ? ' grid' : '');

  echo "<div class=\"content$class\">\n";

  if ($componentKind == 'card')
  {
    if (!count($componentDataRows) == 1)
       return guppy_generateError("component $componentName", "component data does not have exactly one row");
    $recordData = $data[$componentName]['rows'][0];

    echo "<div class=\"card\">\n";
    $ok = guppy_buildLayout($componentSpec, $componentLayout, $recordData, $pageInfo);
    echo "</div>\n";
  }
  else if ($componentKind == 'table')
  {
    $ok = guppy_buildTable($componentSpec, $componentLayout, $componentData, $pageInfo);
  }
  else if ($componentKind == 'tree')
  {
    $ok = guppy_buildTree($componentSpec, $componentLayout, $componentDataRows, $pageInfo);
  }
  else
     return guppy_generateError("component $componentName", "unknown component kind '$componentKind'");
  echo "</div>\n";

    // Add bottom buttons
  guppy_buildButtons($componentName, $componentSpec['actions'], $component['buttonsBottom'], $componentData);

  echo "</div>\n";

  guppy_endTableCell($component, array());

  return $ok;
}



function guppy_buildTable($componentSpec, $componentLayout, $componentData, $pageInfo)
{
  global $guppyThemeURL;

  $componentDataRows = $componentData['rows'];

  $insertIconHTML = "<img class=\"clickable\" src=\"$guppyThemeURL/insert.gif\" onClick=\"handleOnClickInsertRow(this)\">";
  $deleteIconHTML = "<img class=\"clickable\" src=\"$guppyThemeURL/delete.gif\" onClick=\"handleOnClickDeleteRow(this)\">";

  $useInsertRow = $componentSpec['rowOperations']['insert'];
  $useDeleteRow = $componentSpec['rowOperations']['delete'];

  $componentName = $componentSpec['name'];

    // Setup insert/delete confirmation handlers
  echo "<script>\n";
  echo "var confirmInsert" . $componentName . " = \""
       . (isset($componentSpec['rowOperations']['insertConfirm'])
          ? addcslashes(guppy_translate($componentSpec['rowOperations']['insertConfirm']), "\0..\37\"")
          : "") 
       . "\";\n";
  echo "var confirmDelete" . $componentName . " = \""
       . (isset($componentSpec['rowOperations']['deleteConfirm'])
          ? addcslashes(guppy_translate($componentSpec['rowOperations']['deleteConfirm']), "\0..\37\"")
          : "") 
       . "\";\n";
  echo "</script>\n";

  echo "<input type=\"hidden\" name=\"s:$componentSpec[name]\" value=\"" . count($componentDataRows) . "\"/>\n";
  echo "<table class=\"grid\" summary=\"\">\n";

    // Create headings
  echo "<tr>\n";
  if ($useInsertRow)
    echo "<th>$insertIconHTML</th>\n";
  if ($useDeleteRow)
    echo "<th></th>"; 
  foreach ($componentLayout as $field)
  {
    $fieldKind = $field['kind'];
    $fieldName = $field['name'];
    
    $enabled = true;

    if ($fieldKind == 'input')
    {
      if (!isset($componentSpec['fields'][$fieldName]))
        return guppy_generateError("$componentSpec[name]", "Unknown field '$fieldName'");
      $fieldSpec = $componentSpec['fields'][$fieldName];
      $fieldTitle = (isset($field['title']) ? $field['title'] : $fieldSpec['title']);
    }
    else
    {
      if (!isset($componentSpec['actions'][$fieldName]))
        return guppy_generateError("$componentSpec[name]", "Unknown action '$fieldName'");

      $enabled = isset($componentData['actions'][$fieldName]) ? $componentData['actions'][$fieldName] : true;

      $actionSpec = $componentSpec['actions'][$fieldName];
      $fieldTitle = (isset($field['title']) ? $field['title'] : $actionSpec['title']);
    }

    if ($enabled)
    {
      $fieldTitle = guppy_translate($fieldTitle);
      
      $style = "";

      if (isset($field['width']))
        $style = "width: $field[width];";

      if ($style != "")
        $style = " style=\"$style\"";

      if ($componentSpec['clickOnHeaders']  &&  $fieldKind == 'input')
        $fieldTitle = "<span onClick=\"handlOnClickHeader('$fieldName','$componentName')\" class=\"clickable action\">"
                      . htmlspecialchars($fieldTitle) . "</span>";
      
      echo "<th$style>$fieldTitle</th>";
    }
  }
  echo "\n</tr>\n";

    // If this table uses lineno control then sort the data by lineno before showing
    // (could also have assumed this was done by caller - don't really know what is best)
  if ($componentSpec['lineno'])
    usort($componentDataRows, "guppy_tableLinenoCmp");

    // Create the rows
  $rowIndex = 0;
  foreach ($componentDataRows as $record)
  {
    echo "<tr>\n";

      // Add ins/del icons
    if ($useInsertRow)
      echo "<td>$insertIconHTML</td>\n";
    if ($useDeleteRow)
      echo "<td>$deleteIconHTML</td>\n";

    foreach ($componentLayout as $field)
    {
      $fieldKind = $field['kind'];
      $fieldName = $field['name'];
      
      $enabled = true;
      if ($fieldKind == 'action')
        $enabled = isset($componentData['actions'][$fieldName]) ? $componentData['actions'][$fieldName] : true;

      if ($enabled)
        guppy_buildElement($componentSpec, $field, $record, $rowIndex, $pageInfo, true /* in table*/);
    }
    echo "</tr>\n";

    ++$rowIndex;
  }

  echo "</table>\n";
}


function pagesetterGetTreeMenu()
{
  global $guppyThemeURL;

    // Must match menu sequence in guppy.js
  $menu = array( array( 'title' => _GUPPYEDIT,            'image' => 'edit.gif'  ), 
                 array( 'title' => _GUPPYADD,             'image' => 'treeadd.gif' ), 
                 array( 'title' => _GUPPYADDTREESUBITEM,  'image' => 'treeaddsubitem.gif' ), 
                 array( 'title' => _GUPPYINSERT,          'image' => 'treeinsert.gif' ), 
                 array( 'title' => _GUPPYDELETE,          'image' => 'delete.gif' ), 
                 array( 'title' => _GUPPYMOVEUP,          'image' => 'moveup.gif' ), 
                 array( 'title' => _GUPPYMOVEDOWN,        'image' => 'movedown.gif' ), 
                 array( 'title' => _GUPPYINDENT,          'image' => 'indent.gif' ), 
                 array( 'title' => _GUPPYUNDENT,          'image' => 'undent.gif' ),
                 array( 'title' => _GUPPYDELETERECURSIVE, 'image' => 'deleteall.gif' ) );
    
    // Menu HTML setup
  $menuHTML = "<div class=\"psmenu\" id=\"psmenu-tree\" onmouseout=\"psmenu.onMouseOutDiv(this)\">\n"
              . "<table summary=\"\">\n";

    // One table row for each menu item
  foreach ($menu as $menuItem)
    $menuHTML .= "<tr class=\"psmenu-menuItem\" onmouseover=\"psmenu.onMouseOver(this)\" onmouseout=\"psmenu.onMouseOut(this)\""
                 . " onmousedown=\"psmenu.onMouseDown(this)\">\n"
                 . "<td class=\"psmenu-icon\"><img src=\"$guppyThemeURL/$menuItem[image]\"></td>"
                 . "<td class=\"psmenu-title\">$menuItem[title]</td>\n"
                 . "</tr>\n";

    // End menu HTML
  $menuHTML .= "</table>\n"
               . "</div>\n";

  return $menuHTML;
}


function guppy_buildTree($componentSpec, $componentLayout, $componentDataRows, $pageInfo)
{
  $componentName = $componentSpec['name'];

  if (!isset($componentSpec['titleField']))
    return guppy_generateError("$componentName", "Missing 'titleField' attribute in tree component layout");
  $titleFieldName = $componentSpec['titleField'];

  if (!isset($componentSpec['fields'][$titleFieldName]))
    return guppy_generateError("$componentName", "Unknown field '$titleFieldName'");

    // Setup
  $actionKind = guppy_fetchAttribute($pageInfo['action'], 'kind');
  if ($actionKind == 'treeEdit')
  {
    $editComponent = $pageInfo['action']['component']; 
    $currentRowIndex = $pageInfo['action']['rowIndex'];
    $legend = _GUPPYEDITTREEITEM;
  }
  else
  if ($actionKind == 'treeInsert')
  {
    $editComponent = null;
    $currentRowIndex = $pageInfo['action']['rowIndex'];
    $legend = _GUPPYINSERTTREEITEM;
  }
  else if ($actionKind == 'treeAdd')
  {
    $editComponent = null;
    $currentRowIndex = $pageInfo['action']['rowIndex'];
    $legend = _GUPPYADDTREEITEM;
  }
  else if ($actionKind == 'treeAddSub')
  {
    $editComponent = null;
    $currentRowIndex = $pageInfo['action']['rowIndex'];
    $legend = _GUPPYADDTREESUBITEM;
  }
  else
  {
    $editComponent = null;
    $currentRowIndex = count($componentDataRows);
    $legend = _GUPPYNEWTREEITEM;
  }

    // Build menu
  echo pagesetterGetTreeMenu();

  echo "<div class=\"tree-component\">\n";

  echo "<table class=\"tree\">\n";

    // Create the tree view
  $rowIndex = 0;

  foreach ($componentDataRows as $record)
  {
    echo "<tr>\n";
    
    $isCurrent = ($rowIndex == $currentRowIndex);
    $id = guppy_fetchAttribute($record, 'id');
    guppy_buildTreeRow($componentName, $record['lineno'], $record['indent'], $id, $record[$titleFieldName], $isCurrent);
    
    echo "</tr>\n";

    ++$rowIndex;
  }

  echo "</table>\n";

    // Make edit area

  echo "<fieldset>";
  echo "<legend>$legend</legend>\n";
  if ($actionKind == 'treeEdit')
  {
    $ok = guppy_buildLayout($componentSpec, $componentLayout, $componentDataRows[$currentRowIndex], $pageInfo);
    $action = 'edit';
  }
  else
  {
    $ok = guppy_buildLayout($componentSpec, $componentLayout, array(), $pageInfo);
  
    if ($actionKind == 'treeAdd')
      $action = 'add';
    else if ($actionKind == 'treeAddSub')
      $action = 'addSub';
    else
      $action = 'new';
  }

  echo "<button type=\"button\" onclick=\"handleOnClickTreeSubmit('$componentName', '$currentRowIndex', '$action')\">" . _GUPPYSUBMIT . "</button>\n";
  echo "<button type=\"button\" onclick=\"handleOnClickTreeCancel()\">" . _GUPPYCANCEL . "</button>\n";
  echo "</fieldset>\n";

    // Make sure focus is set to first field of the edit area
  $titleFieldName = $componentSpec['titleField'];
  $formFieldName = "f:$componentName:$titleFieldName:0";
  echo   "<script>var guppyInitialFocusElement = '$formFieldName';\n"
       . "guppyAddOnLoadEvent(guppyHandleOnLoad);" . "</script>\n";

  echo "</div>\n";
  return $ok;
}


function guppy_buildTreeRow($componentName, $lineno, $indent, $rowID, $title, $isCurrent)
{
  global $guppyThemeURL;

  if ($isCurrent)
  {
    $menuItemHTML = "<img src=\"$guppyThemeURL/menuitem.gif\"\">";
    $classHTML = " class=\"selected\"";
  }
  else
  {
    $menuItemHTML = "<img src=\"$guppyThemeURL/menuitem.gif\"\">";
    $classHTML = "";
  }

  echo "<td$classHTML>";

  echo   "<div class=\"clickable\" style=\"padding-left: " . ($indent*10) . "px;\" "
       . "onmousedown=\"treeMenu.onMouseDown('$componentName', $lineno, event, 'psmenu-tree')\">"
       . "$menuItemHTML $title" . ($rowID ? " ($rowID)" : '') //. " [$lineno,$indent]"
       . "</div>";
  
  echo "</td>\n";
}


function guppy_tableLinenoCmp($a, $b)
{
  if ($a['lineno'] == $b['lineno']) // should not be possible ... but you never know :-)
    return 0;

  if ($a['lineno'] < $b['lineno'])
    return -1;

  return 1;
}


function guppy_buildButtons($componentName, &$actionSpec, &$buttonsLayout, &$componentData)
{
  if (count($buttonsLayout) == 0)
    return;
  
  echo "<div class=\"buttons\">\n";

  foreach ($buttonsLayout as $button)
  {
    if ($button['kind'] == 'button')
      guppy_buildButton($componentName, $actionSpec, $button, $componentData);
    else
      guppy_buildButtonGroup($componentName, $actionSpec, $button, $componentData);
  }

  echo "</div>\n";
}


function guppy_buildButton($componentName, &$actionSpec, &$button, &$componentData)
{
  $buttonName = $button['name'];
  if (!isset($actionSpec[$buttonName]))
    return guppy_generateError("$componentName", "Unknown button '$buttonName'");
  $action = $actionSpec[$buttonName];
  $buttonTitle = (isset($button['title']) ? $button['title'] : $action['title']);
  $buttonTitle = guppy_translate($buttonTitle);
  $buttonHint = (isset($button['hint']) ? $button['hint'] : $action['hint']);
  $buttonHint = guppy_translate($buttonHint);
  $buttonFormName = "b:$componentName:$buttonName";

  if (!$componentData['actions'][$buttonName])
    $disabled = " disabled=\"1\"";
  else
    $disabled = '';

  if (isset($buttonHint))
    $title = " title=\"$buttonHint\"";
  else
    $title = '';

  echo   "<button type=\"button\" name=\"$buttonFormName\" onclick=\"handleOnClickButton('$componentName','$buttonName')\"$disabled$title>"
       . htmlspecialchars($buttonTitle) . "</button>\n";
}


function guppy_buildButtonGroup($componentName, &$actionSpec, &$buttonGroup, &$componentData)
{
  $groupID   = guppy_getElementID();
  $groupTitle = $buttonGroup['title'];
  $groupTitle = guppy_translate($groupTitle);

  echo   "$groupTitle:\n"
       . "<select id=\"$groupID\" onChange=\"handleOnChangeButtonGroup('$groupID')\">\n";

  $initialTitle = null;

  foreach ($buttonGroup['buttons'] as $button)
  {
    $buttonName = $button['name'];
    if (!isset($actionSpec[$buttonName]))
      return guppy_generateError("$componentName", "Unknown button '$buttonName'");

      // Is button enabled?
    if ($componentData['actions'][$buttonName])
    {
      $action = $actionSpec[$buttonName];
      $buttonTitle = (isset($button['title']) ? $button['title'] : $action['title']);
      $buttonTitle = guppy_translate($buttonTitle);

      if (isset($action['hint']))
        $title = " title=\"" . guppy_Translate($action['hint']) . "\"";
      else
        $title = '';

      if ($initialTitle == null)
        $initialTitle = guppy_Translate($action['hint']);

      echo "<option value=\"$buttonName\"$title>" . htmlspecialchars($buttonTitle) . "</option>\n";
    }
  }

  echo  "</select>\n"
      . "<button type=\"button\" id=\"b:$groupID\" onclick=\"handleOnClickButtonGroup('$componentName','$groupID')\" "
      . "title=\"" . htmlspecialchars($initialTitle) . "\">" . _GUPPYACTIONGO . "</button>\n";
}


function guppy_buildIsland($spec, $element, $data, $pageInfo)
{
  guppy_startTableCell($element, array(), false);

  $title = guppy_translate($element['title']);
  echo "<fieldset><legend>" . htmlspecialchars($title) . "</legend>\n<br/>\n";

  guppy_buildLayout($spec, $element['layout'], $data, $pageInfo);

  echo "</fieldset>\n";

  guppy_endTableCell($element, array());
}


function guppy_buildCell($spec, $element, $data, $pageInfo)
{
  guppy_startTableCell($element, array(), false);

  echo "<div class=\"cell\">\n";

  guppy_buildLayout($spec, $element['layout'], $data, $pageInfo);

  echo "</div>\n";

  guppy_endTableCell($element, array());
}


function guppy_buildTitle($componentSpec, $element, $data)
{
    // Check for existence of field name and get it
  if (isset($element['name']))
  {
    $fieldName = $element['name'];

      // Check for existence of field spec in component spec and get it
    if (!isset($componentSpec['fields'][$fieldName]))
      return guppy_generateError("$componentSpec[name]", "undefined field '$fieldName'");
    $fieldSpec = $componentSpec['fields'][$fieldName];
  }

    // Get optional field title (first from layout then from field spec)
  if (isset($element['title']))
    $fieldTitle = $element['title'];
  else if (isset($fieldSpec['title']))
    $fieldTitle = $fieldSpec['title'];
  else
    $fieldTitle = NULL;

    // If a title is assigned then print it together with the field
  guppy_startTableCell($element, array(), false);

  if ($fieldTitle != NULL)
  {
    $fieldTitle = guppy_translate($fieldTitle);
    echo "<span class=\"tl\">" . htmlspecialchars($fieldTitle) . "</span>";
  }

  if (!empty($fieldSpec['hint']))
  {
    global $guppyThemeURL;

    echo "&nbsp;<img src=\"$guppyThemeURL/hint.gif\"title=\"" . guppy_translate($fieldSpec[hint]) . "\" align=\"middle\"/>\n";
  }

  guppy_endTableCell($element, array());

  return true;
}


function guppy_replaceLanguageTags($text)
{
  preg_match_all('/\$(_[a-zA-Z0-9]+)\$/', $text, $matches, PREG_PATTERN_ORDER);

  foreach ($matches[1] as $match)
  {
    $translated = eval("return $match;");
    $text = str_replace("\$$match\$", $translated, $text);
  }

  return $text;
}


function guppy_buildText($componentSpec, $element, $data)
{
  if (array_key_exists('visible',$element) && $element['visible'] === false)
    return true;

  guppy_startTableCell($element, array(), false);

  $text = guppy_replaceLanguageTags($element['text']);
  echo $text;

  guppy_endTableCell($element, array());

  return true;
}


function guppy_buildField($componentSpec, $element, $data, $rowIndex, $inTable)
{
  global $guppyBaseURL;

  $componentName = $componentSpec['name'];

    // Check for existence of field name and get it
  if (!isset($element['name']))
    return guppy_generateError("$componentName", "missing field name");
  $fieldName = $element['name'];

    // Check for existence of field spec in component spec and get it
  if (!isset($componentSpec['fields'][$fieldName]))
    return guppy_generateError("$componentName", "undefined field '$fieldName'");
  $fieldSpec = $componentSpec['fields'][$fieldName];
  $fieldType = $fieldSpec['type'];
  $fieldTypeData = guppy_fetchAttribute($fieldSpec, 'typeData');

    // Get field hint and set it as html title
  $fieldHint = isset($element['hint'])
               ? $element['hint']
               : (isset($fieldSpec['hint']) ? $fieldSpec['hint'] : null);
  if ($fieldHint)
    $htmlTitle = " title=\"" . guppy_translate($fieldHint) . "\"";
  else
    $htmlTitle = '';

    // Get read-only info merged from spec and layout
  $readonly = guppy_getMergedBoolean($fieldSpec, $element, 'readonly', false);

    // Get mandatory info merged from spec and layout
  $mandatory = guppy_getMergedBoolean($fieldSpec, $element, 'mandatory', false);

  $formFieldName = "f:$componentName:$fieldName:$rowIndex";
  $fieldData = guppy_fetchAttribute($data,$fieldName);

  guppy_startTableCell($element, $fieldSpec, $inTable);

  $style = guppy_getSizeStyle($element);
  $readonlyHTML = '';


  if ($fieldType == 'select')
  {
    $options = $fieldSpec['options'];

    echo "<select id=\"$formFieldName\" name=\"$formFieldName\"$style$htmlTitle>\n";

    $i = 0;
    foreach ($options as $option)
    {
      $value = $options[$i]['value'];
      $selected = ($value === $fieldData ? " selected=\"1\"" : "");
      $optionTitle = guppy_translate($option['title']);
      echo "<option value=\"$i\"$selected>" . htmlspecialchars($optionTitle) . "</option>\n";
      ++$i;
    }
    echo "</select>\n";
  }
  else if ($fieldType == 'bool')
  {
    $htmlClass = "b";
    if ($readonly)
    {
      $readonlyHTML = " disabled=\"1\"";
      $htmlClass .= " ro";
    }

    if ($fieldData)
      $checked = " checked=\"1\"";
    else
      $checked = '';

    echo "<input name=\"$formFieldName\" id=\"$formFieldName\" type=\"checkbox\" class=\"$htmlClass\" value=\"1\"$readonlyHTML$checked$htmlTitle/>\n";
  }
  else if ($fieldType == 'radio')
  {
    $formFieldName = "f:$componentName:$fieldName";
    $htmlClass = "o";
    if ($readonly)
    {
      $readonlyHTML = " readonly=\"1\"";
      $htmlClass .= " ro";
    }

    if ($fieldData)
      $checked = " checked";
    else
      $checked = '';

    echo "<input name=\"$formFieldName\" id=\"$formFieldName\" type=\"radio\" class=\"$htmlClass\" value=\"$rowIndex\"$readonlyHTML$checked$htmlTitle/>\n";
  }
  else if ($fieldType == 'upload')
  {
    if (!$readonly)
    {
      $upload_max_filesize = ini_get('upload_max_filesize');
      $post_max_size = ini_get('post_max_size');
      
      if ($upload_max_filesize != '')
        $maxInfo = $upload_max_filesize;
      else if ($post_max_size != '')
        $maxInfo = $post_max_size;
      else
        $maxInfo = null;

      if ($fieldData != null)
      {
        echo "<a href=\"$fieldData[url]\" target=\"_new\">$fieldData[name]</a> ($fieldData[size] " . _GUPPYBYTES . ') ';
        echo "<input type=\"checkbox\" class=\"b\" name=\"$formFieldName-del\"/> " . _GUPPYUPLOADDEL . "<br/>\n";
      }

      echo "<input name=\"$formFieldName\" type=\"file\" class=\"upl\"$style $htmlTitle/>";
      // Beware - no white space between these two (IE inserts extra newline!)
      if ($maxInfo != null)
        echo "<br/><span class=\"pn-sub\">[" . _GUPPYUPLOADMAXINFO . $maxInfo . "]</span>\n";
    }
  }
  else if ($fieldType == 'int'  ||  $fieldType == 'real'  ||  $fieldType == 'date'  
           ||  $fieldType == 'time'  ||  $fieldType == 'string'
           ||  $fieldType == 'image')
  {
    $singleLine = true;
    $maxLength = 255;

    switch ($fieldType)
    {
      case 'int':
        $htmlType = 'text';
        $htmlClass = 'i';
        $maxLength = 20;
      break;

      case 'real':
        $htmlType = 'text';
        $htmlClass = 'r';
        $maxLength = 50;
      break;

      case 'date':
        $htmlType = 'text';
        $htmlClass = 'd';
        $maxLength = 10;
      break;

      case 'time':
        $htmlType = 'text';
        $htmlClass = 'd';
        $maxLength = 8;
      break;

      case 'datetime':
        $htmlType = 'text';
        $htmlClass = 'dt';
        $fieldData = strftime("%Y-%m-%d %H:%M:%S", $fieldData);
        $maxLength = 20;
      break;

      case 'string':
        $htmlType = 'text';
        $htmlClass = 's';
        $singleLine = false;
      break;

      case 'image':
        $htmlType = 'text';
        $htmlClass = 'm';
      break;

      default:
        return guppy_generateError("$componentName", "unknown field type '$fieldType' for field '$fieldName'");
    }

    $view = guppy_fetchAttribute($element, 'view');
    if ($view == 'html'  &&  !$singleLine)
    {
      echo "<div class=\"guppy-htmlarea\">\n";      
// start scribite!
//    added class for TinyMCE
//      echo "\n<textarea id=\"$formFieldName\" name=\"$formFieldName\"$style>" . htmlspecialchars($fieldData) . "</textarea>\n";
      echo "\n<textarea class=\"editoron\" id=\"$formFieldName\" name=\"$formFieldName\"$style>" . htmlspecialchars($fieldData) . "</textarea>\n";
// end scribite!      
      echo "</div>\n";

      $configHeight = isset($element['height']) ? $element['height'] : 200;
      $configWidth  = isset($element['width'])  ? $element['width']  : 300;
      $postnukeThemeURL = guppy_getSetting('htmlAreaStyled') ? 'postnukeThemeURL' : 'null';
      $enableUndo = (guppy_getSetting('htmlAreaUndo') ? 'true' : 'false');
      $enableWordKill = (guppy_getSetting('htmlAreaWordKill') ? 'true' : 'false');

// start scribite!
//      if (guppy_getSetting('htmlAreaEnabled'))
//      {
//        echo  "<script type=\"text/javascript\">\n"
//            . "guppyHtmlAreaInit('$formFieldName', $postnukeThemeURL, $configWidth, $configHeight, $enableUndo, $enableWordKill);\n"
//            . "</script>\n";
//
//        guppy_registerPageBlock("htmlarea.js", "<script type=\"text/javascript\" src=\"$guppyBaseURL/xinha/htmlarea.js\"></script>");
//      }
// end scribite!
    }
    else 
    if ($view == 'text'  &&  !$singleLine)
    {
// start scribite!
//    added class for TinyMCE
//      echo "\n<textarea name=\"$formFieldName\"$style>" . htmlspecialchars($fieldData) . "</textarea>\n";
      echo "\n<textarea class=\"editoroff\" name=\"$formFieldName\"$style>" . htmlspecialchars($fieldData) . "</textarea>\n";
// end scribite!      
    }
    else
    {
      if ($readonly)
      {
        $readonlyHTML = " readonly=\"1\"";
        $htmlClass .= " ro";
      }

      if ($mandatory)
        if ($fieldData == '')
          $htmlClass .= " mde";
        else
          $htmlClass .= " mdt";

      echo "<input name=\"$formFieldName\" id=\"$formFieldName\" type=\"$htmlType\" class=\"$htmlClass\" value=\""
           . htmlspecialchars($fieldData). "\"$style$readonlyHTML$htmlTitle"
           ." onKeyUp=\"handleOnKeyUpInput(this,'$mandatory')\" maxlength=\"$maxLength\"/>";

      if ($fieldType == 'date'  &&  !$readonly)
      {
        echo " <img src=\"$guppyBaseURL/jscalendar/img.gif\" id=\"$formFieldName:db\" class=\"clickable\"/> ";

        echo   "<script type=\"text/javascript\">\nCalendar.setup({"
             . "inputField: \"$formFieldName\", "
             . "ifFormat: \"%Y-%m-%d\", "
             . "button: \"$formFieldName:db\", "
             . "step: 1, "
             . "singleClick: true})\n"
             . "</script>\n";
      }
      else if ($fieldType == 'image'  &&  !$readonly)
      {
        $photoshareFindImageURL = pnModUrl('photoshare','user','findimage', 
                                           array('url' => 'relative', 'html' => 'url'));
        $photoshareFindImageURL = htmlspecialchars($photoshareFindImageURL);

        $photoshareThumbnailSize = pnModGetVar('photoshare', 'thumbnailsize');

        echo "<button type=\"button\" "
             . "onClick=\"guppyFindImage('$formFieldName','$photoshareFindImageURL','$photoshareThumbnailSize')\">...</button>\n";
      }
    }
  }
  else // Plugin
  {
    $plugin = & guppy_getPluginInstance($formFieldName, $fieldType);

    $plugin->value = $fieldData;
    $plugin->typeData = $fieldTypeData;
    $plugin->mandatory = $mandatory;
    $plugin->readonly = $readonly;
    $plugin->hint = $fieldHint;
    $plugin->width = guppy_fetchAttribute($element, 'width');
    $plugin->height = guppy_fetchAttribute($element, 'height');

    echo $plugin->render(new GuppyPluginHelper, $fieldSpec, $element);
  }

  $initialFocus = guppy_fetchAttribute($element, 'initialFocus', false);
  if ($initialFocus)
  {
    echo "
<script type=\"text/javascript\">
  guppyAddOnLoadEvent( function() {
    var element = document.getElementById('$formFieldName');
    if (typeof element.focus != 'undefined')
    {
      element.focus();
    }  
  } )
</script>";
  }
  
  guppy_endTableCell($element, array());

  return true;
}


function guppy_buildAction($componentSpec, $element, $data, $rowIndex)
{
  $componentName = $componentSpec['name'];

    // Check for existence of action name and get it
  if (!isset($element['name']))
    return guppy_generateError("$componentName"."[action element]", "missing element name");
  $actionName = $element['name'];

    // Check for existence of action spec in component spec and get it
  if (!isset($componentSpec['actions'][$actionName]))
    return guppy_generateError("$componentName", "undefined action '$actionName'");
  $actionSpec = $componentSpec['actions'][$actionName];

    // Get optional action title (first from layout then from action spec)
  if (isset($element['title']))
    $actionTitle = $element['title'];
  else if (isset($actionSpec['title']))
    $actionTitle = $actionSpec['title'];
  else
    $actionTitle = NULL;

  if ($actionTitle == NULL)
    return guppy_generateError("$componentName", "missing action title for '$actionName'");

  $actionTitle = guppy_translate($actionTitle);

  guppy_startTableCell($element, array(), false);

  echo "<span onClick=\"handlOnClickAction('$actionName','$componentName','$rowIndex')\" class=\"clickable action\">"
       . htmlspecialchars($actionTitle). "</span>";

  guppy_endTableCell($element, array());
}


function guppy_buildRaw($componentSpec, $element, $data, $rowIndex)
{
  $componentName = $componentSpec['name'];

    // Check for existence of field name and get it
  if (!isset($element['name']))
    return guppy_generateError("$componentName"."[raw element]", "missing element name");
  $fieldName = $element['name'];

    // Check for existence of field spec in component spec and get it
  if (!isset($componentSpec['fields'][$fieldName]))
    return guppy_generateError("$componentName", "undefined field '$fieldName'");
  $fieldSpec = $componentSpec['fields'][$fieldName];

  $fieldData = $data[$fieldName];

  guppy_startTableCell($element, array(), false);

  echo "$fieldData";

  guppy_endTableCell($element, array());
}


/*========================================================================
  Page blocks
========================================================================*/

function guppy_registerPageBlock($id, $block)
{
  global $guppy_registeredPageBlocks;
  if (!guppy_pageBlockExists($id))
  {
    $guppy_registeredPageBlocks[$id] = $block;
  }
}


function guppy_pageBlockExists($id)
{
  global $guppy_registeredPageBlocks;
  return array_key_exists($id, $guppy_registeredPageBlocks);
}


function guppy_dumpPageBlocks()
{
  global $guppy_registeredPageBlocks;
  foreach ($guppy_registeredPageBlocks as $id => $b)
  {
    echo "$b\n";
  }
}


/*========================================================================
  Output caching
========================================================================*/

function guppy_beginOutput()
{
  guppy_postnuke_addEditorheaders();
  ob_start();
}


function guppy_output()
{
  global $guppy_outputCleared;
  if ($guppy_outputCleared)
    return true;

  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}


/*========================================================================
  Window cache
========================================================================*/

function guppy_getNewWindowKey()
{
  srand((double)microtime()*1000000);
  return rand();
}


/* DEBUGGING
function guppy_dumpcache($windowCache)
{
  for ($i=0; $i<count($windowCache['cache']); ++$i)
  { 
    $c = $windowCache['cache'][$i];
    if ($c != null)
    {
      guppylog("Cache($i) - $c[createdTime] (key $c[windowKey]):"); 
      $keys = array_keys($c['window']['spec']['components']);
      foreach ($keys as $k)
        guppylog("    " . $k);
    }
    else
      guppylog("Cache($i) empty.");
  }
}
//*/

function guppy_getNewWindowID()
{
  $windowCache = guppy_getWindowCache();
  if (!isset($windowCache))
  {
    guppy_setWindowCache(array( 'count' => 0, 'cache' => array()));
    $windowCache = guppy_getWindowCache();
  }
  
  //guppylog("\nGetNewWindowID.\nCount = " . count($windowCache['cache']));
  //guppy_dumpcache($windowCache);

  if (count($windowCache['cache']) >= 5)
    $windowIndex = guppy_cleanupWindowId($windowCache);
  else
    $windowIndex = count($windowCache['cache']);

  $windowCache['cache'][$windowIndex] = array( 'createdTime' => $windowCache['count'],
                                               'window'      => array() );
  ++$windowCache['count'];

  guppy_setWindowCache($windowCache);
  
  //guppy_dumpcache($windowCache);

  return $windowIndex;
}


function guppy_setWindowData($windowID, $windowKey, &$windowData)
{
  //guppylog("\nSet WindowData for ID $windowID (key: $windowKey).");

  $windowCache = guppy_getWindowCache();
  $windowCache['cache'][$windowID]['window']    = $windowData;
  $windowCache['cache'][$windowID]['windowKey'] = $windowKey;
  
  guppy_setWindowCache($windowCache);

  //$windowCache = guppy_getWindowCache(); // DEBUG
  //guppy_dumpcache($windowCache);
}


function guppy_getWindowData($windowID, &$windowKey)
{
  $windowCache = guppy_getWindowCache();
  if (!isset($windowCache))
    return false;

  //guppylog("\nGet WD $windowID.");

  $windowCache = guppy_getWindowCache();

  $windowKey = $windowCache['cache'][$windowID]['windowKey'];

  //guppy_dumpcache($windowCache);
  //guppylog("=> gave key $windowKey.");

  return $windowCache['cache'][$windowID]['window'];
}


function guppy_deleteWindowID($windowID)
{
  $windowCache = guppy_getWindowCache();

  //guppylog("\n* DeleteID $windowID - start.\nCount: " . count($windowCache['cache']));
  //guppy_dumpcache($windowCache);

  $windowCache['cache'][$windowID] = null;
  
  //guppylog("\nDeleteID $windowID.\nCount: " . count($windowCache['cache']));
  //guppy_dumpcache($windowCache);

  guppy_setWindowCache($windowCache);
}


function guppy_cleanupWindowId(&$windowCache)
{
  //guppylog("\nStart CleanupWindowId.");
  //guppy_dumpcache($windowCache);

  $oldestWindowIndex = 0;

  for ($i=count($windowCache['cache'])-1; $i>=0 ; --$i)
    if ($windowCache['cache'][$i] == null)
    {
      $oldestWindowIndex = $i;
      break;
    }
    else if ($windowCache['cache'][$i]['createdTime'] < $windowCache['cache'][$oldestWindowIndex]['createdTime'])
      $oldestWindowIndex = $i;

  $windowCache['cache'][$oldestWindowIndex] = null;

  //guppylog("\nEnd CleanupWindowId.\nOldest ID: $oldestWindowIndex");
  //guppy_dumpcache($windowCache);

  return $oldestWindowIndex;
}


/*========================================================================
  Helpers
========================================================================*/

  // Load file content into string and return it
function guppy_loadFile($funcName, $filename)
{
  $fd = fopen("$filename", "rb");
  if ($fd === false)
    return guppy_generateError($funcName, "Unable to load file '$filename'");
  $content = fread($fd, filesize($filename));
  fclose($fd);

  return $content;
}


function guppy_getMergedBoolean($spec, $layout, $name, $defaultValue)
{
  if (!isset($spec[$name])  &&  !isset($layout[$name]))
    return $defaultValue;

  if (!isset($spec[$name])  &&  isset($layout[$name]))
    return $layout[$name];

  if (isset($spec[$name])  &&  !isset($layout[$name]))
    return $spec[$name];

  return $spec[$name] || $layout[$name];
}


function guppy_getSizeStyle(&$element)
{
  $style = "";

  if (isset($element['width']))
    $style .= "width: $element[width]px;";
  if (isset($element['height']))
    $style .= "height: $element[height]px;";

  if ($style != '')
    $style = " style=\"$style\"";

  return $style;
}


function guppy_getElementID($name = null)
{
  static $count = 0;
  static $idMap = array();

  if ($name == null)
  {
    return "elem" . ++$count;
  }
  else
  {
    if (isset($idMap[$name]))
      return $idMap[$name];

    $idMap[$name] = "elem" . ++$count;

    return $idMap[$name];
  }
}


function guppyUploadErrorMsg($error)
{
  switch ($error)
  {
    case 1:
      return _GUPPYUPLOADERROR_INISIZE;
    case 2:
      return _GUPPYUPLOADERROR_FORMSIZE;
    case 3:
      return _GUPPYUPLOADERROR_PARTIAL;
    case 4:
      return _GUPPYUPLOADERROR_NOFILE;
    default:
      return _GUPPYUPLOADERROR_UNKNOWN;
  }
}


?>
