<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */
class FAQ_Controller_User extends Zikula_AbstractController
{

    /**
     * the main user function
     *
     * This function is the default function.
     *
     * @return redirect
     */
    public function main()
    {
        $this->redirect(ModUtil::url('FAQ', 'user', 'view'));
    }

    /**
     * view items
     *
     * This is a standard function to provide an overview of all of the items
     * available from the module.
     *
     * @param        integer      $startnum    (optional) The number of the start item
     * @return       output       The overview page
     */
    public function view($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('FAQ::', '::', ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        $startnum = isset($args['startnum']) ? $args['startnum'] : (int)FormUtil::getPassedValue('startnum', 1, 'GET');
        $cat = isset($args['cat']) ? $args['cat'] : (string)FormUtil::getPassedValue('cat', null, 'GET');
        $prop = isset($args['prop']) ? $args['prop'] : (string)FormUtil::getPassedValue('prop', null, 'GET');
        $func = (string)FormUtil::getPassedValue('func');

        // defaults and input validation
        if (!is_numeric($startnum) || $startnum < 0) {
            $startnum = 1;
        }

        // get all module vars for later use
        $modvars = $this->getVars();

        // check if categorisation is enabled
        // and if its requested to list the recent faqs
        if ($modvars['enablecategorization']) {
            // get the categories registered for the Pages
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('FAQ', 'faqanswer');
            $properties = array_keys($catregistry);

            $categories = array();
            foreach ($properties as $k) {
                $categories[$k] = CategoryUtil::getCategoryByID($catregistry[$k]);
                $categories[$k]['path'] .= '/';
                $categories[$k]['subcategories'] = CategoryUtil::getCategoriesByParentID($catregistry[$k]);
            }
            $this->view->assign('categories', $categories);

            if (!empty($prop) && !empty($cat)) {
                // if the property and the category are specified
                // means that we'll list the FAQs that belongs to that category
                if (in_array($prop, $properties)) {
                    if (!is_numeric($cat)) {
                        $rootCat = CategoryUtil::getCategoryByID($catregistry[$prop]);
                        $cat = CategoryUtil::getCategoryByPath($rootCat['path'] . '/' . $cat);
                    } else {
                        $cat = CategoryUtil::getCategoryByID($cat);
                    }
                    if (!empty($cat) && isset($cat['path'])) {
                        // include all it's subcategories and build the filter
                        $cats = categoryUtil::getCategoriesByPath($cat['path'], '', 'path');
                        $catstofilter = array();
                        foreach ($cats as $category) {
                            $catstofilter[] = $category['id'];
                        }
                        $catFilter = array($prop => $catstofilter);
                    } else {
                        LogUtil::registerError($this->__('Invalid category passed.'));
                    }
                }
            }
        }

        // get all faqs
        $items = ModUtil::apiFunc('FAQ', 'user', 'getall', array('startnum' => $startnum,
                    'numitems' => $modvars['itemsperpage'],
                    'answered' => true,
                    'category' => isset($catFilter) ? $catFilter : null,
                    'catregistry' => isset($catregistry) ? $catregistry : null));

        // Create output object
        $this->view->setCaching(false);

        // assign various useful template variables
        $this->view->assign('startnum', $startnum);
        $this->view->assign('cat', $cat);
        $this->view->assign('property', $prop);
        $this->view->assign('lang', ZLanguage::getLanguageCode());

        // Loop through each item getting the rendered output from the item template
        $faqitems = array();
        $faqs = array();
        foreach ($items as $item) {
            if (SecurityUtil::checkPermission('FAQ::', "$item[faqid]::", ACCESS_OVERVIEW)) {
                $this->view->assign($item);
                $faqitems[] = $this->view->fetch('user/row_read.tpl', $item['faqid']);
                $faqs[] = $item;
            }
        }

        // Display the entries
        $this->view->assign('items', $faqitems);
        $this->view->assign('faqs', $faqs);
        $this->view->assign('func', $func);

        // assign the start number
        $this->view->assign('startnum', $startnum);

        // assign the values for the smarty plugin to produce a pager
        $this->view->assign('pager', array('numitems' => ModUtil::apiFunc('FAQ', 'user', 'countitems', array('category' => isset($catFilter) ? $catFilter : null)),
            'itemsperpage' => ModUtil::getVar('FAQ', 'itemsperpage')));

        // Return the output that has been generated by this function
        return $this->view->fetch('user/view.tpl');
    }

    /**
     * display item
     *
     * This is a standard function to provide detailed informtion on a single item
     * available from the module.
     *
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function display($args)
    {
        $faqid = FormUtil::getPassedValue('faqid', isset($args['faqid']) ? $args['faqid'] : null, 'REQUEST');
        $title = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'REQUEST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'REQUEST');
        if (!empty($objectid)) {
            $faqid = $objectid;
        }

        // Validate the essential parameters
        if ((empty($faqid) || !is_numeric($faqid)) && (empty($title))) {
            return LogUtil::registerArgsError();
        }
        if (!empty($title)) {
            unset($faqid);
        }

        // set the cache id
        if (isset($faqid)) {
            $this->view->cache_id = $faqid;
        } else {
            $this->view->cache_id = $title;
        }

        // check out if the contents are cached.
        if ($this->view->is_cached('user/display.tpl')) {
            return $this->view->fetch('user/display.tpl');
        }

        // Get the faq
        if (isset($faqid)) {
            $item = ModUtil::apiFunc('FAQ', 'user', 'get', array('faqid' => $faqid));
        } else {
            $item = ModUtil::apiFunc('FAQ', 'user', 'get', array('title' => $title));
            System::queryStringSetVar('faqid', $item['faqid']);
        }

        if ($item === false) {
            return LogUtil::registerError($this->__('Failed to get any items'), 404);
        }

        // set the page title
        PageUtil::setVar('title', $item['question']);

        // Assign details of the item.
        $this->view->assign($item);

        // Return the output that has been generated by this function
        return $this->view->fetch('user/display.tpl');
    }

    /**
     * ask a question
     *
     * @return       output       A form to submit a question
     */
    public function ask()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('FAQ::', '::', ACCESS_COMMENT), LogUtil::getErrorMsgPermission());

