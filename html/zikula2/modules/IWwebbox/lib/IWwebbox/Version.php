<?php
 /**
 * Load the module version information
 *
 * @author		Albert Pérez Monfort (intraweb@xtec.cat)
 * @return		The version information
 */
class IWwebbox_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("Webbox");
        $meta['description'] = $this->__("Show external web sites into the site.");
        $meta['url'] = $this->__("IWwebbox");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWwebbox::' => '::');
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