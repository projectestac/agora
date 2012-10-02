<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: WorkflowUtil.class.php 27396 2009-11-04 01:38:04Z mateo $
 * @license GNU/LGPL - http://www.gnu.org/copyleft/lgpl.html
 * @author Drak, drak@hostnuke.com Feb 2006
 * Inspired by the Pagesetter workflow system by J�rn Wildt
 * @package Zikula_Core
 */

/**
 * WorkflowUtil Class
 * From a developers standpoint, we only use this class to address workflows
 * as the rest is for internal use by the workflow engine.
 *
 * @package Zikula_Core
 * @subpackage WorkflowUtil
 */
class WorkflowUtil
{
    /**
     * load xml workflow
     *
     * @param string $schema name of workflow scheme
     * @param string $module name of module
     *
     * @return mixed string of XML, or false
     */
    function loadSchema($schema = 'standard', $module = null)
    {
        static $workflows;

        if (!isset($workflows)) {
            $workflows = array();
        }

        // if no module specified, default to calling module
        if (empty($module)) {
            $module = pnModGetName();
        }

        // workflow caching
        if (isset($workflows[$module][$schema])) {
            return $workflows[$module][$schema];
        }

        // Get module info
        $modinfo = pnModGetInfo(pnModGetIDFromName($module));
        if (!$modinfo) {
            return pn_exit(__f('%s: The specified module [%s] does not exist', array('WorkflowUtil', $module)));
        }

        $path = WorkflowUtil::_findpath("$schema.xml", $module);
        if ($path) {
            $workflowXML = file_get_contents($path);
        } else {
            return pn_exit(__f('%s: Unable to find the workflow file [%s]', array('WorkflowUtil', $path)));
        }

        // instanciate Workflow Parser
        $parser = new pnWorkflowParser();

        // parse workflow and return workflow object
        $workflowSchema = $parser->parse($workflowXML, $schema, $module);

        // destroy parser
        unset($parser);

        // cache workflow
        $workflows[$module][$schema] = $workflowSchema;

        // return workflow object
        return $workflows[$module][$schema];
    }

    /**
     * Find the path of the file by searching overrides and the module location
     *
     * @access private
     * @param string $file name of file to find (can include relative path)
     * @param string $module
     * @return mixed string of path or bool false
     */
    function _findpath($file, $module = null)
    {
        // if no module specified, default to calling module
        if (empty($module)) {
            $module = pnModGetName();
        }

        // Get module info
        $modinfo = pnModGetInfo(pnModGetIDFromName($module));
        if (!$modinfo) {
            return pn_exit(__f('%s: The specified module [%s] does not exist', array('WorkflowUtil', $module)));
        }

        $moduledir = $modinfo['directory'];

        // determine which folder to look in (system or modules)
        if ($modinfo['type'] == 3) { // system module
            $modulepath = "system/$moduledir";
        } else if ($modinfo['type'] == 2) { // non system module
            $modulepath = "modules/$moduledir";
        } else {
            return pn_exit(__f('%s: Unsupported module type', 'WorkflowUtil'));
        }

        // ensure module is active
        if (!$modinfo['state'] == 3) {
            return pn_exit(__f('%s: The module [%s] is not active', array('WorkflowUtil', $module)));
        }

        $themedir = ThemeUtil::getInfo(ThemeUtil::getIDFromName(pnUserGetTheme()));
        $themepath = DataUtil::formatForOS("themes/$themedir/workflows/$moduledir/$file");
        $configpath = DataUtil::formatForOS("config/workflows/$moduledir/$file");
        $modulepath = DataUtil::formatForOS("$modulepath/workflows/$file");

        // find the file in themes or config (for overrides), else module dir
        if (is_readable($themepath)) {
            return $themepath;
        } else if (is_readable($configpath)) {
            return $configpath;
        } else if (is_readable($modulepath)) {
            return $modulepath;
        } else {
            return false;
        }
    }

