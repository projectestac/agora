<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ModuleUtil.class.php 24668 2008-09-19 17:33:40Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @package Zikula_Core
 */

/**
 * ModuleUtil
 *
 * @package Zikula_Core
 * @subpackage ModuleUtil
 */
class ModuleUtil
{
    /**
     * Generic modules select function. Only modules in the module
     * table are returned which means that new/unscanned modules
     * will not be returned
     *
     * @param where The where clause to use for the select
     * @param sort  The sort to use
     *
     * @return The resulting module object array
     */
    function getModules ($where='', $sort='displayname')
    {
        return DBUtil::selectObjectArray ('modules', $where, $sort);
    }


    /**
     * Return an array of modules in the specified state, only modules in
     * the module table are returned which means that new/unscanned modules
     * will not be returned
     *
     * @param state    The module state (optional) (defaults = active state)
     * @param sort  The sort to use
     *
     * @return The resulting module object array
     */
    function getModulesByState ($state=3, $sort='displayname')
    {
        $pntables     = pnDBGetTables();
        $moduletable  = $pntables['modules'];
        $modulecolumn = $pntables['modules_column'];

        $where = "$modulecolumn[state] = $state";
        return DBUtil::selectObjectArray ('modules', $where, $sort);
    }

}
