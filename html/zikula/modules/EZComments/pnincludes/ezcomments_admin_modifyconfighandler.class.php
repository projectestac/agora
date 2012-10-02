<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: ezcomments_admin_modifyconfighandler.class.php 690 2010-05-12 16:08:51Z herr.vorragend $
 * @license See license.txt
 */

class EZComments_admin_modifyconfighandler
{
    function initialize(&$renderer)
    {
        $dom = ZLanguage::getModuleDomain('EZComments');

        $renderer->caching = false;
        $renderer->add_core_data();

        $templates = array();
        $rawtemplates = pnModAPIFunc('EZComments', 'user', 'gettemplates');
        if (is_array($rawtemplates) && count($rawtemplates) <> 0) {
            foreach ($rawtemplates as $rawtemplate)
            {
                $templates[] = array('text' => $rawtemplate, 'value' => $rawtemplate);
            }
        }
        $renderer->assign('templates', $templates);

        // is the akismet module available
        $renderer->assign('akismetavailable', pnModAvailable('akismet'));

        $statuslevels = array( array('text' => __('Approved', $dom), 'value' => 0),
                               array('text' => __('Pending', $dom),  'value' => 1),
                               array('text' => __('Rejected', $dom), 'value' => 2));

        $renderer->assign('statuslevels', $statuslevels);

        $feeds = array( array('text' => __('Atom 0.3', $dom), 'value' => 'atom'),
                        array('text' => __('RSS 2.0', $dom),  'value' => 'rss'));

        $renderer->assign('feeds', $feeds);

        return true;
    }


    function handleCommand(&$renderer, $args)
    {
        $dom = ZLanguage::getModuleDomain('EZComments');

        // Security check
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        if ($args['commandName'] == 'submit') {
            $ok = $renderer->pnFormIsValid();
            $data = $renderer->pnFormGetValues();

            // TODO reduce this to a loop
            if (empty($data['ezcomments_itemsperpage'])) {
                $ifield = & $renderer->pnFormGetPluginById('ezcomments_itemsperpage');
                $ifield->setError(DataUtil::formatForDisplay(__('missing value', $dom)));
                $ok = false;
            }
            if (empty($data['ezcomments_modlinkcount'])) {
                $ifield = & $renderer->pnFormGetPluginById('ezcomments_modlinkcount');
                $ifield->setError(DataUtil::formatForDisplay(__('missing value', $dom)));
                $ok = false;
            }
            if (empty($data['ezcomments_blacklinkcount'])) {
                $ifield = & $renderer->pnFormGetPluginById('ezcomments_blacklinkcount');
                $ifield->setError(DataUtil::formatForDisplay(__('missing value', $dom)));
                $ok = false;
            }
            if (empty($data['ezcomments_feedcount'])) {
                $ifield = & $renderer->pnFormGetPluginById('ezcomments_feedcount');
                $ifield->setError(DataUtil::formatForDisplay(__('missing value', $dom)));
                $ok = false;
            }
            if (empty($data['ezcomments_commentsperpage'])) {
                $ifield = & $renderer->pnFormGetPluginById('ezcomments_commentsperpage');
                $ifield->setError(DataUtil::formatForDisplay(__('missing value', $dom)));
                $ok = false;
            }
            if (!$ok) {
                return false;
            }

            pnModSetVar('EZComments', 'MailToAdmin',             $data['ezcomments_MailToAdmin']);
            pnModSetVar('EZComments', 'moderationmail',          $data['ezcomments_moderationmail']);
            pnModSetVar('EZComments', 'template',                $data['ezcomments_template']);
            pnModSetVar('EZComments', 'css',                     $data['ezcomments_css']);
            pnModSetVar('EZComments', 'itemsperpage',            $data['ezcomments_itemsperpage']);
            pnModSetVar('EZComments', 'anonusersinfo',           $data['ezcomments_anonusersinfo']);
            pnModSetVar('EZComments', 'moderation',              $data['ezcomments_moderation']);
            pnModSetVar('EZComments', 'enablepager',             $data['ezcomments_enablepager']);
            pnModSetVar('EZComments', 'dontmoderateifcommented', $data['ezcomments_dontmoderateifcommented']);
            pnModSetVar('EZComments', 'modlinkcount',            $data['ezcomments_modlinkcount']);
            pnModSetVar('EZComments', 'modlist',                 $data['ezcomments_modlist']);
            pnModSetVar('EZComments', 'blacklinkcount',          $data['ezcomments_blacklinkcount']);
            pnModSetVar('EZComments', 'blacklist',               $data['ezcomments_blacklist']);
            pnModSetVar('EZComments', 'alwaysmoderate',          $data['ezcomments_alwaysmoderate']);
            pnModSetVar('EZComments', 'proxyblacklist',          $data['ezcomments_proxyblacklist']);
            pnModSetVar('EZComments', 'logip',                   $data['ezcomments_logip']);
            pnModSetVar('EZComments', 'feedtype',                $data['ezcomments_feedtype']);
            pnModSetVar('EZComments', 'feedcount',               $data['ezcomments_feedcount']);
            pnModSetVar('EZComments', 'commentsperpage',         $data['ezcomments_commentsperpage']);
            pnModSetVar('EZComments', 'enablepager',             $data['ezcomments_enablepager']);
            pnModSetVar('EZComments', 'akismet',                 $data['ezcomments_akismet']);
            pnModSetVar('EZComments', 'akismetstatus',           $data['ezcomments_akismetstatus']);
            pnModSetVar('EZComments', 'anonusersrequirename',    $data['ezcomments_anonusersrequirename']);
            pnModSetVar('EZComments', 'modifyowntime',           $data['ezcomments_modifyowntime']);
            pnModSetVar('EZComments', 'useaccountpage',          $data['ezcomments_useaccountpage']);

            LogUtil::registerStatus(__('Done! Module configuration updated.', $dom));
        }

        return true;
    }
}
