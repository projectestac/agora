<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: PNObjectArray.class.php 27045 2009-10-21 14:27:04Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @package Zikula_Core
 * @subpackage PNObjectArrayUtil
 */

/**
 * PNObjectArrayUtil
 *
 * @package Zikula_Core
 * @subpackage PNObjectArrayUtil
 */
class PNObjectArray extends PNObject
{
    /**
     * Constructur, init everything to sane defaults and handle parameters
     *
     * @param init        Initialization value (see _init() for details)
     * @param where       The where clause to apply to the DB get/select (optional) (default='')
     */
    function PNObjectArray ($init=null, $where='')
    {
        $this->PNObject ();

        $this->_objType         = 'pn_generic';
        $this->_objPath         = 'generic_array';
        $this->_objWhere        = '';
        $this->_objSort         = '';
        $this->_objLimitOffset  = -1;
        $this->_objLimitNumRows = -1;
        $this->_objAssocKey     = '';
        $this->_objDistinct     = false;

        $this->_init ($init, $where);
    }


    /**
     * Internal intialization routine
     *
     * @param init        Initialization value (can be an object or a string directive) (optional) (default=null)
     * @param where       The where clause to use when retrieving the object array (optional) (default='')
     * @param orderBy     The order-by clause to use when retrieving the object array (optional) (default='')
     * @param assocKey    Key field to use for building an associative array (optional) (default=null)
     *
     * If $init is an arrary it is set(), otherwise it is interpreted as a string specifying
     * the source from where the data should be retrieved from.
     */
    function _init ($init=null, $where='', $orderBy='', $assocKey=null)
    {
        if ($this->_objType != 'pn_generic') {
            $pntables       = pnDBGetTables();
            $tkey           = $this->_objType;
            $ckey           = $tkey . "_column";
            $this->_table   = isset($pntables[$tkey]) ? $pntables[$tkey] : '';
            $this->_columns = isset($pntables[$ckey]) ? $pntables[$ckey] : '';
        }

        if (!$init) {
            return;
        }

        if (is_array($init)) {
            $this->setData ($init);
        } elseif (is_string($init)) {
            if ($init == $this->_GET_FROM_DB)
                $this->get($where, $orderBy, -1, -1, $assocKey, true);
            else
            if ($init == $this->_GET_FROM_GET)
                $this->getDataFromSource ($_GET, $this->_objPath, array());
            else
            if ($init == $this->_GET_FROM_POST)
                $this->getDataFromSource ($_POST, $this->_objPath, array());
            else
            if ($init == $this->_GET_FROM_REQUEST)
                $this->getDataFromSource ($_REQUEST, $this->_objPath, array());
            else
            if ($init == $this->_GET_FROM_SESSION)
                $this->getDataFromSource ($_SESSION, $this->_objPath, array(), false);
            else
                return pn_exit (__f("Error! An invalid initialization directive '%s' found in 'PNObject::init()'.", $init));
        }
        else
          return pn_exit (__f("Error! An unexpected parameter type initialization '%s' was encountered in 'PNObject::init()'.", $init));
    }


    /**
     * Set (and return) the object data. Since we dont' have a definitive key, we don't cache
     *
     * @param data      The data to assign
     */
    function setData ($data)
    {
        if (!is_array($data)) {
            return false;
        }

        $this->_objData = $data;
        return $this->_objData;
    }


    /**
     * Return the record count for the given object set
     *
     * @param where     The where-clause to use
     * @param doJoin    whether or not to use the auto-join for the count
     *
     * @return The object's data set count
     */
    function getCount ($where='', $doJoin=false)
    {
        if ($this->_objJoin && $doJoin) {
            $this->_objData = DBUtil::selectExpandedObjectCount ($this->_objType, $this->_objJoin, $where, false, $this->_objCategoryFilter);
        } else {
            $this->_objData = DBUtil::selectObjectCount ($this->_objType, $where, '1', false, $this->_objCategoryFilter);
        }
        return $this->_objData;
    }


    /**
     * Ensure that a filter has all used fields set in order to to ensure that there are no E_ALL
     * issues when accessing filter fields which may not be set + do additional processing as necessary
     * Default implementation which can be overridden by subclasses.
     *
     * @param filter    An array containing the set filter values (optional) (default=array())
     *
     * @return The processed filter array
     */
    function genFilterPreProcess ($filter=array())
    {
        return $filter;
    }


    /**
     * Return/Select the object using the given where clause.

    /**
     * Generate a filter for the array view. Default implementation which can be overridden by subclasses.
     *
     * @param filter    An array containing the set filter values (optional) (default=array())
     *
     * @return The generated filter (where-clause) string
     */
    function genFilter ($filter=array())
    {
        $filter = $this->genFilterPreProcess ($filter);
        return '';
    }


