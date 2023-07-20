<?php
class IWstats_Version extends Zikula_AbstractVersion
{
    public function getMetaData ()
    {
        $meta = array();
        $meta['displayname'] = $this->__("Statistics");
        $meta['description'] = $this->__("Statistics module.");
        $meta['url'] = $this->__("IWstats");
        $meta['version'] = '3.0.1';
        $meta['securityschema'] = array('IWstats::' => '::');
        return $meta;
    }
}
