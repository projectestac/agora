<?php
/**
 * Copyright 2009 Zikula Foundation.
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license MIT
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * EZComments Hooks Handlers.
 */
class EZComments_HookHandlers extends Zikula_Hook_AbstractHandler
{

    /**
     * Display hook for view.
     *
     * Subject is the object being viewed that we're attaching to.
     * args[id] Is the id of the object.
     * args[caller] the module who notified of this event.
     *
     * @param Zikula_Hook $hook The hook.
     *
     * @return void
     */
    public function uiView(Zikula_DisplayHook $hook)
    {
        // work out the input from the hook
        $mod = $hook->getCaller();
        $objectid = $hook->getId();

        // first check if the user is allowed to do any comments for this module/objectid
        if (!SecurityUtil::checkPermission('EZComments::', "$mod:$objectid:", ACCESS_OVERVIEW)) {
            return;
        }

        $subject = array();//$hook->getSubject();
        $owneruid = isset($subject['cr_uid']) ? (int)$subject['cr_uid'] : 0;
        $useurl = isset($subject['useurl']) ? $subject['useurl'] : null;
        $ownerUidSession = SessionUtil::delVar('commentOwner', 0);
        if ($ownerUidSession > 0) {
            $owneruid = $ownerUidSession;
        }

        // we may have a comment incoming
        $ezcomment = unserialize(SessionUtil::getVar('ezcomment', 'a:0:{}'));
        $ezcomment = isset($ezcomment[$mod][$objectid]) ? $ezcomment[$mod][$objectid] : null;

        // we may get some input in from the navigation bar
        $order = FormUtil::getPassedValue('order');
        $sortorder = ($order == 1) ? 'DESC' : 'ASC';

        $status = 0;

        // check if we're using the pager
        $enablepager = ModUtil::getVar('EZComments', 'enablepager');
        if ($enablepager) {
            $numitems = ModUtil::getVar('EZComments', 'commentsperpage');
            $startnum = FormUtil::getPassedValue('comments_startnum');
            if (!isset($startnum) && !is_numeric($startnum)) {
                $startnum = -1;
            }
        } else {
            $startnum = -1;
            $numitems = -1;
        }

        $items = ModUtil::apiFunc('EZComments', 'user', 'getall',
                        compact('mod', 'objectid', 'sortorder', 'status', 'numitems', 'startnum'));

        if ($items === false) {
            return LogUtil::registerError($this->__('Internal Error.'), null, 'index.php');
        }

        $items = ModUtil::apiFunc('EZComments', 'user', 'prepareCommentsForDisplay', $items);

        if ($enablepager) {
            $commentcount = ModUtil::apiFunc('EZComments', 'user', 'countitems', compact('mod', 'objectid', 'status'));
        } else {
            $commentcount = count($items);
        }

        // create the output object
        $view = Zikula_View::getInstance('EZComments', false, null, true);

        $view->assign('areaid', $hook->getAreaId());
        $view->assign('comments', $items);
        $view->assign('commentcount', $commentcount);
        $view->assign('ezcomment', $ezcomment);
        $view->assign('ezc_info', compact('mod', 'objectid', 'sortorder', 'status'));
        $view->assign('modinfo', ModUtil::getInfo(ModUtil::getIdFromName($mod)));
        $view->assign('msgmodule', System::getVar('messagemodule', ''));
        $view->assign('prfmodule', System::getVar('profilemodule', ''));
        $view->assign('allowadd', SecurityUtil::checkPermission('EZComments::', "$mod:$objectid:", ACCESS_COMMENT));
        $view->assign('loggedin', UserUtil::isLoggedIn());

        $modUrl = $hook->getUrl();
        $redirect = (!is_null($modUrl)) ? $modUrl->getUrl() : '';
        $view->assign('returnurl', $redirect);

        // encode the url - otherwise we can get some problems out there....
        $redirect = base64_encode($redirect);
        $view->assign('redirect', $redirect);
        $view->assign('objectid', $objectid);

        // assign the user is of the content owner
        $view->assign('owneruid', $owneruid);

        // assign url that should be stored in db and sent in email if it
        // differs from the redirect url
        $view->assign('useurl', $useurl);

        // just for backward compatibility - TODO: delete in 2.x
        $view->assign('anonusersinfo', ModUtil::getVar('EZComments', 'anonusersinfo'));

        // flag to recognize the main call
        static $mainScreen = true;
        $view->assign('mainscreen', $mainScreen);
        $mainScreen = false;

        // assign the values for the pager
        $view->assign('ezc_pager', array('numitems' => $commentcount,
                'itemsperpage' => $numitems));

        // find out which template and stylesheet to use
        $templateset = isset($args['template']) ? $args['template'] : FormUtil::getPassedValue('eztpl');
        $css = isset($args['ezccss']) ? $args['ezccss'] : FormUtil::getPassedValue('ezccss');
        $defaultcss = ModUtil::getVar('EZComments', 'css', 'style.css');

        if (!$view->template_exists(DataUtil::formatForOS($templateset) . '/ezcomments_user_view.tpl')) {
            $templateset = ModUtil::getVar('EZComments', 'template', 'Standard');
        }
        $view->assign('template', $templateset);

        // include stylesheet if there is a style sheet
        $css = $css ? "$css.css" : $defaultcss;
        if ($css = ModUtil::apiFunc('EZComments', 'user', 'getStylesheet', array('path' => "$templateset/$css"))) {
            PageUtil::addVar('stylesheet', $css);
        }

        $hook->setResponse(new Zikula_Response_DisplayHook('provider.ezcomments.ui_hooks.comments', $view, DataUtil::formatForOS($templateset) . '/ezcomments_user_view.tpl'));
    }

