<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnuserapi.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */
class Files_Api_Admin extends Zikula_AbstractApi
{
    // get available admin panel links
    public function getlinks()
    {
        $links = array();
        $links[] = array('url' => ModUtil::url('Files', 'user', 'main'), 'text' => $this->__('Manage Files'), 'class' => 'z-icon-es-list');
        $links[] = array('url' => ModUtil::url('Files', 'admin', 'main'), 'text' => $this->__('Module configuration'), 'class' => 'z-icon-es-config');
        // return output
        return $links;
    }
}