    /**
     * Return/Select the object using the given where clause.
     *
     * @param where         The where-clause to use
     * @param sort          The order-by clause to use
     * @param limitOffset   The limiting offset
     * @param limitNumRows  The limiting number of rows
     * @param assocKey      Key field to use for building an associative array (optional) (default=null)
     * @param force         whether or not to force a DB-get (optional) (default=false)
     * @param distinct      whether or not to do a select distinct (optional) (default=false)
     *
     * @return The object's data value
     */
    function getWhere ($where='', $sort='', $limitOffset=-1, $limitNumRows=-1, $assocKey=null, $force=false, $distinct=false)
    {
        if ((($where != $this->_objWhere || $sort != $this->_objSort ||
             $limitOffset != $this->_objLimitOffset || $limitNumRows != $this->_objLimitNumRows ||
             $assocKey != $this->_objAssocKey || $distinct != $this->_objDistinct) || !$this->_objData) || $force) {
                $this->select($where, $sort, $limitOffset, $limitNumRows, $assocKey, $distinct);
        }

        return $this->_objData;
    }


    /**
     * Return the current object data. Maps to $this->getWhere().
     *
     * @param where         The where-clause to use
     * @param sort          The order-by clause to use
     * @param limitOffset   The limiting offset
     * @param limitNumRows  The limiting number of rows
     * @param assocKey      Key field to use for building an associative array (optional) (default=null)
     * @param force         whether or not to force a DB-get (optional) (default=false)
     * @param distinct      whether or not to do a select distinct (optional) (default=false)
     *
     * @return The object's data value
     */
    function get ($where='', $sort='', $limitOffset=-1, $limitNumRows=-1, $assocKey=null, $force=false, $distinct=false)
    {
        return $this->getWhere ($where, $sort, $limitOffset, $limitNumRows, $assocKey, $force, $distinct);
    }


    /**
     * Return the currently set object data
     *
     * @return The object's data array
     */
    function getData ()
    {
        return $this->_objData;
    }


    /**
     * Generic select handler for an object. Select (and set) the specified object array
     *
     * @param where         The where-clause to use
     * @param orderBy       The order-by clause to use
     * @param limitOffset   The limiting offset
     * @param limitNumRows  The limiting number of rows
     * @param assocKey      Key field to use for building an associative array (optional) (default=null)
     * @param distinct      whether or not to use the distinct clause
     *
     * @return The selected Object-Array
     */
    function select ($where='', $orderBy='', $limitOffset=-1, $limitNumRows=-1, $assocKey=false, $distinct=false)
    {
        if ($this->_objJoin) {
            $objArr = DBUtil::selectExpandedObjectArray ($this->_objType, $this->_objJoin, $where, $orderBy, $limitOffset, $limitNumRows, $assocKey, $this->_objPermissionFilter, $this->_objCategoryFilter, $this->_objColumnArray);
        } else {
            $objArr = DBUtil::selectObjectArray ($this->_objType, $where, $orderBy, $limitOffset, $limitNumRows, $assocKey, $this->_objPermissionFilter, $this->_objCategoryFilter, $this->_objColumnArray);
        }

        $this->_objData         = $objArr;
        $this->_objWhere        = $where;
        $this->_objSort         = $orderBy;
        $this->_objLimitOffset  = $limitOffset;
        $this->_objLimitNumRows = $limitNumRows;
        $this->_objAssocKey     = $assocKey;
        $this->_objDistinct     = $distinct;

        $this->selectPostProcess ();
        return $this->_objData;
    }


    /**
     * Iterate over the object data and post-process it
     *
     * @return The Object Data
     */
    function selectPostProcess ($data=null)
    {
        return $this->_objData;
    }


    /**
     * Generic function to retrieve
     *
     * @return The Object Data
     */
    function getDataField ($offset, $key, $default=null)
    {
        $obj = $this->_objData[$offset];
        if (isset($obj[$key])) {
            return $obj[$key];
        }

        return $default;
    }


    /**
     * Save an object - if it has an ID update it, otherwise insert it
     *
     * @return The result set
     */
    function save()
    {
        $rc = true;
        $ak = array_keys($this->_objData);
        if (isset($this->_objData[$ak[0]][$this->_objField]) && $this->_objData[$ak[0]][$this->_objField]) {
                $rc = $this->update ();
        } else {
                $rc = $this->insert ();
        }
        return $rc;
    }


    /**
     * Generic insert handler for an object (ID is inserted into the object data)
     *
     * @return The Object Data
     */
    function insert ()
    {
        if (!$this->insertPreProcess ()) {
            return false;
        }

        $res = true;
        foreach ($this->_objData as $k=>$v) {
            $res = $res && DBUtil::insertObject ($this->_objData[$k], $this->_objType, $this->_objField);
        }

        if ($res) {
            $this->insertPostProcess ();
            return $this->_objData;
        }

        return false;
    }


