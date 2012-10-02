<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: filter.replaceName.class.php 28222 2010-02-08 02:22:59Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula
 * @subpackage FilterUtil
 */

Loader::loadClass('FilterUtil_Replace', FILTERUTIL_CLASS_PATH);

class FilterUtil_Filter_replaceName extends FilterUtil_PluginCommon implements FilterUtil_Replace
{
    protected $pair = array();
    /**
     * Constructor
     *
     * @access public
     * @param array $config Configuration
     * @return object FilterUtil_Plugin_Default
     */
    public function __construct($config)
    {
        parent::__construct($config);
        if (isset($config['pair']) && is_array($config['pair'])) {
            $this->addPair($config['pair']);
        }
    }

    /**
     * Add new replace pair (fieldname => replace with)
     *
     * @param mixed $pair Replace Pair
     * @access public
     */
    public function addPair($pair)
    {
        foreach ($pair as $f => $r) {
            if (is_array($r)) {
                $this->addPair($r);
            } else {
                $this->pair[$f] = $r;
            }
        }
    }

    /**
     * Replace operator
     *
     * @access public
     * @param string $field Fieldname
     * @param string $op Operator
     * @param string $value Value
     * @return array array(field, op, value)
     */
    public function replace($field, $op, $value)
    {
        if (isset($this->pair[$field]) && !empty($this->pair[$field])) {
            $field = $this->pair[$field];
        }

        return array(
                        $field,
                        $op,
                        $value);
    }

}