    /**
     * Execute action
     *
     * @param string $schema name of workflow schema
     * @param array $obj data object
     * @param string $actionID action to perform
     * @param string $table table where data will be stored (default = null)
     * @param string $module name of module (defaults calling module)
     * @param int $id ID column of table
     * @return mixed
     */
    function executeAction($schema, &$obj, $actionID, $table = null, $module = null, $idcolumn = 'id')
    {
        if (!isset($obj)) {
            return pn_exit(__f('%s: $obj not set', 'WorkflowUtil'));
        }

        if (!is_array($obj)) {
            return pn_exit(__f('%s: $obj must be an array.', 'WorkflowUtil'));
        }

        if (empty($schema)) {
            return pn_exit(__f('%s: $schema needs to be named', 'WorkflowUtil'));
        }

        if (is_null($module)) {
            // default to calling module
            $module = pnModGetName();
        }

        $stateID = WorkflowUtil::getWorkflowState($obj, $table, $idcolumn, $module);
        if (!$stateID) {
            $stateID = 'initial';
        }

        // instanciate workflow
        $workflow = new pnWorkflow($schema, $module);

        return $workflow->executeAction($actionID, $obj, $stateID);
    }

    /**
     * delete workflows for module (used module uninstall time)
     *
     * @param string $module
     * @return bool
     */
    function deleteWorkflowsForModule($module)
    {
        if (!isset($module)) {
            $module = pnModGetName();
        }

        if (!pnModDBInfoLoad('Workflow')) {
            return false;
        }

        // this is a cheat to delete all items in table with value $module
        return (bool) DBUtil::deleteObjectByID('workflows', $module, 'module');
    }

    /**
     * delete a workflow and associated data
     *
     * @param array $obj
     * @return bool
     */
    function deleteWorkflow($obj)
    {
        $workflow = $obj['__WORKFLOW__'];
        $idcolumn = $workflow['obj_idcolumn'];
        if (!DBUtil::deleteObjectByID($workflow['obj_table'], $obj[$idcolumn], $idcolumn)) {
            return false;
        }

        return (bool) DBUtil::deleteObjectByID('workflows', $workflow['id']);
    }

    /**
     * get Actions by State
     *
     * Returns allowed action ids for given state
     *
     * @param string $schemaName
     * @param string $module
     * @param string $state default = 'initial'
     * @param array $obj
     * @return mixed array or bool false
     */
    function getActionsByState($schemaName, $module = null, $state = 'initial', $obj = array())
    {
        if (!isset($module)) {
            $module = pnModGetName();
        }

        // load up schema
        $schema = WorkflowUtil::loadSchema($schemaName, $module);
        if (!$schema) {
            return false;
        }

        $actions = $schema['actions'][$state];
        $allowedActions = array();
        foreach ($actions as $action) {
            if (WorkflowUtil::permissionCheck($module, $schemaName, $obj, $action['permission'], $action['id'])) {
                $allowedActions[$action['id']] = $action['id'];
            }
        }

        return $allowedActions;
    }

    /**
     * getActionsByStateArray
     *
     * Returns allowed action array for given state
     *
     * @param string $schemaName
     * @param string $module
     * @param string $state default = 'initial'
     * @param array $obj
     * @return mixed array or bool false
     */
    function getActionsByStateArray($schemaName, $module = null, $state = 'initial', $obj = array())
    {
        if (!isset($module)) {
            $module = pnModGetName();
        }

        // load up schema
        $schema = WorkflowUtil::loadSchema($schemaName, $module);
        if (!$schema) {
            return false;
        }

        $actions = $schema['actions'][$state];
        $allowedActions = array();
        foreach ($actions as $action) {
            if (WorkflowUtil::permissionCheck($module, $schemaName, $obj, $action['permission'], $action['id'])) {
                $allowedActions[$action['id']] = $action;
            }
        }

        return $allowedActions;
    }

