<?php
// $Id: mh_admin_modifyconfighandler.class.php 166 2007-02-18 19:18:21Z landseer $
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
// Original Author of file: Frank Schummertz
// Purpose of file:  bbsmile administration display functions
// ----------------------------------------------------------------------

class bbsmile_admin_modifyconfighandler
{

    function initialize(&$pnRender)
    {
        $pnRender->caching = false;
        $pnRender->add_core_data();
        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
        $dom = ZLanguage::getModuleDomain('bbsmile');

        // Security check
        if (!SecurityUtil::checkPermission('bbsmile::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError(pnModURL('bbsmile', 'admin', 'main'));
        }
        if ($args['commandName'] == 'submit') {
            if (!$pnRender->pnFormIsValid()) {
                return false;
            }

            $ok = true;
            $data = $pnRender->pnFormGetValues();

            $ossmiliepath = DataUtil::formatForOS($data['smiliepath']);
            if(!file_exists($ossmiliepath) || !is_readable($ossmiliepath)) {
                $ifield = & $pnRender->pnFormGetPluginById('smiliepath');
                $ifield->setError(DataUtil::formatForDisplay(__('The path does not exists or the system cannot read it.', $dom)));
                $ok = false;
            }

            $osautosmiliepath = DataUtil::formatForOS($data['smiliepath_auto']);
            if(!file_exists($osautosmiliepath) || !is_readable($osautosmiliepath)) {
                $ifield = & $pnRender->pnFormGetPluginById('smiliepath_auto');
                $ifield->setError(DataUtil::formatForDisplay(__('The path does not exists or the system cannot read it.', $dom)));
                $ok = false;
            }

            if($ok == false) {
                return false;
            }

            pnModSetVar('bbsmile', 'smiliepath',       $data['smiliepath']);
            pnModSetVar('bbsmile', 'smiliepath_auto',  $data['smiliepath_auto']);
            pnModSetVar('bbsmile', 'activate_auto',    $data['activate_auto']);
            pnModSetVar('bbsmile', 'remove_inactive',  $data['remove_inactive']);

            LogUtil::registerStatus(__('bbsmile configuration updated', $dom));
        }
        return true;
    }

}
