<?php
class IWbooks_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("Llibres");
        $meta['description'] = $this->__("Llibres de text, lectures i materials");
        $meta['url'] = $this->__("IWbooks");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWbooks::Item' => 'IWbooks item name::IWbooks item ID');
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