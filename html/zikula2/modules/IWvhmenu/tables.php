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
 * @author Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWvhmenu_tables() {
    // Initialise table array
    $table = array();

    // iw_main table definition
    $table['IWvhmenu'] = DBUtil::getLimitedTablename('IWvhmenu');

    //Noms dels camps
    $table['IWvhmenu_column'] = array('mid' => 'iw_mid',
        'text' => 'iw_text',
        'url' => 'iw_url',
        'bg_image' => 'iw_bg_image',
        'height' => 'iw_height',
        'width' => 'iw_width',
        'id_parent' => 'iw_id_parent',
        'groups' => 'iw_groups',
        'active' => 'iw_active',
        'target' => 'iw_target',
        'descriu' => 'iw_descriu',
        'iorder' => 'iw_iorder',
        'grafic' => 'iw_grafic',
        'image1' => 'iw_image1',
        'image2' => 'iw_image2');

    $table['IWvhmenu_column_def'] = array('mid' => "I NOTNULL AUTO PRIMARY",
        'text' => "C(50) NOTNULL DEFAULT ''",
        'url' => "C(255) NOTNULL DEFAULT ''",
        'bg_image' => "C(20) NOTNULL DEFAULT ''",
        'height' => "I(3) NOTNULL DEFAULT '25'",
        'width' => "I(3) NOTNULL DEFAULT '125'",
        'id_parent' => "INT(11) NOTNULL DEFAULT '0'",
        'groups' => "X NOTNULL",
        'active' => "I(1) NOTNULL DEFAULT '0'",
        'target' => "I(1) NOTNULL DEFAULT '0'",
        'descriu' => "X NOTNULL",
        'iorder' => "I NOTNULL DEFAULT '0'",
        'grafic' => "I(1) NOTNULL DEFAULT '0'",
        'image1' => "C(20) NOTNULL DEFAULT ''",
        'image2' => "C(20) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWvhmenu_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWvhmenu_column_def'], 'iw_');


    // Return the table information
    return $table;
}
