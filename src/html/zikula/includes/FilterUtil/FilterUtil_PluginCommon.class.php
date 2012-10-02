<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: FilterUtil_PluginCommon.class.php 28222 2010-02-08 02:22:59Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula
 * @subpackage FilterUtil
 */

Loader::loadClass('FilterUtil_PluginCommon', FILTERUTIL_CLASS_PATH);

class FilterUtil_PluginCommon extends FilterUtil_Common
{
    /**
     * default handler
     */
    protected $default = false;

    /**
     * ID of the plugin
     */
    protected $id;

    public function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * set the plugin id
     *
     * @access public
     * @param int $id Plugin ID
     */
    public function setID($id)
    {
        $this->id = $id;
    }

}