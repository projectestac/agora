<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformtextinput.php 21046 2007-01-11 21:36:57Z jornlind $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 * @author Axel Guckelsberger
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformdropdownlist.php" is loaded by Smarty
with the use of require_once(). We do not want to get in conflict with that.*/
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

/**
 * Dropdown multilist
 *
 * @package rtdb
 * @subpackage Plugins
 */
class pnFormDropDownRelationlist extends pnFormDropdownList
{
    var $module;
    var $objecttype;
    var $prefix = 'PN';
    var $where = '';
    var $orderby = '';
    var $pos = -1;
    var $num = -1;
    var $idField = '';
    var $displayField = '';

    function getFilename()
    {
        return __FILE__; // FIXME: should be found in smarty's data???
    }

    function create(&$render, &$params)
    {
        if (!isset($params['module']) || empty($params['module'])) {
            $render->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnformdropdownrelationlist', 'module')));
        }
        $this->module = $params['module'];
        unset($params['module']);
        if (!pnModAvailable($this->module)) {
            $render->trigger_error(__f('Error! in %1$s: an invalid %2$s parameter was received.', array('pnformdropdownrelationlist', 'module')));
        }

        if (!isset($params['objecttype']) || empty($params['objecttype'])) {
            $render->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnformdropdownrelationlist', 'objecttype')));
        }
        $this->objecttype = $params['objecttype'];
        unset($params['objecttype']);

        if (!isset($params['idField']) || empty($params['idField'])) {
            $render->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnformdropdownrelationlist', 'idField')));
        }
        $this->idField = $params['idField'];
        unset($params['idField']);

        if (!isset($params['displayField']) || empty($params['displayField'])) {
            $render->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnformdropdownrelationlist', 'displayField')));
        }
        $this->displayField = $params['displayField'];
        unset($params['displayField']);

        if (isset($params['prefix'])) {
            $this->prefix = $params['prefix'];
            unset($params['prefix']);
        }

        if (isset($params['where'])) {
            $this->where = $params['where'];
            unset($params['where']);
        }

        if (isset($params['orderby'])) {
            $this->orderby = $params['orderby'];
            unset($params['orderby']);
        }

        if (isset($params['pos'])) {
            $this->pos = $params['pos'];
            unset($params['pos']);
        }

        if (isset($params['num'])) {
            $this->num = $params['num'];
            unset($params['num']);
        }

        parent::create($render, $params);

        $this->cssClass .= ' relationlist';
    }

    function load(&$render, $params)
    {
        pnModDBInfoLoad($this->module);

        // load the object class corresponding to $this->objecttype
        if (!($class = Loader::loadArrayClassFromModule($this->module, $this->objecttype, false, $this->prefix))) {
            pn_exit(__f('Unable to load class [%s] for module [%s]', array(DataUtil::formatForDisplay($this->objecttype, $this->module))));
        }
        // instantiate the object-array
        $objectArray = new $class();

        // get() returns the cached object fetched from the DB during object instantiation
        // get() with parameters always performs a new select
        // while the result will be saved in the object, we assign in to a local variable for convenience.
        $objectData = $objectArray->get($this->where, $this->orderby, $this->pos, $this->num);

        foreach ($objectData as $obj)
        {
            $this->addItem($obj[$this->displayField], $obj[$this->idField]);
        }

        parent::load($render, $params);
    }
}

function smarty_function_pnformdropdownrelationlist($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormDropdownRelationlist', $params);
}
