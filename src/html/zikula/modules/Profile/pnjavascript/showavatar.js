/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.com
 * @version $Id: showavatar.js 69 2009-12-05 10:28:06Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 */

function showavatar()
{
    if ($('prop_avatar') && $('youravatardisplay')) {
        $('youravatardisplay').src = document.location.pnbaseURL + $('youravatarpath').innerHTML + '/' + $('prop_avatar').options[$('prop_avatar').selectedIndex].value;
    }
}
