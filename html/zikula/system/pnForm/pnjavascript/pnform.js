/**
 * pnForms javascript code
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.com
 * @version $Id: function.pnformdateinput.php 21129 2007-01-19 19:08:26Z jornlind $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package pnForm
 * @subpackage JavaScript
 */


var pnForm = {};

/*========================================================================================
  Context menu handling
========================================================================================*/
pnForm.contextMenu = {};

pnForm.contextMenu.visibleMenus = {};


pnForm.contextMenu.getCommandArgument = function(menuId)
{
  return $("contentMenuArgument"+menuId).value;
}

// Called when activating a menu
pnForm.contextMenu.showMenu = function(evt, menuId, commandArgument)
{
  pnForm.contextMenu.hideMenu();

  var contextMenu = $(menuId);
  var cursorPos = { x: Event.pointerX(evt), y: Event.pointerY(evt) };

  $("contentMenuArgument"+menuId).value = commandArgument;
  pnForm.contextMenu.commandArgument = commandArgument;
  Event.observe(document, 'click', function() {pnForm.contextMenu.hideMenu(menuId);});
  pnForm.contextMenu.visibleMenus[menuId] = true;

  var offset;
  // ugly hack for IE, in which getOffsetParent doesn't work, 
  if(Prototype.Browser.IE == true) {
    $(document.body).insert(contextMenu);
    offset = {left: 0, top: 0};
  } else {
    offset = contextMenu.getOffsetParent().positionedOffset();
  }

  contextMenu.style.display = 'block';
  contextMenu.style.position = 'absolute';
  contextMenu.style.left = (cursorPos.x - offset.left) + 'px';
  contextMenu.style.top = (cursorPos.y - offset.top) + 'px';

  Event.stop(evt);
}


// Called when deactivating a menu
pnForm.contextMenu.hideMenu = function()
{
  for (var vm in pnForm.contextMenu.visibleMenus)
  {
    contextMenu = $(vm);
    if (contextMenu != null)
      contextMenu.style.display = 'none';
  }

  pnForm.contextMenu.visibleMenus = {};
}


// Called when clicking on a menu item with "commandScript" set
pnForm.contextMenu.commandScript = function(commandArgumentId, script)
{
  var commandArgument = $(commandArgumentId).value;
  script(commandArgument);
}


// Called when clicking on a menu item with "commandRedirect" set
pnForm.contextMenu.redirect = function(commandArgumentId, url)
{
  var commandArgument = $(commandArgumentId).value;
  url = url.replace(/\{commandArgument\}/, commandArgument);
  window.location = url;
}