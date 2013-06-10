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

class Pages_Controller_User extends Zikula_AbstractController
{
    /**
     * the main user function
     *
     * @return string html string
     */
    public function main()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Pages::', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        $this->view->setCacheId('main');
        if ($this->view->is_cached('user/main.tpl')) {
            return $this->view->fetch('user/main.tpl');
        }
        
        // Create output object
        $enablecategorization = ModUtil::getVar('Pages', 'enablecategorization');

        if ($enablecategorization) {
            // get the categories registered for the Pages
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('Pages', 'pages');
            $properties  = array_keys($catregistry);

            $propertiesdata = array();
            foreach ($properties as $property)
            {
                $rootcat = CategoryUtil::getCategoryByID($catregistry[$property]);
                if (!empty($rootcat)) {
                    $rootcat['path'] .= '/'; // add this to make the relative paths of the subcategories with ease - mateo
                    $subcategories = CategoryUtil::getCategoriesByParentID($rootcat['id']);
                    foreach ($subcategories as $k => $category) {
                        $subcategories[$k]['count'] = ModUtil::apiFunc('Pages', 'user', 'countitems', array(
                            'category' => $category['id'],
                            'property' => $property));
                    }
                    $propertiesdata[] = array('name' => $property,
                            'rootcat' => $rootcat,
                            'subcategories' => $subcategories);
                }
            }

            // Assign some useful vars to customize the main
            $this->view->assign('properties', $properties);
            $this->view->assign('propertiesdata', $propertiesdata);
        }

