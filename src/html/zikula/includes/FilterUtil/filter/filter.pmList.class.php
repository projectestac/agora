<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: filter.pmList.class.php 28222 2010-02-08 02:22:59Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula
 * @subpackage FilterUtil
 */

Loader::loadClass('FilterUtil_Build', FILTERUTIL_CLASS_PATH);

class FilterUtil_Filter_pmList extends FilterUtil_PluginCommon implements FilterUtil_Build
{
    private $ops = array();
    private $fields;

    /**
     * Constructor
     *
     * @access public
     * @param array $config Configuration
     * @return object FilterUtil_Plugin_pgList
     */
    public function __construct($config)
    {
        parent::__construct($config);

        if (isset($config['fields'])) {
            $this->addFields($config['fields']);
        }

        if (isset($config['ops']) && (!isset($this->ops) || !is_array($this->ops))) {
            $this->activateOperators($config['ops']);
        } else {
            $this->activateOperators(array(
                            'eq',
                            'ne',
                            'lt',
                            'le',
                            'gt',
                            'ge',
                            'like',
                            'null',
                            'notnull'));
        }

        if ($config['default'] == true || count($this->fields) <= 0) {
            $this->default = true;
        }
    }

    /**
     * Adds fields to list in common way
     *
     * @access public
     * @param mixed $fields Fields to add
     */
    public function addFields($fields)
    {
        if (is_array($fields)) {
            foreach ($fields as $fld) {
                $this->addFields($fld);
            }
        } elseif (!empty($fields) && $this->fieldExists($fields) && array_search($fields, $this->fields) === false) {
            $this->fields[] = $fields;
        }
    }

    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Adds operators
     *
     * @access public
     * @param mixed $op Operators to activate
     */
    public function activateOperators($op)
    {
        if (is_array($op)) {
            foreach ($op as $v)
                $this->activateOperators($v);
        } elseif (!empty($op) && array_search($op, $this->ops) === false && array_search($op, $this->availableOperators()) !== false) {
            $this->ops[] = $op;
        }
    }

    /**
     * Get operators
     *
     * @access public
     * @return array Set of Operators and Arrays
     */
    public function getOperators()
    {
        $fields = $this->getFields();
        if ($this->default == true) {
            $fields[] = '-';
        }
        $ops = array();
        foreach ($this->ops as $op) {
            $ops[$op] = $fields;
        }
        return $ops;
    }

    public function availableOperators()
    {
        return array(
                        'eq',
                        'ne',
                        'sub');
    }

    /**
     * return SQL code
     *
     * @access public
     * @param string $field Field name
     * @param string $op Operator
     * @param string $value Test value
     * @return string SQL code
     */
    function getSQL($field, $op, $value)
    {

        if (array_search($op, $this->availableOperators()) === false || array_search($field, $this->fields) === false) {
            return '';
        }
        Loader::loadClass('CategoryUtil');
        switch ($op) {
            case "eq":
                $where = $this->column[$field] . ' = ' . $value;
                break;
            case "ne":
                $where = $this->column[$field] . ' != ' . $value;
                break;
            case "sub":
                $cats = CategoryUtil::getSubCategories($value);
                $items = array();
                $items[] = $value;
                foreach ($cats as $item) {
                    $items[] = $item['id'];
                }
                if (count($items) == 1)
                    $where = $this->column[$field] . " = " . implode("", $items);
                else
                    $where = $this->column[$field] . " IN (" . implode(",", $items) . ")";
                break;
            default:
                $where = '';
        }
        return array(
                        'where' => $where);
    }
}
