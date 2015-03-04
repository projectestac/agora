<?php
class IWbookings_Version extends Zikula_AbstractVersion
{
    public function getMetaData ()
    {
        $meta = array();
        $meta['displayname'] = $this->__("Bookings");
        $meta['description'] = $this->__("Allows the creation of items to be reserved.");
        $meta['url'] = $this->__("IWbookings");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWbookings::' => '::');
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
