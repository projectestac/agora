<?php
/**
 * @package     IWmain
 * @version     3.0
 * @author      Albert Pérez Monfort
 * @link        http://projectestac.github.io/intraweb/
 * @copyright   Copyright (C) 2009
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * Give access to personal configuration from their account panel
 *
 * @return   array   
 */
class IWmain_Api_Account extends Zikula_AbstractApi
{
    public function getAll($args) {
        // Create an array of links to return
        $items = array();
        $items['1'] = array('url' => ModUtil::url('IWmain', 'user', 'main'),
                            'module' => 'IWmain',
                            'title' => $this->__('Configure'),
                            'icon' => 'admin.gif');
        // Return the items
        return $items;
    }
}