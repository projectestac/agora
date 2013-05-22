<?php
class IWforums_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWforums");
        $meta['description'] = $this->__("Creation, managment and use of forums.");
        $meta['url'] = $this->__("IWforums");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWforums::' => '::');
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