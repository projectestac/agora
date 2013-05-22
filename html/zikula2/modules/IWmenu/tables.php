<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Weebbox
 */

/**
 * Define module tables
 * @author Albert Perez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWmenu_tables() {
    // Initialise table array
    $tables = array();

    // IWmain table definition
    $tables['IWmenu'] = DBUtil::getLimitedTablename('IWmenu');

    //Noms dels camps
    $tables['IWmenu_column'] = array('mid' => 'iw_mid',
        'text' => 'iw_text',
        'url' => 'iw_url',
        'id_parent' => 'iw_id_parent',
        'groups' => 'iw_groups',
        'active' => 'iw_active',
        'target' => 'iw_target',
        'descriu' => 'iw_descriu',
        'iorder' => 'iw_iorder',
        'icon' => 'iw_icon',);

    $tables['IWmenu_column_def'] = array('mid' => "I NOTNULL AUTO PRIMARY",
        'text' => "C(255) NOTNULL DEFAULT ''",
        'url' => "X NOTNULL",
        'id_parent' => "I NOTNULL DEFAULT '0'",
        'groups' => "X NOTNULL",
        'active' => "I(1) NOTNULL DEFAULT '0'",
        'target' => "I(1) NOTNULL DEFAULT '0'",
        'descriu' => "X NOTNULL",
        'iorder' => "I NOTNULL DEFAULT '0'",
        'icon' => "C(40) NOTNULL DEFAULT ''");

    // Return the table information
    return $tables;
}
