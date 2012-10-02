<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Referers
 */

/**
 * table info
 */
function referers_pntables()
{
    $pntable = array();
    $pntable['referer'] = DBUtil::getLimitedTablename('referer');
    $pntable['referer_column'] = array('rid'       => 'pn_rid',
                                        'url'       => 'pn_url',
                                        'frequency' => 'pn_frequency');
    $pntable['referer_column_def'] = array('rid'       => 'I AUTOINCREMENT PRIMARY',
                                           'url'       => "C(255) NOTNULL DEFAULT ''",
                                           'frequency' => 'I4');
    $pntable['referer_column_idx'] = array ('url' => 'url');

    return $pntable;
}
