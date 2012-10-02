<?php

class AuthLDAP_Version extends Zikula_AbstractVersion {

    /**
     * Load the module version information
     *
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return		The version information
     */
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("AuthLDAP");
        $meta['description'] = $this->__("Permet validar els centres per LDAP.");
        $meta['url'] = $this->__("AuthLDAP");
        $meta['version'] = '1.0.1';
        $meta['securityschema'] = array('AuthLDAP::' => '::');

        return $meta;
    }

}

