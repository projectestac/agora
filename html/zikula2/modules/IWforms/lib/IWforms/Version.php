<?php
class IWforms_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWforms");
        $meta['description'] = $this->__("Creation, managment and use of forms.");
        $meta['url'] = $this->__("IWforms");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWforms::' => '::');
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