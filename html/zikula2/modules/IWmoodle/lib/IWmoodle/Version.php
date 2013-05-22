<?php

/* * ********************************************************************* */
/* IWmoodle                  (Version.php)                             */
/* * ********************************************************************* */
class IWmoodle_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__("IWmoodle");
        $meta['description'] = $this->__("Integration of Moodle2 into Zikula.");
        $meta['url']         = $this->__("IWmoodle");
        $meta['version']     = '3.0.0';

        $meta['securityschema'] = array('IWmoodle::' => '::');
        /*
        $meta['dependencies'] = array(
                                    array('modname'    => 'IWmain',
                                          'minversion' => '3.0.0',
                                          'maxversion' => '',
                                          'status'     => ModUtil::DEPENDENCY_REQUIRED
                                    )
                                );
        */
        return $meta;
    }
}