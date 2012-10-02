// $Id: guppy.js 56 2008-08-05 07:55:41Z hilope $
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

var extraStyle;


function guppyAddOnLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}


function guppyHandleOnLoad()
{
    // Set initial focus to field defined by outputed HTML/JavaScript
  var focusField = document.getElementById(guppyInitialFocusElement);
  if (typeof focusField != 'undefined') 
    focusField.focus();
}


function handleOnClickInsertRow(insertImg)
{
  var rowElement    = insertImg.parentNode.parentNode;
  var rowIndex      = rowElement.rowIndex;
  var componentName = getEnclosingComponentName(insertImg);

  doSubmitCommand("insertRow", componentName, rowIndex, null);
}


function handleOnClickDeleteRow(deleteImg)
{
  var rowElement    = deleteImg.parentNode.parentNode;
  var rowIndex      = rowElement.rowIndex;
  var componentName = getEnclosingComponentName(deleteImg);

  var ok = true;
  if (window["confirmDelete"+componentName] != "")
    ok = confirm(window["confirmDelete"+componentName]);

  if (ok)
    doSubmitCommand("deleteRow", componentName, rowIndex-1, null);  // Offset -1 for headings
}


function handleOnClickButton(componentName, buttonName)
{
  doSubmitCommand("button", componentName, null, buttonName);
}


function handleOnClickButtonGroup(componentName, groupID)
{
  var selectElement = document.getElementById(groupID);
  var buttonName = selectElement.value;

  doSubmitCommand("button", componentName, null, buttonName);
}


function handleOnChangeButtonGroup(groupID)
{
  var selectElement = document.getElementById(groupID);
  var buttonElement = document.getElementById("b:" + groupID);

  var optionElement = selectElement.options[selectElement.selectedIndex];

  buttonElement.title = optionElement.title;
}


function handleOnKeyUpInput(inputElement, mandatory)
{
  if (mandatory)
    updateInputFieldDisplay(inputElement, mandatory);
}


function handlOnClickAction(actionName, componentName, rowIndex)
{
  doSubmitCommand("action", componentName, rowIndex, actionName);
}


function handlOnClickHeader(fieldName, componentName)
{
  doSubmitCommand("clickHeader", componentName, null, fieldName);
}


// =======================================================================
// Command submit
// =======================================================================

var guppyFormSubmitted = false;

function guppyEnsureSingleSubmit()
{
  if (guppyFormSubmitted)
    return false;

  guppyFormSubmitted = true;
  return true;
}


function doSubmitCommand(action, componentName, rowIndex, param1)
{
  if (!guppyEnsureSingleSubmit())
    return;

  var guppyForm = document.getElementById("guppyForm");

  guppyForm.action.value    = action;
  guppyForm.component.value = componentName;
  guppyForm.rowIndex.value  = rowIndex;
  guppyForm.param1.value    = param1;

    // Make sure all htmlArea textareas are updated
    // - htmlArea assumes we use a standard submit form, so we need to fake that.

// start scribite!
//  for (var editorName in xinha_editors)
//  {
//    // Hack: testing for ":" to avoid problems with stuff added by "prototype.js"
//    if (editorName.indexOf(":") > 0)
//    {
//      var editor = xinha_editors[editorName];
//      if (editor != null)
//        guppyForm[editorName].value = editor.getHTML();
//    }
//  }

    if (typeof xinha_editors != "undefined")
    {
        var xinhas = __xinhas;
        for (var i=0;i<xinhas.length;i++)
        {
          xinhas[i]._textArea.value = xinhas[i].outwardHtml(xinhas[i].getHTML());
        }
    }
// end scribite!



  guppyForm.submit();
}


// =======================================================================
// Stylesheet handling
// =======================================================================

function updateInputFieldDisplay(inputElement, mandatory)
{
  if (mandatory != "")
  {
    if (inputElement.value.length > 0)
    {
      updateClassName(inputElement, "mdt", true);
      updateClassName(inputElement, "mde", false);
    }
    else
    {
      updateClassName(inputElement, "mdt", false);
      updateClassName(inputElement, "mde", true);
    }
  }
}


function updateClassName(element, className, doAdd)
{
  var pos = element.className.indexOf(className);
  //alert(element.className + "+" + className + (doAdd ? " / add" : " / del"));
  if (doAdd)
  {
    if (pos < 0)
      element.className += " " + className;
  }
  else
  {
    if (pos >= 0)
      element.className = element.className.substr(0,pos) + element.className.substr(pos+className.length);
  }
  //alert(element.className);
}


// =======================================================================
// Menu
// =======================================================================

var mainmenu =
{
};


mainmenu.popup = function(element, evt, id)
{
  evt = (evt ? evt : (event ? event : null));
  if (evt == null)
    return true;

  var pos = getPositionOfElement(element);
  pos.top += 20;

  var menuDivElement = document.getElementById("menu-"+id);
  psmenu.openMenu(mainmenu, menuDivElement, pos);

  return true;
}


//-[ Listener methods for psmenu ]---------------------------------------------