    /**
     * Example delete process hook handler.
     *
     * The subject should be the object that was deleted.
     * args[id] Is the is of the object
     * args[caller] is the name of who notified this event.
     *
     * @param Zikula_ProcessHook $hook The hookable event.
     *
     * @return void
     */
    public function processDelete(Zikula_ProcessHook $hook)
    {
        if ($hook->getId() <= 0) {
            return;
        }

        // Security check
        $res = ModUtil::apiFunc('EZComments', 'user', 'checkPermission',
                            array('module'   => $hook->getCaller(),
                                  'objectid' => $hook->getId(),
                                  'level'    => ACCESS_DELETE));

        if (!$res) {
            return LogUtil::registerPermissionError(ModUtil::url('EZComments', 'admin', 'main'));
        }

        // get db table and column for where statement
        ModUtil::dbInfoLoad('EZComments');
        $tables  = DBUtil::getTables();
        $column  = $tables['EZComments_column'];

        $mod      = DataUtil::formatForStore($hook->getCaller());
        $objectid = DataUtil::formatForStore($hook->getId());
        $areaid   = DataUtil::formatForStore($hook->getAreaId());
        $where    = "$column[modname] = '$mod' AND $column[objectid] = '$objectid' AND $column[areaid] = '$areaid'";

        DBUtil::deleteWhere('EZComments', $where);
    }
    
    public function processEdit(Zikula_ProcessHook $hook)
    {
        // will need this to update URLs in table
        // get db table and column for where statement
        ModUtil::dbInfoLoad('EZComments');
        $tables = DBUtil::getTables();
        $column = $tables['EZComments_column'];

        $mod      = DataUtil::formatForStore($hook->getCaller());
        $objectid = DataUtil::formatForStore($hook->getId());
        $areaid   = DataUtil::formatForStore($hook->getAreaId());
        $where    = "$column[modname] = '$mod' AND $column[objectid] = '$objectid' AND $column[areaid] = '$areaid'";
        
        $objUrl = $hook->getUrl()->getUrl(null, null, false, false); // objecturl provided by subscriber
        // the fourth arg is forceLang and if left to default (true) then the url is malformed - core bug as of 1.3.0
        $comment = array('url' => System::getHomepageUrl() . DataUtil::formatForStore($objUrl));

        DBUtil::updateObject($comment, 'EZComments', $where);
    }
}