        // assign logged in state
        $this->view->assign('loggedin', UserUtil::isLoggedIn());

        // Return the output that has been generated by this function
        return $this->view->fetch('user/ask.tpl');
    }

    /**
     * Create an faq
     *
     * @param        question     the question to be submitted
     */
    public function create($args)
    {
        $this->checkCsrfToken();

        // Get parameters from whatever input we need
        $faq = FormUtil::getPassedValue('faq', isset($args['faq']) ? $args['faq'] : null, 'POST');

        if (UserUtil::isLoggedIn() || !isset($faq['submittedby'])) {
            $faq['submittedby'] = '';
        }
        $validators = $this->notifyHooks(new Zikula_ValidationHook('faq.ui_hooks.questions.validate_edit', new Zikula_Hook_ValidationProviders()))->getValidators();
        if (!$validators->hasErrors()) {
            // Create the FAQ
            $faqid = ModUtil::apiFunc('FAQ', 'admin', 'create', array('question' => $faq['question'],
                        'answer' => '',
                        'submittedby' => $faq['submittedby']));
            if ($faqid != false) {
                $url = new Zikula_ModUrl('FAQ', 'user', 'display', ZLanguage::getLanguageCode(), array('faqid' => $faqid));
                $this->notifyHooks(new Zikula_ProcessHook('faq.ui_hooks.questions.process_edit', $faqid, $url));
                LogUtil::registerStatus($this->__('Thank you for your question'));
            }
        } else {
            LogUtil::registerError($this->__('Error! Hook data did not validate. FAQ not created.'));
        }

        $this->redirect(ModUtil::url('FAQ', 'user', 'view'));
    }

}