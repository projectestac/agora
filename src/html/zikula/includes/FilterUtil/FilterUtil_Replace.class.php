<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: FilterUtil_Replace.class.php 28222 2010-02-08 02:22:59Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula
 * @subpackage FilterUtil
 */

interface FilterUtil_Replace
{

    /**
     * Replace whatever the plugin has to replace
     *
     * @param string $field Field name
     * @param string $op Operator
     * @param string $value Value
     * @return array ($field, $op, $value)
     */
    public function Replace($field, $op, $value);
}