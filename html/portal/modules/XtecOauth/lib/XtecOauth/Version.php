<?php

class XtecOauth_Version extends Zikula_AbstractVersion {

    /**
     * Load the module version information
     *
     * @author Toni Ginard
     * @return array Version information
     */
    public function getMetaData() {
        $meta = [];
        $meta['displayname'] = $this->__('XtecOauth');
        $meta['description'] = $this->__('Permet validar els usuaris a l\'oAuth de la XTEC (Google).');
        $meta['url'] = $this->__('XtecOauth');
        $meta['version'] = '1.0.0';
        $meta['securityschema'] = array('XtecOauth::' => '::');
        $meta['core_min'] = '1.3.0';
        $meta['core_max'] = '1.3.99';

        return $meta;
    }
}

