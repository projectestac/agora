<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       http://code.zikula.org/formicula
 * @version    $Id: pnversion.php 131 2008-12-28 13:34:07Z Landseer $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage formicula
 */

class Formicula_admin_modifyconfighandler
{
    function initialize(&$pnRender)
    {
        $pnRender->caching = false;
        $pnRender->add_core_data();
        // scan the tempaltes flder for installed forms
        Loader::loadClass('FileUtil');
        $files = FileUtil::getFiles('modules/formicula/pntemplates/', false, true, null, false);
        $sets_found = array();
        foreach ($files as $file) {
            $parts = explode('_', $file);
            if (is_array($parts) && count($parts) > 1) {
                if ($parts[0] == 'formicula') {
                    continue;
                }
                if (!in_array($sets_found, $parts[0])) {
                    $sets_found[$parts[0]]++;
                }
            }
        }
        $items = array();
        foreach ($sets_found as $formid => $files) {
            $items[] = array('text' => __f('Set form #%1$s with %2$s templates', array('formid'=> $formid, 'files' => $files)), 'value' => $formid);
        }
        $pnRender->assign('items', $items);
        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
        $dom = ZLanguage::getModuleDomain('formicula');
        // Security check
        if (!SecurityUtil::checkPermission('formicula::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError('index.php');
        }
        if ($args['commandName'] == 'submit') {
            if (!$pnRender->pnFormIsValid()) {
                return false;
            }
            $data = $pnRender->pnFormGetValues();
            if(!empty($data['upload_dir']) && !is_writable($data['upload_dir'])) {
                $ifield = & $pnRender->pnFormGetPluginById('upload_dir');
                $ifield->setError(DataUtil::formatForDisplay(__('The webserver cannot write into this folder!', $dom)));
                return false;
            }

            pnModSetVar('formicula', 'show_phone',       $data['show_phone']);
            pnModSetVar('formicula', 'show_company',     $data['show_company']);
            pnModSetVar('formicula', 'show_url',         $data['show_url']);
            pnModSetVar('formicula', 'show_location',    $data['show_location']);
            pnModSetVar('formicula', 'show_comment',     $data['show_comment']);
            pnModSetVar('formicula', 'send_user',        $data['send_user']);
            pnModSetVar('formicula', 'delete_file',      $data['delete_file']);
            pnModSetVar('formicula', 'upload_dir',       $data['upload_dir']);
            pnModSetVar('formicula', 'spamcheck',        $data['spamcheck']);
            pnModSetVar('formicula', 'excludespamcheck', $data['excludespamcheck']);
            pnModSetVar('formicula', 'default_form',     $data['default_form']);

            LogUtil::registerStatus(__('The configuration has been changed.', $dom));
        }
        return true;
    }

}