        return $this->view->fetch('user/main.tpl');
    }

    /**
     * view items
     *
     * @return string html string
     */
    public function view($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Pages::', '::', ACCESS_OVERVIEW), LogUtil::getErrorMsgPermission());

        $lang = ZLanguage::getLanguageCode();

        $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GET');
        $prop     = (string)FormUtil::getPassedValue('prop', isset($args['prop']) ? $args['prop'] : null, 'GET');
        $cat      = (string)FormUtil::getPassedValue('cat', isset($args['cat']) ? $args['cat'] : null, 'GET');
        $catparam = $cat;

        // defaults and input validation
        if (!is_numeric($startnum) || $startnum < 0) {
            $startnum = 1;
        }

        // get all module vars for later use
        $modvars = $this->getVars();

        // check if categorization is enabled
        if ($modvars['enablecategorization']) {
            // get the categories registered for the Pages
            $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('Pages', 'pages');
            $properties = array_keys($catregistry);

            // validate the property
            // and build the category filter - mateo
            if (!empty($prop) && in_array($prop, $properties)) {
                // TODO [Perform a category permission check here]

                // if the property and the category are specified
                // means that we'll list the pages that belongs to that category
                if (!empty($cat)) {
                    if (!is_numeric($cat)) {
                        $rootCat = CategoryUtil::getCategoryByID($catregistry[$prop]);
                        $cat = CategoryUtil::getCategoryByPath($rootCat['path'].'/'.$cat);
                    } else {
                        $cat = CategoryUtil::getCategoryByID($cat);
                    }
                    if (!empty($cat) && isset($cat['path'])) {
                        // include all it's subcategories and build the filter
                        $categories = categoryUtil::getCategoriesByPath($cat['path'], '', 'path');
                        $catstofilter = array();
                        foreach ($categories as $category) {
                            $catstofilter[] = $category['id'];
                        }
                        $catFilter = array($prop => $catstofilter);
                    } else {
                        LogUtil::registerError($this->__('Invalid category passed.'));
                    }
                }
            }

            // if nothing or only property is specified
            // means that we'll list the subcategories available on a property - mateo
            if (!isset($catFilter)) {
                $listproperties = array();
                // list all the available properties
                if (empty($prop) || !in_array($prop, $properties)) {
                    $listproperties = $properties;
                } else {
                    $listproperties[] = $prop;
                }
                $listrootcats   = array();
                $listcategories = array();
                $categorylisted = array();
                foreach (array_keys($listproperties) as $i) {
                    $listrootcats[$i] = CategoryUtil::getCategoryByID($catregistry[$listproperties[$i]]);
                    if (in_array($listrootcats[$i]['id'], $categorylisted)) {
                        continue;
                    }
                    // mark the root category as already listed
                    $categorylisted[] = $listrootcats[$i]['id'];
                    // add a final / to make the easy the relative paths build in the template - mateo
                    $listrootcats[$i]['path'] .= '/';
                    // gets all the subcategories to list
                    $listcategories[$i] = CategoryUtil::getCategoriesByParentID($listrootcats[$i]['id']);
                }
                unset($categorylisted);
            }
        }

        // assign various useful template variables
        $this->view->assign('startnum', $startnum);
        $this->view->assign('lang', $lang);

        // If categorization is enabled, show a
        // list of subcategories of an specific property
        if ($modvars['enablecategorization'] && !isset($catFilter)) {
            // Assign the current action to the template
            $this->view->assign('action', 'subcatslist');
            $this->view->assign('listrootcats', $listrootcats);
            $this->view->assign('listproperties', $listproperties);
            $this->view->assign('listcategories', $listcategories);

            // List of Pages
            // of an specific category if categorization is enabled
        } else {
            // Assign the current action to the template
            $this->view->assign('action', 'pageslist');

            // Assign the categories information
            if ($modvars['enablecategorization']) {
                $this->view->assign('properties', $properties);
                $this->view->assign('category', $cat);
            }

            // Get all matching pages
            $items = ModUtil::apiFunc('Pages', 'user', 'getall',
                    array('startnum'    => $startnum,
                    'numitems'    => $modvars['itemsperpage'],
                    'category'    => isset($catFilter) ? $catFilter : null,
                    'catregistry' => isset($catregistry) ? $catregistry : null,
                    'language'    => $lang));

            if ($items == false) {
                LogUtil::registerStatus($this->__('No pages found.'));
            }

            // Loop through each item and display it.
            $pages = array();
            foreach ($items as $item) {
                if (SecurityUtil::checkPermission('Pages::', "{$item['title']}::{$item['pageid']}", ACCESS_OVERVIEW)) {
                    $this->view->assign('item', $item);
                    if (SecurityUtil::checkPermission('Pages::', "{$item['title']}::{$item['pageid']}", ACCESS_READ)) {
                        $pages[] = $this->view->fetch('user/rowread.tpl', $item['pageid']);
                    } else {
                        $pages[] = $this->view->fetch('user/rowoverview.tpl', $item['pageid']);
                    }
                }
            }
            unset($items);

            // assign the values for the smarty plugin to produce a pager
            $this->view->assign('pager', array('numitems'     => ModUtil::apiFunc('Pages', 'user', 'countitems', array('category' => isset($catFilter) ? $catFilter : null)),
                    'itemsperpage' => $modvars['itemsperpage']));

            // assign the item output to the template
            $this->view->assign('pages', $pages);
        }

        // Return the output that has been generated by this function
        // is not practical to check for is_cached earlier in this method.
        $this->view->setCacheId('view|prop_'.$prop.'_cat_'.$catparam . '|stnum_'.$startnum.'_'.$modvars['itemsperpage']);
        return $this->view->fetch('user/view.tpl');
    }

    /**
     * display item
     *
     * @param $args array Arguments array.
     *
     * @return string html string
     */
    public function display($args)
    {
        $pageid   = FormUtil::getPassedValue('pageid', isset($args['pageid']) ? $args['pageid'] : null, 'REQUEST');
        $title    = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'REQUEST');
        $page     = FormUtil::getPassedValue('page', isset($args['page']) ? $args['page'] : null, 'REQUEST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'REQUEST');
        if (!empty($objectid)) {
            $pageid = $objectid;
        }

        // Validate the essential parameters
        if ((empty($pageid) || !is_numeric($pageid)) && empty($title)) {
            return LogUtil::registerArgsError();
        }
        if (!empty($title)) {
            unset($pageid);
        }

        // Set the default page number
        if (empty($page) || $page < 1 || !is_numeric($page)) {
            $page = 1;
        }

        $accesslevel = ACCESS_READ;
        if (SecurityUtil::checkPermission('Pages::', "::", ACCESS_COMMENT)) {
            $accesslevel = ACCESS_COMMENT;
        }
        if (SecurityUtil::checkPermission('Pages::', "::", ACCESS_EDIT)) {
            $accesslevel = ACCESS_EDIT;
        }

        // Regardless of caching, we need to increment the read count and set the cache ID
        if (isset($pageid)) {
            $this->view->setCacheId($pageid.'|'.$page.'_a'.$accesslevel);
            $incrementresult = ModUtil::apiFunc('Pages', 'user', 'incrementreadcount', array('pageid' => $pageid));
        } else {
            $this->view->setCacheId($title.'|'.$page.'_a'.$accesslevel);
            $incrementresult = ModUtil::apiFunc('Pages', 'user', 'incrementreadcount', array('title' => $title));
        }
        if ($incrementresult === false) {
            return LogUtil::registerError($this->__('No such page found.'), 404);
        }

        // get the categories registered for the Pages
        $catregistry = CategoryRegistryUtil::getRegisteredModuleCategories('Pages', 'pages');

        // Get the page
        if (isset($pageid)) {
            $params = array('pageid' => $pageid, 'catregistry' => (isset($catregistry)) ? $catregistry : null);
            $item = ModUtil::apiFunc('Pages', 'user', 'get', $params);
        } else {
            $params = array('title' => $title, 'catregistry' => (isset($catregistry)) ? $catregistry : null);
            $item = ModUtil::apiFunc('Pages', 'user', 'get', $params);
            System::queryStringSetVar('pageid', $item['pageid']);
            $pageid = $item['pageid'];
        }
        
        // determine which template to render this page with
        // A specific template may exist for this page (based on page id)
        if (isset($pageid) && $this->view->template_exists('user/display_' . $pageid . '.tpl')) {
            $template = 'user/display_' . $pageid . '.tpl';
        } else {
            $template = 'user/display.tpl';
        }

        // check if the contents are cached.
        if ($this->view->is_cached($template)) {
            return $this->view->fetch($template);
        }

        // The return value of the function is checked here
        if ($item === false) {
            return LogUtil::registerError($this->__('No such page found.'), 404);
        }

        // Explode the review into an array of seperate pages
        $allpages = explode('<!--pagebreak-->', $item['content'] );

        // validates that the requested page exists
        if (!isset($allpages[$page-1])) {
            return LogUtil::registerError($this->__('No such page found.'), 404);
        }

        // Set the item bodytext to be the required page
        // nb arrays start from zero pages from one
        $item['content'] = trim($allpages[$page-1]);
        $numitems = count($allpages);
        unset($allpages);

        // Display Admin Edit Link
        if (SecurityUtil::checkPermission('Pages::Page', "{$item['title']}::{$item['pageid']}", ACCESS_EDIT)) {
            $item['displayeditlink'] = true;
        } else {
            $item['displayeditlink'] = false;                
        }

        // Assign details of the item.
        $this->view->assign('item', $item);

        $this->view->assign('lang', ZLanguage::getLanguageCode());

        // Now lets assign the informatation to create a pager for the review
        $pager =  array('numitems' => $numitems, 'itemsperpage' => 1);
        $this->view->assign('pager', $pager);

        return $this->view->fetch($template);
    }
}