mainmenu.itemSelected = function(menuId, itemIndex)
{
  doSubmitCommand("menuAction", menuId, itemIndex, null);
}


mainmenu.menuClosed = function()
{
}



function menuTopMouseOver(element)
{
  element.className = "active";
}


function menuTopMouseOut(element)
{
  element.className = "normal";
}


// =======================================================================
// Tree menu
// =======================================================================

var treeMenu =
{
  functions:  // Must match menu sequence in guppy.php
  [
    "handleOnClickTreeEdit", 
    "handleOnClickTreeAdd", 
    "handleOnClickTreeAddSub", 
    "handleOnClickTreeInsert", 
    "handleOnClickTreeDelete", 
    "handleOnClickTreeMoveUp", 
    "handleOnClickTreeMoveDown", 
    "handleOnClickTreeIndent", 
    "handleOnClickTreeUndent", 
    "handleOnClickTreeDeleteRecursive"
  ],
  currentRowIndex: null,
  currentComponentName: null
};


treeMenu.onMouseDown = function(componentName, rowIndex, evt, menuId)
{
  evt = (evt ? evt : (event ? event : null));
  if (evt == null)
    return true;

  var menuDivElement = document.getElementById(menuId);

  var pos = getPositionOfEvent(evt);

  psmenu.openMenu(treeMenu, menuDivElement, pos);

  treeMenu.currentRowIndex = rowIndex;
  treeMenu.currentComponentName = componentName;

  return true;
}


treeMenu.handleOnClickTreeEdit = function(componentName, rowIndex)
{
  doSubmitCommand("treeEdit", componentName, rowIndex);
}


treeMenu.handleOnClickTreeInsert = function(componentName, rowIndex)
{
  doSubmitCommand("treeInsert", componentName, rowIndex);
}


treeMenu.handleOnClickTreeAdd = function(componentName, rowIndex)
{
  doSubmitCommand("treeAdd", componentName, rowIndex);
}


treeMenu.handleOnClickTreeAddSub = function(componentName, rowIndex)
{
  doSubmitCommand("treeAddSub", componentName, rowIndex);
}


treeMenu.handleOnClickTreeDelete = function(componentName, rowIndex)
{
  doSubmitCommand("treeDelete", componentName, rowIndex);
}


treeMenu.handleOnClickTreeMoveUp = function(componentName, rowIndex)
{
  doSubmitCommand("treeMoveUp", componentName, rowIndex);
}


treeMenu.handleOnClickTreeMoveDown = function(componentName, rowIndex)
{
  doSubmitCommand("treeMoveDown", componentName, rowIndex);
}


treeMenu.handleOnClickTreeIndent = function(componentName, rowIndex)
{
  doSubmitCommand("treeIndent", componentName, rowIndex);
}


treeMenu.handleOnClickTreeUndent = function(componentName, rowIndex)
{
  doSubmitCommand("treeUndent", componentName, rowIndex);
}


treeMenu.handleOnClickTreeDeleteRecursive = function(componentName, rowIndex)
{
  doSubmitCommand("treeDeleteRecursive", componentName, rowIndex);
}


function handleOnClickTreeSubmit(componentName, rowIndex, action)
{
  if (action == 'new')
    doSubmitCommand("treeNewItem", componentName, rowIndex);
  else if (action == 'add')
    doSubmitCommand("treeAddItem", componentName, rowIndex);
  else if (action == 'addSub')
    doSubmitCommand("treeAddSubItem", componentName, rowIndex);
  else
    doSubmitCommand("treeChangeItem", componentName, rowIndex);
}


function handleOnClickTreeCancel()
{
  doSubmitCommand("treeCancel", '', '');
}

//-[ Listener methods for psmenu ]---------------------------------------------

treeMenu.itemSelected = function(menuId, itemIndex)
{
  var handlerName = treeMenu.functions[itemIndex];
  treeMenu[handlerName](treeMenu.currentComponentName, treeMenu.currentRowIndex);
}


treeMenu.menuClosed = function()
{
  treeMenu.currentComponentName = treeMenu.currentRowIndex = null;
}


// =======================================================================
// Photoshare stuff
// =======================================================================

  // Used for guppy image field
function guppyFindImage(formFieldName, photoshareFindImageURL, thumbnailSize)
{
  if (typeof photoshareFindImage == "undefined")
    alert("You have apparently not installed the Photoshare image gallery");
  else
    photoshareFindImage(formFieldName, photoshareFindImageURL, thumbnailSize);
}


// =======================================================================
// htmlArea
// =======================================================================

// start scribite!
//    deleted htmlArea stuff - xinha loader
// end scribite!


  // Create a new htmlArea instance (one for each original textarea)
function guppyHtmlAreaInit(textareaID, themeBaseURL, width, height, undoEnabled, wordKillEnabled)
{
// start scribite!
//    deleted htmlArea stuff - function UNUSED()
// end scribite!
}


// =======================================================================
// DOM traversal helpers
// =======================================================================

function getEnclosingComponentName(element)
{
  while (element.tagName != "DIV" || element.className != 'component')
    element = element.parentNode;

  return element.id;
}

