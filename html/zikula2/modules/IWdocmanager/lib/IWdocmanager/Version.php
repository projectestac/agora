<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnversion.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Load the module version information
 *
 * @author      Albert Pérez Monfort (aperezm@xtec.cat)
 * @return      The version information
 */
class IWdocmanager_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta=array();
        $meta['version'] = '1.0.0';
        $meta['description'] = $this->__('Documents manager for Zikula sites.');
        $meta['displayname'] = $this->__('Documents Manager');
        $meta['url'] = $this->__('documents');
        $meta['core_min'] = '1.3.0';
        $meta['core_max'] = '1.3.99';

        $meta['securityschema'] = array('IWdocmanager::' => '::');
        return $meta;
    }
}
