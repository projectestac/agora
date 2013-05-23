<?php
class IWmain_Api_Admin extends Zikula_AbstractApi
{
    /**
     * Get available admin panel links.
     *
     * @return array array of admin links.
     */
    public function getlinks($args)
    {
        $links = array();
        if (SecurityUtil::checkPermission('IWmain::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWmain', 'admin', 'main'), 'text' => $this->__('Programmed sequences information'), 'id' => 'iwmain_crone', 'class' => 'z-icon-es-gears');
            $links[] = array('url' => ModUtil::url('IWmain', 'admin', 'conf'), 'text' => $this->__('Configure parameters'), 'id' => 'iwmain_conf', 'class' => 'z-icon-es-config');
            // checks module Files availability
            $modid = ModUtil::getIdFromName('Files');
            $modinfo = ModUtil::getInfo($modid);
            if ($modinfo['state'] == 3) {
                $links[] = array('url' => ModUtil::url('IWmain', 'admin', 'filesList'), 'text' => $this->__('Manage files'), 'title' => $this->__('Manage files'), 'class' => 'z-icon-es-save');
            }
        }
        return $links;
    }
}