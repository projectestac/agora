<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnaccountapi.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

class Files_Api_Account extends Zikula_AbstractApi
{
    /**
     * Give access to personal configuration from their account panel
     *
     * @return   array
     */
    public function getall($args)
    {
        $items = array();
        if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
            return false;
        }
        // create an array of links to return
        $items['1'] = array('url' => ModUtil::url('Files', 'user','main'),
                             'module' => 'Files',
                             'title' => $this->__('File Manager'),
                             'icon' => 'user.gif');
        // Return the items
        return $items;
    }
}