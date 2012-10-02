<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: FilterUtil_Build.class.php 28222 2010-02-08 02:22:59Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula
 * @subpackage FilterUtil
 */

interface FilterUtil_Build
{
    /**
     * Adds fields to list in common way
     *
     * @access public
     * @param mixed $fields Fields to add
     */
    public function addFields($fields);

    /**
     * Get fields in list
     *
     * @access public
     * @return mixed Fields in list
     */
    public function getFields();

    /**
     * Activate/Enable operators
     *
     * @access public
     * @param mixed $op Operators to activate
     */
    public function activateOperators($op);

    /**
     * Get operators
     *
     * returns an array of operators each as an array of fields
     * to use the plugin for. "-" means default for all fields.
     *
     * @access public
     * @return array Set of Operators and Arrays
     */
    public function getOperators();

    /**
     * Get SQL
     *
     * Return SQL WHERE and DBUtil JOIN array as array('where' => , 'join' =>)
     *
     * @param string $field Field name
     * @param string $op Operator
     * @param string $value Value
     * @return array $where
     * @access public
     */
    public function getSQL($field, $op, $value);
}