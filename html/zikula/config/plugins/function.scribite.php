<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * @package scribite!
 * @license http://www.gnu.org/copyleft/gpl.html
 *
 * @author sven schomacker
 * @version $Id$
 */

function smarty_function_scribite($params, &$smarty)
{
    extract($params);
    unset($params);

    if(pnModAvailable('scribite')) {
        return pnModFunc('scribite', 'user', 'editorheader');
    }
}
