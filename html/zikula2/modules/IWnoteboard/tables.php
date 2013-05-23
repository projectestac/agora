<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Noteboard
 */

/**
 * Define module tables
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWnoteboard_tables() {
    // Initialise table array
    $table = array();

    // IWnoteboard table definition
    $table['IWnoteboard'] = DBUtil::getLimitedTablename('IWnoteboard');
    $table['IWnoteboard_column'] = array('nid' => 'iw_nid',
        'data' => 'iw_data',
        'informa' => 'iw_informa',
        'noticia' => 'iw_noticia',
        'destinataris' => 'iw_destinataris',
        'mes_info' => 'iw_mes_info',
        'text' => 'iw_text',
        'caduca' => 'iw_caduca',
        'no_mostrar' => 'iw_no_mostrar',
        'titular' => 'iw_titular',
        'titulin' => 'iw_titulin',
        'titulout' => 'iw_titulout',
        'fitxer' => 'iw_fitxer',
        'textfitxer' => 'iw_textfitxer',
        'verifica' => 'iw_verifica',
        'admet_comentaris' => 'iw_admet_comentaris',
        'ncid' => 'iw_ncid',
        'tid' => 'iw_tid',
        'marca' => 'iw_marca',
        'edited' => 'iw_edited',
        'edited_by' => 'iw_edited_by',
        'lang' => 'iw_lang',
        'literalGroups' => 'iw_literalGroups',
);
    $table['IWnoteboard_column_def'] = array('nid' => "I NOTNULL AUTO PRIMARY",
        'data' => "C(15) NOTNULL DEFAULT ''",
        'informa' => "I NOTNULL DEFAULT '0'",
        'noticia' => "X NOTNULL",
        'destinataris' => "C(255) NOTNULL DEFAULT ''",
        'mes_info' => "C(255) NOTNULL DEFAULT ''",
        'text' => "C(255) NOTNULL DEFAULT ''",
        'caduca' => "C(15) NOTNULL DEFAULT ''",
        'no_mostrar' => "X NOTNULL",
        'titular' => "C(255) NOTNULL DEFAULT ''",
        'titulin' => "C(15) NOTNULL DEFAULT ''",
        'titulout' => "C(15) NOTNULL DEFAULT ''",
        'fitxer' => "C(255) NOTNULL DEFAULT ''",
        'textfitxer' => "C(255) NOTNULL DEFAULT ''",
        'verifica' => "I(1) NOTNULL DEFAULT '0'",
        'admet_comentaris' => "I(1) NOTNULL DEFAULT '0'",
        'ncid' => "I NOTNULL DEFAULT '0'",
        'tid' => "I NOTNULL DEFAULT '0'",
        'marca' => "X NOTNULL",
        'edited' => "C(15) NOTNULL DEFAULT ''",
        'edited_by' => "I NOTNULL DEFAULT '0'",
        'lang' => "C(3) NOTNULL DEFAULT ''",
        'literalGroups' => "C(255) NOTNULL DEFAULT ''",
);

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWnoteboard_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWnoteboard_column_def'], 'iw_');

    // IWnoteboard_themes table definition
    $table['IWnoteboard_themes'] = DBUtil::getLimitedTablename('IWnoteboard_themes');
    $table['IWnoteboard_topics'] = DBUtil::getLimitedTablename('IWnoteboard_topics');
    $table['IWnoteboard_topics_column'] = array('tid' => 'iw_tid',
        'nomtema' => 'iw_nomtema',
        'descriu' => 'iw_descriu',
        'grup' => 'iw_grup');

    $table['IWnoteboard_topics_column_def'] = array('tid' => "I NOTNULL AUTO PRIMARY",
        'nomtema' => "C(100) NOTNULL DEFAULT ''",
        'descriu' => "C(255) NOTNULL DEFAULT ''",
        'grup' => "I NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWnoteboard_topics_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWnoteboard_topics_column_def'], 'iw_');

    // Return the table information
    return $table;
}