    /**
     * get possible actions for a given item of data in it's current workflow state
     *
     * @param array $obj
     * @param string $dbTable
     * @param mixed $idcolumn id field default = 'id'
     * @param string $module module name (defaults to current module)
     *
     * @return mixed array of actions or bool false
     */
    function getActionsForObject(&$obj, $dbTable, $idcolumn = 'id', $module = null)
    {
        if (!is_array($obj)) {
            return pn_exit(__f('%s: %s is not an array.', array('WorkflowUtil::getActionsForObject', 'object')));
        }

        if (!isset($dbTable)) {
            return pn_exit(__f('%s: %s is specified.', array('WorkflowUtil::getActionsForObject', 'dbTable')));
        }

        if (empty($module)) {
            $module = pnModGetName();
        }

        if (!WorkflowUtil::getWorkflowForObject($obj, $dbTable, $idcolumn, $module)) {
            return false;
        }

        $workflow = $obj['__WORKFLOW__'];
        return WorkflowUtil::getActionsByState($workflow['schemaname'], $workflow['module'], $workflow['state'], $obj);
    }

    /**
     * Load workflow for object
     * will attach array '__PNWORKFLOW__' to the object
     *
     * @param array $obj
     * @param string $dbTable name of table where object is or will be stored
     * @param string $id name of ID column of object
     * @param string $module module name (defaults to current module)
     * @return bool
     */
    function getWorkflowForObject(&$obj, $dbTable, $idcolumn = 'id', $module = null)
    {
        if (empty($module)) {
            $module = pnModGetName();
        }

        if (!isset($obj) || !is_array($obj)) {
            return pn_exit(__f('%s: %s is not an array.', array('WorkflowUtil::getWorkflowForObject', 'object')));
        }

        if (!isset($dbTable)) {
            return pn_exit(__f('%s: %s is specified.', array('WorkflowUtil::getWorkflowForObject', 'dbTable')));
        }

        // get workflow data from DB
        if (!pnModDBInfoLoad('Workflow')) {
            return false;
        }

        $pntables = pnDBGetTables();
        $workflows_column = $pntables['workflows_column'];
        $where = "WHERE $workflows_column[module]='" . DataUtil::formatForStore($module) . "'
                    AND $workflows_column[obj_table]='" . DataUtil::formatForStore($dbTable) . "'
                    AND $workflows_column[obj_idcolumn]='" . DataUtil::formatForStore($idcolumn) . "'
                    AND $workflows_column[obj_id]='" . DataUtil::formatForStore($obj[$idcolumn]) . "'";
        $workflow = DBUtil::selectObject('workflows', $where);

        if (!$workflow) {
            $workflow = array('state' => 'initial', 'obj_table' => $dbTable, 'obj_idcolumn' => $idcolumn, 'obj_id' => $obj[$idcolumn]);
        }

        // attach workflow to object
        $obj['__WORKFLOW__'] = $workflow;
        return true;
    }

    /**
     * get workflow state of object
     *
     * @param array $obj
     * @param string $table
     * @param string $idcolumn name of ID column
     * @param string $module module name (defaults to current module)
     *
     * @return mixed string workflow state name or false
     */
    function getWorkflowState(&$obj, $table, $idcolumn = 'id', $module = null)
    {
        if (empty($module)) {
            $module = pnModGetName();
        }

        if (!isset($obj['__WORKFLOW__'])) {
            if (!WorkflowUtil::getWorkflowForObject($obj, $table, $idcolumn, $module)) {
                return false;
            }
        }

        $workflow = $obj['__WORKFLOW__'];
        return $workflow['state'];
    }

    /**
     * Check permission of action
     *
     * @param string $module
     * @param string $schema
     * @param array $obj
     * @param int $permLevel
     * @param int $actionId
     * @return bool
     */
    function permissionCheck($module, $schema, $obj = array(), $permLevel, $actionId = null)
    {
        // translate permission to something meaningful
        $permLevel = WorkflowUtil::translatePermission($permLevel);

        // test conversion worked
        if (!$permLevel) {
            return false;
        }

        // get current user
        $currentUser = pnUserGetVar('uid');
        // no user then assume anon
        if (empty($currentUser)) {
            $currentUser = -1;
        }

        $function = "{$module}_workflow_{$schema}_permissioncheck";
        if (function_exists($function)) {
            // function already exists
            return $function($obj, $permLevel, $currentUser, $actionId);
        }

        // test operation file exists
        $path = WorkflowUtil::_findpath("function.{$schema}_permissioncheck.php", $module);
        if (!$path) {
            return pn_exit(__f("permission check file: function.%s_permissioncheck.php : does not exist", $schema));
        }

        // load file and test if function exists
        Loader::includeOnce($path);
        if (!function_exists($function)) {
            return pn_exit(__f("permission check function: %s: not defined", $function));
        }

        // function must be loaded so now we can execute the function
        return $function($obj, $permLevel, $currentUser, $actionId);
    }

