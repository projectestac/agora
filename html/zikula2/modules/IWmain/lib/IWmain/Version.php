<?php
class IWmain_Version extends Zikula_AbstractVersion
{
    public function getMetaData ()
    {
        $meta = array();
        $meta['displayname'] = $this->__("Intraweb");
        $meta['description'] = $this->__("Main module for Intraweb modules. The Intraweb modules needs this module.");
        $meta['url'] = $this->__("IWmain");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWmain::' => '::');
        return $meta;
    }
}