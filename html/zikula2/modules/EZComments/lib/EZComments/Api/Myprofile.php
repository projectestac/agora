<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Api_Myprofile extends Zikula_AbstractApi
{
    /**
     * This function returns the name of the tab
     *
     * @return string
     */
    public function getTitle()
    {
        $uid = (int) FormUtil::getPassedValue('uid');

        $settings = ModUtil::apiFunc('MyProfile', 'user', 'getSettings', array('uid' => $uid));
        if ($settings['nocomments'] == 1) {
            // Show no tab header
            return false;
        } else {
            return $this->__("User's pinboard");
        }
    }

    /**
     * This function returns additional options that should be added to the plugin url
     *
     * @return array
     */
    public function getURLAddOn()
    {
        return array('order' => 1);
    }

    /**
     * This function shows the content of the main MyProfile tab
     *
     * @return output
     */
    public function tab($args)
    {
        // is ezcomment hook activated for myprofile module?
        $result = ModUtil::isHooked('EZComments', 'MyProfile');
        if (!$result) {
            if (!ModUtil::apiFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'MyProfile', 'hookmodname' => 'EZComments'))) {
                return LogUtil::registerError($this->__('Registering EZComments hook for MyProfile module failed'));
            }
        }

        // generate output
        $render = Zikula_View::getInstance('EZComments');

        $render->assign('uid', (int) $args['uid']);
        $render->assign('viewer_uid', UserUtil::getVar('uid'));
        $render->assign('uname', UserUtil::getVar('uname', (int) $args['uid']));
        $render->assign('settings', ModUtil::apiFunc('MyProfile', 'user', 'getSettings', array('uid' => $args['uid'])));

        return $render->fetch('ezcomments_myprofile_tab.tpl');
    }

    /**
     * This function returns 1 if Ajax should not be used loading the plugin
     *
     * @return string
     */
    public function noAjax($args)
    {
        return true;
    }
}
