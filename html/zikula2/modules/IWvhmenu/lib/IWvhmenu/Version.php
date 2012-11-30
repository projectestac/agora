<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
class IWvhmenu_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__("IWvhmenu");
        $meta['description'] = $this->__("Provides an interface to manage fully customizable JavaScript menu.");
        $meta['url']         = $this->__("IWvhmenu");
        $meta['version']     = '3.0.0';

        $meta['securityschema'] = array('IWvhmenu::' => '::');
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