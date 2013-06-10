<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
function scribite_tables()
{
    // Initialise table array
    $table = array();

    // Get the name for the table.
    $table['scribite'] = 'scribite';
    $table['scribite_column'] = array(
            'mid' => 'mid',
            'modname' => 'modname',
            'modfuncs' => 'modfuncs',
            'modareas' => 'modareas',
            'modeditor' => 'modeditor');
    $table['scribite_column_def'] = array(
            'mid' => 'I PRIMARY AUTO',
            'modname' => "C(64) NOTNULL DEFAULT ''",
            'modfuncs' => "XL NOTNULL",
            'modareas' => "XL NOTNULL",
            'modeditor' => "C(20) NOTNULL DEFAULT 0");

    // Return the table information
    return $table;
}

