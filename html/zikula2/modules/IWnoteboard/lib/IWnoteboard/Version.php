<?php
class IWnoteboard_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWnoteboard");
        $meta['description'] = $this->__("Provides a system to send small pieces of information to selected users. It has file support.");
        $meta['url'] = $this->__("IWnoteboard");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWnoteboard::' => '::');
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