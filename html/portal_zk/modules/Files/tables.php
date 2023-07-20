<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pntables.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort
 * @return module tables information
 */
function Files_tables()
{
    // Initialise table array
    $pntable = array();		
    // Files table definition
    $pntable['Files'] = DBUtil::getLimitedTablename('Files');
    $pntable['Files_column'] = array('fileId' => 'fileId',
                                        'userId' => 'userId',
                                        'diskUse' => 'diskUse');
    $pntable['Files_column_def'] = array('fileId' => "I NOTNULL AUTO PRIMARY",
                                            'userId' => "I NOTNULL DEFAULT 0",
                                            'diskUse' => "I NOTNULL DEFAULT '0'");
    // Return the table information
    return $pntable;
}