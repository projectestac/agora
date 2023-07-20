<?php
class IWmain_Controller_Ajax extends Zikula_Controller_AbstractAjax
{
    public function reloadNewsBlock() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmain:newsBlock:', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }

        $uid = UserUtil::getVar('uid');

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists',
                                    array('name' => 'news',
                                          'module' => 'IWmain_block_news',
                                          'uid' => $uid,
                                          'sv' => $sv));

        if (!$exists) ModUtil::func('IWmain', 'user', 'news');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $have_news = ModUtil::func('IWmain', 'user', 'userGetVar',
                                    array('uid' => $uid,
                                          'name' => 'have_news',
                                          'module' => 'IWmain_block_news',
                                          'sv' => $sv));

        if ($have_news != '0') {
            ModUtil::func('IWmain', 'user', 'news',
                           array('where' => $have_news));

            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                           array('uid' => $uid,
                                 'name' => 'have_news',
                                 'module' => 'IWmain_block_news',
                                 'sv' => $sv,
                                 'value' => '0'));
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $news = ModUtil::func('IWmain', 'user', 'userGetVar',
                               array('uid' => $uid,
                                     'name' => 'news',
                                     'module' => 'IWmain_block_news',
                                     'sv' => $sv,
                                     'nult' => true));

        $view = Zikula_View::getInstance('IWmain', false);

        $view->assign('news', $news);
        $view->assign('ajax', 1);
        $content = $view->fetch('IWmain_block_IWnews.htm');

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function reloadFlaggedBlock() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmain:flaggedBlock:', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }

        //get the headlines saved in the user vars. It is renovate every 10 minutes

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists',
                                    array('name' => 'flagged',
                                          'module' => 'IWmain_block_flagged',
                                          'uid' => UserUtil::getVar('uid'),
                                          'sv' => $sv));
        $chars = 15;
        if (!$exists) {
            ModUtil::func('IWmain', 'user', 'flagged',
                           array('where' => '',
                                 'chars' => $chars));
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $have_flags = ModUtil::func('IWmain', 'user', 'userGetVar',
                                     array('uid' => UserUtil::getVar('uid'),
                                           'name' => 'have_flags',
                                           'module' => 'IWmain_block_flagged',
                                           'sv' => $sv));
        if ($have_flags != '0') {
            ModUtil::func('IWmain', 'user', 'flagged',
                           array('where' => $have_flags,
                                 'chars' => $chars));
            //Posa la variable d'usuari have_news en blanc per no haver-la de tornar a llegir a la propera reiteraci�
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                           array('uid' => UserUtil::getVar('uid'),
                                 'name' => 'have_flags',
                                 'module' => 'IWmain_block_flagged',
                                 'sv' => $sv,
                                 'value' => '0'));
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $flags = ModUtil::func('IWmain', 'user', 'userGetVar',
                                array('uid' => UserUtil::getVar('uid'),
                                      'name' => 'flagged',
                                      'module' => 'IWmain_block_flagged',
                                      'sv' => $sv,
                                      'nult' => true));

        $view = Zikula_View::getInstance('IWmain', false);

        $view->assign('flags', $flags);
        $content = $view->fetch('IWmain_block_iwflagged.htm');

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }
}