    /**
     * translates workflow permission to pn permission define
     *
     * @param string $permission
     * @return mixed int or false
     */
    function translatePermission($permission)
    {
        $permission = strtolower($permission);
        switch ($permission) {
            case 'invalid':
                return ACCESS_INVALID;
            case 'overview':
                return ACCESS_OVERVIEW;
            case 'read':
                return ACCESS_READ;
            case 'comment':
                return ACCESS_COMMENT;
            case 'moderate':
                return ACCESS_MODERATE;
            case 'moderator':
                return ACCESS_MODERATE;
            case 'edit':
                return ACCESS_EDIT;
            case 'editor':
                return ACCESS_EDIT;
            case 'add':
                return ACCESS_ADD;
            case 'author':
                return ACCESS_ADD;
            case 'delete':
                return ACCESS_DELETE;
            case 'admin':
                return ACCESS_ADMIN;
            default:
                return false;
        }
    }
}

/**
 * pnWorkflow class
 *
 * @package Zikula_Core
 * @subpackage WorkflowUtil
 */
class pnWorkflow
{
    /**
     * Enter description here...
     *
     * @param $id
     * @param $title
     * @param $description
     * @param $states
     * @param $actions
     * @param $configurations
     * @return object pnWorkflow
     */
    function pnWorkflow($schema, $module)
    {
        // load workflow schema
        $schema = WorkflowUtil::loadSchema($schema, $module);

        $this->id = $schema['workflow']['id'];
        $this->title = $schema['workflow']['title'];
        $this->description = $schema['workflow']['description'];
        $this->module = $module;
        $this->actionMap = $schema['actions'];
        $this->stateMap = $schema['states'];
        $this->workflowData = null;
    }

    /**
     * register workflow by $metaId
     *
     * @param object $workflow
     * @param array $data
     * @param string $state default=null;
     * @return bool
     */
    function registerWorkflow(&$obj, $stateID = null)
    {
        $workflowData = $obj['__WORKFLOW__'];
        $idcolumn = $workflowData['obj_idcolumn'];
        $insertObj = array('obj_table' => $workflowData['obj_table'], 'obj_idcolumn' => $workflowData['obj_idcolumn'], 'obj_id' => $obj[$idcolumn], 'module' => $this->getModule(), 'schemaname' => $this->id, 'state' => $stateID);

        if (!pnModDBInfoLoad('Workflow')) {
            return false;
        }

        if (!DBUtil::insertObject($insertObj, 'workflows')) {
            return false;
        }

        $this->workflowData = $insertObj;
        $obj['__WORKFLOW__'] = $insertObj;
        return true;
    }

    /**
     * update workflow state
     *
     * @param string $stateID
     * @param string $debug
     * @return bool
     */
    function updateWorkflowState($stateID, $debug = null)
    {
        $obj = array('id' => $this->workflowData['id'], 'state' => $stateID);

        if (isset($debug)) {
            $obj['debug'] = $debug;
        }

        if (!pnModDBInfoLoad('Workflow')) {
            return false;
        }

        return (bool) DBUtil::updateObject($obj, 'workflows');
    }

