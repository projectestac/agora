<?php
/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

/**
 * Class to control Admin interface
 */
class Downloads_Controller_Admin extends Zikula_AbstractController
{

    /**
     * This method provides a generic item list overview.
     *
     * @return string|boolean Output.
     */
    public function main()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // initialize sort array - used to display sort classes and urls
        $sort = array();
        $fields = array('title', 'submitter', 'status'); // possible sort fields
        foreach ($fields as $field) {
            $sort['class'][$field] = 'z-order-unsorted'; // default values
        }

        // Get parameters from whatever input we need.
        $startnum = (int)$this->request->query->get('startnum', $this->request->request->get('startnum', isset($args['startnum']) ? $args['startnum'] : null));
        $orderby = $this->request->query->get('orderby', $this->request->request->get('orderby', isset($args['orderby']) ? $args['orderby'] : 'title'));
        $original_sdir = $this->request->query->get('sdir', $this->request->request->get('sdir', isset($args['sdir']) ? $args['sdir'] : 0));
        $category = $this->request->request->get('category', $this->request->query->get('category', isset($args['category']) ? $args['category'] : 0));

        $this->view->assign('startnum', $startnum);
        $this->view->assign('orderby', $orderby);
        $this->view->assign('sdir', $original_sdir);
        $this->view->assign('rowcount', ModUtil::apiFunc('Downloads', 'user', 'countQuery', array('category' => $category)));
        $this->view->assign('catselectoptions', Downloads_Util::getCatSelectList(array('sel' => $category, 'includeall' => true)));
        $this->view->assign('cid', $category);
        $this->view->assign('filter_active', false);

        $sdir = $original_sdir ? 0 : 1; //if true change to false, if false change to true
        // change class for selected 'orderby' field to asc/desc
        if ($sdir == 0) {
            $sort['class'][$orderby] = 'z-order-desc';
            $orderdir = 'DESC';
        }
        if ($sdir == 1) {
            $sort['class'][$orderby] = 'z-order-asc';
            $orderdir = 'ASC';
        }
        // complete initialization of sort array, adding urls
        foreach ($fields as $field) {
            $sort['url'][$field] = ModUtil::url('Downloads', 'admin', 'main', array(
                        'orderby' => $field,
                        'sdir' => $sdir,
                        'category' => $category));
        }
        $this->view->assign('sort', $sort);
        $this->view->assign('filter_active', (empty($category)) ? false : true);

        $downloads = ModUtil::apiFunc('Downloads', 'user', 'getall', array(
                    'startnum' => $startnum,
                    'orderby' => $orderby,
                    'orderdir' => $orderdir,
                    'category' => $category,
                    'status' => Downloads_Api_User::STATUS_ALL,
                ));

