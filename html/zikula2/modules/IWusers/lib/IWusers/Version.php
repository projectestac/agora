<?php
class IWusers_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWusers");
        $meta['description'] = $this->__("Improves the chances of users of the module.");
        $meta['url'] = $this->__("IWusers");
        $meta['version'] = '3.1.0';
        $meta['securityschema'] = array('IWusers::' => '::');
        /*
        $meta['dependencies'] = array(array('modname' => 'IWmain',
                                            'minversion' => '3.0.1',
                                            'maxversion' => '',
                                            'status' => ModUtil::DEPENDENCY_REQUIRED));
         *
         */
        return $meta;
    }

}
