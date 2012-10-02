<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: PNObject.class.php 27045 2009-10-21 14:27:04Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @package Zikula_Core
 * @subpackage PNObjectUtil
 */

/**
 * PNObjectUtil
 *
 * @package Zikula_Core
 * @subpackage PNObjectUtil
 */
class PNObject
{

    // state/type (static)
    var $_objType; // object type
    var $_objJoin; // object join data
    var $_objValidation; // object validation data


    // data + access descriptor
    var $_objColumnArray; // columns to select
    var $_objColumnPrefix; // object column prefix
    var $_objData; // object data
    var $_objField; // object key retrieval field
    var $_objInsertPreserve; // DBUtil insertObject preserve flag
    var $_objInsertForce; // DBUtil insertObject force flag
    var $_objKey; // object key value
    var $_objPath; // object input path
    var $_objPermissionFilter; // object permission filter applied
    var $_objSessionPath; // object session access path


    // support
    var $_table; // table name
    var $_columns; // column array


    // constants
    var $_GET_FROM_DB = 'D'; // get data from DB
    var $_GET_FROM_GET = 'G'; // get data from $_GET
    var $_GET_FROM_POST = 'P'; // get data from $_POST
    var $_GET_FROM_REQUEST = 'R'; // get data from $_REQUEST
    var $_GET_FROM_SESSION = 'S'; // get data from $_SESSION
    var $_GET_FROM_VALIDATION_FAILED = 'V'; // get data from failed validation


    /**
     * Constructur, init everything to sane defaults and handle parameters
     *
     * @param init       Initialization value (see _init() for details)
     * @param key        The DB key to use to retrieve the object (optional) (default=null)
     * @param field      The field containing the key value (optional) (default=null)
     */
    function PNObject($init = null, $key = null, $field = null)
    {
        $this->_objType = 'pn_generic';
        $this->_objValidation = null;
        $this->_objJoin = null;
        $this->_objData = null;
        $this->_objField = 'id';
        $this->_objInsertPreserve = false;
        $this->_objInsertForce = false;
        $this->_objKey = 0;
        $this->_objPath = 'generic';
        $this->_objSessionPath = '';
        $this->_objPermissionFilter = null;
        $this->_objCategoryFilter = null;
        $this->_objColumnArray = null;
        $this->_objColumnPrefix = 'generic';

        $this->_init($init, $key, $field);
    }

    /**
     * Internal intialization routine
     *
     * @param init       Initialization value (can be an object or a string directive)
     * @param key        The DB key to use to retrieve the object (optional) (default=null)
     * @param field      The field containing the key value (optional) (default=null)
     *
     * If $_init is an arrary it is set(), otherwise it is interpreted as a string specifying
     * the source from where the data should be retrieved from.
     */
    function _init($init = null, $key = null, $field = null)
    {
        if ($this->_objType != 'pn_generic') {
            $pntables = pnDBGetTables();
            $tkey = $this->_objType;
            $ckey = $this->_objType . "_column";
            $this->_table = isset($pntables[$tkey]) ? $pntables[$tkey] : null;
            $this->_columns = isset($pntables[$ckey]) ? $pntables[$ckey] : null;
            if ($field) {
                $this->_objField = $field;
            }
        }

        if (!$init) {
            return;
        }

        if (is_array($init)) {
            $this->setData($init);
        } elseif (is_string($init)) {
            if ($init == $this->_GET_FROM_DB) {
                if (!strlen($key))
                    return pn_exit("Missing DB-key in PNObject::init() ...");

                $this->get($key, $this->_objField, true);
            } else if ($init == $this->_GET_FROM_GET)
                $this->setData(FormUtil::getPassedValue($this->_objPath, null, 'GET'));
            else if ($init == $this->_GET_FROM_POST)
                $this->setData(FormUtil::getPassedValue($this->_objPath, null, 'POST'));
            else if ($init == $this->_GET_FROM_REQUEST)
                $this->setData(FormUtil::getPassedValue($this->_objPath, null, 'REQUEST'));
            else if ($init == $this->_GET_FROM_SESSION)
                $this->getDataFromSource($_SESSION, $this->_objPath);
            else if ($init == $this->_GET_FROM_VALIDATION_FAILED)
                $this->getDataFromSource($_SESSION['validationFailedObjects'], $this->_objPath);
            else
                return pn_exit(__f("Error! An invalid initialization directive '%s' found in 'PNObject::init()'.", $init));
        } else
            return pn_exit(__f("Error! An unexpected parameter type initialization '%s' was encountered in 'PNObject::init()'.", $init));
    }

