<?php

class IWqv_Version extends Zikula_AbstractVersion {

    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWqv");
        $meta['description'] = $this->__("Allows assign assessments to users designated.");
        $meta['url'] = $this->__("IWqv");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWqv::' => '::');
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