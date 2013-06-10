<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Form_Handler_Admin_ModifyConfig extends Zikula_Form_AbstractHandler
{

    function initialize(Zikula_Form_View $view)
    {
        $view->caching = false;

        $templates = array();
        $rawtemplates = ModUtil::apiFunc('EZComments', 'user', 'gettemplates');
        if (is_array($rawtemplates) && count($rawtemplates) <> 0) {
            foreach ($rawtemplates as $rawtemplate)
            {
                $templates[] = array('text' => $rawtemplate, 'value' => $rawtemplate);
            }
        }
        $view->assign('templates', $templates);

        // is the akismet module available
        $view->assign('akismetavailable', ModUtil::available('Akismet'));

        $statuslevels = array(array('text' => $this->__('Approved'), 'value' => 0),
            array('text' => $this->__('Pending'), 'value' => 1),
            array('text' => $this->__('Rejected'), 'value' => 2));

        $view->assign('statuslevels', $statuslevels);

        $feeds = array(array('text' => $this->__('Atom 0.3'), 'value' => 'atom'),
            array('text' => $this->__('RSS 2.0'), 'value' => 'rss'));

        $view->assign('feeds', $feeds);

        return true;
    }

    function handleCommand(Zikula_Form_View $view, &$args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        if ($args['commandName'] == 'submit') {
            $ok = $view->isValid();
            $data = $view->getValues();

            // TODO reduce this to a loop
            if (empty($data['ezcomments_itemsperpage'])) {
                $ifield = $view->getPluginById('ezcomments_itemsperpage');
                $ifield->setError(DataUtil::formatForDisplay($this->__('missing value')));
                $ok = false;
            }
            if (empty($data['ezcomments_modlinkcount'])) {
                $ifield = $view->getPluginById('ezcomments_modlinkcount');
                $ifield->setError(DataUtil::formatForDisplay($this->__('missing value')));
                $ok = false;
            }
            if (empty($data['ezcomments_blacklinkcount'])) {
                $ifield = $view->getPluginById('ezcomments_blacklinkcount');
                $ifield->setError(DataUtil::formatForDisplay($this->__('missing value')));
                $ok = false;
            }
            if (empty($data['ezcomments_feedcount'])) {
                $ifield = $view->getPluginById('ezcomments_feedcount');
                $ifield->setError(DataUtil::formatForDisplay($this->__('missing value')));
                $ok = false;
            }
            if (empty($data['ezcomments_commentsperpage'])) {
                $ifield = $view->getPluginById('ezcomments_commentsperpage');
                $ifield->setError(DataUtil::formatForDisplay($this->__('missing value')));
                $ok = false;
            }
            if (!$ok) {
                return false;
            }


            $this->setVar('MailToAdmin', $data['ezcomments_MailToAdmin']);
            $this->setVar('moderationmail', $data['ezcomments_moderationmail']);
            $this->setVar('template', $data['ezcomments_template']);
            $this->setVar('css', $data['ezcomments_css']);
            $this->setVar('itemsperpage', $data['ezcomments_itemsperpage']);
            $this->setVar('anonusersinfo', $data['ezcomments_anonusersinfo']);
            $this->setVar('moderation', $data['ezcomments_moderation']);
            $this->setVar('enablepager', $data['ezcomments_enablepager']);
            $this->setVar('dontmoderateifcommented', $data['ezcomments_dontmoderateifcommented']);
            $this->setVar('modlinkcount', $data['ezcomments_modlinkcount']);
            $this->setVar('modlist', $data['ezcomments_modlist']);
            $this->setVar('blacklinkcount', $data['ezcomments_blacklinkcount']);
            $this->setVar('blacklist', $data['ezcomments_blacklist']);
            $this->setVar('alwaysmoderate', $data['ezcomments_alwaysmoderate']);
            $this->setVar('proxyblacklist', $data['ezcomments_proxyblacklist']);
            $this->setVar('logip', $data['ezcomments_logip']);
            $this->setVar('feedtype', $data['ezcomments_feedtype']);
            $this->setVar('feedcount', $data['ezcomments_feedcount']);
            $this->setVar('commentsperpage', $data['ezcomments_commentsperpage']);
            $this->setVar('enablepager', $data['ezcomments_enablepager']);
            $this->setVar('akismet', isset($data['ezcomments_akismet']) ? $data['ezcomments_akismet'] : false);
            $this->setVar('akismetstatus', isset($data['ezcomments_akismetstatus']) ? $data['ezcomments_akismetstatus'] : 1);
            $this->setVar('anonusersrequirename', $data['ezcomments_anonusersrequirename']);
            $this->setVar('modifyowntime', $data['ezcomments_modifyowntime']);
            $this->setVar('useaccountpage', $data['ezcomments_useaccountpage']);

            LogUtil::registerStatus($this->__('Done! Module configuration updated.'));
        }

        return true;
    }

}