    /**
     * execute workflow action
     *
     * @param string $actionID
     * @param array $obj
     * @param string $stateID
     * @return mixed array or false
     */
    function executeAction($actionID, &$obj, $stateID = 'initial')
    {
        // check if state exists
        if (!isset($this->actionMap[$stateID])) {
            return pn_exit("STATE: $stateID not found");
        }

        // check the action exists for given state
        if (!isset($this->actionMap[$stateID][$actionID])) {
            return pn_exit(__f('Action: %s not available in this State: %s', array($actionID, $stateID)));
        }

        $action = $this->actionMap[$stateID][$actionID];

        // permission check
        if (!WorkflowUtil::permissionCheck($this->module, $this->id, $obj, $action['permission'])) {
            return pn_exit(__f('No permission to execute action: %s [permission]', $action));
        }

        // commit workflow to object
        $this->workflowData = $obj['__WORKFLOW__'];

        // get operations
        $operations = $action['operations'];
        $nextState = (isset($action['nextState']) ? $action['nextState'] : $stateID);

        foreach ($operations as $operation) {
            $result[$operation['name']] = $this->executeOperation($operation, $obj, $nextState);
            if (!$result[$operation['name']]) {
                // if an operation fails here, do not process further and return false
                return false;
            }
        }

        // test if state needs to be updated
        if ($nextState == $stateID) {
            return $result;
        }

        // if this is an initial object then we need to register with the DB
        if ($stateID == 'initial') {
            $this->registerWorkflow($obj, $stateID);
        }

        // change the workflow state
        if (!$this->updateWorkflowState($nextState)) {
            return false;
        }

        // return result of all operations (possibly okay to just return true here)
        return $result;
    }

    /**
     * execute workflow operation within action
     *
     * @param  string $operation
     * @param  array $data
     * @return mixed or false
     */
    function executeOperation($operation, &$obj, $nextState)
    {
        $operationName = $operation['name'];
        $operationParams = $operation['parameters'];

        // test operation file exists
        $path = WorkflowUtil::_findpath("operations/function.{$operationName}.php", $this->module);
        if (!$path) {
            return pn_exit(__f('Operation file [%s] does not exist', $operationName));
        }

        // load file and test if function exists
        Loader::includeOnce($path);
        $function = "{$this->module}_operation_{$operationName}";
        if (!function_exists($function)) {
            return pn_exit(__f('Operation function [%s] is not defined', $function));
        }

        // execute operation and return result
        return $function($obj, $operationParams);
    }

    /**
     * get workflow ID
     *
     * @return string workflow schema name
     */
    function getID()
    {
        return $this->id;
    }

    /**
     * get workflow title
     *
     * @return string title
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * get workflow description
     *
     * @return string description
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * get workflow Module
     *
     * @return string module name
     */
    function getModule()
    {
        return $this->module;
    }
    var $module;
    var $id;
    var $title;
    var $description;
    var $stateMap;
    var $actionMap;
    var $workflowData;
}

/**
 * Workflow Parser
 * Parse workflow schema into associative arrays
 *
 * @author J�rn Wildt
 * @author Drak
 * @package Zikula_Core
 * @subpackage WorkflowUtil
 */