        return $this->view->assign('downloads', $downloads)
                          ->fetch('admin/main.tpl');
    }

    /**
     * @desc present administrator options to change module configuration
     * @return      config template
     */
    public function modifyconfig()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        return $this->view->fetch('admin/modifyconfig.tpl');
    }

    /**
     * @desc sets module variables as requested by admin
     * @return      status/error ->back to modify config page
     */
    public function updateconfig()
    {
        $this->checkCsrfToken();

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $defaults = Downloads_Util::getModuleDefaults();
        $currentModVars = $this->getVars();
        $defaults = array_merge($defaults, $currentModVars);

        $modvars = array(
            'perpage' => $this->request->request->get('perpage', $defaults['perpage']),
            'newdownloads' => $this->request->request->get('newdownloads', $defaults['newdownloads']),
            'topdownloads' => $this->request->request->get('topdownloads', $defaults['topdownloads']),
            'ratexdlsamount' => $this->request->request->get('ratexdlsamount', $defaults['ratexdlsamount']),
            'topxdlsamount' => $this->request->request->get('topxdlsamount', $defaults['topxdlsamount']),
            'lastxdlsamount' => $this->request->request->get('lastxdlsamount', $defaults['lastxdlsamount']),
            'ratexdlsactive' => $this->request->request->get('ratexdlsactive', $defaults['ratexdlsactive']),
            'topxdlsactive' => $this->request->request->get('topxdlsactive', $defaults['topxdlsactive']),
            'lastxdlsactive' => $this->request->request->get('lastxdlsactive', $defaults['lastxdlsactive']),
            'allowupload' => $this->request->request->get('allowupload', $defaults['allowupload']),
            'securedownload' => $this->request->request->get('securedownload', $defaults['securedownload']),
            'sizelimit' => $this->request->request->get('sizelimit', $defaults['sizelimit']),
            'limitsize' => $this->request->request->get('limitsize', $defaults['limitsize']),
            'showscreenshot' => $this->request->request->get('showscreenshot', $defaults['showscreenshot']),
            'thumbnailwidth' => $this->request->request->get('thumbnailwidth', $defaults['thumbnailwidth']),
            'thumbnailheight' => $this->request->request->get('thumbnailheight', $defaults['thumbnailheight']),
            'screenshotmaxsize' => $this->request->request->get('screenshotmaxsize', $defaults['screenshotmaxsize']),
            'thumbnailmaxsize' => $this->request->request->get('thumbnailmaxsize', $defaults['thumbnailmaxsize']),
            'limit_extension' => $this->request->request->get('limit_extension', $defaults['limit_extension']),
            'allowscreenshotupload' => $this->request->request->get('allowscreenshotupload', $defaults['allowscreenshotupload']),
            'importfrommod' => $this->request->request->get('importfrommod', $defaults['importfrommod']),
            'sessionlimit' => $this->request->request->get('sessionlimit', $defaults['sessionlimit']),
            'sessiondownloadlimit' => $this->request->request->get('sessiondownloadlimit', $defaults['sessiondownloadlimit']),
            'captchacharacters' => $this->request->request->get('captchacharacters', $defaults['captchacharacters']),
            'notifymail' => $this->request->request->get('notifymail', $defaults['notifymail']),
            'inform_user' => $this->request->request->get('inform_user', $defaults['inform_user']),
            'fulltext' => $this->request->request->get('fulltext', $defaults['fulltext']),
            'sortby' => $this->request->request->get('sortby', $defaults['sortby']),
            'cclause' => $this->request->request->get('cclause', $defaults['cclause']),
            'popular' => $this->request->request->get('popular', $defaults['popular']),
            'torrent' => $this->request->request->get('torrent', $defaults['torrent']),
            'upload_folder' => $this->request->request->get('upload_folder', $defaults['upload_folder']),
            'screenshot_folder' => $this->request->request->get('screenshot_folder', $defaults['screenshot_folder']),
            'cache_folder' => $this->request->request->get('cache_folder', $defaults['cache_folder']),
            'treeview' => $this->request->request->get('treeview', $defaults['treeview']),
        );


        // set the new variables
        $this->setVars($modvars);

        // clear the cache
        $this->view->clear_cache();

        LogUtil::registerStatus($this->__('Done! Updated the Downloads configuration.'));
        return $this->modifyconfig();
    }

    /**
     * Create or edit record.
     *
     * @return string|boolean Output.
     */
    public function edit()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADD), LogUtil::getErrorMsgPermission());

        $form = FormUtil::newForm('Downloads', $this);
        return $form->execute('admin/edit.tpl', new Downloads_Form_Handler_Admin_Edit());
    }

    public function categoryList()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $cats = $this->entityManager->getRepository('Downloads_Entity_Categories')->getAll();

        return $this->view->assign('cats', $cats)
                          ->fetch('admin/categories.tpl');
    }

    public function editCategory()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $form = FormUtil::newForm('Downloads', $this);
        return $form->execute('admin/editcategory.tpl', new Downloads_Form_Handler_Admin_EditCategory());
    }

    /**
     * @desc set caching to false for all admin functions
     * @return      null
     */
    public function postInitialize()
    {
        $this->view->setCaching(false);
    }

}