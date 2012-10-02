<?php

/**
 * Zikula Application Framework
 *
 * @package	XTEC XtecMailer
 * @author	Francesc Bassas i Bullich
 * @license	GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class XtecMailer_Version extends Zikula_AbstractVersion {

    /**
     * Load the module version information
     *
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return		The version information
     */
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("XtecMailer");
        $meta['description'] = $this->__("Amplia les funcionalitats del mòdul Mailer per poder enviar correu electrònic utilitzant el servei web de la XTEC");
        $meta['url'] = $this->__("XtecMailer");
        $meta['version'] = '1.0.0';
        $meta['securityschema'] = array('XtecMailer::' => '::');

        return $meta;
    }

}