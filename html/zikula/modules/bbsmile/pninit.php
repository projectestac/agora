<?php
// $Id: pninit.php 124 2009-11-11 02:15:07Z drak $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Hinrich Donner
// changed to bbsmile: larsneo
// ----------------------------------------------------------------------

/**
 * @package Zikula_Utility_Modules
 * @subpackage bbsmile
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * init module
*/
function bbsmile_init() {

    // Set up module variables
    //
    // - where are the smilies stored
    pnModSetVar('bbsmile', 'smiliepath',      'modules/bbsmile/pnimages/smilies');
    pnModSetVar('bbsmile', 'activate_auto',   '0');
    pnModSetVar('bbsmile', 'remove_inactive', '1');
    pnModSetVar('bbsmile', 'smiliepath_auto', 'modules/bbsmile/pnimages/smilies_auto');

    // Generate the smile array
    pnModAPIFunc('bbsmile','admin','updatesmilies',array(), true);


    // Set up module hooks
    // transform hook
    if (!pnModRegisterHook('item',
                           'transform',
                           'API',
                           'bbsmile',
                           'user',
                           'transform')) {
        return LogUtil::registerError(_BBSMILE_COULDNOTREGISTER . ' (transform hook)');
    }
    // Initialisation successful
    return true;
}

/**
 * upgrade module
*/
function bbsmile_upgrade($oldversion)
{
	switch($oldversion) {
	    case '1.13':
            pnModSetVar('pn_bbsmile', 'smiliepath',       'modules/bbsmile/pnimages/smilies');
	        pnModSetVar('pn_bbsmile', 'activate_auto',    '0');
            pnModSetVar('pn_bbsmile', 'remove_inactive',  '1');
	        pnModSetVar('pn_bbsmile', 'smiliepath_auto',  'modules/bbsmile/pnimages/smilies_auto');
	        pnModAPIFunc('pn_bbsmile','admin','updatesmilies',array());
        case '1.14':
            // display hook
            if (!pnModRegisterHook('item',
                                   'display',
                                   'GUI',
                                   'pn_bbsmile',
                                   'user',
                                   'smilies')) {
                return LogUtil::registerError(_BBSMILE_COULDNOTREGISTER . ' (display hook)');
            }
            pnModSetVar('pn_bbsmile', 'displayhook', '1');
        case '1.15':
            if (!pnModUnregisterHook('item',
                                     'display',
                                     'GUI',
                                     'pn_bbsmile',
                                     'user',
                                     'smilies')) {
                LogUtil::registerError(_BBSMILE_COULDNOTUNREGISTER . ' (display hook)');
                return '1.15';
            }
            pnModDelVar('pn_bbsmile', 'displayhook');
        case '1.17':
        case '1.18':
            // .8 only version
        case '2.0':

            pnModSetVar('bbsmile', 'smiliepath', str_replace('pn_bbsmile', 'bbsmile', pnModGetVar('pn_bbsmile', 'smiliepath')));
            pnModSetVar('bbsmile', 'smiliepath_auto', str_replace('pn_bbsmile', 'bbsmile', pnModGetVar('pn_bbsmile', 'smiliepath_auto')));
            pnModSetVar('bbsmile', 'activate_auto', pnModGetVar('pn_bbsmile', 'activate_auto'));
            pnModSetVar('bbsmile', 'remove_inactive', pnModGetVar('pn_bbsmile', 'remove_inactive'));
            $smilie_array = pnModGetVar('pn_bbsmile', 'smilie_array');
            if(@unserialize($smilie_array)!=='') {
                $smilie_array = unserialize($smilie_array);
            }
            pnModSetVar('bbsmile', 'smilie_array', $smilie_array);

            pnModDelVar('pn_bbsmile');

    		// update hooks
    		$pntables = pnDBGetTables();
    		$hookstable  = $pntables['hooks'];
    		$hookscolumn = $pntables['hooks_column'];
    		$sql = 'UPDATE ' . $hookstable . ' SET ' . $hookscolumn['smodule'] . '=\'bbsmile\' WHERE ' . $hookscolumn['smodule'] . '=\'pn_bbsmile\'';
    		$res = DBUtil::executeSQL ($sql);
    		if ($res === false) {
        		LogUtil::registerError(_BBSMILE_FAILEDTOUPGRADEHOOK . ' (smodule)');
        		return '2.0';
    		}

    		$sql = 'UPDATE ' . $hookstable . ' SET ' . $hookscolumn['tmodule'] . '=\'bbsmile\' WHERE ' . $hookscolumn['tmodule'] . '=\'pn_bbsmile\'';
    		$res   = DBUtil::executeSQL ($sql);
    		if ($res === false) {
        		LogUtil::registerError(_BBSMILE_FAILEDTOUPGRADEHOOK . ' (tmodule)');
        		return '2.0';
    		}

        default:
            break;
    }
    return true;
}

/**
 * delete module
*/
function bbsmile_delete() {

    // Remove module hooks
    if (!pnModUnregisterHook('item',
                             'transform',
                             'API',
                             'bbsmile',
                             'user',
                             'transform')) {
        return LogUtil::registerError(_BBSMILE_COULDNOTUNREGISTER . ' (transform hook)');
    }

    // Remove module variables
    pnModDelVar('bbsmile');

    // Deletion successful
    return true;
}
