<?php
// $Id: form.php 107 2008-05-23 09:22:59Z landseer $
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


class formicula_contenttypesapi_formPlugin extends contentTypeBase
{
    var $eventid;

    function getModule()
    {
        return 'formicula';
    }
    function getName()
    {
        return 'form';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('formicula');
        return DataUtil::formatForDisplay(__('Formicula!', $dom));
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('formicula');
        return DataUtil::formatForDisplay(__('Formicula!', $dom));
    }

    function loadData($data)
    {
        $this->form = $data['form'];
    }

    function display()
    {
        if (isset($this->form)) {
            PageUtil::addVar('stylesheet', ThemeUtil::getModuleStylesheet('formicula'));
            $form = pnModFunc('formicula', 'user', 'main', array('form' => (int) $this->form));
            return $form;
        }
        return DataUtil::formatForDisplay(_FOR_NOFORMSELECTED . $this->form);
    }

    function displayEditing()
    {
        $dom = ZLanguage::getModuleDomain('formicula');
        if (isset($this->form)) {
            $form = pnModFunc('formicula', 'user', 'main', array('form' => $this->form));
            return $form;
        }
        return DataUtil::formatForDisplay(__('no form selected', $dom));
    }

    function getDefaultData()
    {
        return array('form' => 0);
    }

    function startEditing(&$render)
    {
        return '';
    }
}

function formicula_contenttypesapi_form($args)
{
    return new formicula_contenttypesapi_formPlugin();
}
