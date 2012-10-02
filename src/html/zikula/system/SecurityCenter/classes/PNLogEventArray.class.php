<?php
/** ----------------------------------------------------------------------
 *  LICENSE
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License (GPL)
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WIthOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *  ----------------------------------------------------------------------
 *  Original Author of  OpenStar Module Generator
 *  Author Contact: r.gasch@chello.nl, robert.gasch@value4business.com
 *  Purpose of file:  object array class implementation
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 * @package Zikula_System_Modules
 * @subpackage SecurityCenter
 */


/**
 * PNLogEventArray
 *
 * @package Zikula_System_Modules
 * @subpackage SecurityCenter
 */
class PNLogEventArray extends PNObjectArray
{
    function PNLogEventArray($init=null, $where='')
    {
        $this->PNObjectArray();

        $this->_objType       = 'sc_logevent';
        $this->_objField      = 'id';
        $this->_objPath       = 'logevent';

        $this->_objJoin[]     = array ('join_table'          =>  'users',
                                       'join_field'          =>  'uname',
                                       'object_field_name'   =>  'username',
                                       'compare_field_table' =>  'uid',
                                       'compare_field_join'  =>  'uid');

        $this->_init($init, $where);
    }


    function genFilter ($filter = array())
    {
        $wheres = array();

        if (isset($filter['date']) && $filter['date'])
            $wheres[] = "lge_date = '$filter[date]'";

        if (isset($filter['uid']) && is_numeric($filter['uid']))
            $wheres[] = "lge_uid = '$filter[uid]'";

        if (isset($filter['component']) && $filter['component'])
            $wheres[] = "lge_component = '$filter[component]'";

        if (isset($filter['module']) && $filter['module'])
            $wheres[] = "lge_module = '$filter[module]'";

        if (isset($filter['function']) && $filter['function'])
            $wheres[] = "lge_function = '$filter[function]'";

        $where = implode (' AND ', $wheres);
        return $where;
    }
}