    /**
     * Generate an empty object with the fields initialized to null
     */
    function generateEmptyObject()
    {
        $pntables = pnDBGetTables();
        $tkey = $this->_objType;
        $ckey = $this->_objType . "_column";
        $this->_table = isset($pntables[$tkey]) ? $pntables[$tkey] : '';
        $this->_columns = isset($pntables[$ckey]) ? $pntables[$ckey] : '';

        $data = array();
        foreach ($this->_columns as $k => $v) {
            $data[$k] = null;
        }

        $this->setData($data);
        return $data;
    }

    /**
     * Set (and return) the object data.
     *
     * @param data        The data to assign
     * @param cache       Whether or not to cache the data in session (optional) (default=true) - currently unused
     */
    function setData($data, $cache = false)
    {
        if (!is_array($data)) {
            return false;
        }

        $this->_objData = $data;
        //if ($cache) {
        //    $_SESSION[$this->_objPath] = $data;
        //}

        return $this->_objData;
    }

    /**
     * Return the current object data. If $key and $field are supplied,
     * the object is fetched again from the database.
     *
     * @param key        The record's key value
     * @param field      The field we wish to get (optional) (default='id')
     * @param force      If false, the system attempts to return the object from the session cache (optional) (default=false) (currently not used)
     *
     * @return The object's data value
     */
    function &get($key = 0, $field = 'id', $force = false)
    {
        if (!$key) {
            return $this->_objData;
        }

        return $this->select($key, $field);
    }

    /**
     * Return the currently set object data
     *
     * @return The object's data array
     */
    function getData()
    {
        return $this->_objData;
    }

    /**
     * Return the object ID field name
     *
     * @return The object's ID field name
     */
    function getIDField()
    {
        return $this->_objField;
    }

    /**
     * Return the object-ID or false
     *
     * @return The object-ID or false
     */
    function getID()
    {
        if (isset($this->_objData[$this->_objField])) {
            return $this->_objData[$this->_objField];
        }

        return false;
    }

    /**
     * Return/Select the object using the given where clause.
     *
     * @param where        The where-clause to use
     *
     * @return The object's data value
     */
    function &getWhere($where)
    {
        return $this->select(null, null, $where);
    }

    /**
     * Get the object which failed validation
     *
     * @return The object's data value
     */
    function &getFailedValidationData()
    {
        $this->_objData = FormUtil::getFailedValidationObjects($this->_objPath);
        return $this->_objData;
    }

    /**
     * Return whether or not this object has a set id field
     *
     * @return Boolean
     */
    function hasID()
    {
        return (isset($this->_objData[$this->_objField]) && $this->_objData[$this->_objField]);
    }

    /**
     * Select the object from the database using the specified key (and field)
     *
     * @param key        The record's key value (if init is a string directive)
     * @param field      The key-field we wish to select by (optional) (default='id')
     * @param where      The key-field we wish to select by (optional) (default='id')
     *
     * @return The object's data value
     */
    function &select($key, $field = 'id', $where = '')
    {
        if (!$this->_objType) {
            return array();
        }

        if ((!$key || !$field) && !$where) {
            return array();
        }

        // use explicit where clause
        if ($where) {
            if ($this->_objJoin) {
                $objArray = DBUtil::selectExpandedObjectArray($this->_objType, $this->_objJoin, $where, '', -1, -1, '', $this->_objPermissionFilter, $this->_objCategoryFilter, $this->_objColumnArray);
            } else {
                $objArray = DBUtil::selectObjectArray($this->_objType, $where, '', -1, -1, '', $this->_objPermissionFilter, $this->_objCategoryFilter, $this->_objColumnArray);
            }

            if ($objArray === false) {
                $this->_objData = false;
            } else {
                if (isset($objArray[0])) {
                    $this->_objData = $objArray[0];
                } else {
                    $this->_objData = array();
                }
            }
        } // generic key=>value lookup
        else {
            if ($this->_objJoin) {
                $this->_objData = DBUtil::selectExpandedObjectById($this->_objType, $this->_objJoin, $key, $field, $this->_objColumnArray, $this->_objPermissionFilter, $this->_objCategoryFilter);
            } else {
                $this->_objData = DBUtil::selectObjectById($this->_objType, $key, $field, $this->_objColumnArray, $this->_objPermissionFilter, $this->_objCategoryFilter);
            }

            $this->_key = $key;
            $this->_field = $field;
        }

        $this->selectPostProcess();
        return $this->_objData;
    }