    /**
     * Generic upate handler for an object
     *
     * @return The Object Data
     */
    function update ()
    {
        if (!$this->updatePreProcess ()) {
            return false;
        }

        $res = true;
        foreach ($this->_objData as $k=>$v) {
            $res = $res && DBUtil::updateObject ($this->_objData[$k], $this->_objType, '', $this->_objField);
        }

        if ($res) {
            $this->updatePostProcess ();
            return $this->_objData;
        }

        return false;
    }


    /**
     * Generic delete handler for an object
     *
     * @return The Object Data
     */
    function delete ()
    {
        if (!$this->deletePreProcess ()) {
            return false;
        }

        $res = true;
        foreach ($this->_objData as $k=>$v) {
            $res = $res && DBUtil::deleteObjectById ($this->_objType, $v[$this->_objField], $this->_objField);
        }

        if ($res) {
            $this->deletePostProcess ();
            return $this->_objData;
        }

        return false;
    }


    /**
     * Delete with a where-clause
     *
     * @param where         The where-clause to use
     *
     * @return The Object Data
     */
    function deleteWhere ($where=null)
    {
        if (!$where) {
            return false;
        }

        if (!$this->deletePreProcess ()) {
            return false;
        }

        $res = DBUtil::deleteWhere ($this->_objType, $where);
        $this->deletePostProcess ();

        return $this->_objData;
    }


    /**
     * Clean the acquired input
     *
     * @param objArray    The object-array to clean (optional) (default=null, reverts to $this->_objData)
     *
     * @return The Object Data
     */
    function clean ($objArray=null)
    {
        if (!$objArray) {
            $objArray =& $this->_objData;
        }

        $ak = array_keys($objArray);
        foreach ($ak as $k) {
            $obj =& $objArray[$k];
            $ak2 = array_keys($obj);
            foreach ($ak2 as $f) {
                $obj[$f] = FormUtil::getPassedValue(trim($obj[$f]));
            }
        }

        return $objArray;
    }


    /**
     * Get a selector for the object array
     *
     * @param name          The name of the selector to generate
     * @param selected      The currently selected value (optional) (default=-1234)
     * @param defaultValue  The default value (optional) (default=0)
     * @param defaultText   The default text (optional) (default='')
     * @param allValue      The all-selected value (optional) (default=0)
     * @param allText       The all-selected text (optional) (default='')
     * @param idField       The id field to use (optional) (default='id')
     * @param nameField     The name field to use (optional) (default='title')
     * @param submit        whether or not to submit the form upon selection (optional) (default=false)
     * @param ignoreList    The list of entries to ignore (default=null)
     *
     * @return The generated selector html text
     */
    function getSelector ($name, $selected=-1234, $defaultValue=0, $defaultText='',
                          $allValue=0, $allText='', $idField='id', $nameField='title',
                          $submit=false, $ignoreList=null)
    {
        $html = '<select name="'.$name.'"'
               .' id="'.DataUtil::formatForDisplay($name).'"'
               .($submit ? ' onChange="this.form.submit();"' : '')
               .'>';

        if ($defaultText) {
            $html .= "<option value=\"$defaultValue\">$defaultText</option>";
        }

        if ($allText) {
            $html .= "<option value=\"$allValue\">$allText</option>";
        }

        foreach ($this->_objData as $k => $v) {
            $disp  = $v[$nameField];
            $val   = $v[$idField];

            if (strpos($ignoreList, '$val') === false) {
                $sel   = ($val==$selected ? "selected" : "");
                $html .= "<option value=\"$val\" $sel>$disp</option>";
            }
        }
        $html .= '</select>';

        return $html;
    }


    /**
     * Constructur, init everything to sane defaults and handle parameters
     *
     * @return Boolean indicating whether or not validation passed successfully
     */
    function validate ()
    {
        Loader::loadClass ('ValidationUtil');

        $res1 = ValidationUtil::validateObjectPlain ($this->_objPath, $this->_objData, $this->_objValidation);
        $res2 = $this->validatePostProcess();

        if (!$res1 || !$res2) {
            return false;
        }

        return true;
    }


    /**
     * Get the hashcode for this object data array
     */
    function getHash ($includeStandardFields=true, $objArray=null)
    {
        if (!$objArray) {
            $objArray = $this->_objData;
        }

        $arrayHash = array();
        foreach ($objArray as $obj) {
            if (!$includeStandardFields) {
                ObjectUtil::removeStandardFieldsFromObject ($obj);
            }
            $arrayHash[] = DataUtil::hash(serialize($obj));
        }

        return DataUtil::hash(serialize($arrayHash));
    }
}
