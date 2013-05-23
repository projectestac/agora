<?php
/**
 * Intraweb
 *
 * @copyright  (c) 2011, Intraweb Development Team
 * @link       http://code.zikula.org/intraweb/
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package    Intraweb_Modules
 * @subpackage IWAgendas
 */

/**
 * Define module tables
 *
 * @return module tables information
 */
function IWagendas_tables()
{
    // Initialise table array
    $table = array();

    // IWagendas table definition
    $table['IWagendas'] = DBUtil::getLimitedTablename('IWagendas');
    $table['IWagendas_column'] = array(
        'aid' => 'aid',
        'usuari' => 'usuari',
        'data' => 'data',
        'completa' => 'completa',
        'c1' => 'c1',
        'c2' => 'c2',
        'c3' => 'c3',
        'c4' => 'c4',
        'c5' => 'c5',
        'c6' => 'c6',
        'totdia' => 'totdia',
        'tasca' => 'tasca',
        'nivell' => 'nivell',
        'rid' => 'rid',
        'daid' => 'daid',
        'nova' => 'nova',
        'vcalendar' => 'vcalendar',
        'dataanota' => 'dataanota',
        'fitxer' => 'fitxer',
        'origen' => 'origen',
        'protegida' => 'protegida',
        'origenid' => 'origenid',
        'modified' => 'modified',
        'deleted' => 'deleted',
        'deletedByUser' => 'deletedByUser',
        'completedByUser' => 'completedByUser',
        'gCalendarEventId' => 'gCalendarEventId',
        'data1' => 'data1'
    );
    $table['IWagendas_column_def'] = array(
        'aid' => "I NOTNULL AUTO PRIMARY",
        'usuari' => "I NOTNULL DEFAULT '0'",
        'data' => "C(20) NOTNULL DEFAULT ''",
        'completa' => "I(1) NOTNULL DEFAULT '0'",
        'c1' => "X NOTNULL",
        'c2' => "X NOTNULL",
        'c3' => "X NOTNULL",
        'c4' => "X NOTNULL",
        'c5' => "X NOTNULL",
        'c6' => "X NOTNULL",
        'totdia' => "I(1) NOTNULL DEFAULT '0'",
        'tasca' => "I(1) NOTNULL DEFAULT '0'",
        'nivell' => "I(1) NOTNULL DEFAULT '0'",
        'rid' => "I NOTNULL DEFAULT '0'",
        'daid' => "I NOTNULL DEFAULT '0'",
        'nova' => "X NOTNULL",
        'vcalendar' => "I(1) NOTNULL DEFAULT '0'",
        'dataanota' => "C(20) NOTNULL DEFAULT ''",
        'fitxer' => "C(50) NOTNULL DEFAULT ''",
        'origen' => "C(50) NOTNULL DEFAULT ''",
        'protegida' => "I(1) NOTNULL DEFAULT '0'",
        'origenid' => "I NOTNULL DEFAULT '0'",
        'modified' => "I(1) NOTNULL DEFAULT '0'",
        'deleted' => "I(1) NOTNULL DEFAULT '0'",
        'deletedByUser' => "X NOTNULL",
        'completedByUser' => "X NOTNULL",
        'gCalendarEventId' => "C(150) NOTNULL DEFAULT ''",
        'data1' => "C(20) NOTNULL DEFAULT ''"
    );
    ObjectUtil::addStandardFieldsToTableDefinition($table['IWagendas_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWagendas_column_def'], 'iw_');

    // IWagendas_definition table definition
    $table['IWagendas_definition'] = DBUtil::getLimitedTablename('IWagendas_definition');
    $table['IWagendas_definition_column'] = array(
        'daid' => 'daid',
        'nom_agenda' => 'nom_agenda',
        'descriu' => 'descriu',
        'c1' => 'c1',
        'c2' => 'c2',
        'c3' => 'c3',
        'c4' => 'c4',
        'c5' => 'c5',
        'c6' => 'c6',
        'tc1' => 'tc1',
        'tc2' => 'tc2',
        'tc3' => 'tc3',
        'tc4' => 'tc4',
        'tc5' => 'tc5',
        'tc6' => 'tc6',
        'op2' => 'op2',
        'op3' => 'op3',
        'op4' => 'op4',
        'op5' => 'op5',
        'op6' => 'op6',
        'grup' => 'grup',
        'resp' => 'resp',
        'activa' => 'activa',
        'adjunts' => 'adjunts',
        'protegida' => 'protegida',
        'color' => 'color',
        'gCalendarId' => 'gCalendarId',
        'gAccessLevel' => 'gAccessLevel',
        'gColor' => 'gColor'
    );
    $table['IWagendas_definition_column_def'] = array(
        'daid' => "I NOTNULL AUTO PRIMARY",
        'nom_agenda' => "C(50) NOTNULL DEFAULT ''",
        'descriu' => "C(50) NOTNULL DEFAULT ''",
        'c1' => "C(50) NOTNULL DEFAULT ''",
        'c2' => "C(50) NOTNULL DEFAULT ''",
        'c3' => "C(50) NOTNULL DEFAULT ''",
        'c4' => "C(50) NOTNULL DEFAULT ''",
        'c5' => "C(50) NOTNULL DEFAULT ''",
        'c6' => "C(50) NOTNULL DEFAULT ''",
        'tc1' => "I(1) NOTNULL DEFAULT '0'",
        'tc2' => "I(1) NOTNULL DEFAULT '0'",
        'tc3' => "I(1) NOTNULL DEFAULT '0'",
        'tc4' => "I(1) NOTNULL DEFAULT '0'",
        'tc5' => "I(1) NOTNULL DEFAULT '0'",
        'tc6' => "I(1) NOTNULL DEFAULT '0'",
        'op2' => "C(255) NOTNULL DEFAULT ''",
        'op3' => "C(255) NOTNULL DEFAULT ''",
        'op4' => "C(255) NOTNULL DEFAULT ''",
        'op5' => "C(255) NOTNULL DEFAULT ''",
        'op6' => "C(255) NOTNULL DEFAULT ''",
        'grup' => "X NOTNULL",
        'resp' => "X NOTNULL",
        'activa' => "I(1) NOTNULL DEFAULT '0'",
        'adjunts' => "I(1) NOTNULL DEFAULT '0'",
        'protegida' => "I(1) NOTNULL DEFAULT '0'",
        'color' => "C(7) NOTNULL DEFAULT '#FFFFFF'",
        'gCalendarId' => "C(150) NOTNULL DEFAULT ''",
        'gAccessLevel' => "X NOTNULL",
        'gColor' => "X NOTNULL"
    );
    ObjectUtil::addStandardFieldsToTableDefinition($table['IWagendas_definition_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWagendas_definition_column_def'], 'iw_');

    // IWagendas_subs table definition
    $table['IWagendas_subs'] = DBUtil::getLimitedTablename('IWagendas_subs');
    $table['IWagendas_subs_column'] = array(
        'said' => 'said',
        'daid' => 'daid',
        'uid' => 'uid',
        'donadabaixa' => 'donadabaixa',
        'llistat' => 'llistat',
        'avisos' => 'avisos'
    );
    $table['IWagendas_subs_column_def'] = array(
        'said' => "I NOTNULL AUTO PRIMARY",
        'daid' => "I NOTNULL DEFAULT '0'",
        'uid' => "I NOTNULL DEFAULT '0'",
        'donadabaixa' => "I(1) NOTNULL DEFAULT '0'",
        'llistat' => "I(1) NOTNULL DEFAULT '-1'",
        'avisos' => "I(1) NOTNULL DEFAULT '0'"
    );
    ObjectUtil::addStandardFieldsToTableDefinition($table['IWagendas_subs_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWagendas_subs_column_def'], 'iw_');

    // returns tables information
    return $table;
}
