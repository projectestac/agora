<?php
class IWmessages_Version extends Zikula_AbstractVersion
{
    public function getMetaData ()
    {
        $meta = array();
        $meta['displayname'] = $this->__("IWMessages");
        $meta['description'] = $this->__("Allow to send private messages between users.");
        $meta['url'] = $this->__("IWmessages");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWmessages::' => '::');
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