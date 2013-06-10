<?php

class IWjclic_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the main configurable parameters needed to configurate the module jclic
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)

     * @return:	The form with needed to change the parameters
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $noWriteable = false;
        $noFolder = false;

        $jclicUpdatedFiles = ModUtil::getVar('IWjclic', 'jclicUpdatedFiles');
        $jclicJarBase = ModUtil::getVar('IWjclic', 'jclicJarBase');
        $timeLap = ModUtil::getVar('IWjclic', 'timeLap');
        $groupsProAssign = ModUtil::getVar('IWjclic', 'groupsProAssign');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        foreach ($groups as $group) {
            $checked = false;

            if (strpos($groupsProAssign, '$' . $group['id'] . '$') != false)
                $checked = true;


            $groupsArray[] = array('id' => $group['id'],
                'name' => $group['name'],
                'checked' => $checked);
        }

        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $jclicUpdatedFiles) || $jclicUpdatedFiles == '') {
            $noFolder = true;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $jclicUpdatedFiles))
                $noWriteable = true;
        }

        return $this->view->assign('jclicJarBase', $jclicJarBase)
                        ->assign('timeLap', $timeLap)
                        ->assign('jclicUpdatedFiles', $jclicUpdatedFiles)
                        ->assign('groupsArray', $groupsArray)
                        ->assign('noFolder', $noFolder)
                        ->assign('noWriteable', $noWriteable)
                        ->fetch('IWjclic_admin_main.htm');
    }

    /**
     * Update the module configuration
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Configuration values
     * @return:	The form with needed to change the parameters
     */
    public function updateConf($args) {
        $jclicJarBase = FormUtil::getPassedValue('jclicJarBase', isset($args['jclicJarBase']) ? $args['jclicJarBase'] : null, 'POST');
        $timeLap = FormUtil::getPassedValue('timeLap', isset($args['timeLap']) ? $args['timeLap'] : null, 'POST');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
        $jclicUpdatedFiles = FormUtil::getPassedValue('jclicUpdatedFiles', isset($args['jclicUpdatedFiles']) ? $args['jclicUpdatedFiles'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $groupsString = '$';
        foreach ($groups as $group)
            $groupsString .= '$' . $group . '$';

        $this->setVar('jclicUpdatedFiles', $jclicUpdatedFiles)
                ->setVar('jclicJarBase', $jclicJarBase)
                ->setVar('timeLap', $timeLap)
                ->setVar('groupsProAssign', $groupsString);

        LogUtil::registerStatus($this->__('The module configuration has changed'));

        return System::redirect(ModUtil::url('IWjclic', 'admin', 'main'));
    }

}