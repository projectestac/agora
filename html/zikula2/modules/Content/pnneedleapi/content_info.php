<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

/**
 * Content needle info
 * @param none
 * @return string with short usage description
 */
function content_needleapi_content_info()
{
    $info = array('module' => 'Content', // module name
'info' => 'CONTENT{id}', // possible needles
'inspect' => false); //reverse lookpup possible, needs MultiHook_needleapi_content_inspect() function
    return $info;
}
