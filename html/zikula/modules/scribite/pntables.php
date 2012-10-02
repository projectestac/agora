<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pntables.php 103 2008-12-18 09:59:49Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

function scribite_pntables()
{
    // Initialise table array
    $pntable = array();

    // Get the name for the table.
    $scribite = DBUtil::getLimitedTablename('scribite');
    $pntable['scribite'] = $scribite;
    $pntable['scribite_column'] = array('mid'       => 'pn_mid',
                    'modname'   => 'pn_modname',
                    'modfuncs'  => 'pn_modfunc',
                    'modareas'  => 'pn_modareas',
                    'modeditor' => 'pn_modeditor');
    $pntable['scribite_column_def'] = array('mid'       => 'I PRIMARY AUTO',
                        'modname'   => "C(64) NOTNULL DEFAULT ''",
                        'modfuncs'  => "XL NOTNULL",
                        'modareas'  => "XL NOTNULL",
                        'modeditor' => "C(20) NOTNULL DEFAULT 0");

    // Return the table information
    return $pntable;
}

