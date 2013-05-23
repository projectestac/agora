<?php

class IWjclic_Version extends Zikula_AbstractVersion {

    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWjclic");
        $meta['description'] = $this->__("Makes possible to assign Jclic activities.");
        $meta['url'] = $this->__("IWjclic");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWjclic::' => '::');
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