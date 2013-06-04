<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class Pages_Controller_Admin extends Zikula_AbstractController
{
    public function postInitialize()
    {
        $this->view->setCaching(Zikula_View::CACHE_DISABLED);
    }
    
    /**
     * the main administration function
     *
     * @return string HTML output
     */
    public function main()
    {
        $this->redirect(ModUtil::url('Pages', 'admin', 'view'));
    }

    /**
     * modify a page
     *
     * @param 'pageid' the id of the item to be modified
     * @return string HTML output
     */
    public function modify()
    {
        $form = FormUtil::newForm($this->name, $this);
        return $form->execute('admin/modify.tpl', new Pages_Handler_Modify());
    }


    /**
     * delete item
     *
     * @return mixed string HTML output if no confirmation otherwise true
     */
    public function delete()
    {
        $form = FormUtil::newForm($this->name, $this);
        return $form->execute('admin/delete.tpl', new Pages_Handler_Delete());
    }

    /**
     * view items
     *
     * @param array $args Arguments.
     *
     * @return string HTML output
     */
    public function view($args)
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Pages::', '::', ACCESS_EDIT),
            LogUtil::getErrorMsgPermission()
        );

        // initialize sort array - used to display sort classes and urls
        $sort = array();
        $fields = array('pageid', 'title', 'cr_date'); // possible sort fields
        foreach ($fields as $field) {
            $sort['class'][$field] = 'z-order-unsorted'; // default values
        }
        
        // Get parameters from whatever input we need.
        $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GETPOST');
        $language = FormUtil::getPassedValue('language', isset($args['language']) ? $args['language'] : null, 'POST');
        $orderby = FormUtil::getPassedValue('orderby', isset($args['orderby']) ? $args['orderby'] : 'pageid', 'GETPOST');
        $originalSdir = FormUtil::getPassedValue('sdir', isset($args['sdir']) ? $args['sdir'] : 'ASC', 'GETPOST');

        $this->view->assign('startnum', $startnum);
        $this->view->assign('orderby', $orderby);
        $this->view->assign('sdir', $originalSdir);

        $sdir = $originalSdir ? 0 : 1; //if true change to false, if false change to true
        // change class for selected 'orderby' field to asc/desc
        if ($sdir == 0) {
            $sort['class'][$orderby] = 'z-order-desc';
            $orderdir = 'DESC';
        }
        if ($sdir == 1) {
            $sort['class'][$orderby] = 'z-order-asc';
            $orderdir = 'ASC';
        }
        $filtercats = FormUtil::getPassedValue('pages', null, 'GETPOST');
        $filtercatsSerialized = FormUtil::getPassedValue('filtercats_serialized', false, 'GET');
        $filtercats = $filtercatsSerialized ? unserialize($filtercatsSerialized) : $filtercats;
        $catsarray = Pages_Util::formatCategoryFilter($filtercats);

        // complete initialization of sort array, adding urls
        foreach ($fields as $field) {
            $params = array(
                'language' => $language,
                'filtercats_serialized' => serialize($filtercats),
                'orderby' => $field,
                'sdir' => $sdir
            );
            $sort['url'][$field] = ModUtil::url('Pages', 'admin', 'view', $params);
        }
        $this->view->assign('sort', $sort);

        $this->view->assign('filter_active', (empty($language) && empty($catsarray)) ? false : true);

        // get module vars
        $modvars = $this->getVars();

        if ($modvars['enablecategorization']) {
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('Pages', 'pages');
            $this->view->assign('catregistry', $catregistry);
        }

        $pages = new Pages_ContentType_Pages();
        $pages->setStartNumber($startnum);
        $pages->setLanguage($language);
        $pages->setOrder($orderby, $orderdir);
        $pages->enablePager();
        if (isset($catsarray['Main'])) {
            $pages->setCategory($catsarray['Main']);
        }

        // Assign the items to the template
        $this->view->assign('pages', $pages->get());

        // Assign the default language
        $this->view->assign('lang', ZLanguage::getLanguageCode());
        $this->view->assign('language', $language);

        // Assign the information required to create the pager
        $this->view->assign('pager', $pages->getPager());

        $selectedcategories = array();
        if (is_array($filtercats)) {
            $catsarray = $filtercats['__CATEGORIES__'];
            foreach ($catsarray as $propname => $propid) {
                if ($propid > 0) {
                    $selectedcategories[$propname] = $propid; // removes categories set to 'all'
                }
            }
        }
        $this->view->assign('selectedcategories', $selectedcategories);
        
        // Return the output that has been generated by this function
        return $this->view->fetch('admin/view.tpl');
    }

    /**
     * purge permalinks
     *
     * @return string HTML output
     */
    public function purge()
    {
        if (ModUtil::apiFunc('Pages', 'admin', 'purgepermalinks')) {
            LogUtil::registerStatus($this->__('Purging of the pemalinks was successful'));
        } else {
            LogUtil::registerError($this->__('Purging of the pemalinks has failed'));
        }
        $url = strpos(System::serverGetVar('HTTP_REFERER'), 'purge') ? ModUtil::url('Pages', 'admin', 'view') : System::serverGetVar('HTTP_REFERER');
        return System::redirect($url);
    }

    /**
     * modify module configuration
     *
     * @return string HTML output string
     */
    public function modifyconfig()
    {
        $form = FormUtil::newForm($this->name, $this);
        return $form->execute('admin/modifyconfig.tpl', new Pages_Handler_ModifyConfig());
    }
}