    /**
     * Post-Process the newly selected object. Subclasses can define appropriate implementations.
     *
     * @param obj         Override object (needed for selectObjectArray processing) (optional) (default=null)
     *
     * @return The object's data value
     */
    function selectPostProcess($obj = null)
    {
        return $this->_objData;
    }

    /**
     * Get the data from the various input streams provided.
     *
     * @param key        The access key of the object (optional) (default=null, reverts to $this->_objPath)
     * @param default    The default value to return (optional) (default=null)
     * @param source     Where to get the variable from (optional) (default='REQUEST')
     *
     * @return The requested object/value
     */
    function &getDataFromInput($key = null, $default = null, $source = 'REQUEST')
    {
        if (!$key) {
            $key = $this->_objPath;
        }

        $obj = FormUtil::getPassedValue($key, $default, $source);

        if ($obj) {
            $this->_objData = $obj;
            $this->getDataFromInputPostProcess();
            return $this->_objData;
        }

        return $default;
    }

    /**
     * Get the data from the various input streams provided.
     *
     * @param key        The access key of the object (optional) (default=null, reverts to $this->_objPath)
     * @param default    The default value to return (optional) (default=null)
     * @param source     Where to get the variable from (optional) (default=null)
     *
     * @return The requested object/value
     */
    function &getDataFromSession($key = null, $default = null, $path = '', $autocreate = true, $overwriteExistingVar = false)
    {
        if (!$key) {
            $key = $this->_objPath;
        }
        if (!$path) {
            $path = $this->_objSessionPath;
        }

        $obj = SessionUtil::getVar($key, $default, $path, $autocreate, $overwriteExistingVar);
        if ($obj && is_array($obj)) {
            $this->_objData = $obj;
            $this->getDataFromSessionPostProcess();
            return $this->_objData;
        }

        return $default;
    }

    /**
     * Set the current object data into session
     *
     * @param autocreate            The autocreate passed to SessionUtil::setVar
     * @param overwriteExistingVar  The overwriteExistingVar variable passed to SessionUtil::setVar
     *
     * @return The session data
     */
    function &setDataToSession($data = null, $key = null, $path = '', $autocreate = true, $overwriteExistingVar = false)
    {
        if (!$data) {
            $data = $this->_objData;
        }
        if (!$key) {
            $key = $this->_objPath;
        }
        if (!$path) {
            $path = $this->_objSessionPath;
        }

        if (!$this->setDataToSessionPreProcess($data)) {
            return false;
        }

        SessionUtil::setVar($path, $data, $path, $autocreate, $overwriteExistingVar);
        $this->_objData = $data;
        return $this->_objData;
    }

    /**
     * Post-Process the data after getting it from Input. Subclasses can define appropriate implementations.
     */
    function getDataFromInputPostProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Post-Process the data after getting it from Session. Subclasses can define appropriate implementations.
     */
    function getDataFromSessionPostProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Pre-Process the data before writing it to Session. Subclasses can define appropriate implementations.
     */
    function setDataToSessionPreProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Generic access function to retrieve data from the specified source
     *
     * @param source    The source data
     * @param key       The access key of the object (optional) (default=null)
     * @param default   The default value to return (optional) (default=null)
     * @param clean     Whether or not to clean the acquired data (optional) (default=true)
     *
     * @return The requested object/value
     */
    function getDataFromSource($source, $key = null, $default = null, $clean = true)
    {
        if (!$key) {
            $key = $this->_objPath;
        }

        if (isset($source[$key])) {
            return $this->setData($source[$key]);
        }

        return $this->setData($default);
    }

    /**
     * Generic function to retrieve
     *
     * @param key        The access key of the object field
     * @param default    The default value to return (optional) (default=null)
     *
     * @return The Object Data
     */
    function getDataField($key, $default = null)
    {
        $objData = $this->_objData;
        if (isset($objData[$key])) {
            return $objData[$key];
        }

        return $default;
    }

    /**
     * Generic function to retrieve
     *
     * @param key         The access key of the object field
     * @param value       The value to assign to the specified object field
     *
     * @return The value which was set into the specified object field
     */
    function setDataField($key, $value)
    {
        $objData = & $this->_objData;
        $objData[$key] = $value;

        return $value;
    }