class pnWorkflowParser
{
    /**
     * parse workflow into array format
     *
     */
    function pnWorkflowParser()
    {
        $this->workflow = array('state' => 'initial');

        // create xml parser
        $this->parser = xml_parser_create();
        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, 'startElement', 'endElement');
        xml_set_character_data_handler($this->parser, 'characterData');
    }

    /**
     * parse xml
     *
     * @param string $xmldata
     * @param string $schemaName
     * @param string $module
     * @param string $schemaPath
     * @return mixed associative array of workflow or false
     */
    function parse($xmldata, $schemaName, $module)
    {
        // parse XML
        if (!xml_parse($this->parser, $xmldata, true)) {
            xml_parser_free($this->parser);
            pn_exit(__f('Unable to parse XML workflow (line %1$s, %2$s): %3$s',
                        array(xml_get_current_line_number($this->parser),
                              xml_get_current_column_number($this->parser),
                              xml_error_string($this->parser))));
        }

        // close parser
        xml_parser_free($this->parser);

        // check for errors
        if ($this->workflow['state'] == 'error') {
            return LogUtil::registerError($this->workflow['errorMessage']);
        }

        $this->mapWorkflow();

        if (!$this->validate()) {
            return false;
        }

        $this->workflow['workflow']['module'] = $module;
        $this->workflow['workflow']['id'] = $schemaName;

        return $this->workflow;
    }

    /**
     * Map workflow
     * marshall data in to meaningful associative arrays
     *
     */
    function mapWorkflow()
    {
        $states = $this->workflow['states'];
        $actions = $this->workflow['actions'];

        // create associative arrays maps
        $actionMap = array();
        $stateMap = array();

        foreach ($states as $state) {
            $stateMap[$state['id']] = array($state['id'], $state['title'], $state['description']);
            foreach ($actions as $action) {
                if (($action['state'] == 'initial') || ($action['state'] == null) || ($action['state'] == $state['id'])) {
                    if ($action['state'] == 'initial' || $action['state'] == null) {
                        $stateID = 'initial';
                    } else if (($action['state']) == $state['id']) {
                        $stateID = $state['id'];
                    }

                    // change the case of array keys for parameter variables
                    $operations = &$action['operations'];
                    $ak = array_keys($operations);
                    foreach ($ak as $key) {
                        $parameters = &$operations[$key]['parameters'];
                        $parameters = array_change_key_case($parameters, CASE_LOWER);
                    }

                    // commit results
                    $actionID = $action['id'];
                    $actionMap[$stateID][$actionID] = $action;
                }
            }
        }

        // commit new array to workflow
        $this->workflow['actions'] = $actionMap;
        $this->workflow['states'] = $stateMap;
    }

    /**
     * validate workflow actions
     *
     */
    function validate()
    {
        $stateMap = $this->workflow['states'];
        $states = $this->workflow['actions'];
        $ak = array_keys($states);
        foreach ($ak as $stateID) {
            $actions = $this->workflow['actions'][$stateID];
            foreach ($actions as $action) {
                $stateName = $action['state'];
                if ($stateName != null) {
                    if (!isset($stateMap[$stateName]))
                        return LogUtil::registerError(__f('Unknown %1$s name \'%2$s\' in action \'%3$s\'', array('state', $stateName, $action['title'])));
                }

                if (isset($action['nextState'])) {
                    $nextStateName = $action['nextState'];
                }

                if (isset($nextStateName)) {
                    if (!isset($stateMap[$nextStateName]))
                        return LogUtil::registerError(__f('Unknown %1$s name \'%2$s\' in action \'%3$s\'', array('next-state', $nextStateName, $action['title'])));
                }

                foreach ($action['operations'] as $operation) {
                    if (isset($operation['parameters']['NEXTSTATE'])) {
                        $stateName = $operation['parameters']['NEXTSTATE'];
                        if (!isset($stateMap[$stateName]))
                            return LogUtil::registerError(__f('Unknown state name \'%1$s\' in action \'%2$s\' - operation \'%3$s\'', array($stateName, $action['title'], $operation['name'])));
                    }
                }
            }
        }

        return true;
    }

    /**
     * XML start element handler
     *
     * @access private
     * @param  object $parser
     * @param  string $name
     * @param  array $attribs
     */
    function startElement($parser, $name, $attribs)
    {
        $state = &$this->workflow['state'];

        if ($state == 'initial') {
            if ($name == 'WORKFLOW') {
                $state = 'workflow';
                $this->workflow['workflow'] = array();
            } else {
                $state = 'error';
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
            }
        } else if ($state == 'workflow') {
            if ($name == 'TITLE' || $name == 'DESCRIPTION') {
                $this->workflow['value'] = '';
            } else if ($name == 'STATES') {
                $state = 'states';
                $this->workflow['states'] = array();
            } else if ($name == 'ACTIONS') {
                $state = 'actions';
                $this->workflow['actions'] = array();
            } else {
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
                $state = 'error';
            }
        } else if ($state == 'states') {
            if ($name == 'STATE') {
                $this->workflow['stateValue'] = array('id' => trim($attribs['ID']));
                $state = 'state';
            } else {
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
                $state = 'error';
            }
        } else if ($state == 'state') {
            if ($name == 'TITLE' || $name == 'DESCRIPTION') {
                $this->workflow['value'] = '';
            } else {
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
                $state = 'error';
            }
        } else if ($state == 'actions') {
            if ($name == 'ACTION') {
                $this->workflow['action'] = array('id' => trim($attribs['ID']), 'operations' => array(), 'state' => null);
                $state = 'action';
            } else {
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
                $state = 'error';
            }
        } else if ($state == 'action') {
            if ($name == 'TITLE' || $name == 'DESCRIPTION' || $name == 'PERMISSION' || $name == 'STATE' || $name == 'NEXTSTATE') {
                $this->workflow['value'] = '';
            } else if ($name == 'OPERATION') {
                $this->workflow['value'] = '';
                $this->workflow['operationParameters'] = $attribs;
            } else {
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
                $state = 'error';
            }
        } else if ($state == '') {
            if ($name == '') {
                $state = '';
            } else {
                $this->workflow['errorMessage'] = $this->unexpectedXMLError($name, $state . " " . __LINE__);
                $state = 'error';
            }
        } else if ($state == 'error') {
            ; // ignore
        } else {
            $this->workflow['errorMessage'] = _PNWF_STATEERROR . " '$state' " . " '$name'";
            $state = 'error';
        }
    }

    /**
     * XML end element handler
     *
     * @access private
     * @param  object $parser
     * @param  string $name
     */
    function endElement($parser, $name)
    {
        $state = &$this->workflow['state'];

        if ($state == 'workflow') {
            if ($name == 'TITLE') {
                $this->workflow['workflow']['title'] = $this->workflow['value'];
            } else if ($name == 'DESCRIPTION') {
                $this->workflow['workflow']['description'] = $this->workflow['value'];
            }
        } else if ($state == 'state') {
            if ($name == 'TITLE') {
                $this->workflow['stateValue']['title'] = $this->workflow['value'];
            } else if ($name == 'DESCRIPTION') {
                $this->workflow['stateValue']['description'] = $this->workflow['value'];
            } else if ($name == 'STATE') {
                $this->workflow['states'][] = $this->workflow['stateValue'];
                $this->workflow['stateValue'] = null;
                $state = 'states';
            }
        } else if ($state == 'action') {
            if ($name == 'TITLE') {
                $this->workflow['action']['title'] = $this->workflow['value'];
            } else if ($name == 'DESCRIPTION') {
                $this->workflow['action']['description'] = $this->workflow['value'];
            } else if ($name == 'PERMISSION') {
                $this->workflow['action']['permission'] = trim($this->workflow['value']);
            } else if ($name == 'STATE') {
                $this->workflow['action']['state'] = trim($this->workflow['value']);
            } else if ($name == 'OPERATION') {
                $this->workflow['action']['operations'][] = array('name' => trim($this->workflow['value']), 'parameters' => $this->workflow['operationParameters']);
                $this->workflow['operation'] = null;
            } else if ($name == 'NEXTSTATE') {
                $this->workflow['action']['nextState'] = trim($this->workflow['value']);
            } else if ($name == 'ACTION') {
                $this->workflow['actions'][] = $this->workflow['action'];
                $this->workflow['action'] = null;
                $state = 'actions';
            }
        } else if ($state == 'actions') {
            if ($name == 'ACTIONS') {
                $state = 'workflow';
            }
        } else if ($state == 'states') {
            if ($name == 'STATES') {
                $state = 'workflow';
            }
        }

    }

    /**
     * XML data element handler
     *
     * @access private
     * @param  object $parser parser object
     * @param  string $data
     */
    function characterData($parser, $data)
    {
        $value = &$this->workflow['value'];
        $value .= $data;
    }

    /**
     * hander for unexpected XML errors
     *
     * @param string $name
     * @param string $state
     * @return string
     */
    function unexpectedXMLError($name, $state)
    {
        return __f('Unexpected %s tag in %s state', array($name, $state));
    }

    // Declare object variables;
    var $parser;
    var $workflow;
}
