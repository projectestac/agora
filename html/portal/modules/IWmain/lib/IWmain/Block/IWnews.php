<?php

class IWmain_Block_IWnews extends Zikula_Controller_AbstractBlock {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    /**
     * initialise block
     *
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     */
    public function init() {
        //Security check
        SecurityUtil::registerPermissionSchema('IWmain:newsBlock:', 'Block title::');
    }

    /**
     * get information on block
     *
     * @author       Albert Pérez Monfort (aperezm@xtec.cat)
     * @return       array       The block information
     */
    public function info() {
        //Values
        return array('text_type' => 'IWnews',
            'module' => 'IWmain',
            'text_type_long' => $this->__('Show news of the user'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Gets user news
     *
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return	The user news block
     */
    public function display($row) {
        // Security check
        if (!SecurityUtil::checkPermission('IWmain:newsBlock:', $row['title'] . "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            return false;
        }

        if (ModUtil::getVar('IWmain', 'URLBase') != System::getBaseUrl()) {
            ModUtil::setVar('IWmain', 'URLBase', System::getBaseUrl());
        }

        $uid = UserUtil::getVar('uid');

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'news',
                    'module' => 'IWmain_block_news',
                    'uid' => $uid,
                    'sv' => $sv));

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $have_news = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'have_news',
                        'module' => 'IWmain_block_news',
                        'sv' => $sv));
            if ($have_news != '0') {
                ModUtil::func('IWmain', 'user', 'news', array('where' => $have_news));
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                    'name' => 'have_news',
                    'module' => 'IWmain_block_news',
                    'sv' => $sv,
                    'value' => '0'));
            }

            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $have_flags = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => UserUtil::getVar('uid'),
                        'name' => 'have_flags',
                        'module' => 'IWmain_block_flagged',
                        'sv' => $sv));

            if ($have_flags != '0') {
                ModUtil::func('IWmain', 'user', 'flagged', array('where' => $have_flags,
                    'chars' => 15));


                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => UserUtil::getVar('uid'),
                    'name' => 'have_flags',
                    'module' => 'IWmain_block_flagged',
                    'sv' => $sv,
                    'value' => '0'));
            }
        } else {
            ModUtil::func('IWmain', 'user', 'news');
        }

        //get the flagged items
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if (!$exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'flagged',
                    'module' => 'IWmain_block_flagged',
                    'uid' => $uid,
                    'sv' => $sv))) {
            ModUtil::func('IWmain', 'user', 'flagged', array('where' => '',
                'chars' => 15));
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $news = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                    'name' => 'news',
                    'module' => 'IWmain_block_news',
                    'sv' => $sv,
                    'nult' => true));

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $flags = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => UserUtil::getVar('uid'),
                    'name' => 'flagged',
                    'module' => 'IWmain_block_flagged',
                    'sv' => $sv,
                    'nult' => true));

        $this->view->assign('news', $news)
                ->assign('flags', $flags);

        $s = $this->view->fetch('IWmain_block_IWnews.htm');

        $row['content'] = $s;
        return BlockUtil::themesideblock($row);
    }

}