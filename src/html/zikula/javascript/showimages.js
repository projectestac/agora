/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.com
 * @version $Id: showimages.js 24339 2008-06-05 18:06:52Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage Javascript
*/

// ----------------------------------------------------------------------
// Original Author of file: Francisco Burzi
// Purpose of file: showimage javascript
// ----------------------------------------------------------------------
function showimage()
{
  //if (!document.images)
  if (document.images['avatar'].src)
	 return document.images.avatar.src= 'images/avatar/' + document.Register.user_avatar.options[document.Register.user_avatar.selectedIndex].value
}
