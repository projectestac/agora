<?php
 /**
 * Load the module version information
 *
 * @author		Albert Pérez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */

class IWmyrole_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWmyrole");
        $meta['description'] = $this->__("Allow users to change their roles or groups.");
        $meta['url'] = $this->__("IWmyrole");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWmyrole::' => '::');
        /*
        $meta['dependencies'] = array(array('modname' => 'IWmain',
                                            'minversion' => '3.0.0',
                                            'maxversion' => '',
                                            'status' => ModUtil::DEPENDENCY_REQUIRED));
         *
         */
        return $meta;
    }
}