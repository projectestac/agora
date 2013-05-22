<?php
// THIS MODULE IS NOT ABSOLUTELY FINISHED

 /**
 * Load the module version information
 *
 * @author		Albert Pérez Monfort (aperezm@xtec.cat)
 * @author		Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return		The version information
 */
class IWtimeframes_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("TimeFrames");
        $meta['description'] = $this->__("Allows to set timetables frames.");
        $meta['url'] = $this->__("IWtimeframes");
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('IWtimeframes::' => '::');
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