    /**
     * Generic insert handler for an object (ID is inserted into the object data). If the object
     * contains a valid ID, it is updated, otherwise it it inserted
     *
     * @return The result set
     */
    function save()
    {
        $rc = true;
        if ($this->hasID()) {
            $rc = $this->update();
        } else {
            $rc = $this->insert();
        }

        return $rc;
    }

    /**
     * Generic insert handler for an object (ID is inserted into the object data)
     *
     * @return The Object Data
     */
    function insert()
    {
        if (!$this->insertPreProcess()) {
            return false;
        }

        $res = DBUtil::insertObject($this->_objData, $this->_objType, $this->_objField, $this->_objInsertPreserve, $this->_objInsertForce);
        if ($res) {
            $this->insertPostProcess();
            return $this->_objData;
        }

        return false;
    }

    /**
     * Pre-Process the data prior to an insert. Subclasses can define appropriate implementations.
     */
    function insertPreProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Post-Process the data after an insert. Subclasses can define appropriate implementations.
     */
    function insertPostProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Generic upate handler for an object
     *
     * @return The Object Data
     */
    function update()
    {
        if (!$this->updatePreProcess()) {
            return false;
        }

        $res = DBUtil::updateObject($this->_objData, $this->_objType, '', $this->_objField);
        if ($res) {
            $this->updatePostProcess();
            return $this->_objData;
        }

        return false;
    }

    /**
     * Pre-Process the data prior to an update. Subclasses can define appropriate implementations.
     */
    function updatePreProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Post-Process the data after an update. Subclasses can define appropriate implementations.
     */
    function updatePostProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Generic delete handler for an object
     *
     * @return The Object Data
     */
    function delete()
    {
        if ($this->hasID()) {
            if (!$this->deletePreProcess()) {
                return false;
            }
            $res = DBUtil::deleteObjectById($this->_objType, $this->_objData[$this->_objField], $this->_objField);
            if ($res) {
                $this->deletePostProcess();
                return $this->_objData;
            }
        }

        return false;
    }

    /**
     * Pre-Process the data prior a delete. Subclasses can define appropriate implementations.
     */
    function deletePreProcess($data = null)
    {
        return $this->_objData;
    }

    /**
     * Post-Process the data after a delete. Subclasses can define appropriate implementations.
     */
    function deletePostProcess($data = null)
    {
        return $this->_objData;
    }

    function getValidation()
    {
        return $this->_objValidation;
    }

    /**
     * Generic function to validate an object
     *
     * @return Boolean indicating whether validation has passed or failed
     */
    function validate()
    {
        if (!$this->_objValidation) {
            return true;
        }

        if (!$this->_objData) {
            return false;
        }

        Loader::loadClass('ValidationUtil');
        $res1 = ValidationUtil::validateObjectPlain($this->_objPath, $this->_objData, $this->_objValidation);
        $res2 = $this->validatePostProcess();

        return ($res1 && $res2);
    }

    /**
     * Post-Process the basic object validation with class specific logic.
     * Subclasses can define appropriate implementations.
     */
    function validatePostProcess($type = 'user')
    {
        // empty function, should be implemented by child classes
        return true;
    }

    /**
     * Get the hashcode for this object data
     */
    function getHash($includeStandardFields = true, $objData = null)
    {
        if (!$objData) {
            $objData = $this->_objData;
        }

        if (!$includeStandardFields) {
            $objData = $this->_objData; // copy
            ObjectUtil::removeStandardFieldsFromObject($objData);
        }

        return DataUtil::hash(serialize($objData));
    }

    /**
     * Clear the failed validation errors for this object
     */
    function clearValidationErrors()
    {
        FormUtil::clearValidationErrors($this->_objPath);
    }

    /**
     * Clear the failed validation object data for this object
     */
    function clearFailedValidationData()
    {
        FormUtil::clearValidationFailedObjects($this->_objPath);
    }

    /**
     * Clear the session cache for this object
     */
    //function clearSessionCache()
    //{
    //    unset($_SESSION[$this->_objPath]);
    //}

    /**
     * Print HTML-formatted debug output for the object
     */
    function prayer()
    {
        prayer($this);
    }

    /**
     * Print HTML-formatted debug output for the object data
     */
    function prayerData()
    {
        prayer($this->_objData);
    }
}
