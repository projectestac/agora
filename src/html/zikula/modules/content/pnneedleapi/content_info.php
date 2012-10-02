<?php
/**
 * Content
 *
 * @copyright (c) 2001-now, Frank Schummertz
 * @link http://code.zikula.org/content
 * @version $Id$
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Content
 */

/**
 * Content needle info
 * @param none
 * @return string with short usage description
 */
function content_needleapi_content_info()
{
    $info = array('module' => 'content', // module name
'info' => 'CONTENT{id}', // possible needles
'inspect' => false); //reverse lookpup possible, needs MultiHook_needleapi_content_inspect() function
    return $info;
}
