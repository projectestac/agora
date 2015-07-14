<?php
class Agoraportal_Version extends Zikula_AbstractVersion {

    /**
     * Load the module version information
     *
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return		The version information
     */
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("Agoraportal");
        $meta['description'] = $this->__("Administració dels serveis d'Àgora, petició d'espais nous i gestió per part dels centres.");
        $meta['url'] = $this->__("Agoraportal");
        $meta['version'] = '2.0.25';
        $meta['securityschema'] = array('Agoraportal::' => '::');
        return $meta;
    }

}