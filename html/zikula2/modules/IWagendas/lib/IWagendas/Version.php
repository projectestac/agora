<?php
/**
 * Intraweb
 *
 * @copyright  (c) 2011, Intraweb Development Team
 * @link       http://code.zikula.org/intraweb/
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package    Intraweb_Modules
 * @subpackage IWAgendas
 */

class IWagendas_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__("Agendas");
        $meta['description'] = $this->__("Allow create and use shared agendas.");
        $meta['url']         = $this->__("IWagendas");
        $meta['version']     = '3.0.0';

        $meta['securityschema'] = array('IWagendas::' => '::');
        /*
        $meta['dependencies'] = array(
                                    array('modname'    => 'IWmain',
                                          'minversion' => '3.0.0',
                                          'maxversion' => '',
                                          'status'     => ModUtil::DEPENDENCY_REQUIRED
                                    )
                                );
        */
        return $meta;
    }
}
