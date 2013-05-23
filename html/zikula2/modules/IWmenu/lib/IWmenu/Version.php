<?php
class IWmenu_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWmenu");
        $meta['description'] = $this->__("Provides an interface to manage fully customizable menu.");
        $meta['url'] = $this->__("IWmenu");
        $meta['version'] = '3.0.2';
        $meta['securityschema'] = array('IWmenu::' => '::');
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